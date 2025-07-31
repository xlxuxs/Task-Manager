<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
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
        
        return redirect('/login');
    }

    public function login(Request $request){
        $incomingData = $request->validate([
            'name' => ['required'],
            'password' => ['required']
        ]);
        $incomingData['name'] = strip_tags($incomingData['name']);
        $incomingData['password'] = strip_tags($incomingData['password']);

        if(auth()->attempt(['name'=> $incomingData['name'], 'password' => $incomingData['password']])){
            return redirect('/homepage');
        } else {
            return back()->withErrors(['error' => 'Invalid name or password']);
        }
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
