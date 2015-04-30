<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
    use Auth;
    use App\User;
    use App\Student;
use App\Attendance;
	use DB;
	use App\Module;
	use App\Transaction;
	use App\Course;
	use App\StudentClass;

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
    
  /*  public function viewAttendance()
    {
		if(Auth::check())
	   {
		   $modules = Module::lists('module_name');
		   
		   
		   return view('student.viewAttendance',compact('modules'));
	   }
		
		return redirect('/');
    }
   */
	
	public function addTransaction()
	{
		if(Auth::check())
		{
			return view('student.addTransaction');
		}
		
		return redirect('/');
		
		
	}
	
	public function saveTransaction()
	{
		if(Auth::check())
		{
			$student = Student::where('email',Auth::user()->email)->get()->toArray();
			
			$student_id=$student[0]['id'];
			
			$input = Request::all();
			
			//dd($input['purpose']);
			
			Transaction::create(['student_id'=>$student_id,'purpose'=>$input['purpose'],'amount'=>$input['amount'],'cardholdername'=>$input['cardholdername'],'cardno'=>$input['cardno'],'cv'=>$input['cv'],'expirydate'=>$input['expirydate']]);
			
			return redirect('student/home');
		}
		return redirect('/');
	}
	
	public function viewTransaction()
	{
		if(Auth::check())
		{
			$student= Student::where('email',Auth::user()->email)->get()->toArray();
			
			$student_id=$student[0]['id'];
			
			$transactions= Transaction::where('student_id',$student_id)->get()->toArray();
			
			//dd($transaction);
			
			return view('student.viewTransaction',compact('transactions'));
		}
		return redirect('/');
	}
	
	public function viewAttendance()
	{
		if(Auth::check())
		{
			$email = Auth::user()->email;
			
			$student = Student::where('email',$email)->get()->toArray();
			
			$course=Course::findOrFail($student[0]['course_id']);
			
			$modules=$course->modules->toArray();
			
			//dd($modules);
			
			$attendanceList=$this->getAttendanceList($modules,$student[0]['id']);
			
			//dd($attendanceList);
			
			return view('student.viewAttendance',compact('modules','attendanceList'));
		}
		
		return redirect('/');
	}
	
	public function getAttendanceList($modules, $studentid)
	{
		$attendanceList = [];
		
		foreach($modules as $module)
		{
			$attendance = $this->calculateAttendance($module['id'], $studentid);
			$attendanceList = array_add($attendanceList, $module['id'], $attendance);
		}
		
		return $attendanceList;
	}
	
	
	public function calculateAttendance($moduleid, $studentid)
	{
		$studentclass=StudentClass::where('module_id',$moduleid)->get()->toArray();
		
		//dd($studentclass[0]);
		
		$present = DB::table('attendances')
		->join('student_classes','attendances.class_id','=','student_classes.id')
		->where('student_classes.module_id','=',$moduleid)
		->where('attendances.student_id','=',$studentid)
		->where('attendances.attendance','=','true')
		->count();
		
		//dd($test);
		$totalClasses = StudentClass::where('module_id',$moduleid)->count();
		
		if($totalClasses>0)
		{
			$attendance=$present/$totalClasses*100;
			
			return $attendance;
		}
		
		return 0;
		
	}

	

}
