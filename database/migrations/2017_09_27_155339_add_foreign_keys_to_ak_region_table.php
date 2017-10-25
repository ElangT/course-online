<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAkRegionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ak_region', function(Blueprint $table)
		{
			$table->foreign('ak_region_prov_id', 'fk_ak_region_ak_province1')->references('ak_province_id')->on('ak_province')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ak_region', function(Blueprint $table)
		{
			$table->dropForeign('fk_ak_region_ak_province1');
		});
	}

}
