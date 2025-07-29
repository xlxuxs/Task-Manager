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
        $incomingDate['title'] = strip_tags($incomingDate['title']);
        $incomingDate['description'] = strip_tags($incomingDate['description']); 

        
        

        $tasks = Task::create($incomingDate);
        return redirect('/homepage');
    }

    public function showEdit(Request $request, Task $task){

        if(auth()->user()->id !== $task['user_id']){
            return redirect('/');
        }
                return view('edit-task', ['task' => $task]);

    }

    public function editTask(Request $request, Task $task){
        if(auth()->user()->id !== $task['user_id']){
            return redirect('/');
        }
        $incomingDate = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'priority' => [ 'required'],
            'status' => ['required'],
            'date' => ['required'],
        ]);
        $incomingDate['title'] = strip_tags($incomingDate['title']);
        $incomingDate['description'] = strip_tags($incomingDate['description']); 

        $task->update($incomingDate);

        return redirect('/homepage');

    }

    public function deleteTask(Task $task){
        if(auth()->user()->id !== $task['user_id']){
            return redirect('/');
        }
        $task->delete();
        return redirect('/homepage'); 
    }
  

    public function filterTasks(Request $request)
    {
        $filters = $request->validate([
            'filter_priority' => 'nullable|string',
            'filter_status' => 'nullable|string',
        ]);
    
        $filters['filter_priority'] = $filters['filter_priority'] ?? 'all';
        $filters['filter_status'] = $filters['filter_status'] ?? 'all';
    
        $query = Task::query();
    
        if ($filters['filter_priority'] !== 'all') {
            $query->where('priority', $filters['filter_priority']);
        }
    
        if ($filters['filter_status'] !== 'all') {
            $query->where('status', $filters['filter_status']);
        }
    
        $tasks = $query->where('user_id', auth()->id())->get();
    
        return view('homepage', ['tasks' => $tasks, 'filters' => $filters]);
    }
    
    public function count(){
        $total = Task::where('user_id', auth()->id())->count();
        $total_pending = Task::where('user_id', auth()->id())->where('status', 'pending')->count();
        $total_completed = Task::where('user_id', auth()->id())->where('status', 'completed')->count();
        $total_cancelled = Task::where('user_id', auth()->id())->where('status', 'cancelled')->count();
        $total_urgent = Task::where('user_id', auth()->id())->where('priority', 'urgent')->count();
        $total_high = Task::where('user_id', auth()->id())->where('priority', 'high')->count();
        $total_medium = Task::where('user_id', auth()->id())->where('priority', 'medium')->count();
        $total_low = Task::where('user_id', auth()->id())->where('priority', 'low')->count();



        return view('dashboard', ['total'=> $total,
                                  'total_pending' => $total_pending,
                                  'total_completed' => $total_completed,
                                  'total_cancelled' => $total_cancelled,
                                  'total_low' => $total_low ,
                                  'total_medium' => $total_medium,
                                  'total_high' => $total_high,
                                  'total_urgent' => $total_urgent
                                ]);
    }
}
