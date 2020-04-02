@extends('layouts.user')
@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection
@section('user')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Summery</h4>
            </div>
        </div>
    </div>


    @include('layouts.message')
    @include('layouts.error')
    <div class="row">
        <div class="col-lg-12">

            <div class="card-box">


                <form class="parsley-examples" action="{{route('check.summery')}}" method="post" enctype="multipart/form-data" novalidate="">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="userName">Form<span class="text-danger">*</span></label>
                            <input type="date" name="form"  parsley-trigger="change" required=""  class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">To<span class="text-danger">*</span></label>
                            <input type="date" name="to"  parsley-trigger="change" required=""  class="form-control" id="userName">
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

    @if (count($user) > 0)


    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Summery List</h4>

                <div class="table-responsive">

                    <table class="table mb-0" id="users" >
                        <thead>
                        <tr>
                            <th>Transaction Date</th>
                            <th>Refrence No#</th>
                            <th>Description</th>
                            <th>Debit</th>
                            <th>Credit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $us)
                        <tr>
                            <th scope="row">{{$us->transfer_date}}</th>
                            <td>#{{$us->ref_no}}</td>
                            <td>{!! $us->description !!}</td>
                            <td>
                                @if ($us->debit_or_credit == 1)
                                    ${{$us->amount}}
                                    @else
                                    $0
                                @endif
                            </td>
                            <td>
                                @if ($us->debit_or_credit == 2)
                                    $0
                                @else
                                    ${{$us->amount}}
                                @endif</td>
                        </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
    @endif
@stop

