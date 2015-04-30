<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Session; 
use App\Course; 
use App\Module; 
use Auth;
use App\Attendance;
	use App\StudentClass;
	use App\Student;
	use DB;

class LecturerController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            if(Auth::check())
            {
                return view('lecturer.lecturerhome');
            }
	
            return redirect('/'); 
             
	}

        public function selectCourse()
        {
            if(Auth::check())
            {
               $courses = Course::lists('course_name','id');
        
                return view('lecturer.selectCourse',compact('courses')); 
            }
            return redirect('/'); 
            
        }
        
        public function saveCourseID()
        {
            if(Auth::check())
            {
                 $course_id = Request::all(); 
            
                Session::put('course_id',$course_id['course_id']);
            
                return redirect('lecturer/attendance/module'); 
            }
            
            return redirect('/');       
        }
        
        public function selectModule()
        {
            if (Auth::check()) {
                 $course_id = Session::get('course_id'); 
           
                 $course = Course::find($course_id);
            
                 $modules = $course->modules->toArray(); 
            
                 $_modules= $this->getValueFromArray($modules);
           
                //dd($_modules); 
                 return view('lecturer.selectModule',compact('_modules'));  
      
            }
            
            return redirect('/'); 
        }
        
        public function getValueFromArray($modules)
        {
            $_modules = array(); 
            foreach($modules as $module)
            {
                $_modules= array_add($_modules, $module['id'], $module['module_name']); 
            }
            return $_modules; 
        }
        
        public function saveModuleID()
        {
            if(Auth::check())
            {
                $modules = Request::all(); 
                Session::put('module_id',$modules['module_id']);  
            
                return redirect('lecturer/attendance/mark'); 
            }
            
            return redirect('/'); 
        }
	
        
        public function markAttendance()
        {
            if (Auth::check()) {
                $course_id = Session::get('course_id');
                
               $course = Course::find($course_id);
                
               $students= $course->students->toArray();
				
				//dd($students);
               
               return view('lecturer.markAttendance',compact('students')); 
            }
            
            return redirect('/'); 
        }
        
        public function confirmAttendance()
        {
            if(Auth::check())
            {
                $course_id = Session::get('course_id');
                
                $students = Course::find($course_id)->students->toArray();
                
                $module_id = Session::get('module_id');
                
                $input = Request::all();
                
				$studentclass=StudentClass::create(['module_id'=>$module_id,'attendance_date'=>$input['attendance_date']]);
				
				//dd($studentclass->id);
				
                for($i=0;$i<sizeof($students);$i++)
                {
                  
                   Attendance::create(['class_id'=>$studentclass->id,'student_id'=>$students[$i]['id'],'attendance'=>$input['attendance'][$i]
                                      ]);
                }
				
				return redirect('lecturer/home');
                
               // dd($input['present'][0]);
            }
            
            return redirect('/');
            
            
        }
	
		public function course_attendance()
		{
			if(Auth::check())
			{
				$course= Course::lists('course_name','id');
				
				return view('lecturer.courseAttendance',compact('course'));
			}
			
			return redirect('/');
		}
	
	
		public function selectCourse_Attendance()
		{
			if(Auth::check())
			{
				$input = Request::all();
				//dd($input['course_id']);
				return redirect('lecturer/attendance/selectmodule/'.$input['course_id']);

			}
			
		}
	
		public function module_Attendance($id)
		{
			if(Auth::check())
			{
				$course= Course::findOrFail($id);
				
				$modules = $course->modules->toArray();
				
				$_modules= $this->getValueFromArray($modules);
				
				//dd($_modules);
				
				return view('lecturer.module_Attendance',compact('_modules'));
			}
			
			return redirect('/');
		}
	
		public function selectModule_Attendance()
		{
			if(Auth::check())
			{
				$input = Request::all();
				
				//dd($input['module_id']);
				
				return redirect('lecturer/attendance/view/'.$input['module_id']);
			}
			
			return redirect('/');
		}
	
	
		public function viewAttendance($id)
		{
			if(Auth::check())
			{
				$module = Module::findOrFail($id);
				//dd($module->id);
				$course = Course::findOrFail($module->course_id);
				
				$students = $course->students;
				
				//dd($students[0]->id);
				
				$attendanceList = $this->getAttendanceList($module->id, $students);
				
				//dd($attendanceList[5]);
				
				return view('lecturer.viewAttendance',compact('students','attendanceList'));
			}
			
			return redirect('/');
		}
	
		public function getAttendanceList($moduleid, $students)
		{
			$attendanceList = [];
			
			foreach($students as $student)
			{
				$attendance = $this->calculateAttendance($moduleid, $student->id);
				$attendanceList = array_add($attendanceList, $student->id, $attendance);
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
