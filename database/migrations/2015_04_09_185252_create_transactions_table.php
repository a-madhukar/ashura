<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactions', function(Blueprint $table)
		{
			$table->increments('id');
					   $table->integer('student_id')->unsigned();
					   $table->foreign('student_id')->references('id')->on('students');
					   $table->string('purpose');
					   $table->string('amount'); 
					   $table->string('cardholdername');
					   $table->string('cardno');
					   $table->string('cv');
					   $table->date('expirydate');
					   
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
		Schema::drop('transactions');
	}

}
