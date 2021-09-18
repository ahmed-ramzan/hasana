@extends('layouts.wrapper')

@section('title','About')

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
                                <h2>{{__('translation.about-us')}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="service-area section-padding30">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-7 col-md-10 col-sm-10">

                        <div class="section-tittle text-center mb-80">
                            <span>{{__('translation.what-we-are-doing')}}</span>
                            <h2>{{__('translation.We-Are-In-A-Mission-To-Help-The-Helpless')}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-cat text-center mb-50">
                            <div class="cat-icon">
                                <span class="flaticon-null-1"></span>
                            </div>
                            <div class="cat-cap">
                                <h5><a href="services.html">{{__('translation.clean-water')}}</a></h5>
                                <p>{{__('translation.clean-water-paragraph')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-cat active text-center mb-50">
                            <div class="cat-icon">
                                <span class="flaticon-think"></span>
                            </div>
                            <div class="cat-cap">
                                <h5><a href="#">{{__('translation.clean-water')}}</a></h5>
                                <p>{{__('translation.clean-water-paragraph')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-cat text-center mb-50">
                            <div class="cat-icon">
                                <span class="flaticon-gear"></span>
                            </div>
                            <div class="cat-cap">
                                <h5><a href="#">{{__('translation.clean-water')}}</a></h5>
                                <p>{{__('translation.clean-water-paragraph')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="about-low-area section-padding2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-10">
                        <div class="about-caption mb-50">

                            <div class="section-tittle mb-35">
                                <span>{{__('translation.About-our-foundetion')}}</span>
                                <h2>{{__('translation.We-Are-In-A-Mission-To-Help-The-Helpless')}}</h2>
                            </div>
                            <p>{{__('translation.About-our-foundetion-paragraph1')}}</p>
                            <p>{{__('translation.About-our-foundetion-paragraph2')}}</p>
                        </div>
                        <a href="{{route('about')}}" class="btn">{{__('translation.about-us')}}</a>
                    </div>
                    <div class="col-lg-6 col-md-12">

                        <div class="about-img ">
                            <div class="about-font-img d-none d-lg-block">
                                <img src="img/gallery/about2.png" alt="">
                            </div>
                            <div class="about-back-img ">
                                <img src="img/gallery/about1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="wantToWork-area ">
            <div class="container">
                <div class="wants-wrapper w-padding2  section-bg" data-background="img/gallery/section_bg01.png">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-xl-5 col-lg-9 col-md-8">
                            <div class="wantToWork-caption wantToWork-caption2">
                                <h2>{{__('translation.Lets-Chenge-The-World-With-Humanity')}}</h2>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4">
                            <a href="#" class="btn white-btn f-right sm-left">{{__('translation.Become-A-Volunteer')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="testimonial-area testimonial-padding">
            <div class="container">

                <div class="row d-flex justify-content-center">
                    <div class="col-xl-8 col-lg-8 col-md-10">
                        <div class="h1-testimonial-active dot-style">

                            <div class="single-testimonial text-center">
                                <div class="testimonial-caption ">

                                    <div class="testimonial-founder">
                                        <div class="founder-img mb-40">
                                            <img src="img/gallery/testimonial.png" alt="">
                                            <span>{{__('translation.person-name')}}</span>
                                            <p>{{__('translation.Creative-Director')}}</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-top-cap">
                                        <p>“{{__('translation.Director-message')}}”</p>
                                    </div>
                                </div>
                            </div>

                            <div class="single-testimonial text-center">
                                <div class="testimonial-caption ">

                                    <div class="testimonial-founder">
                                        <div class="founder-img mb-40">
                                            <img src="img/gallery/testimonial.png" alt="">
                                            <span>{{__('translation.person-name')}}</span>
                                            <p>{{__('translation.Creative-Director')}}</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-top-cap">
                                        <p>“{{__('translation.Director-message')}}”</p>
                                    </div>
                                </div>
                            </div>

                            <div class="single-testimonial text-center">
                                <div class="testimonial-caption ">

                                    <div class="testimonial-founder">
                                        <div class="founder-img mb-40">
                                            <img src="img/gallery/testimonial.png" alt="">
                                            <span>{{__('translation.person-name')}}</span>
                                            <p>{{__('translation.Creative-Director')}}</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-top-cap">
                                        <p>“{{__('translation.Director-message')}}”</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="count-down-area pt-25 section-bg" data-background="img/gallery/section_bg02.png">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="count-down-wrapper">
                            <div class="row justify-content-between">
                                <div class="col-lg-3 col-md-6 col-sm-6">

                                    <div class="single-counter text-center">
                                        <span class="counter color-green">6,200</span>
                                        <span class="plus">+</span>
                                        <p class="color-green">Donation</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">

                                    <div class="single-counter text-center">
                                        <span class="counter color-green">80</span>
                                        <span class="plus">+</span>
                                        <p class="color-green">Fund Raised</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">

                                    <div class="single-counter text-center">
                                        <span class="counter color-green">256</span>
                                        <span class="plus">+</span>
                                        <p class="color-green">Donation</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">

                                    <div class="single-counter text-center">
                                        <span class="counter color-green">256</span>
                                        <span class="plus">+</span>
                                        <p class="color-green">Donation</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
@endsection
