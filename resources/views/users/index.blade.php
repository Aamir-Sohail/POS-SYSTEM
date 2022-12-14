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
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if ($user->is_admin == 1)
                                                    Admin
                                                @else
                                                    Cashiers
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-info btnt-sm" data-toggle="modal"
                                                        data-target="#useredit{{ $user->id }}">
                                                        <i class="fa fa-edit"></i>Edit
                                                    </a>

                                                    {{-- <a href="#" class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#userdelete">
                                                        <i class="fa fa-trash"></i>Delete
                                                    </a> --}}
                                                    <a href="#" class="btn btn-danger btnt-sm" data-toggle="modal"
                                                    data-target="#userdelete{{ $user->id }}">
                                                        <i class="fa fa-trash">
                                                            </i>Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                        {{-- modal for edit user --}}

                                        <div class="modal right fade" id="useredit{{ $user->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLabel">Edit User</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        {{ $user->id }}
                                                    </div>
                                                    <div class="modal-body">

                                                        <form action="{{ route('users.update', $user->id) }}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="Name"> Name </label>
                                                                <input type="text" name="name" id=""
                                                                    class="form-control" value="{{ $user->name }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="Email"> Email </label>
                                                                <input type="email" name="email" id=""
                                                                    class="form-control" value="{{ $user->email }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="Password"> Password </label>
                                                                <input type="password" name="password" id=""
                                                                    class="form-control" value="{{ $user->password }}">
                                                            </div>
                                                            {{-- <div class="form-group">
                                                                <label for="Confirm Password"> Confirm Password </label>
                                                                <input type="password" name="c_password" id=""
                                                                    class="form-control" value="{{ $user->c_password }}">
                                                            </div> --}}

                                                            <div class="form-group">
                                                                <label for="Phone"> Phone </label>
                                                                <input type="text" name="phone" id=""
                                                                    class="form-control" value="{{ $user->phone }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="Role"> Role </label>
                                                                <select name="is_admin" id="" class="form-control">
                                                                    <option value="1" @if ($user->is_admin == 1)
                                                                        selected
                                                                    @endif>Admin</option>
                                                                    <option value="2" @if ($user->is_admin == 2)
                                                                        selected @endif>Cashier</option>
                                                                </select>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-warning btn btn-block">Update
                                                                    User</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                           {{-- modal for Delete user --}}

                                           <div class="modal right fade" id="userdelete{{ $user->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLabel">Delete User</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        {{ $user->id }}
                                                    </div>
                                                    <div class="modal-body">

                                                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            {{-- aera write something --}}
                                                            <p>
                                                                Are you soure to delete the user {{ $user->name}} ?
                                                            </p>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-default" data-dismiss="modal"> Cancal
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

    {{-- modal for add new user --}}
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
