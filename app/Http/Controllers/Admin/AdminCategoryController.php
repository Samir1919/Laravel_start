<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function adminHome()
    {
        return view('admin.adminHome');
    }


    public function index(){
        $categories = Category::all();
        $parentCategories = Category::where('parent_id', 0)->get();
        return view('admin.category.category', compact('parentCategories','categories'));
    }


    public function create()
    {
//        $categories = Category::all();
//        return view('admin.category.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->parent_id = $request->input('parent_id');
        if($category->save()){
            return redirect()->back()->with('success', 'Category inserted successfully!');
        }
        return redirect()->back()->with('failed', 'Category could not be inserted!');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $selectCat = Category::all();
        return view('admin.category.edit', compact('category','selectCat'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->parent_id = $request->input('parent_id');
        if($category->save()){
            return redirect()->back()->with('success', 'Updated successfully!');
        }
        return redirect()->back()->with('failed', 'Could not update!');
    }



    public function destroy($id)
    {
        if(Category::destroy($id)){
            return redirect()->back()->with('deleted', 'Deleted Successfully');
        }
        return redirect()->back()->with('delete-failed', 'Could not delete');
    }
}
