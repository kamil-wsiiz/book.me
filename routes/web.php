<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProviderController;

Route::get('/', function () {
    return view('home');
});

Auth::routes(['reset' => false, 'confirm' => false, 'verify' => false]);

Route::get('providers', [ProviderController::class, 'show']);
Route::get('provider/{id}', [ProviderController::class, 'showProvider']);

// Logged in
Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', function() {
        $view = 'profile.' . array_search(Auth::user()->type, User::TYPES);
        return view($view);
    });

    Route::post('profile/save_provider', [ProviderController::class, 'save']);
});

