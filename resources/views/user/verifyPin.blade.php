<!doctype html>
<html lang="zxx">

<!-- Mirrored from templates.envytheme.com/luvion/default/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Mar 2020 19:28:16 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap Min CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/bootstrap.min.css">
    <!-- Animate Min CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/animate.min.css">
    <!-- Font Awesome Min CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/fontawesome.min.css">
    <!-- FlatIcon CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/flaticon.css">
    <!-- Magnific Popup Min CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/magnific-popup.min.css">
    <!-- NiceSelect CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/nice-select.css">
    <!-- Slick Min CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/slick.min.css">
    <!-- MeanMenu CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/meanmenu.css">
    <!-- Odometer CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/odometer.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/responsive.css">

    <title>{{$gn->site_name}}</title>

    <link rel="icon" type="image/png" href="{{asset($gn->icon)}}">
</head>

<!-- Preloader -->
<div class="preloader">
    <div class="loader">
        <div class="shadow"></div>
        <div class="box"></div>
    </div>
</div>
<!-- End Preloader -->

<!-- Start Login Area -->
<section class="login-area">
    <div class="row m-0">
        <div class="col-lg-6 col-md-12 p-0">
            <div class="login-image" style="background-image: url({{asset('assets/frontend/')}}/img/login-bg.jpg)">
                <img src="{{asset('assets/frontend/')}}/img/login-bg.jpg" alt="image">
            </div>
        </div>

        <div class="col-lg-6 col-md-12 p-0">
            <div class="login-content">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="login-form">
                            <div class="logo">
                                <a href="{{route('verifypin')}}">
                                    @if (!empty(Auth::user()->profile_image))

                                        <img src="{{asset(Auth::user()->profile_image)}}" alt="user-image" class="rounded-circle">
                                    @else
                                        <img src="https://www.pngitem.com/pimgs/m/22-223968_default-profile-picture-circle-hd-png-download.png" alt="user-image" class="rounded-circle">

                                    @endif
                                </a>
                            </div>

                            <h3>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h3>
                            @include('layouts.message')
                            <form action="{{route('user.pin.verify')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="password" name="pin" id="email" placeholder="Your Pin Code" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Login Area -->

<!-- jQuery Min JS -->
<script src="{{asset('assets/frontend/')}}/js/jquery.min.js"></script>
<!-- Popper Min JS -->
<script src="{{asset('assets/frontend/')}}/js/popper.min.js"></script>
<!-- Bootstrap Min JS -->
<script src="{{asset('assets/frontend/')}}/js/bootstrap.min.js"></script>
<!-- Mean Menu JS -->
<script src="{{asset('assets/frontend/')}}/js/jquery.meanmenu.js"></script>
<!-- NiceSelect Min JS -->
<script src="{{asset('assets/frontend/')}}/js/jquery.nice-select.min.js"></script>
<!-- Slick Min JS -->
<script src="{{asset('assets/frontend/')}}/js/slick.min.js"></script>
<!-- Magnific Popup Min JS -->
<script src="{{asset('assets/frontend/')}}/js/jquery.magnific-popup.min.js"></script>
<!-- Appear Min JS -->
<script src="{{asset('assets/frontend/')}}/js/jquery.appear.min.js"></script>
<!-- Odometer Min JS -->
<script src="{{asset('assets/frontend/')}}/js/odometer.min.js"></script>
<!-- Parallax Min JS -->
<script src="{{asset('assets/frontend/')}}/js/parallax.min.js"></script>
<!-- WOW Min JS -->
<script src="{{asset('assets/frontend/')}}/js/wow.min.js"></script>
<!-- Form Validator Min JS -->
<script src="{{asset('assets/frontend/')}}/js/form-validator.min.js"></script>
<!-- Contact Form Min JS -->
<script src="{{asset('assets/frontend/')}}/js/contact-form-script.js"></script>
<!-- Main JS -->
<script src="{{asset('assets/frontend/')}}/js/main.js"></script>
</body>

<!-- Mirrored from templates.envytheme.com/luvion/default/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Mar 2020 19:28:18 GMT -->
</html>
