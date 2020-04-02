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
                <h4 class="page-title">Users</h4>
            </div>
        </div>
    </div>

    @include('layouts.message')
    <a href="{{route('admin.create.new.user')}}"><button class="btn btn-success btn-sm">Create New User</button></a>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Users List</h4>

                <div class="table-responsive">

                    <table class="table mb-0" id="users" >
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Account Number</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Date</th>
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
    function deleteproduct(id) {
        $('.deleteproduct').val(id);
    }


    $(document).ready(function () {



        $('#users').DataTable({

            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('get.user') }}",
            columns: [
                { data: 'first_name', name: 'first_name',class : 'text-center' },
                { data: 'last_name', name: 'last_name',class : 'text-center' },
                { data: 'account_number', name: 'account_number',class : 'text-center' },
                { data: 'email', name: 'email',class : 'text-center' },
                { data: 'phone', name: 'phone',class : 'text-center' },
                { data: 'dateofbirth', name: 'dateofbirth',class : 'text-center' },
                {
                    data: 'status',
                    render: function(data) {
                        if(data == 1) {
                            return "<span class='label label-info label-mini text-center'>Active</span>";
                        }else if (data == 2) {
                            return "<span class='label label-danger label-mini text-center'>In-Active</span>";
                        }
                        else {
                            return "<span class='label label-danger label-mini text-center'>De-Active</span>";
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
