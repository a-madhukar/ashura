<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model {

	//
    
    protected $fillable = [
        'module_id',
        'student_id',
        'attendance_date',
        'attendance'
    ];
    
    

}
