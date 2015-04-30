<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

//Route::get('home', 'HomeController@index');

Route::get('admin/home','AdminController@index');
	
	
//CRUD Faculty
Route::get('admin/home/faculty/{id}','AdminController@adminFacultyHome'); 
Route::get('admin/faculty/add','AdminController@addFacultyForm');
Route::get('admin/faculty/view','AdminController@viewFaculty');
	Route::get('admin/faculty/edit/{id}','AdminController@editFaculty');
	Route::patch('admin/faculty/{id}','AdminController@updateFaculty');
	Route::get('admin/faculty/delete/{id}','AdminController@deleteFaculty');
	
	
//CRUD Courses
Route::get('admin/course/add','AdminController@addCourseForm'); 
Route::get('admin/course/view','AdminController@viewCourses');
	Route::get('admin/course/edit/{id}','AdminController@editCourse');
	Route::patch('amdin/course/{id}','AdminController@updateCourse');
	Route::get('admin/course/delete/{id}','AdminController@delCourse');
	
	
//CRUD modules
Route::get('admin/module/add','AdminController@addModuleForm'); 
Route::get('admin/module/view','AdminController@viewModules');
	Route::get('admin/module/edit/{id}','AdminController@editModule');
	Route::patch('admin/module/{id}','AdminController@updateModule');
	Route::get('admin/module/delete/{id}','AdminController@deleteModule');

	
//CRUD Lecturer
Route::get('admin/lecturer/add','AdminController@addLecturerForm');
Route::get('admin/lecturer/view','AdminController@viewLecturers');
	Route::get('admin/lecturer/edit/{id}','AdminController@editLecturer');
	Route::patch('admin/lecturer/{id}','AdminController@updateLecturer');
	Route::get('admin/lecturer/delete/{id}','AdminController@deleteLecturer');

	
//CRUD Students
Route::get('admin/student/add','AdminController@addStudentForm');
Route::get('admin/student/view','AdminController@viewStudents');
	Route::get('admin/student/edit/{id}','AdminController@editStudent');
	Route::patch('admin/student/{id}','AdminController@updateStudent');
	Route::get('admin/student/delete/{id}','AdminController@deleteStudent');

	
	//Generate Docket
	Route::get('admin/docket/selects','AdminController@selectStudent');
	Route::post('admin/docket/selects','AdminController@getStudentId');
	Route::get('admin/docket/selectmodule','AdminController@selectModule');
	Route::post('admin/docket/selectmodule','AdminController@getModule');
	Route::get('admin/docket/generation','AdminController@docket');
	

Route::get('lecturer/home','LecturerController@index');
Route::get('student/home','StudentController@index');

//Route::get('/test/{lecturer}','AdminController@test');


Route::post('admin/faculty/add','AdminController@addFaculty'); 
Route::post('admin/course/add','AdminController@addCourse'); 
Route::post('admin/module/add','AdminController@addModule'); 
Route::post('admin/adduser/{user_role}','AdminController@addUser');
Route::post('admin/student/add','AdminController@addStudent ');


Route::get('lecturer/home','LecturerController@index');
Route::get('lecturer/attendance/course','LecturerController@selectCourse');
Route::post('lecturer/attendance/course','LecturerController@saveCourseID');
Route::get('lecturer/attendance/module','LecturerController@selectModule'); 
Route::post('lecturer/attendance/module','LecturerController@saveModuleID'); 

Route::get('lecturer/attendance/mark','LecturerController@markAttendance');
Route::post('lecturer/attendance/mark','LecturerController@confirmAttendance');
	
	//total classes, etc
	Route::get('lecturer/attendance/selectcourse','LecturerController@course_attendance');
	Route::post('lecturer/attendance/selectcourse','LecturerController@selectCourse_Attendance');
	Route::get('lecturer/attendance/selectmodule/{id}','LecturerController@module_attendance');
	Route::post('lecturer/attendance/selectmodule/{id}','LecturerController@selectModule_Attendance');
	Route::get('lecturer/attendance/view/{id}','LecturerController@viewAttendance');
	
    
Route::get('student/attendance/view','StudentController@viewAttendance');
	
	Route::get('student/transaction/add','StudentController@addTransaction');
	Route::get('student/transaction/view','StudentController@viewTransaction');
	Route::post('student/transaction/add','StudentController@saveTransaction');
	
	
	Route::get('parent/home','ParentController@index');
	Route::get('parent/attendance/view','ParentController@viewAttendance'); 
	
Route::post('auth/login','HomeController@login'); 

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
