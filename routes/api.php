<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->middleware(['api'])->group(function () {
    Route::post('/login', 'Auth\LoginController@login');

    Route::post('/register', 'Auth\LoginController@register');

    Route::post('/activate/{token}', 'Auth\VerificationController@verifyUser');

    Route::post('/forget-password', 'Auth\ForgotPasswordController@forgetPassword');

    Route::post('/change-password', 'Auth\ForgotPasswordController@changePassword');
});


Route::group(['prefix' => 'products'], function () {

    Route::apiResource('/', 'ProductController');

    Route::apiResource('/{product}/reviews', 'ReviewController');

}); 