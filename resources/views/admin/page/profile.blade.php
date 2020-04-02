@extends('layouts.admin')
@section('admin')
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
                            <form class="form-horizontal" action="{{route('admin.profile.save')}}" method="post" role="form">
                                @csrf


                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Name

                                    </label>
                                    <div class="col-10">
                                        <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Email
                                    </label>
                                    <div class="col-10">
                                        <input type="text" value="{{Auth::user()->email}}" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Password
                                    </label>
                                    <div class="col-10">
                                        <input type="password" name="password" class="form-control">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Phone

                                    </label>
                                    <div class="col-10">
                                        <input type="text" value="{{Auth::user()->phone}}" name="phone" class="form-control">
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
