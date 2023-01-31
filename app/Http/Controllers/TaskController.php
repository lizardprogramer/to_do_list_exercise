<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    //Shows index page
    public function index(){
        $tasks=auth()->user()->tasks()->latest()->get();
        return view('welcome', [
            'tasks'=>$tasks
        ]);
    }

    //Shows login page
    public function show_login(){
        return view('login');
    }

    //Shows register page
    public function show_register(){
        return view('register');
    }

    //Shows edit page
    public function edit($id){
        $task=Task::find($id);
        return view('edit', [
            'task'=>$task
        ]);
    }

    //Create new task
    public function create(Request $request){
        /* dd($request->all()); */
         $formFields = $request->validate([
            'task_description' => 'required'
        ]); 
        $formFields ['confirmed'] = false;
        $formFields['user_id'] = auth()->id();
        Task::create($formFields);

        return redirect('/index')->with('message', 'Task added successfuly!'); 
    }

    //Delete task
    public function destroy($id){
        $task = Task::find($id);
        $task->delete();
        return redirect('/index')->with('message', 'Task deleted successfuly!'); 
    }

    //Update confirmed

    public function update(Request $request, $id){
        $formFields=$request->all('confirmed');
        $task = Task::find($id);
        $task->update($formFields);
        return back();
        
    }  
    
    //Update task

    public function update_task(Request $request, $id){
        $task=Task::find($id);
        $formFields= $request->validate([
            'task_description' => 'required'
        ]); 
        $task->update($formFields);
        return redirect('/index')->with('message', 'Task edited successfuly!');
    }
}
