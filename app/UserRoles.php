<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model {

	//

    protected $fillable=[
        'roles'
    ];
    
    
    public function user()
    {
        return $this->hasMany('App\User'); 
    }
}
