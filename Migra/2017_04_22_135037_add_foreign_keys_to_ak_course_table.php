<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAkCourseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ak_course', function(Blueprint $table)
		{
			$table->foreign('ak_course_prov_id', 'fk_ak_course_ak_provider1')->references('ak_provider_id')->on('ak_provider')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('ak_course_cat_id', 'fk_ak_course_ak_sub_category1')->references('ak_subcat_id')->on('ak_sub_category')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ak_course', function(Blueprint $table)
		{
			$table->dropForeign('fk_ak_course_ak_provider1');
			$table->dropForeign('fk_ak_course_ak_sub_category1');
		});
	}

}
