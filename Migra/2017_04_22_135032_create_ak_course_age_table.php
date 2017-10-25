<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAkCourseAgeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ak_course_age', function(Blueprint $table)
		{
			$table->integer('ak_course_age_id', true);
			$table->text('ak_course_age_name_id', 65535);
			$table->text('ak_course_age_name_eng', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ak_course_age');
	}

}
