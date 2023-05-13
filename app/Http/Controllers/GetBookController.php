<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Library;
use App\Models\GetBook;
use App\Models\User;

class GetBookController extends Controller
{
    public function index($id, Library $library){
        $user_id = auth()->id();
        $data = $library->with('category')->where('id', '=', $id)->get();
        return view('getBook', ['data' => $data, 'user_id' => $user_id , 'library_id' => $id]);
    }

    public function getBook(Request $request){
        $formFields['user_id'] = $request->user_id;
        $formFields['library_id'] = $request->library_id;
        $formFields['startTime'] = $request->startTime;
        $formFields['dueTime'] = $request->dueTime;

        $getbook = GetBook::create($formFields);
        if($getbook){
            return true;
        }
    }

    public function showBooks(User $user){
        $user_id = auth()->id();
        //$data = User::find($user_id)->getLibraries()->get();
        $data = User::with('getLibraries.category')->find($user_id);
        
        return view('my_books', ['data' => $data]);
    }
}
