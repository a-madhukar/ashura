<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

	//
    protected $fillable=[
        'faculty_id',
        'course_type_id',
        'course_name'
    ];
    
    public function faculties()
    {
        return $this->belongsTo('App\Faculty','faculty_id'); 
    }
    
    public function coursetypes()
    {
        return $this->belongsTo('App\CourseType','course_type_id'); 
    }
        
    public function modules()
    {
        return $this->hasMany('App\Module'); 
    }
    
    public function lecturers()
    {
        return $this->hasMany('App\Lecturer'); 
    }
    
    public function students()
    {
        return $this->hasMany('App\Student'); 
    }

}
