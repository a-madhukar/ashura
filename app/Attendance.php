<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model {

	//
    
    protected $fillable = [
		'class_id',
        'student_id',
        'attendance'
    ];
	
	public function studentclasses()
	{
		return $this->belongsTo('App\StudentClass','class_id'); 
	}
    
    

}
