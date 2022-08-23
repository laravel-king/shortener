<?php

use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\ShortLinkController;
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

//Route::resource('admin/users', UsersController::class,['except' => ['create', 'store']]);

Route::prefix('admin')->middleware('auth:sanctum')->group(function (){
    Route::resource('/users',UsersController::class,['except' => ['create', 'store']]);
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/short_links', [ShortLinkController::class, 'index'])->name('link.index');
    Route::get('/short_links/create',[ShortLinkController::class, 'create'])->name('link.create');
    Route::post('/short_links/store',[ShortLinkController::class, 'store'])->name('link.store');
    Route::delete('/{link}/delete',[ShortLinkController::class, 'delete'])->name('link.delete');
});


Route::get('/s/{code}', [ShortLinkController::class, 'show'])->name('shorten.link');


require __DIR__.'/auth.php';
