<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from coderthemes.com/abstack/layouts/green/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Feb 2020 07:42:22 GMT -->
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

</head>

<body class="authentication-bg bg-gradient">

<div class="account-pages mt-5 pt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-pattern">

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <a href="{{route('front')}}">
                                <span><img src="{{asset($gn->logo)}}" alt="" style="height: 44px"></span>
                            </a>
                            <h5 class="text-uppercase text-center font-bold mt-4">Sign In</h5>

                        </div>

                        <form action="{{route('admin.login.submit')}}" method="post">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="emailaddress">Email address</label>
                                <input class="form-control" type="email" name="email" id="emailaddress" required="" placeholder="Enter your email">
                            </div>

                            <div class="form-group mb-3">
{{--                                <a href="pages-recoverpw.html" class="text-muted float-right"><small>Forgot your password?</small></a>--}}

                                <label for="password">Password</label>
                                <input class="form-control" type="password" name="password" required="" id="password" placeholder="Enter your password">
                            </div>


                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-gradient btn-block" type="submit"> Log In </button>
                            </div>

                        </form>



                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->



            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->


<!-- Vendor js -->
<script src="{{asset('assets/admin/')}}/js/vendor.min.js"></script>

<!-- App js -->
<script src="{{asset('assets/admin/')}}/js/app.min.js"></script>

</body>

<!-- Mirrored from coderthemes.com/abstack/layouts/green/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Feb 2020 07:42:22 GMT -->
</html>
