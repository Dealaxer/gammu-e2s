<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOutboxTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('outbox', function(Blueprint $table)
		{
			$table->timestamp('UpdatedInDB')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('InsertIntoDB')->default('0000-00-00 00:00:00');
			$table->dateTime('SendingDateTime')->default('0000-00-00 00:00:00');
			$table->time('SendBefore')->default('23:59:59');
			$table->time('SendAfter')->default('00:00:00');
			$table->text('Text', 65535)->nullable();
			$table->string('DestinationNumber', 20)->default('');
			$table->enum('Coding', array('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression'))->default('Default_No_Compression');
			$table->text('UDH', 65535)->nullable();
			$table->integer('Class')->nullable()->default(-1);
			$table->text('TextDecoded', 65535);
			$table->increments('ID');
			$table->enum('MultiPart', array('false','true'))->nullable()->default('false');
			$table->integer('RelativeValidity')->nullable()->default(-1);
			$table->string('SenderID')->nullable()->index('outbox_sender');
			$table->dateTime('SendingTimeOut')->nullable()->default('0000-00-00 00:00:00');
			$table->enum('DeliveryReport', array('default','yes','no'))->nullable()->default('default');
			$table->text('CreatorID', 65535);
			$table->integer('Retries')->nullable()->default(0);
			$table->integer('Priority')->nullable()->default(0);
			$table->enum('Status', array('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error','Reserved'))->default('Reserved');
			$table->integer('StatusCode')->default(-1);
			$table->index(['SendingDateTime','SendingTimeOut'], 'outbox_date');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('outbox');
	}

}
