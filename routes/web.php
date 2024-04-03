<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



////       NOTE ROUTELARI

    Route::get('/notes',[NoteController::class,'index'])->name('indexNote');

    Route::get('/notes/create',[NoteController::class,'create'])->name('createNote');

    Route::post('/notes/store',[NoteController::class, 'store'])->name('storeNote');


    ////    TEST ROUTE      ////
Route::get('/masterTest', function (){
    return view('front.layouts.master');
});
    ////    TEST ROUTE      ////


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
