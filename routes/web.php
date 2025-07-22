<?php

use App\Http\Controllers\ListController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
})->name('home');

Route::get('/list', [ListController::class, 'viewList'])->name('list');
Route::post('/list/create', [ListController::class, 'listCreate'])->name('list.post');
Route::delete('/list/destroy/{listItem}', [ListController::class, 'listDelete'])->name('list.destroy');
Route::patch('/list/update', [ListController::class, 'listUpdate'])->name('list.update');

Route::post('/task/create', [TaskController::class, 'taskCreate'])->name('task.post');
Route::delete('/task/destroy/{taskItem}', [TaskController::class, 'taskDelete'])->name('task.destroy');
Route::patch('/task/update', [TaskController::class, 'taskUpdate'])->name('task.update');
Route::delete('/task/destroyAll/{listItemId}', [TaskController::class, 'taskDeleteAll'])->name('task.destroyAll');

