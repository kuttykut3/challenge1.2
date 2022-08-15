<?php

use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
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
// route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/redirect',[HomeController::class,'redirect'])->name('redirect');

// Route::get('/', [UserController::class, 'index']);

Route::get('/add', [UserController::class, 'add'])->name('add');

Route::post('/add', [UserController::class, 'save'])->name('save');

Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('destroy');

Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');

Route::put('/edit/{id}', [UserController::class, 'update'])->name('update');


// file handle
Route::get('/assignment', [FileUploadController::class, 'index'])->name('assignment');

Route::delete('/destroyFile/{id}', [FileUploadController::class, 'destroyFile'])->name('destroyFile');

Route::get('/detail/{id}', [FileUploadController::class, 'detail'])->name('detail');

Route::get('/view/{id}', [FileUploadController::class, 'view'])->name('viewFile');

Route::get('/file-upload', [FileUploadController::class, 'upload'])->name('fileUpload');

Route::post('/store', [FileUploadController::class, 'store'])->name('storeFile');

Route::get('/change/{id}', [FileUploadController::class, 'changeFile'])->name('changeFile');

Route::put('/change/{id}', [FileUploadController::class, 'updateFile'])->name('updateFile');

//student handle
Route::get('/assignmentStu', [StudentController::class, 'indexStu'])->name('assignmentStu');

Route::get('/detailStu/{id}', [StudentController::class, 'detailStu'])->name('detailStu');

Route::get('/editStu/{id}', [StudentController::class, 'editStu'])->name('editStu');

Route::put('/editStu/{id}', [StudentController::class, 'updateStu'])->name('updateStu');