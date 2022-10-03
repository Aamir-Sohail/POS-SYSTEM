<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use App\Models\POS\Order;
use App\Models\POS\Order_details;
use App\Models\POS\Product;
use App\Models\POS\Transcation;
use id;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        // dd($products); //ok
        $orders = Order::all();
        return view('orders.index', compact('products', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        DB::transaction(function () use ($request) {
            // orders Model...
            $orders = new Order;
            $orders->name = $request->customers_name;
            $orders->phone = $request->phone;
            $orders->save();
            $orders->id = $orders->id;
// orders details modell....
            for ($product_id = 0; $product_id < count($request->$product_id); $product_id++) {
                $orders_details = new Order_details();
                // $orders_details->order_id = $request->order_id;
                $orders_details->order_id = $order_id;
                $orders_details->product_id = $request->product_id[$product_id];
                $orders_details->qauntity = $request->qauntity[$product_id];
                $orders_details->unitprice = $request->unitprice[$product_id];
                $orders_details->amount = $request->amount[$product_id];
                $orders_details->discount = $request->discount[$product_id];
                $orders_details->save();
            }

// Transacation model....
            $transcation = new Transcation();
// $orders_details->order_id = $request->order_id;
            $transcation->order_id = $order_id;
            $transcation->user_id = auth()->user()->id;
            $transcation->balance = $request->balance;
            $transcation->paid_amount = $request->paid_amount;
            $transcation->payment_methode = $request->payment_methode;
            $transcation->transac_amount = $orders_details->amount;
            $transcation->transac_date = date('Y-m-d');
            $transcation->save();

     // last order history...
            $product =Product::all();
      
            $orders_details =  Order_details::where('order_id',$order_id)->get();
            $orderdBy = order::where('id',$order_id)->get();
        });
   
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
