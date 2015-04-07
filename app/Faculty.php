<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model {

	//
    protected $fillable = [
        'facultyname',
        'facultyhead'];
    
    public function courses()
    {
        return $this->hasMany('App\Course'); 
    }

}
