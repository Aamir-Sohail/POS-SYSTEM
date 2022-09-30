@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row d-flex">
                <div class="col-md-9">
                    {{-- <div class="row"> --}}
                    <div class="card">
                        <div class="card-header">
                            <h4 style="float: left">Add Products</h4>
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
                                        <th>Brand</th>
                                        <th>Price</th>

                                        <th>Quantity</th>
                                        <th>Alert Stock</th>

                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $product)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->brand }}</td>
                                            <td>
                                                {{ number_format($product->price, 2) }}
                                            </td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>
                                                @if ($product->alert_stock >= $product->quantity)
                                                    <span class="badge badge-danger">
                                                        Low Stock > {{ $product->alert_stock }} </span>
                                                @else
                                                    <span class="badge badge-success">{{ $product->alert_stock }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td>{{ $product->description }} </td>

                                            <td>
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-info btnt-sm" data-toggle="modal"
                                                        data-target="#productedit{{ $product->id }}">
                                                        <i class="fa fa-edit"></i>Edit
                                                    </a>

                                                    {{-- <a href="#" class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#productdelete">
                                                        <i class="fa fa-trash"></i>Delete
                                                    </a> --}}
                                                    <a href="#" class="btn btn-danger btnt-sm" data-toggle="modal"
                                                        data-target="#productdelete{{ $product->id }}">
                                                        <i class="fa fa-trash">
                                                        </i>Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                        {{-- modal for edit product --}}

                                        <div class="modal right fade" id="productedit{{ $product->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLabel">Edit product</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        {{ $product->id }}
                                                    </div>
                                                    <div class="modal-body">

                                                        <form action="{{ route('product.update', $product->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for=" Product Name "> Product Name </label>
                                                                <input type="text" name="product_name" id=""
                                                                    class="form-control"
                                                                    value="{{ $product->product_name }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="Brand"> Brand </label>
                                                                <input type="text" name="brand" id=""
                                                                    class="form-control" value="{{ $product->brand }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="price"> Price </label>
                                                                <input type="number" name="price" id=""
                                                                    class="form-control" value="{{ $product->price }}">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="quantity"> Quantity </label>
                                                                <input type="text" name="quantity" id=""
                                                                    class="form-control" value="{{ $product->quantity }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="Stock">Alert Stock </label>
                                                                <input type="number" name="alert_stock" id=""
                                                                    value="{{ $product->alert_stock }}"
                                                                    class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="Description"> Description </label>

                                                                <textarea name="description" id="" cols="30" rows="2" class="form-control">{{ $product->description }}</textarea>
                                                            </div>

                                                            {{-- <div class="form-group">
                                                                <label for="Role"> Role </label>
                                                                <select name="is_admin" id="" class="form-control">
                                                                    <option value="1"
                                                                        @if ($product->is_admin == 1) selected @endif>
                                                                        Admin</option>
                                                                    <option value="2"
                                                                        @if ($product->is_admin == 2) selected @endif>
                                                                        Cashier</option>
                                                                </select>
                                                            </div> --}}

                                                            <div class="modal-footer">
                                                                <button class="btn btn-warning btn btn-block">Update
                                                                    product</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        {{-- modal for Delete product --}}

                                        <div class="modal right fade" id="productdelete{{ $product->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLabel">Delete product</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        {{ $product->id }}
                                                    </div>
                                                    <div class="modal-body">

                                                        <form action="{{ route('product.destroy', $product->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            {{-- aera write something --}}
                                                            <p>
                                                                Are you soure to delete the product {{ $product->name }} ?
                                                            </p>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-primary" data-dismiss="modal">
                                                                    Cancal
                                                                </button>

                                                                <button type="submit" class="btn btn-danger"> Delete
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>

 {{-- the pagination  part --}}
 {{ $products->links() }}
                            </table>


                        </div>
                    </div>
                    {{-- </div> --}}

                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h4> Searche products</h4>
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
