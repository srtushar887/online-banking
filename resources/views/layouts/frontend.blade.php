<!doctype html>
<html lang=zxx>

<head>
    <meta charset=utf-8>
    <meta name=viewport content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel=stylesheet href="{{asset('assets/frontend/')}}/css/bootstrap.min.css">
    <link rel=stylesheet href="{{asset('assets/frontend/')}}/css/animate.min.css">
    <link rel=stylesheet href="{{asset('assets/frontend/')}}/css/fontawesome.min.css">
    <link rel=stylesheet href="{{asset('assets/frontend/')}}/css/flaticon.css">
    <link rel=stylesheet href="{{asset('assets/frontend/')}}/css/magnific-popup.min.css">
    <link rel=stylesheet href="{{asset('assets/frontend/')}}/css/nice-select.css">
    <link rel=stylesheet href="{{asset('assets/frontend/')}}/css/slick.min.css">
    <link rel=stylesheet href="{{asset('assets/frontend/')}}/css/meanmenu.css">
    <link rel=stylesheet href="{{asset('assets/frontend/')}}/css/odometer.min.css">
    <link rel=stylesheet href="{{asset('assets/frontend/')}}/css/style.css">
    <link rel=stylesheet href="{{asset('assets/frontend/')}}/css/responsive.css">
    <title>{{$gn->site_name}}</title>
    <link rel=icon type="image/png" href="{{asset($gn->icon)}}"> </head>
<div class=preloader>
    <div class=loader>
        <div class=shadow></div>
        <div class=box></div>
    </div>
</div>
<div class=navbar-area>
    <div class=luvion-responsive-nav>
        <div class=container>
            <div class=luvion-responsive-menu>
                <div class=logo>
                    <a href=index.html> <img src="{{asset($gn->logo)}}" alt=logo> <img src="{{asset($gn->logo)}}" alt=logo> </a>
                </div>
            </div>
        </div>
    </div>
    <div class=luvion-nav>
        <div class=container>
            <nav class="navbar navbar-expand-md navbar-light">
                <a class=navbar-brand href=index.html> <img src="{{asset($gn->logo)}}" style="height: 55px;width: 300px;" alt=logo> <img src="{{asset($gn->logo)}}" style="height: 55px;width: 200px;" alt=logo> </a>
                <div class="collapse navbar-collapse mean-menu" id=navbarSupportedContent>
                    <ul class=navbar-nav>
                        <li class=nav-item><a href="{{route('front')}}" class=nav-link>Home</a></li>
                        <li class=nav-item><a href="{{route('about.us')}}" class=nav-link>About US</a></li>
                        <li class=nav-item><a href="{{route('contact.us')}}" class=nav-link>Contact</a></li>
                    </ul>
                    @guest
                    <div class=others-options> <a href="{{route('login')}}" class=login-btn><i class=flaticon-user></i> Log In</a> </div>
                    @else
                        <div class=others-options> <a href="{{route('home')}}" class=login-btn><i class=flaticon-user></i> Dashboard</a> </div>
                    @endguest
                </div>
            </nav>
        </div>
    </div>
</div>
@yield('front')

<footer class=footer-area>
    <div class=container>
        <div class=row>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class=single-footer-widget>
                    <div class=logo>
                        <a href="#"><img src="{{asset($gn->logo)}}" alt=logo></a>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-footer-widget pl-5">
                    <h3>Company</h3>
                    <ul class=list>
                        <li><a href="{{route('about.us')}}">About Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class=single-footer-widget>
                    <h3>Support</h3>
                    <ul class=list>
                        <li><a href="{{route('privacy')}}">Privacy Policy</a></li>
                        <li><a href="{{route('contact.us')}}">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class=single-footer-widget>
                    <h3>Address</h3>
                    <ul class=footer-contact-info>
                        <li><span>Location:</span> {!! $gn->address !!}</li>
                        <li><span>Email:</span> <a href="#">{{$gn->site_email}}</a></li>
                        <li><span>Phone:</span> <a href="#">+ {{$gn->site_phone}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class=copyright-area>
            <?php
                $date = \Carbon\Carbon::now()->format('Y');
            ?>
            <p>Copyright @ {{$date}} <a href="https://garantitrustbnk.com/">{{$gn->site_name}}</a>. All rights reserved</p>
        </div>
    </div>
    <div class=map-image><img src="{{asset('assets/frontend/')}}/img/map.png" alt=map></div>
</footer>
<div class=go-top><i class="fas fa-arrow-up"></i></div>
<script src="{{asset('assets/frontend/')}}/js/jquery.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/popper.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/bootstrap.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/jquery.meanmenu.js"></script>
<script src="{{asset('assets/frontend/')}}/js/jquery.nice-select.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/slick.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/jquery.magnific-popup.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/jquery.appear.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/odometer.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/parallax.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/wow.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/form-validator.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/contact-form-script.js"></script>
<script src="{{asset('assets/frontend/')}}/js/main.js"></script>
</body>

</html>
