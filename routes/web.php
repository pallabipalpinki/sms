<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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
Route::get('/home', [App\Http\Controllers\StudentController::class, 'index'])->name('home');

Route::prefix('student')->name('student.')->group(function () {
    Route::middleware(['guest:student', 'PreventBackHistory'])->group(function(){
        Route::view('/login','student.login')->name('login');
        Route::post('/check_login', ['uses'=>'App\Http\Controllers\StudentController@check_login'])->name('check_login');
        Route::view('/register','student.register')->name('register');
        Route::post('/store', ['uses'=>'App\Http\Controllers\StudentController@store'])->name('store');
       });
 
    Route::middleware(['auth:student','PreventBackHistory'])->group(function(){
        Route::get('/dashboard', ['uses'=>'App\Http\Controllers\StudentController@dashboard'])->name('dashboard');
        Route::get('/checkmyclass', ['uses'=>'App\Http\Controllers\StudentController@checkmyclass'])->name('checkmyclass');
        Route::get('/attendenceview', ['uses'=>'App\Http\Controllers\StudentController@attendenceview'])->name('attendenceview');
        Route::post('/saveattendence', ['uses'=>'App\Http\Controllers\StudentController@saveattendence'])->name('saveattendence');
        Route::get('/logout', ['uses'=>'App\Http\Controllers\StudentController@logout'])->name('logout');

    });
});
Route::prefix('teacher')->name('teacher.')->group(function () {
    Route::middleware(['guest:teacher', 'PreventBackHistory'])->group(function(){
        Route::view('/login','teacher.login')->name('login');
        Route::post('/check_login', ['uses'=>'App\Http\Controllers\TeacherController@check_login'])->name('check_login');
        Route::view('/register','teacher.register')->name('register');
        Route::post('/store', ['uses'=>'App\Http\Controllers\TeacherController@store'])->name('store');
       });
 
    Route::middleware(['auth:teacher','PreventBackHistory'])->group(function(){
        Route::get('/dashboard', ['uses'=>'App\Http\Controllers\TeacherController@dashboard'])->name('dashboard');
        Route::get('/classschedule', ['uses'=>'App\Http\Controllers\TeacherController@classschedule'])->name('classschedule');
        Route::get('/attendenceview', ['uses'=>'App\Http\Controllers\TeacherController@attendenceview'])->name('attendenceview');
        Route::post('/saveattendence', ['uses'=>'App\Http\Controllers\TeacherController@saveattendence'])->name('saveattendence');

        Route::get('/logout', ['uses'=>'App\Http\Controllers\TeacherController@logout'])->name('logout');

    });
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
        Route::view('/login','admin.login')->name('login');
        Route::post('/check_login', ['uses'=>'App\Http\Controllers\AdminController@check_login'])->name('check_login');

    });
    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::get('/dashboard', ['uses'=>'App\Http\Controllers\AdminController@dashboard'])->name('dashboard');
        Route::get('/studentlist', ['uses'=>'App\Http\Controllers\AdminController@studentlist'])->name('studentlist');

        //Route::get('/show/{id}', ['uses'=>'App\Http\Controllers\AdminController@show'])->name('studentlist');
        Route::get('/student-edit/{id}', ['uses'=>'App\Http\Controllers\AdminController@edit'])->name('student-edit');
        Route::post('/student-update/{id}', ['uses'=>'App\Http\Controllers\AdminController@update'])->name('student-update');
        Route::get('/student-delete/{id}', ['uses'=>'App\Http\Controllers\AdminController@destroy'])->name('student-delete');
        Route::get('/student-attendence/{id}', ['uses'=>'App\Http\Controllers\AdminController@studentattendencecount'])->name('student-attendence');
        Route::get('/teacherlist', ['uses'=>'App\Http\Controllers\AdminController@teacherlist'])->name('teacherlist');
        //Route::get('/show/{id}', ['uses'=>'App\Http\Controllers\AdminController@show'])->name('teacherlist');
        Route::get('/teacher-edit/{id}', ['uses'=>'App\Http\Controllers\AdminController@edit'])->name('teacher-edit');
        Route::post('/teacher-update/{id}', ['uses'=>'App\Http\Controllers\AdminController@update'])->name('teacher-update');
        Route::get('/teacher-delete/{id}', ['uses'=>'App\Http\Controllers\AdminController@destroy'])->name('teacher-delete');
        
        Route::get('/assignclassst', ['uses'=>'App\Http\Controllers\AdminController@assignclassst'])->name('assignclassst');
        Route::post('/addclass', ['uses'=>'App\Http\Controllers\AdminController@addclass'])->name('addclass');
        Route::get('/studentattendence', ['uses'=>'App\Http\Controllers\AdminController@studentattendence'])->name('studentattendence');
        Route::get('/teacherattendence', ['uses'=>'App\Http\Controllers\AdminController@teacherattendence'])->name('teacherattendence');




        Route::get('/logout', ['uses'=>'App\Http\Controllers\AdminController@logout'])->name('logout');

    });
});




// Route::get('/', [App\Http\Controllers\StudentController::class, 'index']);
// Route::get('/edit/{id}', [App\Http\Controllers\StudentController::class, 'edit']);
// Route::get('/show/{id}', [App\Http\Controllers\StudentController::class, 'show']);
// Route::get('/create', [App\Http\Controllers\StudentController::class, 'create']);
// Route::post('/store', [App\Http\Controllers\StudentController::class, 'store']);
// Route::post('/update/{id}', [App\Http\Controllers\StudentController::class, 'update']);
// Route::get('/delete/{id}', [App\Http\Controllers\StudentController::class, 'destroy']);
// "Database\\Factories\\": "database/factories/",
            // "Database\\Seeders\\": "database/seeders/"