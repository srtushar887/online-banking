@extends('layouts.admin')
@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Account Details</h4>
            </div>
        </div>
    </div>

    @include('layouts.message')
    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#creetaecraditcard">Create New</button>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Transfer List</h4>

                <div class="table-responsive">

                    <table class="table mb-0" id="users" >
                        <thead>
                        <tr>
                            <th>User Id</th>
                            <th>Account No</th>
                            <th>Balance</th>
                            <th>Account Type</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>

    </div>

    <div class="modal fade" id="creetaecraditcard" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Code</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.card.save')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>selectt user</label>
                            <select class="form-control" name="user_id">
                                <option value="0">select any</option>
                                @foreach($user as $us)
                                <option value="{{$us->id}}">{{$us->first_name}} {{$us->last_name}}</option>
                                    @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Card Number</label>
                            <input type="text" class="form-control" name="card_number">
                        </div>
                        <div class="form-group">
                            <label>CVV</label>
                            <input type="text" class="form-control" name="cvv">
                        </div>
                        <div class="form-group">
                            <label>Expiry Date	</label>
                            <input type="date" class="form-control" name="expiry_date">
                        </div>
                        <div class="form-group">
                            <label>Card Type	</label>
                            <input type="text" class="form-control" name="card_type">
                        </div>
                        <div class="form-group">
                            <label>Withdrawal Limit	</label>
                            <input type="text" class="form-control" name="with_limit">
                        </div>
                        <div class="form-group">
                            <label>status</label>
                            <select class="form-control" name="status">
                                <option value="0">select any</option>
                                <option value="1">Active</option>
                                <option value="2">Deactive</option>
                            </select>
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
@section('js')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {



            $('#users').DataTable({

                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('get.account.details') }}",
                columns: [
                    { data: 'user_id', name: 'user_id',class : 'text-center' },
                    { data: 'account_number', name: 'account_number',class : 'text-center' },
                    { data: 'balance', name: 'balance',class : 'text-center' },
                    { data: 'account_type', name: 'phone',account_type : 'text-center' },
                    {
                        data: 'status',
                        render: function(data) {
                            if(data == 1) {
                                return "<span class='label label-info label-mini text-center'>Active</span>";
                            }else if (data == 2) {
                                return "<span class='label label-danger label-mini text-center'>de-active</span>";
                            }
                            else {
                                return "<span class='label label-danger label-mini text-center'>Reject</span>";
                            }

                        },
                        defaultContent: '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0okZSQTV10ebVN9GwLfr45wbCB9tyUK_oFjmRrP9Uo000e9sU" alt="" img style="width:100%; height:100px">'
                    },
                    // {data: 'action', name: 'action', orderable: false, searchable: false,class : 'text-center'},
                ]
            });
        });
    </script>
@endsection
