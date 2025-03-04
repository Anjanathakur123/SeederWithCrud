<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/user ',[UserController::class,'index']);
Route::post('/user/store', [UserController::class, 'store'])->name('store');
Route::get('/home',function()
{
    return view('home');
});
Route::get('/userData ',[UserController::class,'userData']);
Route::get('/edit{id} ',[UserController::class,'edit'])->name('edit');
Route::put('/update{id} ',[UserController::class,'update'])->name('update');
Route::delete('/delete{id} ',[UserController::class,'delete'])->name('delete');



