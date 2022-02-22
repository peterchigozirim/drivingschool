<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\PageController;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', [PageController::class, 'index'])->name('/');
Route::post('/contact-us', [PageController::class, 'contactUs'])->name('contact.us');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->name('dashboard');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    Route::get('/add-admin', [PageController::class, 'addAdmin'])->name('add.admin');
    Route::get('/view-admin', [PageController::class, 'ViewAdmin'])->name('view.admin');
    Route::get('/add-student', [PageController::class, 'addStudent'])->name('add.student');
    Route::get('/view-student', [PageController::class, 'viewStudent'])->name('view.student');
    Route::get('/add-admin', [PageController::class, 'addAdmin'])->name('add.admin');
    Route::get('/contact', [PageController::class, 'contact'])->name('contact');


    // post route

    Route::post('register-student', [PageController::class, 'regStudent'])->name('reg.student');
    Route::post('del-student', [PageController::class, 'delStudent'])->name(('del.student'));
    Route::post('del-admin', [PageController::class, 'delAdmin'])->name(('del.admin'));
    
});
