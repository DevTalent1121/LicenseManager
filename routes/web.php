<?php

use Illuminate\Support\Facades\Route;

use App\HTTP\Controllers\LicenseManageController;

use Illuminate\Support\Facades\Auth;

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
    return redirect()->route('login');
});

Route::get("/welcome", function(){
    return view("welcome");
})->name("welcome");



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','admin'])->name('dashboard');

Route::get('/licenses', [ LicenseManageController::class, 'index' ])->middleware(['auth','user'])->name('licenses');
Route::get('/licenses-list', [ LicenseManageController::class, 'index' ])->middleware(['auth','user'])->name('licenses.index');
Route::get('/licenses-create', [ LicenseManageController::class, 'create' ])->middleware(['auth','user'])->name('licenses.create');
Route::delete('/licenses-delete/{license}', [ LicenseManageController::class, 'destroy' ])->middleware(['auth','user'])->name('licenses.destroy');
// Route::post('/licenses/index', [ LicenseManageController::class, 'destroy' ])->middleware(['auth'])->name('licenses.destroy');


// Route::resource('licenses',LicenseManageController::class);
// user protected routes

// Route::group(['middleware' => ['auth', 'user'], 'prefix' => 'user'], function () {
//     Route::get('/', 'LicenseManageController@index')->name('license_dashboard');
//     // Route::get('/list', 'UserController@list')->name('user_list');
// });

// // admin protected routes
// Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
//     Route::get('/', function () {
//         return view('dashboard');
//     })->name('admin_dashboard');
//     // Route::get('/users', 'AdminUserController@list')->name('admin_users');
// });

require __DIR__.'/auth.php';
