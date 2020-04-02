<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from coderthemes.com/abstack/layouts/green/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Feb 2020 07:38:23 GMT -->
<head>
    <meta charset="utf-8" />
    <title>{{$gn->site_name}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset($gn->icon)}}">

    <!-- App css -->
    <link href="{{asset('assets/admin/')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/')}}/css/app.min.css" rel="stylesheet" type="text/css" />
    @yield('css')
</head>

<body>

<!-- Begin page -->
<div id="wrapper">


    <!-- Topbar Start -->
    <div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-right mb-0">


            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">

                    @if (!empty(Auth::user()->profile_image))

                        <img src="{{asset(Auth::user()->profile_image)}}" alt="user-image" class="rounded-circle">
                        @else
                        <img src="https://www.pngitem.com/pimgs/m/22-223968_default-profile-picture-circle-hd-png-download.png" alt="user-image" class="rounded-circle">

                    @endif
                    <span class="ml-1">{{Auth::user()->first_name}} {{Auth::user()->last_name}}<i class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->


                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a  class="dropdown-item notify-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>




        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="{{route('home')}}" class="logo text-center">
                        <span class="logo-lg">
<img src="{{asset($gn->logo)}}" style="height: 58px;width: 227px;">
{{--                            <img src="{{asset($gn->logo)}}" style="width: 240px;height: 94px" alt="" height="16">--}}
{{--                           <span class="logo-lg-text-light">{{$gn->site_name}}</span>--}}
                        </span>
                <span class="logo-sm">

                        </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>



        </ul>
    </div>
    <!-- end Topbar -->


    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

        <div class="slimscroll-menu">

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">

                    <li>
                        <a href="{{route('home')}}">
                            <i class="fe-airplay"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('user.local.transfer')}}">
                            <i class="fe-airplay"></i>
                            <span> Local Transfer </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('user.international.transfer')}}">
                            <i class="fe-airplay"></i>
                            <span> International Transfer </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('user.transaction.history')}}">
                            <i class="fe-airplay"></i>
                            <span> Account Summery </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('user.creditcard')}}">
                            <i class="fe-airplay"></i>
                            <span> Credit Card</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('user.profile')}}">
                            <i class="fe-airplay"></i>
                            <span> Profile </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('user.chang.pin')}}">
                            <i class="fe-airplay"></i>
                            <span> Change Pin </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('user.change.password')}}">
                            <i class="fe-airplay"></i>
                            <span> Change Password </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            <span> Logout </span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>




                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                @yield('user')


            </div> <!-- end container-fluid -->

        </div> <!-- end content -->



        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                            $date = \Carbon\Carbon::now()->format('Y');
                        ?>
                        {{$date}} &copy; {{$gn->site_name}}. All Rights Reserved
                    </div>

                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="{{asset('assets/admin/')}}/js/vendor.min.js"></script>

<!-- Chart JS -->
<script src="{{asset('assets/admin/')}}/libs/chart-js/Chart.bundle.min.js"></script>

<!-- Init js -->
<script src="{{asset('assets/admin/')}}/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="{{asset('assets/admin/')}}/js/app.min.js"></script>
@yield('js')
</body>

<!-- Mirrored from coderthemes.com/abstack/layouts/green/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Feb 2020 07:39:42 GMT -->
</html>
