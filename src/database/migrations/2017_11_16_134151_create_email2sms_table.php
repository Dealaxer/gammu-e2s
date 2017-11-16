<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmail2smsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('email2sms', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('mode')->default(0);
			$table->string('url')->nullable();
			$table->string('port')->nullable();
			$table->string('username')->nullable();
			$table->string('password')->nullable();
			$table->string('onlyemail')->nullable();
			$table->string('email')->nullable();
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
		Schema::drop('email2sms');
	}

}
