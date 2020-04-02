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
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Account Details List</h4>

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
