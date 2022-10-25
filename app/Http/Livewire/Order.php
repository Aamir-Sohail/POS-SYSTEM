<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\POS\Cart;
use App\Models\POS\Product;

class Order extends Component
{
    public $orders , $products =[], $product_code , $message ='' ,$productIncart;
    public function mount(){
        $this->products = Product::all();
        $this->productIncart = Cart::all();
    }

public function InsertoCart()
{
$countproduct = Product::where('id' , $this->product_code)->first();
if (!$countproduct) {
    return $this->message ='Product not Found';

}
$countCartProduct = Cart::where('product_id',$this->product_code)->count();
if ($countCartProduct == 0) {
    return $this->message = 'Product ' . $countproduct->product_name .' already exists in the carts please add quantity';
}

$add_to_cart = new Cart;
$add_to_cart->product_id =$countproduct->id;
$add_to_cart->product_qty =$countproduct->quantity;
$add_to_cart->product_price =$countproduct->price;
$add_to_cart->user_id =auth()->user()->id;
$add_to_cart->save();

$this->product_code = '';
// dd($countproduct);
return $this->message ="Add the Product Successfully!";
}


    public function render()
    {

        return view('livewire.order');
    }
}
