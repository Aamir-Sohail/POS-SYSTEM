@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row d-flex">
                <div class="col-md-9">
                    {{-- <div class="row"> --}}
                    <div class="card">
                        <div class="card-header">
                            <h4 style="float: left">Order Products</h4>
                            <a href="#" style="float: right" class="btn btn-dark" data-toggle="modal"
                                data-target="#addproduct">
                                <i class="fa fa-plus"></i>Add New Products</a>
                        </div>
                        <div class="card-body">
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
                                            <a href="#" class="btn btn-success add_more">
                                                <i class="fa fa-plus">
                                                </i>
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="addMoreProduct">
                                    <tr>
                                        <td>1</td>
                                        <td>

                                            <select name="product_id[]" id="product_id" class="form-control product_id">
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">
                                                        {{ $product->product_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="quantity[]" id="quantity" class="form-control">
                                        </td>

                                        <td>
                                            <input type="number" name="price[]" id="price" class="form-control">
                                        </td>

                                        <td>
                                            <input type="number" name="discount[]" id="discount" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" name="total_amount[]" id="total" class="form-control">
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-danger "><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                </tbody>


                            </table>


                        </div>
                    </div>
                    {{-- </div> --}}

                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h4> Total 0.00</h4>
                        </div>
                        <div class="card-body">

                            ......
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    {{-- modal for add new product --}}
    <div class="modal right fade" id="addproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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




    <style>
        .modal.right .modal-dialog {
            /* incomplet v4 t16.9 */
            /* position: absolute; */
            top: 0;
            right: 0;
            margin-right: 19vh;
        }

        .modal.fade:not(.in).right .modal-dialog {
            -webkit-transform: translate3d(25%, 0, 0);
            transform: translate3d(25%, 0, 0, );
        }
    </style>
@endsection


@section('script')
    <script>
        // $(document).ready(function(){
        //     alert(1);
        $('.add_more').on('click', function() {
            var product = $('.product_id').html();
            var numberofrow = ($('.addMoreProduct tr').length - 0) + 1;
            var tr = '<tr> <td class="no">' + numberofrow + '</td>' +
                '<td><select class="form-control product_id" name ="product_id[]">' + product +
                '</select></td>' +
                ' <td> <input type ="number" name="quantity[]" class="form-control"> </td>' +
                ' <td> <input type ="number" name="price[]" class="form-control"> </td>' +
                ' <td> <input type ="number" name="discount[]" class="form-control"> </td>' +
                ' <td> <input type ="number" name="total_amount[]" class="form-control"> </td>' +
                '<td> <a class="btn btn-danger sm delete rounded-circle"><i class="fa fa-times-circle"></i></a></td></tr>';
            $('.addMoreProduct').append(tr);
        })
// this is used for the delete the row....
        $('.addMoreProduct').delegate('.delete','click',function(){
            $(this).parent().parent().remove();
        })
    </script>

@endsection
