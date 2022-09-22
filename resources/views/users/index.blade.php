@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="row d-flex">
                <div class="col-md-9">
                    {{-- <div class="row"> --}}
                    <div class="card">
                        <div class="card-header">
                            <h4 style="float: left">Add User</h4>
                            <a href="#" style="float: right" class="btn btn-dark" data-toggle="modal"
                                data-target="#adduser">
                                <i class="fa fa-plus"></i>Add New Users</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-left">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    {{-- </div> --}}

                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h4> Searche Users</h4>
                        </div>
                        <div class="card-body">

                            ......
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <div class="modal right fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Add User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="Name"> Name </label>
                            <input type="text" name="name" id="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="Email"> Email </label>
                            <input type="email" name="email" id="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="Password"> Password </label>
                            <input type="password" name="password" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Confirm Password"> Confirm Password </label>
                            <input type="password" name="c_password" id="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="Phone"> Phone </label>
                            <input type="text" name="phone" id="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="Role"> Role </label>
                            <select name="is_admin" id="" class="form-control">
                                <option value="1">Admin</option>
                                <option value="2">Cashier</option>
                            </select>
                        </div>
<div class="modal-footer">
 <button class="btn btn-primary btn btn-block">Save User</button>
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
