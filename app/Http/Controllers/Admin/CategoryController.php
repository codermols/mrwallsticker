<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Category;
use App\Http\flash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
    	$category = Category::all();
    	
    	return view('admin.categories.index', compact('category'));
    }

    public function show($id)
    {
    	$category = Category::findOrFail($id);

    	return view('admin.categories.show', compact('category'));
    }

    public function create()
    {
    	$category = Category::all();

        return view('admin.categories.create', compact('category'));
    }

    public function store(Request $request)
    {
    	$category = new Category(array(
    	  'name'            => $request->get('category_name'),
    	  'slug'			=> $request->get('slug')
    	));

    	$category->save();

        flash()->success('Yeah!', 'Kategori er nu oprettet.');

        return redirect()->back();
    }
}
