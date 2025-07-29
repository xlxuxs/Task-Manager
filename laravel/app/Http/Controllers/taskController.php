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

        if(auth()->user()->id !== $task['user_id']){
            return redirect('/');
        }
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
        // Validate the incoming filter values
        $filters = $request->validate([
            'filter_priority' => 'nullable|string',
            'filter_status' => 'nullable|string',
        ]);
    
        // Default filters if none are provided
        $filters['filter_priority'] = $filters['filter_priority'] ?? 'all';
        $filters['filter_status'] = $filters['filter_status'] ?? 'all';
    
        // Start building the query
        $query = Task::query();
    
        // Apply priority filter if provided
        if ($filters['filter_priority'] !== 'all') {
            $query->where('priority', $filters['filter_priority']);
        }
    
        // Apply status filter if provided
        if ($filters['filter_status'] !== 'all') {
            $query->where('status', $filters['filter_status']);
        }
    
        // Get the filtered tasks for the logged-in user
        $tasks = $query->where('user_id', auth()->id())->get();
    
        // Pass the filters and tasks to the view
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
