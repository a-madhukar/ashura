<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Auth; 
use Request; 
use App\Faculty; 
use App\CourseType;
use App\Course;
use App\Module; 
use App\User; 
use App\Lecturer; 
use App\Student;
use Mail;
	use DB;
	use Session;
	use App\StudentClass;
	


class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
            $faculties = Faculty::all(); 
            
            //dd($faculties); 
            
           return view('admin.adminhome',compact('faculties')); 
	}
        
        //returns a list of courses
        //related to the faculty
        public function adminFacultyHome($id)
        {
            $faculty = Faculty::find($id);
            $courses = $faculty->courses; 
            
            return view('admin.adminFacultyHome',compact('courses'));  
            
        }

        
        /*
         * Returns the add faculty form 
         */
        public function addFacultyForm()
        {
            if (Auth::check()) {
                return view('admin.addfaculty'); 
            }else
            {
               return redirect('/');  
            }
        }
        
        /*
         * Adds new faculty
         */
        public function addFaculty()
        {
            if (Auth::check()) {
                
               Faculty::create(Request::all()); 
               
               return redirect('/admin/home'); 
               
            }else 
            {
                return redirect('/');
            }
        }
	
	/*
	 * get the edit faculty
	 */
	public function editFaculty($id)
	{
		if(Auth::check())
		{
			$faculty = Faculty::findOrFail($id);
			return view('admin.updateFacultyForm',compact('faculty'));
		}
		return redirect('/');
		
	}
	
	/*
	 * save the edited faculty
	 */
	public function updateFaculty($id, Request $request)
	{
		if(Auth::check())
		{
			$faculty = Faculty::findOrFail($id);
			
			$faculty->update($request::all());
			
			return redirect('admin/faculty/view');
		}
		
		return redirect('/');
	}
	
	/*
	 * delete faculty
	 */
	public function deleteFaculty($id)
	{
		
		//dd($id);
		if(Auth::check())
		{
			$faculty = Faculty::findOrFail($id);
			$faculty->delete();
			return redirect('admin/faculty/view');
		}
		return redirect('/');
	}
	
	/*
	 * View Faculties
	 */
	public function viewFaculty()
	{
		if(Auth::check())
		{
		   $faculties = Faculty::all();
		   
		   return view('admin.viewFaculty',compact('faculties'));
		}
		   return redirect('/');
	}
                
        
        /*
         * Returns add course form
         *  */
	public function addCourseForm()
        {
            if (Auth::check()) {
                
                $faculty = Faculty::lists('facultyname','id');
                
                $type=CourseType::lists('type','id'); 
                
                return view('admin.addCourse',compact('faculty','type')); 
            }else
                return redirect('/');
        }
        
        /* 
         * Adds new Course
         */
        public function addCourse()
        {
            if (Auth::check()) {
                //Course::create(Request::all()); 
                $input = Request::all(); 
                
                Course::create($input); 
                
                return redirect('admin/course/view'); 
            }else
                return redirect('/'); 
        }
	
	/*
	 * gets the edit Course
	 */
	public function editCourse($id)
	{
		if(Auth::check())
		{
			$course= Course::findOrFail($id);
			
			$faculty = Faculty::lists('facultyname','id');
			
			$type = CourseType::lists('type','id');
			
			return view('admin.editCourse',compact('course','faculty','type'));
		}
		
		return redirect('/');
	}
	
	
	/*
	 * saves the edited Course
	 */
	public function updateCourse($id, Request $request)
	{
		if(Auth::check())
		{
			$course=Course::findOrFail($id);
			
			$course->update($request::all());
			
			return redirect('admin/course/view');
		}
		return redirect('/');
	}
	
	public function delCourse($id)
	{
		if(Auth::check())
		{
			$course = Course::findOrFail($id);
			$course->delete();
			return redirect('admin/course/view');
		}
		return redirect('/');
	}
	
	
	/*
	 * view all courses
	 */
	public function viewCourses()
	{
		if(Auth::check())
		{
			$courses= DB::table('courses')
			->join('faculties','courses.faculty_id','=','faculties.id')
			->join('course_types','courses.course_type_id','=','course_types.id')
			->select('courses.id','faculties.facultyname','course_types.type','courses.course_name')
			->get();
			
			//dd($courses);
			
			return view('admin.viewCourse',compact('courses'));
		}
		
		return redirect('/');
	}
	
        
        /*
         * Returns add Module Form
         */
        public function addModuleForm()
        {
            if (Auth::check()) {
                $courses = Course::lists('course_name','id'); 
                return view('admin.addModule',compact('courses')); 
            }else
            {
                return redirect('/');
            }
        }
        
        /*
         * adds new module
         */
        public function addModule()
        {
            if (Auth::check()) {
                $input = Request::all(); 
                
                Module::create($input);
                
                return redirect('admin/module/view');
                
            }else 
            {
                return redirect('/'); 
            }
        }
	
		/*
		 * search module
		 */
		public function viewModules()
		{
			if(Auth::check())
			{
				$modules = DB::table('modules')
				->join('courses','modules.course_id','=','courses.id')
				->select('modules.id','modules.module_name','courses.course_name')
				->get();
				
				//dd($modules);
				
				return view('admin.viewModules',compact('modules'));
			}
			
			return redirect('/');
		}
	
	
		/*
		 * edit the module
		 */
		public function editModule($id)
		{
			if(Auth::check())
			{
				$modules = Module::findOrFail($id);
				
				$courses = Course::lists('course_name','id');
				
				return view('admin.editModule',compact('courses','modules'));
			}
			
			return redirect('/');
		}
	
	/*
	 * update new module
	 */
	public function updateModule($id, Request $request)
	{
		if(Auth::check())
		{
			$module= Module::findOrFail($id);
			
			$module->update($request::all());
			
			return redirect('admin/module/view');
		}
		
		return redirect('/');
	}
	
	
		/*
		 * deletes the module
		 */
		public function deleteModule($id)
		{
			if(Auth::check())
			{
				$module = Module::findOrFail($id);
				$module->delete();
				
				return redirect('admin/module/view');
			}
			
			return redirect('/');
		}
	
	
        /*
         * 
         * Returns the lecturer Form
         */
        public function addLecturerForm()
        {
            if (Auth::check()) {
                $courses = Course::lists('course_name','id'); 
                return view('admin.addLecturer',compact('courses')); 
            }
            
            return redirect('/'); 
        }
	
		/*
		 * view all the lecturers
		 */
		public function viewLecturers()
		{
			if(Auth::check())
			{
				$lecturers=DB::table('lecturers')
				->join('courses','lecturers.course_id','=','courses.id')
				->select('lecturers.id','courses.course_name','lecturers.firstname','lecturers.lastname','lecturers.passport','lecturers.addressline1','lecturers.addressline2','lecturers.city','lecturers.state','lecturers.country','lecturers.postcode','lecturers.email')
				->get();
				
				//dd($lectures);
				
				return view('admin.viewLectures',compact('lecturers'));
			}
			
			return redirect('/');
		}
	
		/*
		 * edit lecturer
		 */
		public function editLecturer($id)
		{
			if(Auth::check())
			{
				$lecturer= Lecturer::findOrFail($id);
				
				$courses=Course::lists('course_name','id');
				
				return view('admin.editLecturer',compact('lecturer','courses'));
			}
			
			return redirect('/');
		}
	
		/*
		 * update lecturer
		 */
		public function updateLecturer($id, Request $request)
		{
			if(Auth::check())
			{
				$lecturer = Lecturer::findOrFail($id);
				$lecturer->update($request::all());
				
				return redirect('admin/lecturer/view');
			}
			
			return redirect('/');
		}
	
	
		/*
		 * delete the lecturer
		 */
		public function deleteLecturer($id)
		{
			if(Auth::check())
			{
				$lecturer = Lecturer::findOrFail($id);
				$lecturer->delete();
				
				return redirect('admin/lecturer/view');
			}
			return redirect('/');
		}
	
        /*
         * 
         * Creates a new lecturer
         */
        public function addUser($user_roles)
        {
            if (Auth::check()) {
                $input= Request::all(); 
                //$password = $this->password();
                
               if ($user_roles=='lecturer') {
                   
                   Lecturer::create($input); 
                   $this->newUser(2, $input['firstname'], $input['email']);
                 // $this->sendEmail(2, $input['firstname'], $input['email'], $password);
                   return redirect('admin/home'); 
                 
               }elseif($user_roles=='student')
               {
                   Student::create($input);
                   $this->newUser(3, $input['firstname'], $input['email']);
                  // $this->sendEmail(3, $input['firstname'], $input['email'], $password);
                   return redirect('admin/home'); 
               }
               
                return $input; 
            }
            
            return redirect('/'); 
        }
        
        /*
         * register a user
         */
        public function newUser($user_roles_id,$name,$email)
        {
                $users = new User; 
                 $users->name=$name;
                $users->user_roles_id=$user_roles_id; 
                $users->email=$email;
                $users->password=bcrypt($name); 
                $users->save(); 
        }
        
        /*
         * create a random password
         */
        public function password()
        {
             $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
             $pass = array(); //remember to declare $pass as an array
             $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
             for ($i = 0; $i < 8; $i++) {
                  $n = rand(0, $alphaLength);
                  $pass[] = $alphabet[$n];
             }
             return implode($pass); 
        }
        
        /*
         * send email
         */
        public function sendEmail($user_roles,$name,$email,$password)
        {
            
            Mail::send('emails.welcome',[
                'user_roles'=>$user_roles,
                'name'=>$name,
                'email'=>$email,
                'password'=>$password
                    ],
                    function($message)
                    {
                        $message->to('a.madhukar@yahoo.com')
                                ->from('amadhukar1@gmail.com')
                                ->subject('Welcome!'); 
                    });
                   
        }
        
        /*
         * 
         * Returns the add student form
         */
        public function addStudentForm()
        {
            if (Auth::check()) {
                 $courses = Course::lists('course_name','id'); 
                return view('admin.addStudentForm',compact('courses')); 
            }
            
            return redirect('/'); 
        }
	
		/*
		 * view students
		 */
		public function viewStudents()
		{
			if(Auth::check())
			{
				$students=DB::table('students')
				->join('courses','students.course_id','=','courses.id')
				->select('students.id','courses.course_name','students.firstname','students.lastname','students.passport','students.addressline1','students.addressline2','students.city','students.state','students.country','students.postcode','students.email')
				->get();
				
				return view('admin.viewStudents',compact('students'));
				
			}
			
			return redirect('/');
		}
	
	
		/*
		 * edit student
		 */
		public function editStudent($id)
		{
			if(Auth::check())
			{
				$student= Student::findOrFail($id);
				
				$courses = Course::lists('course_name','id');
				
				return view('admin.editStudent',compact('student','courses'));
			}
			
			return redirect('/');
		}

        /*
		 * update student
		 */
		public function updateStudent($id, Request $request)
		{
			if(Auth::check())
			{
				$student = Student::findOrFail($id);
				$student->update($request::all());
				return redirect('admin/student/view');
			}
			
			return redirect('/');
		}
       
        /*
		 * delete student
		 */
		public function deleteStudent($id)
		{
			if(Auth::check())
			{
				$student = Student::findOrFail($id);
				$student->delete();
				return redirect('admin/student/view');
			}
			
			return redirect('admin/student/view');
		}
	
		/*
		 * select Student
		 */
		public function selectStudent()
		{
			if(Auth::check())
			{
				$students = Student::lists('firstname','id');
				
				
				
				return view('admin.selectStudent',compact('students'));
			}
			
			return redirect('/');
		}
	
		public function getStudentId()
		{
			if(Auth::check())
			{
				$input = Request::all();
				$student = Student::findOrFail($input['student_id']);
				
				Session::put('docket.student',$student->id);
				
				return redirect('admin/docket/selectmodule');
			}
			
			return redirect('/');
		}
	
		public function selectModule()
		{
			if(Auth::check())
			{
				$StudentId = Session::get('docket.student');
				
				$student= Student::findOrFail($StudentId);
				
				$course = Course::findOrFail($student->course_id);
				
				$modules = Module::lists('module_name','id');
				
				return view('admin.selectModule',compact('modules','student'));
			}
			
			return redirect('/');
		}
	
		public function getModule()
		{
			if(Auth::check())
			{
				$input = Request::all();
				
				//dd($input);
				
				Session::put('docket.module',$input['module_id']);
				
				return redirect('admin/docket/generation');
			}
			
			return redirect('/');
			
		}
	
		public function docket()
		{
			if(Auth::check())
			{
				$StudentId = Session::get('docket.student');
				$ModuleId = Session::get('docket.module');
				
				//dd($ModuleId);
				
				$attendance = $this->calculateAttendance($ModuleId, $StudentId);
				
				//dd($attendance);
				
				if($attendance>=80)
				{
					$docket = $this->generateDocket();
					
					//dd($docket);
					return view('admin.docket',compact('docket'));
					
				}else
				{
					return view('admin.docket');
				}
				
			}
			
			return redirect('/');
		}
	
		public function generateDocket()
		{
			$alphabet = "0123456789";
			$pass = array(); //remember to declare $pass as an array
			$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
			for ($i = 0; $i < 8; $i++) {
				$n = rand(0, $alphaLength);
				$pass[] = $alphabet[$n];
			}
			return implode($pass);
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


