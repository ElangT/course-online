<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAkSubCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ak_sub_category', function(Blueprint $table)
		{
			$table->integer('ak_subcat_id', true);
			$table->integer('ak_subcat_parent')->index('fk_ak_sub_category_ak_main_category1_idx');
			$table->string('ak_subcat_name', 45);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ak_sub_category');
	}

}
