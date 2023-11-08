<?php


use App\Models\dailytask;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks',function(){
    $data=dailytask::all();
    return view('tasks')->with('Tasks',$data);
});

Route::post('/saveTask',[TaskController::class,'store']);
Route::get('/markascompleted/{id}',[TaskController::class,'updateTask']);
Route::get('/markasnotcompleted/{id}', [TaskController::class,'updateTask1']);
Route::get('/deleteTask/{id}', [TaskController::class,'deleteTask']);