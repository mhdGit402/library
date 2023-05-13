<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SavedBook;

class SavedBookController extends Controller
{
    public function index(){
        $user_id = auth()->id();
        $data = User::with('libraries.category')->find($user_id);
        return view('savedBook', ['data' => $data]);
    }

    public function delete($id){
        $saved_book = SavedBook::find($id);
        $saved_book->delete();
        
        if($saved_book){
            return true;
        }else{
            return false;
        }
    }
}
