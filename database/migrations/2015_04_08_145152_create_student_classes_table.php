<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentClassesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('student_classes', function(Blueprint $table)
		{
			$table->increments('id');
					   $table->integer('module_id')->unsigned();
					   $table->foreign('module_id')->references('id')->on('modules');
					   $table->date('attendance_date'); 
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
		Schema::drop('student_classes');
	}

}
