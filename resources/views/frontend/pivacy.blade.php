@extends('layouts.frontend')
@section('front')
    <div class="page-title-area item-bg1 jarallax" data-jarallax="{&quot;speed&quot;: 0.3}" data-jarallax-original-styles="null">
        <div class="container">
            <div class="page-title-content">
                <h2>About Us</h2>
            </div>
        </div>
        <div id="jarallax-container-0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -100;"><div style="background-position: 50% 50%; background-size: 100%; background-repeat: no-repeat; background-image: url(&quot;file:///home/tusher/websites/luvion/templates.envytheme.com/luvion/default/assets/img/page-title-bg1.jpg&quot;); position: fixed; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none;"></div></div></div>
    <section class="about-area ptb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="about-content">
                        <p>In compliance with its modern banking approach, customer satisfaction and security oriented service philosophy and banking services, {{$gn->site_name}} has adopted and is applying the following basic rules to ensure the privacy of all information given and disclosed by you through the T. {{$gn->site_name}} corporate website  {{$gn->site_name}} and   {{$gn->site_name}} (hereafter to be collectively referred to as the "Website").

                        </p>

                        <br>
                        <p>1. Information shall be entered into our Website only for product/service applications and for information updating purposes.</p>
                        <br>
                        <p>2. For the sake of security of all information entered into our Website, all necessary measures are taken so as to keep and maintain our Bank’s system and internet infrastructure at the most reliable and secure level.</p>
                        <br>
                        <p>3. The information entered by our customers into our Website for product/service applications and information updating purposes cannot be viewed by other internet users. Unauthorized access to the information shared with us by our is strictly restricted and limited for everyone, including the personnel of T. {{$gn->site_name}}</p>
                        <br>
                        <p>4. {{$gn->site_name}} will in no event share any of such information with any third person or entity without a prior consent of the relevant customer and unless required by the law.</p>
                        <br>
                        <p>5. {{$gn->site_name}} may disclose such information only within the frame of the relevant authorizations and subject to the applicable laws and regulations. If and when any of the regulatory bodies and/or legislative or executive authorities and bodies having jurisdiction on T. {{$gn->site_name}} requests disclosure of customer data and information, T. {{$gn->site_name}} will reveal and disclose such information only within and to the extent of the relevant authorizations and permitted by laws. </p>
                        <br>
                        <p>6. Our Website provides links to other websites. Our commitments that exist in our Privacy and Confidentiality Policy are valid only for our own Website and do not cover such other websites. Other websites linked through our Website are subject to their own privacy and confidentiality rules and their own conditions of use. Accordingly, T. {{$gn->site_name}} may in no event be held liable for use of information, ethical principles, confidentiality principles, characteristics and service quality of other websites linked through our Website for advertisement, banner or content purposes or any other purposes, nor may T. {{$gn->site_name}} be held liable for direct or indirect material and/or general damages or losses that may occur in or be caused by such other web sites.</p>
                        <br>
                        <p>7. In the case of its collaboration with other different entities or firms for outsourcing any support services, T. {{$gn->site_name}} will ensure compliance of such other entities or firms with its confidentiality rules, conditions and standards.</p>
                        <br>
                        <p>8. All information, materials and copyrights related to the of such information and materials arrangement in our Website belong solely to T. {{$gn->site_name}} Accordingly, our Bank reserves all of its copyrights, registered trademark, patent and other intellectual property rights on all of the information and materials contained in our Website, other than the materials owned by third parties.</p>
                        <br>
                        <p>9. All required actions and measures are taken in order to ensure the privacy of all personal data and information of our customers so as to keep and maintain our Bank’s system and internet infrastructure at the most reliable and secure level. Please do not hesitate to contact our Bank if and when you wish to get additional information on any matters with regard thereto.</p>

                    </div>
                </div>

                {{--                <div class="col-lg-6 col-md-12">--}}
                {{--                    <div class="about-image">--}}
                {{--                        <img src="assets/img/about-img1.jpg" alt="image">--}}

                {{--                        <a href="https://www.youtube.com/watch?v=bk7McNUjWgw" class="video-btn popup-youtube"><i class="fas fa-play"></i></a>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </div>
    </section>
@stop
