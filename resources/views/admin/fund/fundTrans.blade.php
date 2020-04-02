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
                <h4 class="page-title">Fund Transfer</h4>
            </div>
        </div>
    </div>

    @include('layouts.message')
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Transfer List</h4>

                <div class="table-responsive">

                    <table class="table mb-0" id="users" >
                        <thead>
                        <tr>
                            <th>User Id</th>
                            <th>User Email</th>
                            <th>Amount</th>
                            <th>Transfer Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
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
                "ajax": "{{ route('get.trans') }}",
                columns: [
                    { data: 'user.user_id', name: 'user.user_id',class : 'text-center' },
                    { data: 'user.email', name: 'user.email',class : 'text-center' },
                    { data: 'amount', name: 'phone',amount : 'text-center' },
                    {
                        data: 'transfer_type',
                        render: function(data) {
                            if(data == 1) {
                                return "<span class='label label-info label-mini text-center'>Local</span>";
                            }else if (data == 2) {
                                return "<span class='label label-danger label-mini text-center'>Internatonal</span>";
                            }
                            else {
                                return "<span class='label label-danger label-mini text-center'>De-Active</span>";
                            }

                        },
                        defaultContent: '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0okZSQTV10ebVN9GwLfr45wbCB9tyUK_oFjmRrP9Uo000e9sU" alt="" img style="width:100%; height:100px">'
                    },
                    {
                        data: 'status',
                        render: function(data) {
                            if(data == 1) {
                                return "<span class='label label-info label-mini text-center'>Pending</span>";
                            }else if (data == 2) {
                                return "<span class='label label-danger label-mini text-center'>Approved</span>";
                            }
                            else {
                                return "<span class='label label-danger label-mini text-center'>Reject</span>";
                            }

                        },
                        defaultContent: '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0okZSQTV10ebVN9GwLfr45wbCB9tyUK_oFjmRrP9Uo000e9sU" alt="" img style="width:100%; height:100px">'
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false,class : 'text-center'},
                ]
            });
        });
    </script>
@endsection
