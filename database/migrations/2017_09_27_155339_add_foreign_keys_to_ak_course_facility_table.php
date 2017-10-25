<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAkCourseFacilityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ak_course_facility', function(Blueprint $table)
		{
			$table->foreign('ak_course_facility_detid', 'ak_course_facility_ibfk_1')->references('ak_course_detail_id')->on('ak_course_detail')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('ak_facility_type_id', 'ak_course_facility_ibfk_2')->references('ak_facility_type_id')->on('ak_facility_type')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ak_course_facility', function(Blueprint $table)
		{
			$table->dropForeign('ak_course_facility_ibfk_1');
			$table->dropForeign('ak_course_facility_ibfk_2');
		});
	}

}
