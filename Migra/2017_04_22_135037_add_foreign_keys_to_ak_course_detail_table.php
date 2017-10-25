<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAkCourseDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ak_course_detail', function(Blueprint $table)
		{
			$table->foreign('ak_course_id', 'fk_ak_course_detail_ak_course')->references('ak_course_id')->on('ak_course')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('ak_course_detail_age', 'fk_ak_course_detail_ak_course_age1')->references('ak_course_age_id')->on('ak_course_age')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('ak_course_detail_level', 'fk_ak_course_detail_ak_course_level1')->references('ak_course_level_id')->on('ak_course_level')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ak_course_detail', function(Blueprint $table)
		{
			$table->dropForeign('fk_ak_course_detail_ak_course');
			$table->dropForeign('fk_ak_course_detail_ak_course_age1');
			$table->dropForeign('fk_ak_course_detail_ak_course_level1');
		});
	}

}
