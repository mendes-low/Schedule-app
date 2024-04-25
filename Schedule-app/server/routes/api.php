<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('cors')->group(function (){
    Route::get('/status', function (){
        return response()->json([
            'status'    => true,
            'message'   => 'server ready'
        ]);
    });

    Route::post('/auth', [\App\Http\Controllers\user\authController::class, 'auth']);

    Route::middleware('checkToken')->group(function (){
        Route::get('/getTable', [\App\Http\Controllers\user\getTimetableContoller::class, 'getTable']);
    });
});


