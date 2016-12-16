<?php

namespace App\Http\Controllers;


use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::orderBy('name', 'asc')->get();

    	return view('products.index', compact('products'));
    }

    public function show($name, $id = null)
    {
        
        $product = Product::slug($name)->first();

        return view('products.show', compact('product'));

    }
}