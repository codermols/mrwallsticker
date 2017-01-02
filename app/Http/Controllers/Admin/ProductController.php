<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Photo;
use App\Product;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProductCreateRequest;
use Symfony\Component\HttpFoundation\File\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.products.create', compact('categories', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ProductCreateRequest $request)
    {
        $product = new Product(array(
          'name'        	=> $request->get('name'),
          'sku'         	=> $request->get('sku'),
          'price'       	=> $request->get('price'),
          'description' 	=> $request->get('description'),
          'category_id'     => $request->get('category_name'),
          'is_customizable' => $request->get('is_customizable')
        ));
        
        $categories = Category::all();
        
        $product->save();
        flash()->success('Yeah!', 'Produktet er oprettet.');


        return redirect("/admin/products/{$product->id}/edit");
    }

    public function addPhoto(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $file = $request->file('file');
        $filename = $product->sku . '-' . $file->getClientOriginalName();

       $file->move('images/products', $filename);

       $product->photos()->create(['photoPath' => "/images/products/{$filename}"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($name, $id = null)
    {

        $product = Product::slug($name)->first();

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        // lav ny array, fordi select allerede indsætter value og derfor skal vi kun bruge category name
        $categoryArray = array();
        foreach ($categories as $category) {
            $categoryArray[$category->id] = $category->name;
        }

        $slug = Str::slug($product->name);
        return view('admin.products.edit', compact('product', 'slug', 'categoryArray'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(ProductCreateRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'name'              => $request->get('name'), 
            'sku'               => $request->get('sku'),
            'price'             => $request->get('price'),
            'description'       => $request->get('description'),
            'category_id'       => $request->get('category_id'),
            'is_downloadable'   => $request->get('is_downloadable')
        ]);

        flash()->success('Success', 'Produktet er redigeret');

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        flash()->succes('Success', 'Produkt er korrekt slettet');

        return \Redirect::route('admin.products.index');
    }
}
