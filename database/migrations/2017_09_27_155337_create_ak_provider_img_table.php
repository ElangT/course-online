<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAkProviderImgTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ak_provider_img', function(Blueprint $table)
		{
			$table->integer('ak_provider_img_id', true);
			$table->integer('ak_provider_id')->index('ak_provider_id');
			$table->string('ak_provider_img_path', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ak_provider_img');
	}

}
