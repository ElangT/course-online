<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAkSubCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ak_sub_category', function(Blueprint $table)
		{
			$table->foreign('ak_subcat_parent', 'fk_ak_sub_category_ak_main_category1')->references('ak_maincat_id')->on('ak_main_category')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ak_sub_category', function(Blueprint $table)
		{
			$table->dropForeign('fk_ak_sub_category_ak_main_category1');
		});
	}

}
