<?php
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use App\Notifications\TestNotify;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'admin'], function () {
    Route::resource('/admin', 'DashboardController');
    Route::get('/reciept/{id}', 'RecieptController@show');
    Route::resource('/course', 'CoursesController');
    Route::get('/sendNotification', 'EnrollmentContoller@sendNotification');
    Route::resource('/enroll', 'EnrollmentContoller');
    Route::get('/students/downloadExcel', 'StudentsController@export');
    Route::resource('/students', 'StudentsController');
    Route::get('/dues', 'FeeManagerController@checkdues' );
    Route::resource('/feemanager', 'FeeManagerController');
    Route::get('/enquiry/downloadExcel', 'EnquiriesController@export');
    Route::resource('/enquiry', 'EnquiriesController');
    Route::get('profile/search', 'SearchStudentController@search');
    Route::resource('/profile', 'SearchStudentController');
    Route::get('/searchenquiry/search', 'SearchEnquiryController@search');
    Route::resource('/searchenquiry', 'SearchEnquiryController');
    Route::resource('/inventory', 'InventoryController');
    Route::resource('/docs', 'DocsController');
    Route::resource('/bulk_sms', 'BulkSmsController');
});

