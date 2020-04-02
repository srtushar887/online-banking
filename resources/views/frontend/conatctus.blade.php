@extends('layouts.frontend')
@section('front')
    <div class="page-title-area item-bg2 jarallax" data-jarallax="{&quot;speed&quot;: 0.3}" data-jarallax-original-styles="null">
        <div class="container">
            <div class="page-title-content">
                <h2>Contact</h2>
                <p>If you have an idea, we would love to hear about it.</p>
            </div>
        </div>
        <div id="jarallax-container-0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -100;"><div style="background-position: 50% 50%; background-size: 100%; background-repeat: no-repeat; background-image: url(); position: fixed; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none;"></div></div></div>

    <section class="contact-area ptb-70">
        <div class="container">
            <div class="section-title">
                <h2>Drop us message for any query</h2>
                <div class="bar"></div>
{{--                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>--}}
            </div>

            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div class="contact-info">
                        <ul>
                            <li>
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <span>Address</span>
                                {!! $gn->address !!}
                            </li>

                            <li>
                                <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <span>Email</span>
                                <a href="#">{{$gn->site_email}}</a>
                            </li>

                            <li>
                                <div class="icon">
                                    <i class="fas fa-phone-volume"></i>
                                </div>
                                <span>Phone</span>
                                <a href="#">+{{$gn->site_phone}}</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-7 col-md-12">
                    @include('layouts.message')
                    @include('layouts.error')
                    <div class="contact-form">
                        <form  action="{{route('contact.send')}}" method="post" novalidate="true">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name"  class="form-control" required="" data-error="Please enter your name" placeholder="Name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" required="" data-error="Please enter your email" placeholder="Email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="phone_number" required="" data-error="Please enter your number" class="form-control" placeholder="Phone">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="msg_subject"  class="form-control" required="" data-error="Please enter your subject" placeholder="Subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control"  cols="30" rows="6" required="" data-error="Write your message" placeholder="Your Message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="btn btn-primary disabled" style="pointer-events: all; cursor: pointer;">Send Message</button>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-map"><img src="{{asset('assets/frontend/')}}/img/bg-map.png" alt="image"></div>
    </section>

@stop
