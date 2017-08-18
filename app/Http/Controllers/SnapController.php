<?php
//Klikpay bermasalah
namespace App\Http\Controllers;
use Response; 
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Veritrans\Midtrans;
use App\ProviderImg;
use App\Course;
use App\CourseSchedule;
use App\CourseDetail;
use App\Customer;
class SnapController extends Controller
{
    public function __construct ()
    {   
        Midtrans::$serverKey = 'VT-server-2VeBbUOXLfMXxH04FznIt83J';
        Midtrans::$isProduction = false;
        $this->middleware('auth');
        // dd(Session::all());
    }

    public function snap ()
    {
        // Session::flush();
        // dd(Session::all());
        // $populate = function ($id) {
        //     $course = Course::find($id);
        //     $course->detail = CourseDetail::where('ak_course_id', $course->ak_course_id)->first();
        //     $course->image = ProviderImg::where('ak_provider_id', $course->ak_course_prov_id)->first();
        //     return $course;
        // };
        $populate = function ($id) {
            $schedule = CourseSchedule::find($id);
            $coursedetail = CourseDetail::find($schedule->ak_course_schedule_detid);
            $course = Course::find($coursedetail->ak_course_id);
            $course->image = ProviderImg::where('ak_provider_id', $course->ak_course_prov_id)->first();
            $course->detail = $coursedetail;
            $course->schedule = $schedule;
            return $course;
        };
        $total = 0;
        $cart = [];
        if(!is_null($populate)){
            $schedule_ids = Session::get('schedule');
            $cart = array_map($populate, $schedule_ids);
            foreach ($cart as $key) {
                $total += $key->detail->ak_course_detail_price;
            }
        }
        Session::put('total', $total);
        return view('snap_checkout')->with('cart', $cart);
    }

    public function addtocart (Request $request) {
        // $orders = session('orders', []);
        // $total = session('total', 0);
        // $course_id = $request->course_id;

        // if(!in_array($course_id, $orders)){
        //     array_push($orders, $course_id);

        //     $course = Course::find($course_id);
        //     $detail = CourseDetail::where('ak_course_id', $course_id)->first();
        //     $total += $detail->ak_course_detail_price;

        //     session([
        //         'orders'   => $orders,
        //         'total'    => $total
        //     ]);

        if(!(Session::has('orders')))
        {
            Session::put('orders', [$request->course_id]);
            Session::put('schedule', [$request->schedule_id]);
        } else {
            Session::push('orders', $request->course_id);
            Session::push('schedule', $request->schedule_id);
        }
        return ($request->course_id);
    }

    public function removefromcart (Request $request) {
        return 'false';
    }

    public function reset () {
        // session([
        //     'orders'   => [],
        //     'total'    => 0
        // ]);
        Session::put('orders', []);
        Session::put('schedule', []);
        Session::put('total', 0);
        return back();
    }

    public function token ()
    {
        error_log('masuk ke snap token dari ajax');

        // Populate transaction details
        $transaction_details = [
            'order_id'      => uniqid(),
            'gross_amount'  => session('total', 0)
        ];
        
        // Populate items
        $order_id = session('orders', []);
        $schedule = session('schedule', []);
        $populate = function ($id) {
            $course = Course::find($id);
            $detail = CourseDetail::where('ak_course_id', $course->ak_course_id)->first();
            return [
                'id'       => $id,
                'price'    => $detail->ak_course_detail_price,
                'quantity' => 1,
                'name'     => $course->ak_course_name,
            ];
        };
        $items = array_map($populate, $order_id);

        // Populate customer details
        $customer = Customer::find(Auth::user()->ak_user_id);
        if($customer){
            $customer_details = [
                'first_name'   => $customer->ak_user_firstname,
                'last_name'    => $customer->ak_user_lastname,
                'email'        => $customer->ak_user_email,
                'phone'        => $customer->ak_user_phone,
            ];
        }else{
            $customer_details = [];
        }

        // Data yang akan dikirim untuk request redirect_url.
        $transaction_data = [
            'transaction_details'  => $transaction_details,
            'item_details'         => $items,
            'customer_details'     => $customer_details,
       ];

        try
        {
            $midtrans = new Midtrans();

            session([
                'saveschedule' =>session('schedule', []),
                'saveorder'    => session('orders', []),
                'saveuser'     => Auth::user()->ak_user_id
            ]);
            $snap_token = $midtrans->getSnapToken($transaction_data);

            return $snap_token;
        }
        catch (Exception $e) 
        {  
            return $e->getMessage;
        }
    }

    public function savetrans(Request $request)
    {
        $result = $request->input('result_data');
        $result = json_decode($result);
        if($result === null){
          dd($request);
        }
        $transaction_status = 0;
        switch ($result->transaction_status) {
            case 'capture':
                $transaction_status = 1;
                break;
            case 'deny':
                $transaction_status = 2;
                break;
            case 'pending': case 'settlement':
                $transaction_status = 3;
                break;
            default:
                $transaction_status = 0;
                break;
        }
            $schedule = session('saveschedule', []);
            $user = session('saveuser', 0);
            foreach($schedule as $order){
                $course = CourseSchedule::find($order);
                $course = CourseDetail::find($course->ak_course_schedule_detid);
                if($transaction_status == 1){
                    if($course->ak_course_detail_seat <= 0){
                        $transaction_status = 4;
                    } else {
                        $course->ak_course_detail_seat = $course->ak_course_detail_seat - 1;
                        $course->save();
                    }
                }
                $data = new \stdClass();
                $data->transaction_status = $transaction_status;
                $data->schedule = $order;
                $data->user_id = $user;
                $data->courses = $course->ak_course_id;
                $data->payment_type = $result->payment_type;
                $data->transaction_id = $result->transaction_id;
                TransactionController::save($data);
            }
        $this->reset();

        return $result;
    }

    public function finish(Request $request)
    {
        $res = $this->savetrans($request);
        return view('payment_finish')->with('snap', $res)->with('request', $request);
    }

    public function unfinish (Request $request)
    {
        $res = $this->savetrans($request);
        return view('payment_unfinish')->with('snap', $res)->with('request', $request);
    }

    public function error (Request $request)
    {
        $res = $this->savetrans($request);
        return view('payment_error')->with('snap', $res)->with('request', $request);
    }

}    