@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Create User</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">

            <div class="card-box">

                <form class="parsley-examples" action="{{route('create.user.save')}}" method="post" enctype="multipart/form-data" novalidate="">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="userName">UserID<span class="text-danger">*</span></label>
                            <input type="text" name="user_id" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Balance<span class="text-danger">*</span></label>
                            <input type="text" name="balance" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">First Name<span class="text-danger">*</span></label>
                            <input type="text" name="first_name" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Last Name<span class="text-danger">*</span></label>
                            <input type="text" name="last_name" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Password<span class="text-danger">*</span></label>
                            <input type="text" name="password" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Email ID<span class="text-danger">*</span></label>
                            <input type="text" name="email" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Phone Number<span class="text-danger">*</span></label>
                            <input type="text" name="phone" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Date of Birth<span class="text-danger">*</span></label>
                            <input type="date" name="dateofbirth" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Profile Image<span class="text-danger">*</span></label>
                            <input type="file" name="profile_image" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Gender<span class="text-danger">*</span></label>
                            <select class="form-control" name="gender">
                                <option value="0">select any</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Address<span class="text-danger">*</span></label>
                            <input type="text" name="address" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">City Name<span class="text-danger">*</span></label>
                            <input type="text" name="city" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">State<span class="text-danger">*</span></label>
                            <input type="text" name="state" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Zip Code<span class="text-danger">*</span></label>
                            <input type="text" name="zip" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Account Type<span class="text-danger">*</span></label>
                            <select class="form-control" name="account_type">
                                <option value="0">Select Account Type</option>
                                <option value="Checking Account">Checking Account</option>
                                <option value="Saving Account">Saving Account</option>
                                <option value="Transit and Confidential">Transit and Confidential</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Account Pin<span class="text-danger">*</span></label>
                            <input type="text" name="account_pin" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                    </div>

                    <div class="form-group text-left mb-0">
                        <button class="btn btn-gradient waves-effect waves-light" type="submit">
                            Save
                        </button>
                    </div>

                </form>
            </div> <!-- end card-box -->
        </div>
        <!-- end col -->


    </div>
@stop
