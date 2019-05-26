<?php
/**
 * Created by PhpStorm.
 * User: Stas
 * Date: 30/03/19
 * Time: 12:14
 */

require_once __DIR__ . "/../../core/Route.php";



//directions
Route::add('', 'CommonController@home');
Route::add("home", 'CommonController@home');
Route::add('log-me', 'CommonController@logMe');
Route::add('reg-me', 'CommonController@regMe');
Route::add("personal-cabinet", 'CommonController@personalCabinet');

Route::add("show-all", 'StudentController@showAllEnrolled');
Route::add("reg-exam", 'StudentController@makeRegForExam');
Route::add("apply-admission", 'StudentController@makeApplyForAdmission');
Route::add("rate", 'AdminController@makeRate');


//actions
Route::addPost("submit-reg-exam/{exam}", 'StudentController@submitRegForExam');
Route::addPost("submit-apply-admission/{speciality}", 'StudentController@submitApplyForAdmission');
Route::addPost("put-rate-action/{student}/{exam}/{rate}", 'AdminController@submitRate');



//account
Route::addPost('login-action/{email}/{password}', 'AccountController@login');
Route::addPost('registration-action/{email}/{password}/{role}/{name}/{surname}','AccountController@register');
Route::add('logout', "AccountController@logout");



//errors
Route::add('403', "ErrorController@error403forbidden");
Route::add('404', "ErrorController@error404notfound");



//cms
//user-edit
Route::add("edit-users", 'CmsController@editUsers');
Route::addPost('submit-edit-user/{id}/{firstname}/{lastname}/{rating}/{email}/{password}/{role}', 'CmsController@submitEditUser');
Route::add("delete-user/{id}", 'CmsController@deleteUser');
//exam-edit
Route::add("edit-exams", 'CmsController@editExams');
Route::addPost('submit-edit-exam/{id_subject}/{name_subject}', 'CmsController@submitEditExam');
Route::add("delete-exam/{id}", 'CmsController@deleteExam');
//speciality-edit
Route::add("edit-specialities", 'CmsController@editSpecialities');
Route::addPost('submit-edit-speciality/{id_speciality}/{name_speciality}/{id_university}', 'CmsController@submitEditSpeciality');
Route::add("delete-speciality/{id}", 'CmsController@deleteSpeciality');