<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\ContactController;
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
    return redirect()->route('userList');
});


//People Controller to fetch people related data
Route::controller(PeopleController::class)->group(function () {

    Route::get('user/create', 'createUser')->name('createUser');
    Route::post('user/store', 'storeUser')->name('storeUser');
    Route::get('user/edit/{id}', 'editUser')->name('editUser');
    Route::get('user/delete/{id}', 'deleteUser')->name('deleteUser');
    Route::get('user/view/{id}', 'userView')->name('userView');
    Route::get('user/list', 'userList')->name('userList');
});

//Contact Details Controller
Route::controller(ContactController::class)->group(function () { 

    Route::get('contact/create/{id}', 'createContact')->name('createContact');
    Route::post('contact/store', 'storeContact')->name('storeContact');
    Route::get('contact/edit/{id}', 'editContact')->name('editContact');
    Route::get('contact/delete/{id}/{pid}', 'deleteContact')->name('deleteContact');
    Route::get('contact/list', 'userContact')->name('userContact');

    
});