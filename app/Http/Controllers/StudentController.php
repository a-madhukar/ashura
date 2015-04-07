<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
    use Auth;
    use App\User;
    use App\Student;
use App\Attendance;

class StudentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        if(Auth::check())
        {
             return view('student.studenthome');
        }
        
        return redirect('/');
	}
    
    public function viewAttendance()
    {
        $id = Auth::id();
        
        $user = User::find($id);
        
        $student = Student::where('email',$user->email)->get()->toArray();
        
        dd($student[0]['']);
        
        if(Auth::check())
        {
           $attendance = Attendance::where('student_id',$id);
            
            dd($attendance->get()->toArray());
            
            
            //dd($id)
            
          //  return "Auth success";
        }
        
        //return redirect('/');
    }

	

}
