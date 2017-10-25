<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAkCourseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ak_course', function(Blueprint $table)
		{
			$table->integer('ak_course_id', true);
			$table->string('ak_course_name', 45);
			$table->integer('ak_course_cat_id')->index('fk_ak_course_ak_sub_category1_idx');
			$table->integer('ak_course_prov_id')->index('fk_ak_course_ak_provider1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ak_course');
	}

}
