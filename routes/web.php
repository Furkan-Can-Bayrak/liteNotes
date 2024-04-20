<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    ////       NOTE ROUTELARI

    Route::get('/notes',[NoteController::class,'index'])->name('indexNote');

    Route::get('/notes/create',[NoteController::class,'create'])->name('createNote');

    Route::post('/notes/store',[NoteController::class, 'store'])->name('storeNote');

    Route::get('/notes/show/{id}',[NoteController::class,'show'])->name('showNote');

    Route::get('/notes/update/{id}',[NoteController::class,'update'])->name('updateNote');

    Route::post('/notes/update/edit/{id}',[NoteController::class,'edit'])->name('editNote');
    Route::post('/notes/update/edit',[NoteController::class,'editNoParameter'])->name('editNoteNoParameter');

});
