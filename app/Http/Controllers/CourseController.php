<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Course;
use App\CourseDetail;
use App\CourseSchedule;
use App\Provider;
use App\ProviderImg;
use App\Region;
use App\MainCategory;
use App\SubCategory;
use App\Transaction;
use Session;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        foreach ($courses as $course) {
            $course->detail = CourseDetail::where('ak_course_id', $course->ak_course_id)->first();
        }
        return view('course')->with('courses', $courses);
    }
    public function studentcourse()
    {
        $query = DB::table('ak_course')
                    // ->join('ak_user')
                    ->join('ak_course_detail', 'ak_course.ak_course_id', '=', 'ak_course_detail.ak_course_id')
                    ->join('ak_tran_saction', 'ak_tran_saction_course', '=', 'ak_course.ak_course_id')
                    ->join('ak_course_level', 'ak_course_detail.ak_course_detail_level', '=', 'ak_course_level.ak_course_level_id')
                    ->join('ak_course_age', 'ak_course_detail.ak_course_detail_age', '=', 'ak_course_age.ak_course_age_id')
                    ->join('ak_sub_category', 'ak_course.ak_course_cat_id', '=', 'ak_sub_category.ak_subcat_id')
                    ->join('ak_main_category', 'ak_main_category.ak_maincat_id', '=', 'ak_sub_category.ak_subcat_parent')
                    ->join('ak_provider', 'ak_provider.ak_provider_id', '=', 'ak_course.ak_course_prov_id')
                    ->select('ak_course.*','ak_course.ak_course_prov_id','ak_course_detail.*','ak_main_category.ak_maincat_id', 'ak_course_level.ak_course_level_name', 'ak_sub_category.ak_subcat_name', 'ak_course_age.ak_course_age_name_id')
                    ->where('ak_tran_saction.ak_tran_saction_user', '=', Auth::guard()->user()->ak_user_id);
                    // ->where('ak_user.ak_user_id' ,'=', Auth::guard('auth')->user()->ak_user_id);
        $courses = $query->get();
        $query = DB:: table('ak_provider_img')
                    ->where('ak_provider_id' , '=', Auth::id());

        $img = $query->first();
        foreach ($courses as $key) {
            $query = DB::table('ak_course_schedule')
                        ->select('ak_course_schedule_day', 'ak_course_schedule_time')
                        ->where('ak_course_schedule_detid', '=', $key->ak_course_detail_id);
            $key->schedule = $query->get();
        }
        return view('course-student')
            ->with('courses', $courses)
            ->with('image', $img->ak_provider_img_path);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcat = SubCategory::all();
        $maincat = MainCategory::all();
        $content = false;
        return view('course-create')
                ->with('maincat', $maincat)
                ->with('subcat', $subcat)
                ->with('content', $content)
                ;
    }

    public function manage($id)
    {
        $query = DB::table('ak_course')
                    ->join('ak_provider', 'ak_course.ak_course_prov_id', '=', 'ak_provider.ak_provider_id')
                    ->select('*')
                    ->where(function ($query) {
                        return $query
                        ->whereRaw('LOWER(ak_provider.ak_provider_email) like ?', Auth::user()->ak_provider_email);
                    })
                    ->where('ak_course.ak_course_id' , '=', $id);
        $courses = $query->first();
        if($courses === null){
            return redirect('/provider/dashboard');
        }

        $query = DB::table('ak_user')
                    ->join('ak_tran_saction', 'ak_tran_saction_user', '=', 'ak_user.ak_user_id')
                    ->join('ak_tran_status', 'id_ak_tran_status_id', '=', 'ak_tran_saction_status')
                    ->select('ak_user_firstname','ak_user_lastname','ak_user_email','ak_user_phone', 'ak_tran_saction_type', 'ak_tran_saction_status', 'ak_tran_saction_id', 'ak_tran_status_name')
                    ->where('ak_tran_saction_course', '=', $courses->ak_course_id);
        $user = $query->get();
        $course = new \stdClass();
        $course->success = [];
        $course->excess = [];
        $course->error = [];
        $course->pending = [];
        foreach($user as $i){
            if($i->ak_tran_saction_status == 1){
               array_push($course->success, $i);
            } elseif($i->ak_tran_saction_status == 2) {
               array_push($course->pending, $i);
            } elseif($i->ak_tran_saction_status == 3) {
               array_push($course->error, $i);
            } else {
               array_push($course->excess, $i);
            }
        }
        // dd($course->success);
        return view('manage', [
            'course' => $course,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function validatecourse(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:6|max:255',
            'subcat' => 'required',
            'price' => 'required|numeric|min:0',
            'level' => 'required',
            'subcat' => 'required',
            'age' => 'required',
            'description' => 'required|min:6',
            'size' => 'numeric|required|min:0',
            'seat' => 'numeric|required|max:'.$request->size, 
        ]);

        for ($i=1; $i <= $request->jmlschedule; $i++) { 
            if(!is_null(request("day".$i)) && !is_null(request("time".$i))){
                $this->validate($request, [
                    'day'.$i => 'required',
                    'time'.$i => 'required',
                ]);
            }
        }

    }
    public function store(Request $request)
    {

        $this->validatecourse($request);

        $course = new Course();
        $detail = new CourseDetail();
        $course->ak_course_name = $request->name;
        $course->ak_course_cat_id = $request->subcat;
        $course->ak_course_prov_id = Auth::user()->ak_provider_id;
        $course->ak_course_active = true;
        $course->ak_course_open = true;
        $course->save();
        $detail->ak_course_detail_name = $request->name . " detail";
        $detail->ak_course_detail_price = $request->price;
        $detail->ak_course_detail_level = $request->level;
        $detail->ak_course_detail_age = $request->age;
        $detail->ak_course_detail_size = $request->size;
        $detail->ak_course_detail_desc = $request->description;
        $detail->ak_course_detail_seat = $request->seat;
        $detail->ak_course_id = $course->ak_course_id;
        $detail->save();
        $detailid = $detail->getId();
        foreach ($request->day as $key => $value) {
            $schedule = new CourseSchedule;
            $schedule->ak_course_schedule_detid = $detailid;
            $schedule->ak_course_schedule_day = $value;
            $schedule->ak_course_schedule_time = $request->time[$key];
            $schedule->save();
        }

        return redirect('/provider/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $course = Course::findOrFail($id);

        $course     = DB::table('ak_course')
                        ->join('ak_course_detail', 'ak_course.ak_course_id', 'ak_course_detail.ak_course_id')
                        ->join('ak_sub_category', 'ak_course_cat_id', 'ak_subcat_id')
                        ->join('ak_main_category', 'ak_subcat_parent' ,'ak_maincat_id')
                        ->join('ak_course_level', 'ak_course_detail_level','ak_course_level_id')
                        ->join('ak_course_age', 'ak_course_detail_age', 'ak_course_age_id')
                        ->select('*')
                        ->where('ak_course.ak_course_id', $id)->first();

        $schedules  = CourseSchedule::where('ak_course_schedule_detid', $course->ak_course_detail_id)->get();
        $facilities = DB::table('ak_course_facility')
                            ->join('ak_facility_type', 'ak_course_facility.ak_facility_type_id', 'ak_facility_type.ak_facility_type_id')
                            ->get();
        $query = DB::table('ak_course')
                    ->join('ak_provider', 'ak_provider.ak_provider_id', '=', 'ak_course.ak_course_prov_id')
                    ->join('ak_provider_img', 'ak_provider_img.ak_provider_id', '=', 'ak_provider.ak_provider_id')
                    ->join('ak_region', 'ak_region.ak_region_id', '=', 'ak_provider.ak_provider_region')
                    ->select('ak_provider.ak_provider_firstname', 'ak_provider.ak_provider_description', 'ak_provider.ak_provider_lastname', 'ak_provider.ak_provider_address', 'ak_provider.ak_provider_zipcode', 'ak_provider.ak_provider_telephone', 'ak_provider.ak_provider_email', 'ak_provider_img.ak_provider_img_path', 'ak_region.ak_region_cityname', 'ak_region.ak_region_name', 'ak_region.ak_region_namefull')
                    ->where('ak_course.ak_course_id', '=', $id);
        $provider     = $query->first();
        $tran = Transaction::where('ak_tran_saction_user', '=', Auth::id())
                            ->where('ak_tran_saction_course', '=', $id)
                            ->first();
        $bought = ($tran !== null && $tran->ak_tran_saction_status === 1);

        $message = "";
        $trolled = false;
        if(Session::has('orders') && in_array($course->ak_course_detail_id,  Session::get('orders'))){
            $message="Course sudah di trolli";
            $trolled = true;
        }
        elseif(Auth::check() && $bought){
            $message="Course sudah dibeli";
        }
        elseif($course->ak_course_open === 0 or $course->ak_course_active === 9){
            $message="Course sudah penuh";
        }
        else{
            $message="Login untuk membeli course";
        }


        return view('course-detail', [
            'course' => $course,
            'provider' => $provider,
            'schedules' => $schedules,
            'facilities' => $facilities,
            'transaction' => $tran,
            'message' => $message,
            'trolled' => $trolled,
            'bought' => $bought,
        ]);
    }


    public function addtocart (Request $request, $id) {
        if(!(Session::has('orders')))
        {
            Session::put('orders', [$request->courseid]);
            Session::put('schedule', [$request->schedule]);
        } else {
            Session::push('orders', $request->courseid);
            Session::push('schedule', $request->schedule);
        }
        return redirect('courses/'.$id);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $query = DB::table('ak_course')
                    ->join('ak_course_detail', 'ak_course.ak_course_id', '=', 'ak_course_detail.ak_course_id')
                    ->join('ak_course_level', 'ak_course_detail.ak_course_detail_level', '=', 'ak_course_level.ak_course_level_id')
                    ->join('ak_course_age', 'ak_course_detail.ak_course_detail_age', '=', 'ak_course_age.ak_course_age_id')
                    ->join('ak_sub_category', 'ak_course.ak_course_cat_id', '=', 'ak_sub_category.ak_subcat_id')
                    ->join('ak_main_category', 'ak_main_category.ak_maincat_id', '=', 'ak_sub_category.ak_subcat_parent')
                    ->join('ak_provider', 'ak_course.ak_course_prov_id', '=', 'ak_provider.ak_provider_id')
                    ->select('ak_course.*','ak_provider.ak_provider_id','ak_course_detail.*','ak_main_category.ak_maincat_id', 'ak_course_level.ak_course_level_id', 'ak_sub_category.ak_subcat_id', 'ak_course_age.ak_course_age_id', 'ak_course_detail.ak_course_detail_price', 'ak_course_detail.ak_course_detail_desc')
                    ->where(function ($query) {
                        return $query
                        ->whereRaw('LOWER(ak_provider.ak_provider_email) like ?', Auth::user()->ak_provider_email);
                    })
                    ->where('ak_course.ak_course_id' , '=', $id);
        $courses = $query->first();
        if($courses === null){
            return redirect('/provider/dashboard');
        }

        $query = DB:: table('ak_provider_img')
                    ->where('ak_provider_id' , '=', Auth::id());

        $img = $query->first();
        $schedules  = CourseSchedule::where('ak_course_schedule_detid', $courses->ak_course_detail_id)->get();

        $subcat = SubCategory::all();
        $maincat = MainCategory::all();
        $content = true;
        return view('course-edit', [
            'maincat' => $maincat,
            'subcat' => $subcat,
            'course' => $courses,
            'image' => $img->ak_provider_img_path,
            'schedules' => $schedules,
            'content' => $content,
        ]);
    }

    public function changestatus(Request $request)
    {
        $tran = Transaction::find($request->transactionid);
        $tran->ak_tran_saction_status = $request->statuspembayaran;
        $tran->save();
        return redirect('provider/manage/'.$tran->ak_tran_saction_course);
    }

/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

        $this->validatecourse($request);
        $course =Course::find($id);
        $course->ak_course_name = $request->name ;
        $course->ak_course_cat_id = $request->subcat;
        $course->ak_course_open = $request->open;
        $course->ak_course_active = $request->active;
        $course->save();   
        $detail = CourseDetail::where('ak_course_id', '=', $id)->first();
        $detail->ak_course_detail_name = $request->name . " detail";
        $detail->ak_course_detail_price = $request->price;
        $detail->ak_course_detail_level = $request->level;
        $detail->ak_course_detail_age = $request->age;
        $detail->ak_course_detail_size = $request->size;
        $detail->ak_course_detail_seat = $request->seat;
        $detail->ak_course_detail_desc = $request->description;
        $detail->save();
        $detailid = $detail->getId();
        foreach ($request->oldday as $key => $value) {
            $schedule = CourseSchedule::find($key);
            $schedule->ak_course_schedule_day = $value;
            $schedule->ak_course_schedule_time = $request->oldtime[$key];
            $schedule->save();
        }
        if($request->has('day')){
            foreach ($request->day as $key => $value) {
                $schedule = new CourseSchedule;
                $schedule->ak_course_schedule_detid = $detailid;
                $schedule->ak_course_schedule_day = $value;
                $schedule->ak_course_schedule_time = $request->time[$key];
                $schedule->save();
            }

        }
        return redirect('provider/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function open($id)
    {
        $course =Course::find($id);
        $course->ak_course_open = !$course->ak_course_open;
        $course->save();
        return redirect('provider/dashboard');
    }

    public function active($id)
    {
        $course =Course::find($id);
        $course->ak_course_active = !$course->ak_course_active;
        $course->save();
        return redirect('provider/dashboard');

    }
}
