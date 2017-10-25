<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAkProviderImgTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ak_provider_img', function(Blueprint $table)
		{
			$table->foreign('ak_provider_id', 'ak_provider_img_ibfk_1')->references('ak_provider_id')->on('ak_provider')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ak_provider_img', function(Blueprint $table)
		{
			$table->dropForeign('ak_provider_img_ibfk_1');
		});
	}

}
