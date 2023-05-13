<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index($id, Category $category){
        $data = $category->with('libraries')->where('id', '=', $id)->get();
        return view('category', ['data' => $data]);
    }

    public function createIndex(){
        return view('add_category');
    }

    public function addCategory(Request $request, Category $category){
        $formFields['title'] = $request->title;
        $category = $category->create($formFields);
        if($category){
            return true;
        }elseif(!$category){
            return false;
        }
    }

    public function show(Category $category){
        $category = $category->get();
        return $category;
    }
}
