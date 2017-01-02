<?php

namespace App\Http\Controllers;

use App\Product;
use App\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
	 {
	 	$products = Product::orderBy('name', 'asc')->get();
        $reviews = Review::all();

		return view('welcome', compact('products', 'reviews'));

	 } 
}
