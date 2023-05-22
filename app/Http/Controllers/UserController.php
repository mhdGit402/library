<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function registerIndex(){
        return view('register');
    }

    public function addUser(Request $request, User $user){
        $formFields['role_id'] = $request->role_id;
        $formFields['name'] = $request->name;
        $formFields['email'] = $request->email;
        $formFields['password'] = bcrypt($request->password);
        $user = $user->create($formFields);
        if($user){
            auth()->login($user);
            return true;
        }elseif(!$user){
            return false;
        }
    }

    public function loginIndex(){
        return view('login');
    }

    public function loginUser(Request $request, User $user){
        $formFields['email'] = $request->email;
        $formFields['password'] = $request->password;
        $user = auth()->attempt($formFields);
        if($user){
            return true;
        }elseif(!$user){
            return false;
        }
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    public function showUser($id, User $user){
        $user = $user->where('id', $id)->with('libraries.category', 'getLibraries.category', 'role')->get();
        return view('user', ['data' => $user]);
    }
}
