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

Route::get('admin/home/faculty/{id}','AdminController@adminFacultyHome'); 
Route::get('admin/faculty/add','AdminController@addFacultyForm');
Route::get('admin/faculty/view','AdminController@viewFaculty'); 

Route::get('admin/course/add','AdminController@addCourseForm'); 
Route::get('admin/course/view','AdminController@viewCourse'); 

Route::get('admin/module/add','AdminController@addModuleForm'); 
Route::get('admin/module/search','AdminController@searchModules'); 

Route::get('admin/lecturer/add','AdminController@addLecturerForm');
Route::get('admin/lecturer/search','AdminController@searchLecturer'); 

Route::get('admin/student/add','AdminController@addStudentForm');
Route::get('admin/student/search','AdminController@searchStudent'); 

Route::get('lecturer/home','LecturerController@index');
Route::get('student/home','StudentController@index');

//Route::get('/test/{lecturer}','AdminController@test');


Route::post('admin/faculty/add','AdminController@addFaculty'); 
Route::post('admin/course/add','AdminController@addCourse'); 
Route::post('admin/module/add','AdminController@addModule'); 
Route::post('admin/adduser/{user_role}','AdminController@addUser');
//Route::post('admin/student/add','AdminController@addStudent '); 


Route::get('lecturer/home','LecturerController@index');
Route::get('lecturer/attendance/course','LecturerController@selectCourse');
Route::post('lecturer/attendance/course','LecturerController@saveCourseID');
Route::get('lecturer/attendance/module','LecturerController@selectModule'); 
Route::post('lecturer/attendance/module','LecturerController@saveModuleID'); 

Route::get('lecturer/attendance/mark','LecturerController@markAttendance'); 
Route::post('lecturer/attendance/mark','LecturerController@confirmAttendance');
    
Route::get('student/attendance/view','StudentController@viewAttendance');
    
    
Route::post('auth/login','HomeController@login'); 

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
