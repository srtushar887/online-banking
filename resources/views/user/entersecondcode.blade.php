@extends('layouts.user')
@section('user')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">COST OF TRANSFER Code</h4>
            </div>
        </div>
    </div>


    @include('layouts.message')
    @include('layouts.error')
    <div class="row">
        <div class="col-lg-12">

            <div class="card-box">
                <p>The {{$gn->site_name}} TOKEN gives you optimal protection against online hackers . It is the key that grants you full access to carry out 3rd party transfers and payments online via the {{$gn->site_name}} internet banking platform anywhere in the world.</p>
                <br>
                <br>
                <p>                        Note: When conducting any of the transactions you will be required to input a 7-digit code in a defined field below to validate and conclude the transaction. This code has been generated and send to your email now.  Check your email now and put the code to complete your transaction before it expires.
                </p>

                <br>

                <p>The token code has been sent to your email : {{Auth::user()->email}}</p>

                <form class="parsley-examples" action="{{route('ctam.code.check')}}" method="post" enctype="multipart/form-data" novalidate="">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="userName">COT Code<span class="text-danger">*</span></label>
                            <input type="text" name="cot"  parsley-trigger="change" required=""  class="form-control" id="userName">
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
