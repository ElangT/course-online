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
			$table->string('ak_user_firstname', 191);
			$table->string('ak_user_lastname', 191);
			$table->string('email', 191)->unique('ak_user_ak_user_email_unique');
			$table->string('password', 191);
			$table->date('ak_user_dob');
			$table->integer('ak_user_phone');
			$table->string('remember_token', 100)->nullable();
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
		Schema::drop('ak_user');
	}

}
