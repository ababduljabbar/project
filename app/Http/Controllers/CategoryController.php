<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function category(){
        return view('admin.pages.category.list');
    }
    public function create(Request $request){

            $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();

            // check request method
            if ($request->isMethod('post')) {

                //  Category Validation
    
                $request->validate([
                   'name' => 'required|unique:brands',
                   'status' => 'required',
                   'parent_id' =>  'nullable|numeric',
                ]); 
                //Category Model Call
                $category = new Category;
                //Category add
                $category->name = $request->name;
                $category->slug = strtolower(str_replace(' ', '-', $request->name));
                $category->status = $request->status;
                $category->parent_id = $request->parent_id;
                $category->save();

                return redirect()->route('category.create')->with('success','Category Create Successfully');

            }else{
                //category page
                return view('admin.pages.category.add',compact('categories'));
            }
    
    }
}
