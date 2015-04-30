<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
	use Auth;
	use App\Module;

class ParentController extends Controller {

	//
	
	public function index()
	{
		if(Auth::check())
		{
			return view('parent.parentHome');
		}
		return redirect('/');
	}
	
	public function viewAttendance()
	{
		if(Auth::check())
		{
			$modules = Module::lists('module_name');
			
			
			return view('parent.parentsViewAttendance',compact('modules'));
		}
		
		return redirect('/');

	}

}
