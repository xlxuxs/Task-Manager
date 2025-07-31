<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function authCheck(){
        return view('admin-login');
    }

    public function adminLogin(Request $request){
        $incomingdata = $request->validate([
            'name' => 'required',
            'password' => 'required|min:4',
        ]);

        if (auth()->guard('admin')->attempt([ 'name' => $incomingdata['name'], 'password' => $incomingdata['password']])) {
            
            return redirect('/admin/dashboard'); // Redirect to admin dashboard on success
        }
        
        return back()->withErrors(['email' => 'Invalid incomingdata'])->withInput();
        
    }

    public function dash(){
        $total = User::count();
        $total_tasks = Task::count();
        $total_pending = Task::where('status', 'pending')->count();
        $total_completed = Task::where('status', 'completed')->count();
        $total_cancelled = Task::where('status', 'cancelled')->count();
        $total_urgent = Task::where('priority', 'urgent')->count();
        $total_high = Task::where('priority', 'high')->count();
        $total_medium = Task::where('priority', 'medium')->count();
        $total_low = Task::where('priority', 'low')->count();



        return view('admin', ['total'=> $total,
                                'total_tasks' => $total_tasks,
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
