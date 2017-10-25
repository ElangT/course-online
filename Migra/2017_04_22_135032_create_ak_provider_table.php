<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAkProviderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ak_provider', function(Blueprint $table)
		{
			$table->integer('ak_provider_id', true);
			$table->string('ak_provider_firstname', 45);
			$table->string('ak_provider_lastname', 45);
			$table->string('ak_provider_email')->unique();
			$table->string('ak_provider_password');
			$table->integer('ak_provider_region')->index('fk_ak_provider_ak_region1_idx');
			$table->text('ak_provider_address', 65535);
			$table->smallInteger('ak_provider_zipcode');
			$table->text('ak_provider_description', 65535);
			$table->integer('ak_provider_telephone');
			$table->dateTime('ak_provider_last_activity');
			$table->rememberToken();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ak_provider');
	}

}
