<?php

namespace App\Http\Controllers;

use App\Models\dailytask;
use Illuminate\Http\Request;
use App\Models\task;

class TaskController extends Controller
{
    public function  store(Request $request){

        $this->validate($request,[
           "task"=>'required|max:100|min:5', 
        ]);

         $task= new dailytask();
         $task->task=$request->task;
         $task->save();
         $data=dailytask::all();
         
         return view('tasks')->with('Tasks',$data);
    
    }
    public function updateTask($id){

        $task= dailytask::find($id);
        $task->isCompleted=1;
        $task->save();
        $data=dailytask::all();
        return view('tasks')->with('Tasks',$data);


    }
}
