@extends('layouts.user')
@section('user')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Profile</h4>
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
                            <form class="form-horizontal" action="{{route('user.profile.save')}}" method="post" role="form">
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
                                    <label class="col-2 col-form-label">Phone Number

                                    </label>
                                    <div class="col-10">
                                        <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Address
                                    </label>
                                    <div class="col-10">
                                        <textarea type="text" name="address" class="form-control">{!! Auth::user()->address !!}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">City
                                    </label>
                                    <div class="col-10">
                                        <input type="text" value="{{Auth::user()->city}}" name="city" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">State
                                    </label>
                                    <div class="col-10">
                                        <input type="text" value="{{Auth::user()->state}}" name="state" class="form-control">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Zip Code

                                    </label>
                                    <div class="col-10">
                                        <input type="text" value="{{Auth::user()->zip}}" name="zip" class="form-control">
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
