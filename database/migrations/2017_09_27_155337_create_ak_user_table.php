<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAkUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ak_user', function(Blueprint $table)
		{
			$table->integer('ak_user_id', true);
			$table->string('ak_user_firstname', 45);
			$table->string('ak_user_lastname', 45);
			$table->string('ak_user_email', 45);
			$table->string('ak_user_password');
			$table->date('ak_user_dob');
			$table->string('ak_user_phone', 13);
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
		Schema::drop('ak_user');
	}

}
