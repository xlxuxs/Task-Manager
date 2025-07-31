<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\taskController;
use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;

Route::get('/', function (){
    return view("landing-page");
});

Route::get('/homepage', function (){
    
    $tasks=[];
    
    if(auth()->check()){
            $tasks = auth()->user()->usertask()->latest()->get();
    }
    return view('homepage', ['tasks' => $tasks]);

});

Route::get('/signup', function (){
    return view('sign-up');
});
Route::post('/signup', [userController::class, 'signUp']);


Route::get('/login', function (){
    return view('log-in');
});
Route::post('/login', [userController::class, 'login']);

Route::get('/logout', [userController::class, 'logout']);

Route::get('/newtask', function (){
    return view('new-task');
});

Route::post('/newtask', [taskController::class, 'createTask']);

Route::get('/edittask/{task}', [taskController::class, 'showEdit']);
Route::put('edittask/{task}', [taskController::class, 'editTask']);

Route::delete('/deletetask/{task}', [taskController::class, 'deleteTask']);

Route::get('/filter', [taskController::class, 'filterTasks']);

Route::get('/dashboard', [taskController::class, 'count']);

Route::get('/admin', [adminController::class, 'authCheck']);
Route::post('/admin/login', [adminController::class, 'adminLogin']);
Route::get('/admin/dashboard', [adminController::class, 'dash']);