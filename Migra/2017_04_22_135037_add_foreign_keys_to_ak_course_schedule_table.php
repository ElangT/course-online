<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAkCourseScheduleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ak_course_schedule', function(Blueprint $table)
		{
			$table->foreign('ak_course_schedule_detid', 'fk_ak_course_schedule_ak_course_detail1')->references('ak_course_detail_id')->on('ak_course_detail')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ak_course_schedule', function(Blueprint $table)
		{
			$table->dropForeign('fk_ak_course_schedule_ak_course_detail1');
		});
	}

}
