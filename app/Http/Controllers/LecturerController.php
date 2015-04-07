<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Session; 
use App\Course; 
use App\Module; 
use Auth;
use App\Attendance;

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
                
                //dd($input['attendance_date']);
                
               // dd($input['attendance'][0]);
                
                for($i=0;$i<sizeof($students);$i++)
                {
                  
                   Attendance::create(['module_id'=>$module_id,'student_id'=>$students[$i]['id'], 'attendance_date'=>$input['attendance_date'],'attendance'=>$input['attendance'][$i]
                                      ]);
                }
                
               // dd($input['present'][0]);
            }
            
            return redirect('/');
            
            
        }
	

}
