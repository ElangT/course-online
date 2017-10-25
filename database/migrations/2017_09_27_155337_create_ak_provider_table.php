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
			$table->string('ak_provider_email', 45);
			$table->string('ak_provider_password');
			$table->integer('ak_provider_region')->index('fk_ak_provider_ak_region1_idx');
			$table->text('ak_provider_address');
			$table->smallInteger('ak_provider_zipcode');
			$table->text('ak_provider_description');
			$table->string('ak_provider_telephone', 13);
			$table->timestamp('ak_provider_last_activity')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('remember_token', 100)->nullable();
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
