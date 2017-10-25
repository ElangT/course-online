<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAkProvinceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ak_province', function(Blueprint $table)
		{
			$table->integer('ak_province_id', true);
			$table->text('ak_province_name', 65535);
			$table->text('ak_province_name_abbr', 65535);
			$table->text('ak_province_name_idn', 65535);
			$table->integer('ak_province_name_eng');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ak_province');
	}

}
