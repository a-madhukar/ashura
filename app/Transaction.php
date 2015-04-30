<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {

	//
	
	protected $fillable=[
		'student_id',
		'purpose',
		'amount',
		'cardholdername',
		'cardno',
		'cv',
		'expirydate',
	
	];
	
	public function students()
	{
		return $this->belongsTo('App\Student','student_id');
	}

}
