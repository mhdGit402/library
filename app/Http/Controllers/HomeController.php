<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Library;
use App\Models\User;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(Library $library){
        if(auth()->check()){
            $user_id = auth()->id();
            $save = User::find($user_id)->libraries()->get();
            $get = User::find($user_id)->getLibraries()->get();
        }elseif(!auth()->check()){
            $save = 'false';
            $get = 'false';
        }
        $data = $library->with('category')->get();
        return view('index', ['data' => $data , 'save' => $save, 'get' => $get]);
    }

    public function search($search, Library $library, Category $category){

        if(auth()->check()){
            $user_id = auth()->id();
            $save = User::find($user_id)->libraries()->get();
            $get = User::find($user_id)->getLibraries()->get();
        }elseif(!auth()->check()){
            $save = 'false';
            $get = 'false';
        }

        $data = $library->with('category')
        ->where('title', 'like', '%'.$search.'%')
        ->orWhere('description', 'like', '%'.$search.'%')
        ->get();

        // $data = $library->with(['category' => function($query) use ($search){
        //     $query->where('title', 'like', '%'.$search.'%');
        // }])
        // ->where('title', 'like', '%'.$search.'%')
        // ->orWhere('description', 'like', '%'.$search.'%')
        // ->get();


        return view('search', ['data' => $data, 'save' => $save, 'get' => $get]);
    }
}
