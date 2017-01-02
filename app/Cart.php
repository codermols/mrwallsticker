<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $fillable = ['product_id', 'qty', 'price'];

    public $products = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart)
        {
            $this->products = $oldCart->products;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function addToCart($product, $id)
    {
        $productInCart = ['qty' => 0, 'price' => $product->price, 'product' => $product];
        // Check if there's products in the cart object
        if ($this->products)
        {
            // Check the id of the product to find if it already exists 
            if (array_key_exists($id, $this->products))
            {
                // Overwriting the array while the Cart only wants 
                $productInCart = $this->products[$id];
            }
        }
        $productInCart['qty']++;
        $productInCart['price'] = $product->price * $productInCart['qty'];
        // Make the array products as an associative array with the key being the product id
        $this->products[$id] = $productInCart;
        $this->totalQty++;
        $this->totalPrice += $product->price;
    }

    public function removeByOne($id)
    {
        $this->products[$id]['qty']--;
        $this->products[$id]['price'] -= $this->products[$id]['product']->price;
        $this->totalQty--;
        $this->totalPrice -= $this->products[$id]['product']->price;

        if ($this->products[$id]['qty'] <= 0) 
        {
            // removes the product from the cart. 
            unset($this->products[$id]);
        }
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
