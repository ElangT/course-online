<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Transaction;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Manual save
    public static function save($data)
    {
        $transaction = new Transaction();

        $transaction->ak_tran_saction_type     = $data->payment_type;
        $transaction->ak_tran_saction_status   = $data->transaction_status;
        $transaction->ak_tran_saction_user     = $data->user_id;
        $transaction->ak_tran_saction_course   = $data->courses;
        $transaction->ak_tran_saction_schedule = $data->schedule;
        $transaction->ak_tran_saction_midtrans_id  = $data->transaction_id;

        $transaction->save();

        return 'true';
    }

    // Manual update
    public static function update_status($data)
    {
        $transaction = Transaction::where('ak_tran_saction_midtrans_id', $data->transaction_id)->first();
        
        $transaction->ak_tran_saction_status   = $data->transaction_status;

        $transaction->save();

        return 'true';
    }
}
