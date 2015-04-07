<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\User; 
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request; 
use Auth;
use Hash; 
use Redirect;

class HomeController extends Controller {

	//
    public function index()
    {
		//
                if (Auth::check()) {
                    Auth::logout(); 
                }
        
        return view('auth.login'); 
    }
    
    public function login()
    {
        $input = Request::all(); 
       
        
      if(Auth::attempt(array('email'=>$input['email'],
          'password'=>$input['password'])))
       {
          //return "true";  
          $user = User::where('email',$input['email'])->first();
         
          if ($user['user_roles_id']==='1') {
              //return view('admin.adminhome'); 
              return redirect('admin/home'); 
          }elseif($user['user_roles_id']==='2')
          {
              return redirect('lecturer/home'); 
              
          }elseif($user['user_roles_id']==='3') 
          {
              return redirect('student/home'); 
          }
         
       }else
       {
           return "false";
       }
        
        //return $query;
    }

}
