@extends('layouts.frontend')
@section('front')
    <div class="main-banner jarallax" style="background-image: url(https://images.pexels.com/photos/187041/pexels-photo-187041.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940)" >
        <div class=d-table>
            <div class=d-table-cell>
                <div class=container>
                    <div class=main-banner-content>
                       <a href="{{route('contact.us')}}" class="btn btn-primary">Contact Us</a> </div>
                </div>
            </div>
        </div>
    </div>
    <section class=featured-boxes-area>
        <div class=container>
            <div class=featured-boxes-inner>
                <div class="row m-0">
                    <div class="col-lg-3 col-sm-6 col-md-6 p-0">
                        <div class=single-featured-box>
                            <div class="icon color-fb7756"> <i class=flaticon-piggy-bank></i> </div>
                            <h3>Personal Savings</h3>
                            <p>The Accumulating Fund Account enables you to regularly invest in Type B Money Market Fund, Type B Flexi Balanced Fund or Type B Gold Fund.</p></div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-md-6 p-0">
                        <div class=single-featured-box>
                            <div class="icon color-facd60"> <i class=flaticon-data-encryption></i> </div>
                            <h3>Fully Encrypted</h3>
                            <p>For your security, Internet Banking servers use “VeriSign® Extended Validation (EV) SSL”  certificates capable of 128-bit SSL encryption, which enable users to distinguish secure websites from fraudulent websites more easily.</p> </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-md-6 p-0">
                        <div class=single-featured-box>
                            <div class="icon color-1ac0c6"> <i class=flaticon-wallet></i> </div>
                            <h3>Loan Processing</h3>
                            <p>Shopping Loan from partner firms, you have the opportunity to have 3 to 6 months installment and in the other product categories from 3 to 60 months.</p> </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-md-6 p-0">
                        <div class=single-featured-box>
                            <div class=icon> <i class=flaticon-shield></i> </div>
                            <h3>Personal Security</h3>
                            <p>We Ensure that all our clients are Fully secured during their Business online using our platform and services</p> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="services-area ptb-70 bg-f7fafd">
        <div class="container-fluid p-0">
            <div class=overview-box>
                <div class=overview-image>
                    <div class=image> <img src="{{asset('assets/frontend/')}}/img/2.png" alt=image>
                        <div class=circle-img> <img src="{{asset('assets/frontend/')}}/img/circle.png" alt=image> </div>
                    </div>
                </div>
                <div class=overview-content>
                    <div class=content>
                        <h2>Small- to medium-sized businesses</h2>
                        <div class=bar></div>
                        <p>We provide a wide range of services to businesses of all sizes. Aside from business checking and savings accounts, We offer financing options and cash management solutions for small and medium sized businesses</p>

                    </div>
                </div>
            </div>
        </div>
    </section>





    <section class=account-create-area>
        <div class=container>
            <div class=account-create-content>
                <h2>Apply for an account in minutes</h2>
                <p>Get your {{$gn->site_name}} account today!</p><a href="{{route('contact.us')}}" class="btn btn-primary">Get Your {{$gn->site_name}} Account</a> </div>
        </div>
    </section>

@stop
