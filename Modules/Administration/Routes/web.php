<?php

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
//Rutas sin validación de login
Route::prefix('administration')->group(function() {
    Route::middleware('guest')->group(function () {
        Route::view('/', 'administration::livewire.authentication.login.index')->name('login');
    });
});

//Rutas con validación de login
Route::prefix('administration')->middleware('auth')->group(function() {

    //Ruta definida al iniciar sesion
    Route::view('/dashboard', 'administration::livewire.dashboard.index')->name('dashboard');
    Route::view('/users', 'administration::livewire.user.index')->name('users');
    Route::view('/roles', 'administration::livewire.role.index')->name('roles');
    Route::view('/permissions', 'administration::livewire.permission.index')->name('permissions');
    Route::view('/profile', 'administration::livewire.user-profile.index')->name('profile');


    //Ruta Logout
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');

});
