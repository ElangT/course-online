<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAkTranSactionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ak_tran_saction', function(Blueprint $table)
		{
			$table->integer('ak_tran_saction_id', true);
			$table->text('ak_tran_saction_type', 65535);
			$table->integer('ak_tran_saction_user')->index('fk_ak_tran_saction_ak_user1_idx');
			$table->integer('ak_tran_saction_course')->index('fk_ak_tran_saction_ak_course1');
			$table->integer('ak_tran_saction_schedule')->index('fk_ak_tran_saction_ak_schedule1');
			$table->integer('ak_tran_saction_status')->index('fk_ak_tran_saction_ak_tran_status1_idx');
			$table->string('ak_tran_saction_midtrans_id', 100)->nullable();
			$table->primary(['ak_tran_saction_id','ak_tran_saction_user','ak_tran_saction_course'],'primary_ak_tran_saction');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ak_tran_saction');
	}

}
