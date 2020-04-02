@extends('layouts.user')
@section('user')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Change PIN</h4>
            </div>
        </div>
    </div>

    @include('layouts.message')
    @include('layouts.error')
    <div class="row">
        <div class="col-12">
            <div class="card-box">

                <div class="row">
                    <div class="col-12">
                        <div>
                            <form class="form-horizontal" action="{{route('user.pin.save')}}" method="post" role="form">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">User Name
                                    </label>
                                    <label class="col-2 col-form-label">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</label>

                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Email ID

                                    </label>
                                    <label class="col-2 col-form-label">{{Auth::user()->email}}</label>

                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Current Account Pin
                                    </label>
                                    <div class="col-10">
                                        <input type="password" name="old_pin"  class="form-control" >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">New Account Pin
                                    </label>
                                    <div class="col-10">
                                        <input type="password"  name="new_pin" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Confirm New Account Pin
                                    </label>
                                    <div class="col-10">
                                        <input type="password"  name="c_new_pin" class="form-control">
                                    </div>

                                </div>



                                <div class="form-group text-left ">
                                    <button class="btn  btn-gradient waves-effect waves-light" type="submit">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- end row -->

            </div> <!-- end card-box -->
        </div><!-- end col -->
    </div>





@stop
