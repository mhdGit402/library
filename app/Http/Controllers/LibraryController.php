<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Library;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;
use App\Models\SavedBook;
use App\Models\User;

class LibraryController extends Controller
{
    public function index($id, Library $library){
        if(auth()->check()){
            $user_id = auth()->id();
            $save = User::find($user_id)->libraries()->get();
            $get = User::find($user_id)->getLibraries()->get();
        }elseif(!auth()->check()){
            $save = 'false';
            $get = 'false';
        }
            $data = $library->with('category')->where('id', '=', $id)->get();
            return view('book', ['data' => $data, 'save' => $save, 'get' => $get]);
    }

    public function createIndex(Category $category){
        if(Gate::allows('view-add_book')){
            $data = $category->get();
            return view('add_book', ['data' => $data]);
        }else{
            abort(403);
        }
    }

    public function addBook(Request $request){
        $formFields['category_id'] = $request->category_id;
        $formFields['title'] = $request->title;
        $formFields['author'] = $request->author;
        $formFields['publisher'] = $request->publisher;
        $formFields['description'] = $request->description;
        $formFields['img'] = $request->file('img')->getClientOriginalName();
        $request->file('img')->move(public_path('image/books'), $formFields['img']);


        $library = Library::create($formFields);
        if($library){
            return $library->id;
        }elseif(!$library){
            return false;
        }

    }

    public function saveBook($id){
        $user_id = auth()->id();
        $library_id = $id;

        $formFields['user_id'] = $user_id;
        $formFields['library_id'] = $library_id;

        $savedBook = SavedBook::create($formFields);

        if($savedBook){
            return true;
        }else{
            return false;
        }
    }
}
