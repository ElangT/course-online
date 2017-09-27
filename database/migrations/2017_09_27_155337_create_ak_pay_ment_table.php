<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAkPayMentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ak_pay_ment', function(Blueprint $table)
		{
			$table->integer('ak_pay_ment_id', true);
			$table->integer('ak_pay_ment_tran_id')->index('fk_ak_pay_ment_ak_tran_saction1_idx');
			$table->string('ak_pay_ment_price', 45);
			$table->string('ak_pay_ment_paid', 45);
			$table->string('ak_pay_ment_cc', 45);
			$table->string('ak_pay_ment_dc', 45);
			$table->boolean('ak_pay_ment_status');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ak_pay_ment');
	}

}
