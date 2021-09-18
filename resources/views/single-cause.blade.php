@extends('layouts.wrapper')

@section('title','causes')

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
                            <div class="hero-cap hero-cap2 pt-70 text-center">
                                <h2>{{$cause->title}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="blog_area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="blog_left_sidebar">
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="/storage/{{$cause->image}}" alt="image">
                                </div>
                                {{--progresss bar--}}

                                @foreach($calculatedCause as $result)

                                <div class="d-flex justify-content-between mt-5">
                                    <div style="width: 70%">
                                        <div class="cases-caption mt-5">
                                            <div class="single-skill mb-15">
                                                <div class="bar-progress">
                                                    <div id="bar1" class="barfiller">
                                                        <div class="tipWrap">
                                                            <span class="tip"></span>
                                                        </div>
                                                        <span class="fill" data-percentage="{{($result->percentage) ? $result->percentage : '0'}}"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="prices d-flex justify-content-between">
                                                <p>Raised:<span>{{($result->raised) ? $result->raised : '0'}} Rs</span></p>
                                                <p>Goal:<span> {{number_format($cause->goal)}} Rs</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin-top: 8px">
                                        <button onclick="location.href = '{{route('donation.index',$cause->id)}}'" class="btn">donate</button>
                                    </div>
                                </div>
                                @endforeach

                                <div class="blog_details">
                                    <a class="d-inline-block" href="#">
                                        City<h2 class="blog-head" style="color: #2d2d2d;">{{$cause->city}}</h2>
                                        District<h2 class="blog-head" style="color: #2d2d2d;">{{$cause->district}}</h2>
                                    </a>
                                    <p>{!! $cause->description !!}</p>

                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title" style="color: #2d2d2d;">Community Information</h4>
                                <ul class="list cat-list">
                                    @forelse($calculatedCause as $result)
                                        <li>
                                            <a href="#" class="d-flex">
                                                <p>Name: {{$result->name}}</p>
                                            </a>
                                            <a href="#" class="d-flex">
                                                <p>Email: {{$result->email}}</p>
                                            </a>
                                            <a href="#" class="d-flex">
                                                <p>Phone: {{$result->phone}}</p>
                                            </a>
                                            <a href="#" class="d-flex">
                                                <p>City: {{$result->city}}</p>
                                            </a>
                                            <a href="#" class="d-flex">
                                                <p>District: {{$result->district}}</p>
                                            </a>
                                        </li>
                                    @empty
                                    <p>No Info Found!</p>
                                    @endforelse
                                </ul>
                            </aside>

                            <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title" style="color: #2d2d2d;">Recent Causes</h3>
                                @forelse($campaigns as $campaign)
                                    <div class="media post_item">
                                        <img class="w-25 rounded" src="/storage/{{$campaign->image}}" alt="image">
                                        <div class="media-body">
                                            <a href="{{route('single-cause',$campaign->id)}}">
                                                <h3 style="color: #2d2d2d;">{{Str::of($campaign->title)->substr(0,18)}}...</h3>
                                            </a>
                                            <p>{{\Carbon\Carbon::parse($campaign->created_at)->format('j F Y')}}</p>
                                        </div>
                                    </div>
                                @empty
                                <p>No Cause Found!</p>
                                @endforelse
                            </aside>
                        </div>
                    </div>
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
            swal("Attention!" ,"{{session('message')}}", "error");
        </script>
    @endif
@endsection
