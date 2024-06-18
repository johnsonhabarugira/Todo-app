<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    public function index() {
        $tasks= Task::orderby('id','DESC')
        ->GET();
        return view('tasks.index', [
            'tasks'=>$tasks,
        ]);
    }
    public function create() {
        return view('tasks.create');
    }
    public function store(){
        request()->validate([
            'descrition'=>'required|max:255',
        ]);
       
        $task= Task::create([
            'description' => request('description'),
        ]);
        return redirect('/');
    }
    public function update($id) {
        $task = Task::where('id', $id)->first();
        $task->completed_at = now();
        $task->save();
        return redirect('/');
    }
    public function delete($id) {
        $task = Task::where('id', $id)->first();
        $task ->delete();
        return redirect('/');


    }
}
