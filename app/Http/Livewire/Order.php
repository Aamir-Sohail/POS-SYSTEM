<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\POS\Product;

class Order extends Component
{
    public $orders , $products =[], $product_code;
    public function mount(){
        $this->products = Product::all();
    }

public function InsertoCart()
{
$countproduct = Product::where('id',$this->product_code)->get();
dd($countproduct);
}


    public function render()
    {

        return view('livewire.order');
    }
}
