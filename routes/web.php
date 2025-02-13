<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\UserController;
//Acara 3
Route::get('/', function () {
    return view('welcome');
});
Route::get('/user', [UserController::class, 'index']);

Route::match(['get', 'post'], '/', function () {
    return 'ini match';
});
Route::any('/', function () {
    return 'ini any';
});
Route::redirect('/here', 'there', 301);
Route::view('/welcome', 'welcome');
Route::view('/welcome', 'welcome')->name('Taylor');
Route::get('user/{name?}', function ($name = null) {
    return $name;
});
Route::get('user/{name?}', function ($name = "John") {
    return $name;
});
Route::get('user/{name}', function ($name) {

})->where('name', '[A-Za-z]+');
Route::get('user/{id}', function ($id) { })->where('id', '[0-9]+');
Route::get('user/{id}{name}', function ($id, $name) { })->where(['id' => '[0-9]+', 'name' => '[a-z]+']);
Route::get('user/{id}', function ($id) {

});
Route::get('search/{search}', function ($search) {
    return $search;
})->where('search', '.*');


//Acara 4
$url = route('profile');
return redirect()->route('profile');

Route::get('/user/{id}/profile', function ($id) {
})->name('profile');

$url = route('profile', ['id' => 1]);

Route::get('/user/{id}/profile', function ($id) {
})->name('profile');

$url = route('profile', ['id' => 1, 'photos' => 'yes']);

Route::middleware(['first', 'second'])->group(function () {
    Route::get('/', function () {
    });
    Route::get('/user/profile', function () {
    });
});
Route::namespace('Admin')->group(function () { });

Route::domain('{account).myapp.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
    });
});
Route::prefix('admin')->group(function () {
    Route::get('users', function () {
    });
});
Route::name('admin')->group(function () {
    Route::get('users', function () {
    })->name('users');
});