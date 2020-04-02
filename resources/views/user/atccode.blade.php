@extends('layouts.user')
@section('user')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">ATC Code</h4>
            </div>
        </div>
    </div>


    @include('layouts.message')
    @include('layouts.error')
    <div class="row">
        <div class="col-lg-12">

            <div class="card-box">


                <form class="parsley-examples" action="{{route('atc.code.check')}}" method="post" enctype="multipart/form-data" novalidate="">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="userName">ATC Code<span class="text-danger">*</span></label>
                            <input type="text" name="atc"  parsley-trigger="change" required=""  class="form-control" id="userName">
                        </div>

                    </div>
                    <div class="form-group text-left mb-0">
                        <button class="btn btn-gradient waves-effect waves-light" type="submit">
                            Submit
                        </button>
                    </div>
                </form>
            </div> <!-- end card-box -->
        </div>
        <!-- end col -->

    </div>
@stop
