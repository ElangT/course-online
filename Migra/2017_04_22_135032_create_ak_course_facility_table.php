<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAkCourseFacilityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ak_course_facility', function(Blueprint $table)
		{
			$table->integer('ak_course_facility_id', true);
			$table->integer('ak_course_facility_detid')->index('ak_course_facility_detid_2');
			$table->integer('ak_facility_type_id')->index('ak_facility_type_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ak_course_facility');
	}

}
