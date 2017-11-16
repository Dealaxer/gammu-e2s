<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhonesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('phones', function(Blueprint $table)
		{
			$table->text('ID', 65535);
			$table->timestamp('UpdatedInDB')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('InsertIntoDB')->default('0000-00-00 00:00:00');
			$table->dateTime('TimeOut')->default('0000-00-00 00:00:00');
			$table->enum('Send', array('yes','no'))->default('no');
			$table->enum('Receive', array('yes','no'))->default('no');
			$table->string('IMEI', 35)->primary();
			$table->string('IMSI', 35);
			$table->string('NetCode', 10)->nullable()->default('ERROR');
			$table->string('NetName', 35)->nullable()->default('ERROR');
			$table->text('Client', 65535);
			$table->integer('Battery')->default(-1);
			$table->integer('Signal')->default(-1);
			$table->integer('Sent')->default(0);
			$table->integer('Received')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('phones');
	}

}
