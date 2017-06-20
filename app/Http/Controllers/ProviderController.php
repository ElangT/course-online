<?php

namespace App\Http\Controllers;

use App\Provider;
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
                    ->select('ak_course.ak_course_id','ak_course_detail.ak_course_detail_id','ak_main_category.ak_maincat_id','ak_course.ak_course_name', 'ak_course_level.ak_course_level_name', 'ak_sub_category.ak_subcat_name', 'ak_course_age.ak_course_age_name_id', 'ak_course_detail.ak_course_detail_price', 'ak_course_detail.ak_course_detail_desc')
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
        return view('provider')
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
    public function edit(Provider $provider)
    {
        //
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
        //
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
