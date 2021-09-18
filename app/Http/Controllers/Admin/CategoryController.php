<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories'
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect(route('categories.index'))->with('success','Category Added Successfully');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect(route('categories.index'))->with('success','Category Updated Successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect(route('categories.index'))->with('success','Category Deleted Successfully');
    }
}
