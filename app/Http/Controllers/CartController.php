<?php namespace App\Http\Controllers;

use App;
use Session;
use App\Cart;
use App\Order;
use App\Product;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Customer;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller {

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // /**
    //  * Show the cart
    //  */
    // public function index()
    // {
    //     $cart = Auth::user()->cart;
    //     return view('cart.index', compact('cart'));
    // }

  public function index()
  {
    // Check if there's any products in cart
    if (!Session::has('cart')) 
    {
      return view('cart.index', ['products' => null]);
    }

    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);

    return view('cart.index', ['products' => $cart->products, 'totalPrice' => $cart->totalPrice]);
  }

    /**
     * Add an item to the cart
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $product = Product::find($request->get('product_id'));

        $cart = new Cart([
            'product_id' => $product->id,
            'qty' => 1,
            'price' => $product->price,
        ]);

        Auth::user()->cart()->save($cart);
        return redirect('/cart');

    }

    /**
     * Remove an item from the cart
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function remove($id)
    {
      // if (Auth::user()) {
      //   Auth::user()->cart()
      //     ->where('id', $id)->firstOrFail()->delete();      
      // }

        return redirect()->back();
    }

    /**
     * Complete the order
     *
     * @param Request $request
     * @return $this|\Illuminate\View\View
     */
    public function complete(Request $request)
    {
        if (!Session::has('cart'))
        {
          return redirect()->back();
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $user = Auth::user();

        Stripe::setApiKey("sk_test_98bGu6L6WHA0A8hVzFfL0JkF");  

        if (Auth::user()) 
        {
            $customer = Customer::create(array(
              'email' => $user->email,
              "source"  => $request->input('stripeToken')
            ));

          try {
            $charge = Charge::create(array(
             "customer" => $customer->id,
             "amount" => $cart->totalPrice * 100,
             "currency" => "dkk",
             "receipt_email" => $user->email,
             "description" => "Charge for {$user->email}",
             "metadata" => array(
                 'name' => $user->name
               )
           ));

          // Add the order
          $order = new Order();
          foreach ($user->cart as $productInCart) {
            $order->product_id = $productInCart->product_id;
          }

          $order->order_number = $charge->id;
          $order->email = $user->email;
          $order->billing_name = $request->input('card_name');
          $order->billing_address = $request->input('shipping_address');
          $order->billing_city = $request->input('shipping_city');
          $order->billing_zip = $request->input('shipping_zip');
          $order->billing_country = 'DK';

          $order->shipping_name = $request->input('shipping_name');
          $order->shipping_address = $request->input('shipping_address');
          $order->shipping_city = $request->input('shipping_city');
          $order->shipping_zip = $request->input('shipping_zip');
          $order->shipping_country = 'DK';

          $order->save();

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

          // Update cart to be completed and save it to the database
          foreach ($user->cart as $cart) {
              $cart->order_id = $order->id;
              $cart->complete = 1;
              $cart->save();
          }
        }
        

        

          Session::forget('cart');
          return view('checkout.thankyou', compact('order', 'charge'));
    }
}