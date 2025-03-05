<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


Route::get('/user ',[UserController::class,'index']);
Route::post('/user/store', [UserController::class, 'store'])->name('store');
Route::get('/',function()
{
    return view('home');
});
Route::get('/userData ',[UserController::class,'userData']);
Route::get('/edit{id} ',[UserController::class,'edit'])->name('edit');
Route::put('/update{id} ',[UserController::class,'update'])->name('update');
Route::delete('/delete{id} ',[UserController::class,'delete'])->name('delete');
// Route::get('/categories',[CategoryController::class,'index']);
// Route::post('/category/store123', [CategoryController::class, 'store'])->name('category.store');




