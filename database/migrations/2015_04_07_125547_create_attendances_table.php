<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attendances', function(Blueprint $table)
		{
			$table->increments('id');
                       $table->integer('class_id')->unsigned();
                       $table->foreign('class_id')->references('id')->on('student_classes')->onDelete('cascade');
                       
                       $table->integer('student_id')->unsigned();
                       $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
                       $table->string('attendance');
                       
                       
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
		Schema::drop('attendances');
	}

}
