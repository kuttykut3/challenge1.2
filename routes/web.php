<?php

use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessagesController;
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

Route::get('/users', [UserController::class, 'index'])->name('listuser');

Route::get('/add', [UserController::class, 'add'])->name('add');

Route::post('/add', [UserController::class, 'save'])->name('save');

Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('destroy');

Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');

Route::get('/detailUser/{id}', [UserController::class, 'detailUser'])->name('detailUser');

Route::put('/edit/{id}', [UserController::class, 'update'])->name('update');


// file handle
Route::get('/assignment', [FileUploadController::class, 'index'])->name('assignment');

Route::delete('/destroyFile/{id}', [FileUploadController::class, 'destroyFile'])->name('destroyFile');

Route::get('/detail/{id}', [FileUploadController::class, 'detail'])->name('detail');

Route::get('/viewFile/{id}', [FileUploadController::class, 'viewFile'])->name('viewFile');

Route::get('/file-upload', [FileUploadController::class, 'upload'])->name('fileUpload');

Route::post('/store', [FileUploadController::class, 'store'])->name('storeFile');

Route::get('/change/{id}', [FileUploadController::class, 'changeFile'])->name('changeFile');

Route::put('/change/{id}', [FileUploadController::class, 'updateFile'])->name('updateFile');

Route::get('/viewFileTurnedIn/{id}', [FileUploadController::class, 'viewFileTurnedIn'])->name('viewFileTurnedIn');

Route::get('/challenges', [FileUploadController::class, 'challenges'])->name('challenges');

Route::get('/challenge-upload', [FileUploadController::class, 'uploadChallenge'])->name('ChallengeUpload');

Route::post('/storeChallenge', [FileUploadController::class, 'storeChallenge'])->name('storeChallenge');

Route::get('/showHint/{id}', [FileUploadController::class, 'showHint'])->name('showHint');

Route::post('/answer/{id}', [FileUploadController::class, 'answer'])->name('answer');

Route::get('/detailChallenge/{id}', [FileUploadController::class, 'detailChallenge'])->name('detailChallenge');

Route::delete('/destroyChallenge/{id}', [FileUploadController::class, 'destroyChallenge'])->name('destroyChallenge');

//student handle
Route::get('/userStu', [StudentController::class, 'index'])->name('listUserStu');

Route::get('/assignmentStu', [StudentController::class, 'indexStu'])->name('assignmentStu');

Route::get('/detailStu/{id}', [StudentController::class, 'detailStu'])->name('detailStu');

Route::get('/view/{id}', [StudentController::class, 'viewFileStu'])->name('viewFileStu');

Route::get('/downloadFile/{id}', [StudentController::class, 'downloadFile'])->name('downloadFileStu');

Route::get('/editStu/{id}', [StudentController::class, 'editStu'])->name('editStu');

Route::put('/editStu/{id}', [StudentController::class, 'updateStu'])->name('updateStu');

Route::post('/turnIn/{id}', [StudentController::class, 'turnIn'])->name('turnIn');

Route::get('/challengesStu', [StudentController::class, 'challengesStu'])->name('challengesStu');

Route::get('/detailChallengeStu/{id}', [StudentController::class, 'detailChallengeStu'])->name('detailChallengeStu');

Route::get('/showHintStu/{id}', [StudentController::class, 'showHintStu'])->name('showHintStu');

Route::post('/answerStu/{id}', [StudentController::class, 'answerStu'])->name('answerStu');

//messages handle 
Route::group(['middleware' => 'auth', 'prefix' => 'messages', 'as' => 'messages'], function () {

    Route::get('/', [MessagesController::class, 'index']);

    Route::get('create', [MessagesController::class, 'create'])->name('.create');

    Route::post('/', [MessagesController::class, 'store'])->name('.store');

    Route::get('{thread}', [MessagesController::class, 'show'])->name('.show');

    Route::put('{thread}', [MessagesController::class, 'update'])->name('.update');

    Route::delete('{thread}', [MessagesController::class, 'destroy'])->name('.destroy');
});