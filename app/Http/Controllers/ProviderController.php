<?php

namespace App\Http\Controllers;

use App\Provider;
use App\ProviderImg;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Auth;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:provider');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $query = DB::table('ak_course')
                    ->join('ak_course_detail', 'ak_course.ak_course_id', '=', 'ak_course_detail.ak_course_id')
                    ->join('ak_course_level', 'ak_course_detail.ak_course_detail_level', '=', 'ak_course_level.ak_course_level_id')
                    ->join('ak_course_age', 'ak_course_detail.ak_course_detail_age', '=', 'ak_course_age.ak_course_age_id')
                    ->join('ak_sub_category', 'ak_course.ak_course_cat_id', '=', 'ak_sub_category.ak_subcat_id')
                    ->join('ak_main_category', 'ak_main_category.ak_maincat_id', '=', 'ak_sub_category.ak_subcat_parent')
                    ->join('ak_provider', 'ak_course.ak_course_prov_id', '=', 'ak_provider.ak_provider_id')
                    ->select('ak_course.*','ak_course_detail.*','ak_main_category.ak_maincat_id', 'ak_course_level.ak_course_level_name', 'ak_sub_category.ak_subcat_name', 'ak_course_age.ak_course_age_name_id')
                    ->where(function ($query) {
                        return $query
                        ->whereRaw('LOWER(ak_provider.ak_provider_email) like ?', Auth::user()->ak_provider_email);
                    });
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
        return view('dashboard')
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function passwordedit()
    {
        return view('auth.provider-password');
    }
    public function passwordupdate(Request $request)
    {
            $this->validate($request, [
                'password' => 'required|confirmed',
            ]);
            $credentials = $request->only(
                    'password', 'password_confirmation'
            );
            $user = \Auth::user();
            $user->ak_provider_password = bcrypt($credentials['password']);
            $user->save();
            return redirect('provider/dashboard');

    }
    public function edit(Provider $provider)
    {

        $provider = Provider::find(Auth::id());

        $query = DB::table('ak_province')
                    ->select('*');
        $province = $query->get();
        $query = DB::table('ak_region')
                    ->select('*');
        $region = $query->get();
        $providerprov = DB::table('ak_region')
                        ->where('ak_region_id', '=', $provider->ak_provider_region)
                        ->select('ak_region_prov_id')
                        ->first();
        $content = true;

        return view('provider-edit')
                ->with('province', $province)
                ->with('region', $region)
                ->with('provider', $provider)
                ->with('content', $content)
                ->with('proprov', $providerprov->ak_region_prov_id);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Provider $provider)
    {
        $this->validate($request, [
            'firstname' => 'max:255',
            'lastname' => 'max:255',
            'email' => 'email|max:255|unique:ak_user,ak_user_email',
            'region' => 'max:11',
            'zipcode' => 'max:5',
            'telephone' => 'max:13',
        ]);

        $cek = Provider::where('ak_provider_email', '=', $request->email)
                        ->first();
        if($cek and $cek->ak_provider_id !== Auth::id()){
            return Redirect::back()->withErrors(['email', 'The email has already been taken.']);
        }

        $provider = Provider::find(Auth::id());
        $provider->ak_provider_firstname = $request->firstname;
        $provider->ak_provider_lastname = $request->lastname;
        $provider->ak_provider_email = $request->email;
        $provider->ak_provider_region = $request->region;
        $provider->ak_provider_address = $request->address;
        $provider->ak_provider_zipcode = $request->zipcode;
        $provider->ak_provider_description = $request->description;
        $provider->ak_provider_telephone = $request->telephone;
        $provider->save();

        return redirect('/provider/dashboard');
    }

    public function changePict(Request $request)
    {
            $this->validate($request, [

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);


        $imageName = time().'.'.$request->image->getClientOriginalExtension();

        $request->image->move(public_path('images'), $imageName);

        $imgPath = ProviderImg::where('ak_provider_id','=' ,Auth::id())->first();
        if($imgPath->ak_provider_img_path !== 'default.jpg'){
            File::delete('images/' .$imgPath->ak_provider_img_path);
        }
        $imgPath->ak_provider_img_path = $imageName;
        $imgPath->save();
        return back()
            ->with('success','Image Uploaded successfully.')
            ->with('image',$imgPath);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        //
    }
}
