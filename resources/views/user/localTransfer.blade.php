@extends('layouts.user')
@section('user')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Local Transfer</h4>
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
                            <form class="form-horizontal" action="{{route('user.local.transfer.save')}}" method="post" role="form">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Receiver's Bank Name</label>
                                    <label class="col-2 col-form-label">{{$gn->site_name}}</label>

                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Amount to Transfer
                                    </label>
                                    <div class="col-10">
                                        <input type="text" name="amount" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Receiver's Account Number
                                    </label>
                                    <div class="col-10">
                                        <input type="text" name="reciver_account_number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Swift Code</label>
                                    <label class="col-2 col-form-label">{{$gn->swift_code}}</label>

                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Receiver's Name
                                    </label>
                                    <div class="col-10">
                                        <input type="text" name="receiver_name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Sender's Account Number
                                    </label>
                                    <div class="col-10">
                                        <input type="text" name="sender_account_nubmber" class="form-control">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Date of Transfer
                                    </label>
                                    <label class="col-2 col-form-label">{{\Carbon\Carbon::now('Asia/Dhaka')->format('Y-m-d')}}
                                    </label>

                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Transfer Description
                                    </label>
                                    <div class="col-10">
                                        <textarea type="text" name="description" class="form-control" value="Some text value..."></textarea>
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
