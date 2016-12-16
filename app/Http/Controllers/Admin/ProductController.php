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
          // 'photoPath'       => $request->get('photoPath'),
          'description' 	=> $request->get('description'),
          'category_id'     => $request->get('category_name'),
          'is_customizable' => $request->get('is_customizable')
        ));
        
        $categories = Category::all();
        
        // $category = new Category;
        // $category->category_name = $request->get('category_name');
        
        // $categories->products()->associate($category);
        // $category->save();
        
        


        
        // // checks if the user wants to upload a file
        // if ($request->hasFile('photoPath')) {
        //     $photo = $request->file('photoPath');
            
        //     $fileName = time() . $photo->getClientOriginalName();

        //     $location = public_path('images/products/' . $fileName);
        //     Image::make($photo)->save($location);

        //     $product->photoPath = $fileName;


        //     // // find en måde at gemme billedet under photo
        //     // $photoModel = new Photo(array(
        //     //         'photoPath'  => $fileName
        //     //     ));

        //     // $product->photos()->save($photoModel);
        //     // 
        //     $productPhoto = new Photo;
        //     $productPhoto->photoPath = $fileName;
        //     $productPhoto->product_id = $product->photos;
        //     // $product->photos()->save($productPhoto);
        //     // $productPhoto->product()->associate($product);

        // }
        

        $product->save();
        flash()->success('Yeah!', 'Produktet er oprettet.');


        return redirect()->back();  
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

        return view('products.show', compact('product'));
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
        $slug = Str::slug($product->name);
        return view('admin.products.edit', compact('product', 'slug'));
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
            'category'          => $request->get('category'),
            'is_downloadable'   => $request->get('is_downloadable')
        ]);

        return \Redirect::route('products.edit', 
            array($product->id))->with('message', 'The product has been updated!');

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

        File::delete(base_path() . '/public/imgs/products/', $id . ".png");

        return \Redirect::route('admin.products.index')
            ->with('message', 'Product deleted!');
    }
}
