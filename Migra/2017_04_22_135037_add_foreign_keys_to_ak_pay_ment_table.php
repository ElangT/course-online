<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAkPayMentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ak_pay_ment', function(Blueprint $table)
		{
			$table->foreign('ak_pay_ment_tran_id', 'fk_ak_pay_ment_ak_tran_saction1')->references('ak_tran_saction_id')->on('ak_tran_saction')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ak_pay_ment', function(Blueprint $table)
		{
			$table->dropForeign('fk_ak_pay_ment_ak_tran_saction1');
		});
	}

}
