<?php

use App\Http\Controllers\ClassroomController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('classrooms.index');
});

Route::resource('classrooms', ClassroomController::class)->except(['show']);
