<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAkCourseDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ak_course_detail', function(Blueprint $table)
		{
			$table->integer('ak_course_detail_id', true);
			$table->integer('ak_course_id')->index('fk_ak_course_detail_ak_course_idx');
			$table->string('ak_course_detail_name', 45);
			$table->integer('ak_course_detail_price');
			$table->integer('ak_course_detail_level')->index('fk_ak_course_detail_ak_course_level1_idx');
			$table->integer('ak_course_detail_age')->index('fk_ak_course_detail_ak_course_age1_idx');
			$table->smallInteger('ak_course_detail_size');
			$table->boolean('ak_course_detail_seat');
			$table->text('ak_course_detail_desc');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ak_course_detail');
	}

}
