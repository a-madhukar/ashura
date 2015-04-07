<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lecturers', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->integer('course_id')->unsigned();
                        $table->foreign('course_id')
                                ->references('id')
                                ->on('courses')
                                ->onDelete('cascade'); 
                        $table->string('firstname');
                        $table->string('lastname');
                        $table->string('passport'); 
                        $table->string('addressline1');
                        $table->string('addressline2');
                        $table->string('city');
                        $table->string('state'); 
                        $table->string('country');
                        $table->string('postcode');
                        $table->string('email');
                      
                        
                        
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
		Schema::drop('lecturers');
	}

}
