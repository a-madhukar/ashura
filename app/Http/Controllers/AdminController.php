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
                
                return redirect('admin/home'); 
            }else
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
                
                return redirect('admin/home'); 
                
            }else 
            {
                return redirect('/'); 
            }
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

        
       
        
        
       
}


