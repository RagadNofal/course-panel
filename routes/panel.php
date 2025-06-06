<?php

use App\Http\Controllers\Panel\AdminController;
use App\Http\Controllers\Panel\BlogController;
use App\Http\Controllers\Panel\CourseController;
use App\Http\Controllers\Panel\FaqController;
use App\Http\Controllers\Panel\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\StudentController;
use App\Http\Controllers\Panel\LectureController;
use App\Http\Controllers\Panel\StudentCourseController;

Route::group(
    [
        'prefix' => \Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
        'as' => 'panel.'
    ], function () {

    Route::group(['prefix' => 'panel'], function () {

        Route::get('login', 'Auth\LoginController@showLoginForm')->name('showLogin');
        Route::post('login', 'Auth\LoginController@login')->name('login');

        Route::group(['middleware' => 'auth:admin'], function () {
            Route::get('/', [HomeController::class, 'index'])->name('index');


            Route::group(['prefix' => 'admins' , 'as' => 'admins.'], function () {

                Route::get('/', [AdminController::class, 'index'])->name('index');
                Route::get('/datatable', [AdminController::class, 'datatable'])->name('datatable');


                Route::group(['prefix' => 'create'], function (){
                   Route::get('/',[AdminController::class , 'create'])->name('create');
                   Route::post('/',[AdminController::class , 'store'])->name('store');
                });

                Route::group(['prefix' => '{id}'], function (){
                   Route::get('/edit',[AdminController::class , 'edit'])->name('edit');
                   Route::put('/edit',[AdminController::class , 'update'])->name('update');
                   Route::delete('/',[AdminController::class , 'destroy'])->name('destroy');
                   Route::post('/operation',[AdminController::class , 'operation'])->name('operation');
                });

            });
            Route::group(['prefix' => 'blogs' , 'as' => 'blogs.'], function () {

                Route::get('/', [BlogController::class, 'index'])->name('index');
                Route::get('/datatable', [BlogController::class, 'datatable'])->name('datatable');


                Route::group(['prefix' => 'create'], function (){
                   Route::get('/',[BlogController::class , 'create'])->name('create');
                   Route::post('/',[BlogController::class , 'store'])->name('store');
                });

                Route::group(['prefix' => '{id}'], function (){
                   Route::get('/edit',[BlogController::class , 'edit'])->name('edit');
                   Route::put('/edit',[BlogController::class , 'update'])->name('update');
                   Route::delete('/',[BlogController::class , 'destroy'])->name('destroy');
                   Route::post('/operation',[BlogController::class , 'operation'])->name('operation');
                });

            });
            Route::group(['prefix' => 'faqs' , 'as' => 'faqs.'], function () {

                Route::get('/', [FaqController::class, 'index'])->name('index');
                Route::get('/datatable', [FaqController::class, 'datatable'])->name('datatable');


                Route::group(['prefix' => 'create'], function (){
                    Route::get('/',[FaqController::class , 'create'])->name('create');
                    Route::post('/',[FaqController::class , 'store'])->name('store');
                });

                Route::group(['prefix' => '{id}'], function (){
                    Route::get('/edit',[FaqController::class , 'edit'])->name('edit');
                    Route::put('/edit',[FaqController::class , 'update'])->name('update');
                    Route::delete('/',[FaqController::class , 'destroy'])->name('destroy');
                    Route::post('/operation',[FaqController::class , 'operation'])->name('operation');
                });

            });

            Route::group(['prefix' => 'courses' , 'as' => 'courses.'], function () {

                Route::get('/', [CourseController::class, 'index'])->name('index');
                Route::get('/datatable', [CourseController::class, 'datatable'])->name('datatable');


                Route::group(['prefix' => 'create'], function (){
                    Route::get('/',[CourseController::class , 'create'])->name('create');
                    Route::post('/',[CourseController::class , 'store'])->name('store');
                });

                Route::group(['prefix' => '{id}'], function (){
                    Route::get('/edit',[CourseController::class , 'edit'])->name('edit');
                    Route::put('/edit',[CourseController::class , 'update'])->name('update');
                    Route::delete('/',[CourseController::class , 'destroy'])->name('destroy');
                    Route::post('/operation',[CourseController::class , 'operation'])->name('operation');
                });

            });
            Route::group(['prefix' => 'students', 'as' => 'students.'], function () {

                Route::get('/', [StudentController::class, 'index'])->name('index');
                Route::get('/datatable', [StudentController::class, 'datatable'])->name('datatable');

                Route::group(['prefix' => 'create'], function () {
                    Route::get('/', [StudentController::class, 'create'])->name('create');
                    Route::post('/', [StudentController::class, 'store'])->name('store');
                });

                Route::group(['prefix' => '{id}'], function () {
                    Route::get('/edit', [StudentController::class, 'edit'])->name('edit');
                    Route::put('/edit', [StudentController::class, 'update'])->name('update');
                    Route::delete('/', [StudentController::class, 'destroy'])->name('destroy');
                    Route::post('/operation', [StudentController::class, 'operation'])->name('operation');
                });

            });
                Route::group(['prefix' => 'lectures', 'as' => 'lectures.'], function () {



                    Route::get('/', [LectureController::class, 'index'])->name('index');
                    Route::get('/datatable', [LectureController::class, 'datatable'])->name('datatable');

                    Route::group(['prefix' => 'create'], function () {
                        Route::get('/', [LectureController::class, 'create'])->name('create');
                        Route::post('/', [LectureController::class, 'store'])->name('store');
                    });

                    Route::group(['prefix' => '{id}'], function () {
                        Route::get('/edit', [LectureController::class, 'edit'])->name('edit');
                        Route::put('/edit', [LectureController::class, 'update'])->name('update');
                        Route::delete('/', [LectureController::class, 'destroy'])->name('destroy');
                        Route::post('/operation', [LectureController::class, 'operation'])->name('operation');
                    });

                });
                Route::group(['prefix' => 'student_courses', 'as' => 'student_courses.'], function () {
                  
                    Route::get('/', [StudentCourseController::class, 'index'])->name('index');
                    Route::get('/datatable', [StudentCourseController::class, 'datatable'])->name('datatable');

                    Route::group(['prefix' => 'create'], function () {
                        Route::get('/', [StudentCourseController::class, 'create'])->name('create');
                        Route::post('/', [StudentCourseController::class, 'store'])->name('store');
                    });

                    Route::group(['prefix' => '{id}'], function () {
                        Route::get('/edit', [StudentCourseController::class, 'edit'])->name('edit');
                        Route::put('/edit', [StudentCourseController::class, 'update'])->name('update');
                        Route::delete('/', [StudentCourseController::class, 'destroy'])->name('destroy');
                        Route::post('/operation', [StudentCourseController::class, 'operation'])->name('operation');
                    });

                });
        });
    });


});

