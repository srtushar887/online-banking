@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">User Name : {{$user->first_name}} {{$user->last_name}}</h4>
            </div>
        </div>
    </div>
    @include('layouts.message')
    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#changepass">Change Password</button>
    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#accountaction">Account Action</button>
    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addbalnce">Add Balance</button>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <div class="table-responsive">

                    <table class="table mb-0">

                        <tbody>
                        <tr>
                            <th scope="row">UserID</th>
                            <td>{{$user->user_id}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Balance</th>
                            <td>${{number_format($user->balance,2)}}</td>
                        </tr>
                        <tr>
                            <th scope="row">First Name	</th>
                            <td>{{$user->first_name}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Last Name	</th>
                            <td>{{$user->last_name}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Phone Number	</th>
                            <td>{{$user->phone}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Profile Image	</th>
                            <td><img src="{{asset($user->profile_image)}}" style="height: 100px;width: 100px"></td>
                        </tr>
                        <tr>
                            <th scope="row">Gender</th>
                            <td>{{$user->gender}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Address</th>
                            <td>{{$user->address}}</td>
                        </tr>
                        <tr>
                            <th scope="row">City Name	</th>
                            <td>{{$user->city}}</td>
                        </tr>
                        <tr>
                            <th scope="row">State</th>
                            <td>{{$user->state}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Zip Code	</th>
                            <td>{{$user->zip}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Account Type	</th>
                            <td>{{$user->account_type}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Account Number	</th>
                            <td>{{$user->account_number}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Account Password	</th>
                            <td>{{$user->show_pass}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Account Pin	</th>
                            <td>{{$user->account_pin}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Status</th>
                            <td>{{$user->status}}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>


    <div class="modal fade" id="changepass" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.user.pass.change')}}" method="post">
                    @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Enter Password</label>
                        <input type="password" class="form-control" name="password">
                        <input type="hidden" value="{{$user->id}}" class="form-control" name="user_id">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="accountaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.user.account.action')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>select action</label>
                            <select class="form-control" name="action">
                                <option value="0">select any</option>
                                <option value="1">Active</option>
                                <option value="2">InActive</option>
                                <option value="3">Delete</option>
                            </select>
                            <input type="hidden" value="{{$user->id}}" class="form-control" name="user_id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addbalnce" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.user.add.balance')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Add Balance</label>
                            <input type="number" class="form-control" name="balance">
                            <input type="hidden" value="{{$user->id}}" class="form-control" name="user_id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@stop
