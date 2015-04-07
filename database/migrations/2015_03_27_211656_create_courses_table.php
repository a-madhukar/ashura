<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function(Blueprint $table)
		{
			$table->increments('id');
                        
                        $table->integer('faculty_id')->unsigned();
                        $table->foreign('faculty_id')
                                ->references('id')
                                ->on('faculties')
                                ->onDelete('cascade');
                        
                        $table->integer('course_type_id')->unsigned(); 
                        $table->foreign('course_type_id')->references('id')->on('course_types');
                        
                       // $table->string('course_type'); 
                        $table->string('course_name'); 
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
		Schema::drop('courses');
	}

}
