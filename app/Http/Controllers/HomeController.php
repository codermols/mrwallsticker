<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
	 {
	 	$products = Product::orderBy('name', 'asc')->get();
	 	
		return view('welcome', compact('products'));

	 } 
}
