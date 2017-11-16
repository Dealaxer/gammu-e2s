<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGammuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gammu', function(Blueprint $table)
		{
			$table->integer('Version')->default(0)->primary();
		});
		
		DB::table('gammu')->insert(
			array(
				'Version' => '17'
			)
		);
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gammu');
	}

}
