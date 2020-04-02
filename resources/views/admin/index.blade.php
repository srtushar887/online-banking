@extends('layouts.admin')
@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">

                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-4 col-xl-4">
            <div class="card-box tilebox-one">
                <h5 class="text-muted text-uppercase mb-3 mt-0">Total User</h5>
                <h3 class="mb-3" data-plugin="counterup">{{$total_user}}</h3>
            </div>
        </div>

        <div class="col-md-4 col-xl-4">
            <div class="card-box tilebox-one">
                <h5 class="text-muted text-uppercase mb-3 mt-0">Total Local Transfer($)</h5>
                <h3 class="mb-3" data-plugin="counterup">{{$total_local_tarns}}</h3>
            </div>
        </div>
        <div class="col-md-4 col-xl-4">
            <div class="card-box tilebox-one">
                <h5 class="text-muted text-uppercase mb-3 mt-0">Total International Transfer($) </h5>
                <h3 class="mb-3" data-plugin="counterup">{{$total_int_tarns}}</h3>
            </div>
        </div>
    </div>

@stop
