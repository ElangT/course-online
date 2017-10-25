<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAkRegionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ak_region', function(Blueprint $table)
		{
			$table->integer('ak_region_id', true);
			$table->integer('ak_region_prov_id')->index('fk_ak_region_ak_province1_idx');
			$table->text('ak_region_cityname', 65535);
			$table->text('ak_region_name', 65535);
			$table->text('ak_region_namefull', 65535);
			$table->integer('ak_region_parent_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ak_region');
	}

}
