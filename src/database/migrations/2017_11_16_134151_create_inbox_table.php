<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInboxTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inbox', function(Blueprint $table)
		{
			$table->timestamp('UpdatedInDB')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('ReceivingDateTime')->default('0000-00-00 00:00:00');
			$table->text('Text', 65535);
			$table->string('SenderNumber', 20)->default('');
			$table->enum('Coding', array('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression'))->default('Default_No_Compression');
			$table->text('UDH', 65535);
			$table->string('SMSCNumber', 20)->default('');
			$table->integer('Class')->default(-1);
			$table->text('TextDecoded', 65535);
			$table->increments('ID');
			$table->text('RecipientID', 65535);
			$table->enum('Processed', array('false','true'))->default('false');
			$table->integer('Status')->default(-1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('inbox');
	}

}
