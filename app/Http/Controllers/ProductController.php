<?php

namespace App\Http\Controllers;

use Session;
use App\Cart;
use App\Review;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::orderBy('name', 'asc')->get();
        $reviews = Review::all();

    	return view('products.index', compact('products', 'reviews'));
    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->addToCart($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getRemoveByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeByOne($id);

        if ( count($cart->products) > 0 )
        {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        
        return redirect()->back();
    }

    public function show($name, $id = null)
    {
        $product = Product::slug($name)->first();

        $relatedProducts = Product::where('category_id', $product->category->id)->take(4)->get(); 
        $reviews = Review::where('product_id', $product->id)->get();

        return view('products.show', compact('product', 'relatedProducts', 'reviews'));

    }
}