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
			$table->timestamp('ak_admin_last_activity')->default(DB::raw('CURRENT_TIMESTAMP'));
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
