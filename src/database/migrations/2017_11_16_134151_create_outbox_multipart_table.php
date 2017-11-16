<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOutboxMultipartTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('outbox_multipart', function(Blueprint $table)
		{
			$table->text('Text', 65535)->nullable();
			$table->enum('Coding', array('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression'))->default('Default_No_Compression');
			$table->text('UDH', 65535)->nullable();
			$table->integer('Class')->nullable()->default(-1);
			$table->text('TextDecoded', 65535)->nullable();
			$table->integer('ID')->unsigned()->default(0);
			$table->integer('SequencePosition')->default(1);
			$table->enum('Status', array('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error','Reserved'))->default('Reserved');
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
		Schema::drop('outbox_multipart');
	}

}
