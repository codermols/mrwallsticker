<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
    	$user = new User();

    	$product = Product::find($request->input('product_id'));

    	$stripeEmail = $request->input('stripeEmail');

    	$stripeToken = $request->input('stripeToken');

    	if ($user->charge($product->price), 
    		[
    			'source' => $stripeToken, 
    			'receipt_email' => $stripeEmail,
    			'metadata' => ['shipping' => '9.99', 'sales_tax' => '4.27']
			])) {

    		$order = new Order();

    		// Generate random order number
    		$order->order_number = substr(md5(microtime()), rand(0, 26),3) . time();
			
			$order->product_id = $product->id;

			$order->email 				= $request->input('stripeEmail');
			$order->billing_name 		= $request->input('stripeBillingName');
			$order->billing_address 	= $request->input('stripeBillingAddressLine1');
			$order->billing_city 		= $request->input('stripeBillingAddressCity');
			$order->billing_state 		= $request->input('stripeBillingAddressState');
			$order->billing_zip 		= $request->input('stripeBillingAddressZip');
			$order->billing_country 	= $request->input('stripeBillingAddressCountry');
			$order->shipping_name 		= $request->input('stripeShippingName');
			$order->shipping_address    = $request->input('stripeShippingAddressLine1');
			$order->shipping_city       = $request->input('stripeShippingAddressCity');
			$order->shipping_state 		= $request->input('stripeShippingAdreessState');
			$order->shipping_zip 		= $request->input('stripeShippingAddressZip');
			$order->shipping_country 	= $request->input('stripeShippingAddressCountry');

			$order->save();
    	} else {
    		return \Redirect::route('products.show', [$product->id])
    			->with('message', 'Der er opstået et problem under gennemførelse af din ordre. Prøv igen eller kontakt support');
    	}
    	return \Redirect::route('checkout.thankyou')
    		->with('message', 'Tak for din order.');
    }

    public function thankyou()
    {
    	return view('checkout.thankyou');
    }
}
