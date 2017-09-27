<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAkAdminTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ak_admin', function(Blueprint $table)
		{
			$table->integer('ak_admin_id', true);
			$table->string('ak_admin_username', 45);
			$table->string('ak_admin_password');
			$table->dateTime('ak_admin_last_activity')->default('0000-00-00 00:00:00');
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
		Schema::drop('ak_admin');
	}

}
