<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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

    Route::get('/invoice/downloadExcel', 'RecieptController@export');


    Route::resource('/invoice', 'RecieptController');

    Route::resource('/course', 'CoursesController');

    Route::get('/sendNotification', 'EnrollmentContoller@sendNotification');


    Route::resource('/enroll', 'EnrollmentContoller');

    Route::get('/students/downloadExcel', 'StudentsController@export');

    Route::get('/completed', 'StudentsController@markCompleted');


    Route::resource('/students', 'StudentsController');

    Route::get('/feemanager/downloadExcel', 'FeeManagerController@export');


    Route::get('/dues', 'FeeManagerController@checkdues');

    Route::get('/feemanager/search', 'FeeManagerController@search_date');

    Route::resource('/feemanager', 'FeeManagerController');

    Route::get('/enquiry/downloadExcel', 'EnquiriesController@export');

    Route::resource('/enquiry', 'EnquiriesController');

    Route::get('profile/search', 'SearchStudentController@search');

    Route::resource('/profile', 'SearchStudentController');

    Route::get('/searchenquiry/search', 'SearchEnquiryController@search');

    Route::resource('/searchenquiry', 'SearchEnquiryController');


    Route::resource('/inventory', 'InventoryController');


    Route::get('/docs/search', 'DocsController@search');


    Route::resource('/docs', 'DocsController');

    Route::resource('/bulk_sms', 'BulkSmsController');

    Route::resource('/books', 'BooksController');

    Route::resource('/generate', 'GenerateController');
});
