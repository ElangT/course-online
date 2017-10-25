<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAkProviderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ak_provider', function(Blueprint $table)
		{
			$table->foreign('ak_provider_region', 'fk_ak_provider_ak_region1')->references('ak_region_id')->on('ak_region')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ak_provider', function(Blueprint $table)
		{
			$table->dropForeign('fk_ak_provider_ak_region1');
		});
	}

}
