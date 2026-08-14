<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();

        return view('category.index', compact('category'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        Category::create($request->all());

        return redirect()->route('category.index');
    }

    public function delete($id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect()->route('category.index');
    }
}
