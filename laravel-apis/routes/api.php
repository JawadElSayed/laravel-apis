<?php

use App\Http\Controllers\calculating;
use App\Http\Controllers\convertingToBinary;
use App\Http\Controllers\PlaceValue;
use App\Http\Controllers\sorting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=> "apis"], function() {
    Route::get("/sort/{string?}",[sorting::class, 'sort']);
    Route::get("/placeValue/{int?}",[PlaceValue::class, 'placeValue']);
    Route::get("/convert/{text?}",[convertingToBinary::class, 'convertToBinary']);
    Route::get("/calculate/{string?}",[calculating::class, 'calculate']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
