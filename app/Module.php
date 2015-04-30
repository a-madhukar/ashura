<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model {

	//
    protected $fillable=[
        'course_id',
        'module_name'
    ];
    
    public function courses()
    {
        return $this->belongsTo('App\Course','course_id'); 
    }
    
    public function students()
    {
        return $this->hasMany('App\Student','student_id'); 
    }
	
	public function studentclasses()
	{
		return $this->hasMany('App\StudentClass','module_id'); 
	}

}
