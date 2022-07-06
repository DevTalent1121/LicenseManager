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

// Route::get('/licenses', [ LicenseManageController::class, 'index' ])->middleware(['auth','user'])->name('licenses');
// Route::get('/licenses-list', [ LicenseManageController::class, 'index' ])->middleware(['auth','user'])->name('licenses.index');
// Route::get('/licenses-create', [ LicenseManageController::class, 'create' ])->middleware(['auth','user'])->name('licenses.create');
// Route::delete('/licenses-delete/{license}', [ LicenseManageController::class, 'destroy' ])->middleware(['auth','user'])->name('licenses.destroy');

Route::group([
    'namespace'  => 'App\Http\Controllers',
    // 'prefix'     => 'licenses',
    'middleware' => ['auth',"user"],
], function () {
    Route::resource('licenses', 'LicenseManageController');
});

Route::group([
    'namespace'  => 'App\Http\Controllers\Admin',
    'prefix'     => 'admin',
    'middleware' => ['auth',"admin"],
], function () {
    Route::resource('user', 'UserController');
    // Route::resource('role', 'RoleController');
    // Route::resource('permission', 'PermissionController');
    // Route::get('/user-list', [ UserController::class, 'index' ])->middleware(['auth','admin'])->name('admin.user.index');
});



require __DIR__.'/auth.php';
