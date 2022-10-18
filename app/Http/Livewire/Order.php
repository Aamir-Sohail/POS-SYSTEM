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
    public function render()
    {

        return view('livewire.order');
    }
}
