<?php

use App\Http\Controllers\ReadRssController;
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => 'auth'], function () {
    Route::post('postReady',[ReadRssController::class,'readStatus']);
    Route::post('postCategory',[ReadRssController::class,'categoryStatus']);
});
