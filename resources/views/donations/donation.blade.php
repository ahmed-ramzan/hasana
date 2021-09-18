@extends('layouts.wrapper')

@section('title','Donate')

@section('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/progressbar_barfiller.css')}}">
    <link rel="stylesheet" href="{{asset('css/gijgo.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animated-headline.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection

@section('content')
    <main>

        <div class="slider-area2">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 pt-20 text-center">
                                <h2>Donate for the better world</h2><br>
                                <h3 style="font-weight: bold">Per Person Fund is @foreach($perPersonFund as $fund){{$fund}}@endforeach</h3>
                                <h3 style="background-color: red;color: white">Amount Required is @foreach($goal as $campaignGoal){{$campaignGoal}}@endforeach SR</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Donate</h2>
                    </div>
                    <div class="col-lg-8">
                        <form class="form-contact contact_form" action="{{route('donation.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="donation_id" value="{{$id}}">
                            <input type="hidden" name="per_person_fund" value="{{$fund}}">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="amount" id="amount" type="number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter amount'" placeholder="amount">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div id="paypal-button"></div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn">Donate</button>
                            </div>
                        </form>
                    </div>
                    {{--<div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>Gujrat, Pakistan.</h3>
                                <p>Rose road, CA 91770</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>+1 253 565 2365</h3>
                                <p>Mon to Fri 9am to 6pm</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3><a href="https://preview.colorlib.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4e3d3b3e3e213c3a0e2d2122213c22272c602d2123">[email&#160;protected]</a></h3>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>--}}
                </div>
            </div>
        </section>

    </main>
@endsection

@section('js')
    <script src="{{asset('js/vendor/modernizr-3.5.0.min.js')}}"></script>

    <script src="{{asset('js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <script src="{{asset('js/jquery.slicknav.min.js')}}"></script>

    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/slick.min.js')}}"></script>

    <script src="{{asset('js/wow.min.js')}}"></script>
    <script src="{{asset('js/animated.headline.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.js')}}"></script>

    <script src="{{asset('js/gijgo.min.js')}}"></script>

    <script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('js/jquery.sticky.js')}}"></script>

    <script src="{{asset('js/jquery.barfiller.js')}}"></script>

    <script src="{{asset('js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('js/waypoints.min.js')}}"></script>
    <script src="{{asset('js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('js/hover-direction-snake.min.js')}}"></script>

    <script src="{{asset('js/contact.js')}}"></script>
    <script src="{{asset('js/jquery.form.js')}}"></script>
    <script src="{{asset('js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('js/mail-script.js')}}"></script>
    <script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>

    <script src="{{asset('js/plugins.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

    {{--sweetalert--}}
    <script src="{{asset('js/sweetalert.js')}}"></script>
    <script src="{{asset('js/sweetalert1.js')}}"></script>

    @if(session('message'))
        <script>
            swal("Success" ,"{{session('message')}}", "success");
        </script>
    @endif

    @if(session('errorMessage'))
        <script>
            swal("Beep" ,"{{session('errorMessage')}}", "error");
        </script>
    @endif

@endsection
