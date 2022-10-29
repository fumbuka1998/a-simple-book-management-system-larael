<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\adminController;
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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/redirect', [HomeController::class, 'redirect']);

Route::get('/', [HomeController::class, 'homepage']);

Route::get('/book', [adminController::class, 'book']);

Route::post('/uploadbook', [adminController::class, 'uploadbook']);

Route::get('/showbook', [adminController::class, 'showBook']);

Route::get('/deletebook/{id}', [adminController::class, 'deleteBook']);

Route::get('/updatebook/{id}', [adminController::class, 'updateBook']);

Route::post('/updatebook/{id}', [adminController::class, 'updateBookPost']);

Route::get('/search', [HomeController::class, 'search']);

//Route::post('/addCart/{id}', [HomeController::class, 'addCart']);

//Route::get('/showCart', [HomeController::class, 'showCart']);

//Route::get('/delete/{id}', [HomeController::class, 'deleteCart']);

//Route::post('/order', [HomeController::class, 'confirmOrder']);


Route::get('/showauthor', [adminController::class, 'showAuthor']);


//routes to call nav tabs

Route::get('/vitabu', [HomeController::class, 'vitabuvyetu']);

Route::get('/home', [HomeController::class, 'homeView']);

Route::get('/favour', [HomeController::class, 'favour']);

Route::get('/author', [HomeController::class, 'author']);

Route::post('/sendcomment', [HomeController::class, 'sendComment']);


Route::get('/showcomment', [adminController::class, 'showComment']);

//Route::get('/deletesms/{id}', [adminController::class, 'deleteMessage']);

Route::get('/mydashboard', [adminController::class, 'dashboard']);

Route::get('/showuser', [adminController::class, 'showUsers']);

Route::get('/deleteuser/{id}', [adminController::class, 'deleteUser']);

//Route::get('/bidhaaDES/{id}', [HomeController::class, 'bidhaaDesc']);

//like and dislike routes
Route::post('/liked/{id}', [HomeController::class, 'likes']);
Route::get('/disliked/{id}', function ($id){
    $book = DB::table('likes')->where('book_id', $id)->delete();

    return back()->with('mess', 'you have disliked the book');
});
