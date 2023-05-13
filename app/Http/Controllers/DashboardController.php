<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\GetBook;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard');
    }

    public function userList(User $user){
        $data = $user->where('role_id', '=', '3')->get();
        return view('user_list', ['data' => $data]);
    }

    public function bookList(GetBook $getbook){
        $data = $getbook->with('user', 'library')->get();
        return view('book_list', ['data' => $data]);
    }

    public function userDelete($id){
        $user = User::find($id)->delete();
        if(!$user){
            return false;
        }
        return true;
    }

    public function userUpdateIndex($id){
        $data = User::find($id);
        return view('user_update', ['data' => $data]);
    }

    public function userUpdate($id, Request $request, User $user){
        
        $newName = $user->where('id', $id)->update(['name' => $request->name]);

        if($newName){
            return true;
        }
        return false;
    }
}
