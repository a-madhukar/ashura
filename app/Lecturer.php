<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model {

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

}
