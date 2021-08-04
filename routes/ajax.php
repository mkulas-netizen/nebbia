<?php
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => 'auth'], function () {
    Route::post('postReady',[\App\Http\Controllers\ReadRssController::class,'readStatus']);
});
