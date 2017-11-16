<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSentitemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sentitems', function(Blueprint $table)
		{
			$table->timestamp('UpdatedInDB')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('InsertIntoDB')->default('0000-00-00 00:00:00');
			$table->dateTime('SendingDateTime')->default('0000-00-00 00:00:00');
			$table->dateTime('DeliveryDateTime')->nullable()->index('sentitems_date');
			$table->text('Text', 65535);
			$table->string('DestinationNumber', 20)->default('')->index('sentitems_dest');
			$table->enum('Coding', array('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression'))->default('Default_No_Compression');
			$table->text('UDH', 65535);
			$table->string('SMSCNumber', 20)->default('');
			$table->integer('Class')->default(-1);
			$table->text('TextDecoded', 65535);
			$table->integer('ID')->unsigned()->default(0);
			$table->string('SenderID')->index('sentitems_sender');
			$table->integer('SequencePosition')->default(1);
			$table->enum('Status', array('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error'))->default('SendingOK');
			$table->integer('StatusError')->default(-1);
			$table->integer('TPMR')->default(-1)->index('sentitems_tpmr');
			$table->integer('RelativeValidity')->default(-1);
			$table->text('CreatorID', 65535);
			$table->integer('StatusCode')->default(-1);
			$table->primary(['ID','SequencePosition']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sentitems');
	}

}
