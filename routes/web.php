<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home')->middleware('auth');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');

//rutas para categorias
Route::get('/admin/categorias', [App\Http\Controllers\CategoriaController::class, 'index'])->name('categorias.index')->middleware('auth');
Route::get('/admin/categorias/create', [App\Http\Controllers\CategoriaController::class, 'create'])->name('categorias.create')->middleware('auth');
Route::post('/admin/categorias/create', [App\Http\Controllers\CategoriaController::class, 'store'])->name('categorias.store')->middleware('auth');
Route::get('/admin/categoria/{id}', [App\Http\Controllers\CategoriaController::class, 'show'])->name('categorias.show')->middleware('auth');
Route::get('/admin/categoria/{id}/edit', [App\Http\Controllers\CategoriaController::class, 'edit'])->name('categorias.edit')->middleware('auth');
Route::put('/admin/categoria/{id}', [App\Http\Controllers\CategoriaController::class, 'update'])->name('categorias.update')->middleware('auth');
Route::delete('/admin/categoria/{id}', [App\Http\Controllers\CategoriaController::class, 'destroy'])->name('categoria.destroy')->middleware('auth');

