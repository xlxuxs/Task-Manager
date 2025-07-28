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
  
    public function filterTasks(Request $request)
    {
        $filters = $request->validate([
            'filter_priority' => 'nullable|string',
            'filter_status' => 'nullable|string',
        ]);

        $query = Task::query();

        if (!empty($filters['filter_priority']) && $filters['filter_priority'] !== 'all') {
            $query->where('priority', $filters['filter_priority']);
        }

        if (!empty($filters['filter_status']) && $filters['filter_status'] !== 'all') {
            $query->where('status', $filters['filter_status']);
        }

        $tasks = $query->where('user_id', auth()->id())->get();

        // Pass the filters and tasks to the view
        return view('homepage', ['tasks' => $tasks, 'filter' => $filters]);
    }
        
}
