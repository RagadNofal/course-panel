<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/index', function () {
    return view('User.index');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Show request form
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


// Home variations (optional static pages)
Route::view('home-02', 'home-02')->name('home.02');
Route::view('home-03', 'home-03')->name('home.03');
Route::view('home-04', 'home-04')->name('home.04');
Route::view('home-05', 'home-05')->name('home.05');
Route::view('home-06', 'home-06')->name('home.06');

// Courses
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/add-course', [CourseController::class, 'create'])->name('courses.create');
Route::get('/add-course', [CourseController::class, 'create'])->name('my.courses');
// Static Pages
Route::view('about-us', 'User.about')->name('about');
Route::view('our-service', 'services')->name('services');
Route::view('pricing', 'pricing')->name('pricing');
Route::view('contact', 'contact')->name('contact');
Route::view('faq', 'User.FAQs')->name('faq');
Route::view('privacy-policy', 'privacy')->name('privacy');

// Blog
Route::get('blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
Route::get('blog-grid', [App\Http\Controllers\BlogController::class, 'grid'])->name('blog.grid');
Route::get('blog-detail/{slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');

// Dashboard
Route::middleware(['auth'])->group(function () {
    Route::view('dashboard', 'dashboard.index')->name('dashboard');
    Route::view('my-courses', 'dashboard.my-courses')->name('dashboard.my-courses');
    Route::view('messages', 'dashboard.messages')->name('dashboard.messages');
    Route::view('my-favorites', 'dashboard.favorites')->name('dashboard.favorites');
    Route::view('reviews', 'dashboard.reviews')->name('dashboard.reviews');
    Route::view('profile', 'dashboard.profile')->name('profile');
});

// // Auth routes (Laravel Breeze/Fortify/Jetstream or your own implementation)
// Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
// Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

// // Password Reset
// Route::get('/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// Route::post('/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Route::get('/reset-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
// Route::post('/reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');
   Route::get('/enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');

    // Enroll in a course (POST request)
    Route::post('/courses/{course}/enroll', [EnrollmentController::class, 'store'])->name('enrollments.store');

    // View a specific enrollment progress or status (optional)
    Route::get('/enrollments/{enrollment}', [EnrollmentController::class, 'show'])->name('enrollments.show');

    // Update progress (optional - if your system supports tracking progress)
    Route::patch('/enrollments/{enrollment}', [EnrollmentController::class, 'update'])->name('enrollments.update');

    // Unenroll or delete enrollment
    Route::delete('/enrollments/{enrollment}', [EnrollmentController::class, 'destroy'])->name('enrollments.destroy');