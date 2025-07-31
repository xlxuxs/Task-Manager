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

        $users = User::all(); 



        return view('admin', ['total'=> $total,
                                'total_tasks' => $total_tasks,
                                  'total_pending' => $total_pending,
                                  'total_completed' => $total_completed,
                                  'total_cancelled' => $total_cancelled,
                                  'total_low' => $total_low ,
                                  'total_medium' => $total_medium,
                                  'total_high' => $total_high,
                                  'total_urgent' => $total_urgent
                                  ,'users' => $users
                                ]);
    }

    public function showEdit(Request $request, User $user){

        // $user = User::where('id' === );
        return view('edit-user', ['user' => $user]);

    }

    public function editUser(Request $request, User $user){
       
        $incomingDate = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => [ 'required'],
        ]);

        $incomingDate['name'] = strip_tags($incomingDate['name']);
        $incomingDate['email'] = strip_tags($incomingDate['email']); 

        $user->update($incomingDate);

        return redirect('/admin/dashboard');

    }

    public function deleteUser(User $user){
        $user->delete();
        return redirect('/admin/dashboard'); 
    }

    public function signUp(User $user, Request $request){
        $incomingData = $request->validate([
            'name' => ['required', 'min:2', 'max:50'],
            'email' => ['required', 'email', 'max:50'],
            'password'=>['required', 'min:4', 'max:20']
        ]);

        $incomingData['password'] = bcrypt($incomingData['password']);
        $incomingData['name'] = strip_tags($incomingData['name']);
        $incomingData['email'] = strip_tags($incomingData['email']);

        $user = User::create($incomingData);
        
        return redirect('/admin/dashboard');
    }

}
