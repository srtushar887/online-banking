@extends('layouts.user')
@section('user')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Enter Code</h4>
            </div>
        </div>
    </div>


    @include('layouts.message')
    @include('layouts.error')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><strong>View Credit Card Details</strong></h5>
                    <p class="card-text">You currently do not have ATM Credit Card connected to your account. Please contact customer care to apply for your Atm card.

                    </p>
                    <br>
                    <br>
                    <p>If you have any query, please Contact Us .

                    </p>
                </div>
            </div> <!-- end card-box -->
        </div>
        <!-- end col -->

    </div>
@stop
