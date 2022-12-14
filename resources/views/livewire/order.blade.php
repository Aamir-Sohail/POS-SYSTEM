@section('content')
    <div class="col-md-12">
        <div class="row d-flex">
            <div class="col-md-8">
                {{-- <div class="row"> --}}
                <div class="card">




                    <div class="card-header">
                        <h4 style="float: left">Order Products</h4>
                        <a href="#" style="float: right" class="btn btn-dark" data-toggle="modal"
                            data-target="#addproduct">
                            <i class="fa fa-plus"></i>Add New Products</a>
                    </div>
                    {{--  <form action="{{ route('orders.store') }}" method="post">  --}}
                        @csrf
                    <div class="card-body">


                        {{--  new   --}}
                        <div class="my-2">
                            <form wire:submit.prevent="InsertoCart">
                                {{ $prodoct_code  }}
                                <input type="text" name="" wire:model ="prodoct_code" id=""
                                    class="form-control" placeholder="Enter Product Code">
                            </form>
                        </div>
                        {{ $productIncart }}
                        <table class="table table-bordered table-left">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Discount (%)</th>
                                    <th>Total</th>
                                    <th>
                                        <a href="#" class="btn btn-success add_more rounded-circle">
                                            <i class="fa fa-plus">
                                            </i>
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="addMoreProduct">
                                <tr>
                                    {{-- @foreach ($products as $product) --}}
                                    <td>1</td>
                                    {{-- @endforeach --}}

                                    <td>

                                        <select name="product_id[]" id="product_id" class="form-control product_id">
                                            <option value="">Select Items</option>
                                            @foreach ($products as $product)
                                                <option data-price="{{ $product->price }}" value="{{ $product->id }}">
                                                    {{ $product->product_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>


                                    <td> <input type="number" name="quantity[]" class="form-control quantity">
                                    </td>
                                    <td> <input type="number" name="price[]" class="form-control price"> </td>
                                    <td> <input type="number" name="discount[]" class="form-control discount">
                                    </td>
                                    <td> <input type="number" name="total_amount[]" class="form-control total_amount">
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-danger sm delete rounded-circle"><i
                                                class="fa fa-times-circle"></i></a>
                                    </td>
                                </tr>
                            </tbody>


                        </table>


                    </div>

                </div>
                {{-- </div> --}}

            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4> Total <b class="total">0.00</b></h4>
                    </div>
                    <div class="card-body">
                        {{-- button group for the receipt --}}
                        <div class="btn-group">
                            <button type="button" onclick="PrintReceiptContent('print')" class="bt btn-dark">
                                <i class="fa fa-print "></i> Print
                            </button>

                            <button type="button" onclick="PrintReceiptContent('print')" class="bt btn-primary">
                                <i class="fa fa-print "></i> History
                            </button>

                            <button type="button" onclick="PrintReceiptContent('print')" class="bt btn-danger">
                                <i class="fa fa-print "></i> Reports
                            </button>
                        </div>
                        <div class="panel">
                            <div class="row">
                                <table class="table table-striped">
                                    <tr>
                                        <td>
                                            <label for="my-input">Customer Name</label>

                                            <input type="text" name="customer_name" id="" class="form-control">

                                        </td>
                                        <td>
                                            <label for="my-input">Customer Phone</label>

                                            <input type="number" name="customer_phone" id="" class="form-control">

                                        </td>
                                    </tr>
                                </table>
                                <td>
                                    Payment Method <br>

                                    <span class="radio-item">
                                        <input type="radio" name="payment_methode" id="payment_method" class="true"
                                            value="Cash" checked="checked">
                                        <label for="payment_method"><i class="fa fa-money-bill fa-lg text-success"></i>Cash
                                        </label>
                                    </span>

                                    <span class="radio-item">
                                        <input type="radio" name="payment_methode" id="payment_method" class="true"
                                            value="bank transfer" checked="checked">
                                        <label for="payment_method"><i class="fa fa-university fa-lg text-danger"></i>Bank
                                            Transfer
                                        </label>
                                    </span>

                                    <span class="radio-item">
                                        <input type="radio" name="payment_methode" id="payment_method" class="true"
                                            value="credit Card" checked="checked">
                                        <label for="payment_method"><i
                                                class="fa fa-credit-card fa-lg text-info"></i>Credit
                                            Card
                                        </label>
                                    </span>

                                </td><br>
                                <td>
                                    Payment
                                    <input type="number" name="paid_amount" id="paid_amount" class="form-control ">
                                </td>


                                <td>
                                    Returning Change
                                    <input type="number" readonly name="balance" id="balance" class="form-control ">
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-lg btn-block mt-3">
                                        Save
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-danger btn-lg btn-block mt-3">
                                        Calculator
                                    </button>
                                </td>

                                <div class="text-center" style="text-align: center !important">
                                    <a href="" class="text-danger text-center"><i
                                            class="fa fa-sign-out-alt"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            </form>

        </div>

    </div>



    {{-- modal for add new product --}}
    <div class="modal right fade" id="addproduct" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Add product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('product.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="Product Name">Product Name </label>
                            <input type="text" name="product_name" id="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="Role"> Brand </label>
                            <input type="text" name="brand" class="form-control" id="">
                        </div>

                        <div class="form-group">
                            <label for="Price"> Price </label>
                            <input type="number" name="price" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Quantity"> Quantity </label>
                            <input type="number" name="quantity" id="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="Stock">Alert Stock </label>
                            <input type="number" name="alert_stock" id="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="Description"> Description </label>

                            <textarea name="description" id="" cols="30" rows="2" class="form-control"></textarea>
                        </div>



                        <div class="modal-footer">
                            <button class="btn btn-primary btn btn-block">Save product</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
