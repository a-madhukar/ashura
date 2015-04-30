<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model {

	//
	protected $fillable=[
		'module_id',
		'attendance_date'
	];
	
	public function attendances()
	{
		return $this->hasMany('App\Attendance','class_id'); 
	}

}
