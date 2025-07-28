<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class taskController extends Controller
{
    public function createTask(Request $request){
        $incomingDate = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'priority' => [ 'required'],
            'status' => ['required'],
            'date' => ['required'],
        ]);
        $incomingDate['user_id'] = auth()->id();

        

        $tasks = Task::create($incomingDate);
        return redirect('/homepage');
    }

    public function showEdit(Request $request, Task $task){
        
            return view('edit-task', ['task' => $task]);

    }

    public function editTask(Request $request, Task $task){
        $incomingDate = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'priority' => [ 'required'],
            'status' => ['required'],
            'date' => ['required'],
        ]);

        $task->update($incomingDate);

        return redirect('/homepage');

    }

    public function deleteTask(Task $task){
        $task->delete();
        return redirect('/homepage'); 
    }
}
