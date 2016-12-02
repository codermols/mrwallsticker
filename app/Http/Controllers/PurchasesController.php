<?php

namespace App\Http\Controllers;

use Stripe\{Stripe, Charge, Customer};
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    public function store()
    {
    	// Perform the charge. 
    	
    	Stripe::setApiKey(config('services.stripe.secret'));
    	
    	$customer = Customer::create([
			'email' => request('stripeEmail'),
			'source' => request('stripeToken')
		]);
    }
}
