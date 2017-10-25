<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAkCourseScheduleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ak_course_schedule', function(Blueprint $table)
		{
			$table->integer('ak_course_schedule_id')->primary();
			$table->integer('ak_course_schedule_detid')->index('fk_ak_course_schedule_ak_course_detail1_idx');
			$table->text('ak_course_schedule_day', 65535);
			$table->time('ak_course_schedule_time');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ak_course_schedule');
	}

}
