<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

	//
     
    protected $fillable=[
        'course_id',
        'firstname',
        'lastname',
        'passport',
        'addressline1',
        'addressline2',
        'city',
        'state',
        'country',
        'postcode',
        'email'
        
    ];
    
    
    public function courses()
    {
        return $this->belongsTo('App\Course','course_id'); 
    }
    
    public function modules()
    {
        return $this->belongsToMany('App\Module','module_id');
    }

}
