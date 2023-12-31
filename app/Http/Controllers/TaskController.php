<?php

namespace App\Http\Controllers;

use App\Models\dailytask;
use Illuminate\Http\Request;


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
    public function updateMarkAsCompleted($id){

        $task= dailytask::find($id);
        $task->isCompleted=1;
        $task->save();
        $data=dailytask::all();
        return view('tasks')->with('Tasks',$data);


    }
    public function updateMarkAsNotCompleted($id){

        $task=dailytask::find($id);
        $task->isCompleted=0;
        $task->save();
        $data=dailytask::all();
        return view('tasks')->with('Tasks',$data);
    }
    public function deleteTask($id){

        $task=dailytask::find($id);
        $task->delete();
        $data=dailytask::all();
        return redirect('tasks')->with('Task',$data);
    }
    public function getTask($id){

         $task=dailytask::find($id);
         //dd($task);
         $tasks=[$task];
         return view('updateTask')->with('Task',$tasks);
    }
    public function updateTask(Request $request){
   
        $id=$request->id;
        $task=$request->task;
        $task1=dailytask::find($id);
        $task1->task=$task;
        $task1->save();
        $data=dailytask::all();
        return redirect('tasks')->with('Task',$data);

    }
}
