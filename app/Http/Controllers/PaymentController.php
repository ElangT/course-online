<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }


    public function notification () {

    	return view('payment');
    }

    public function error () {
    	return view('payment_error');
    }

    public function finish () {
    	return view('payment_finish');
    }

    public function unfinish () {
    	return view('payment_unfinish');
    }
}
