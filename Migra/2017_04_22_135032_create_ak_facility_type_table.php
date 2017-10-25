<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAkFacilityTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ak_facility_type', function(Blueprint $table)
		{
			$table->integer('ak_facility_type_id', true);
			$table->text('ak_facility_type_name_idn', 65535);
			$table->text('ak_facility_type_name_eng', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ak_facility_type');
	}

}
