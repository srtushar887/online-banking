@extends('layouts.user')
@section('user')
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

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <div class="table-responsive">

                    @if ($user->transfer_type == 1)
                    <table class="table mb-0">

                        <tbody>
                        <tr>
                            <th scope="row">Amount</th>
                            <td>${{number_format($user->amount,2)}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Receiver's Account Number
                            </th>
                            <td>{{$user->reciver_account_number}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Receiver's Name
                            </th>
                            <td>{{$user->receiver_name}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Sender's Account Number
                            </th>
                            <td>{{$user->sender_account_nubmber}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Date of Transfer
                            </th>
                            <td>{{$user->transfer_date}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Transfer Description
                            </th>
                            <td>{{$user->description}}</td>
                        </tr>

                        </tbody>
                    </table>
                        @else
                        <table class="table mb-0">

                            <tbody>
                            <tr>
                                <th scope="row">Receiver's Bank Name

                                </th>
                                <td>{{$user->receiver_bank_name}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Receiver's Account Number
                                </th>
                                <td>{{$user->reciver_account_number}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Receiver's Name

                                </th>
                                <td>{{$user->receiver_name}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Swift Code
                                </th>
                                <td>{{$user->swift_code}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Country
                                </th>
                                <td>{{$user->country}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Amount
                                </th>
                                <td>{{$user->amount}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Sender's Account Number

                                </th>
                                <td>{{$user->sender_account_nubmber}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Date of Transfer


                                </th>
                                <td>{{$user->transfer_date}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Transfer Description

                                </th>
                                <td>{{$user->description}}</td>
                            </tr>

                            </tbody>
                        </table>
                        @endif
                </div>
            </div>

        </div>

    </div>



    <div class="modal fade" id="gencode" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Code</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.send.code')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>COT Code</label>
                            <input type="text"  class="form-control" name="cot">
                            <input type="hidden" value="{{$user->id}}" class="form-control" name="trans_id">
                        </div>
                        <div class="form-group">
                            <label>TAX Code</label>
                            <input type="text" class="form-control" name="tax">
                        </div>
                        <div class="form-group">
                            <label>ATC Code</label>
                            <input type="text" class="form-control" name="atc">
                        </div>
                        <div class="form-group">
                            <label>MFC Code</label>
                            <input type="text" class="form-control" name="mfc">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send To User Mail</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@stop
