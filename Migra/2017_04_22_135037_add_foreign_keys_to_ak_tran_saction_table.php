<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAkTranSactionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ak_tran_saction', function(Blueprint $table)
		{
			$table->foreign('ak_tran_saction_course', 'fk_ak_tran_saction_ak_course1')->references('ak_course_id')->on('ak_course')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('ak_tran_saction_status', 'fk_ak_tran_saction_ak_tran_status1')->references('id_ak_tran_status_id')->on('ak_tran_status')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('ak_tran_saction_user', 'fk_ak_tran_saction_ak_user1')->references('ak_user_id')->on('ak_user')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ak_tran_saction', function(Blueprint $table)
		{
			$table->dropForeign('fk_ak_tran_saction_ak_course1');
			$table->dropForeign('fk_ak_tran_saction_ak_tran_status1');
			$table->dropForeign('fk_ak_tran_saction_ak_user1');
		});
	}

}
