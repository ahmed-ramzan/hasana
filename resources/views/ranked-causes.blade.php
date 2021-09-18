@extends('layouts.wrapper')

@section('title','ranked-causes')

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
                                <h2>Ranked Causes</h2>
                                {{--form start--}}

                               {{-- <div style="background-color: #dcf8ed;height: 85px" class="d-flex justify-content-center my-5">
                                    <form style="margin-top: 21px;margin-left: 90px" id="search-form" method="post" action="{{route('search')}}">
                                        @csrf
                                        <div class="row">

                                            <div class="col-3">
                                                <div class="form-group">
                                                    <select class="form-control" onchange="
                                                              this.form.submit();" name="search_category">
                                                        <option value="">Categories</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-3 mx-5">
                                                <div class="form-group">
                                                    <select style="height: 40px;overflow: scroll" class="form-control" onchange="
                                                            this.form.submit();" name="search_location">

                                                        @foreach($filterCampaigns as $location)
                                                        <option value="{{$location}}">{{$location}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>--}}
                            </div>
                            {{--form end--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="our-cases-area section-padding30">
            <div class="container">
                <div class="row">
                    @forelse($campaigns as $campaign)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single-cases mb-40">
                                <div class="cases-img">
                                    <img style="width: 360px;height: 240px" src="/storage/{{$campaign->image}}" alt="image">
                                </div>
                                <div class="cases-caption">
                                    <h3><a href="{{route('single-cause',$campaign->id)}}">{{$campaign->title}}</a></h3>

                                    <div class="single-skill mb-15">
                                        <div class="bar-progress">
                                            <div id="bar{{$loop->iteration}}" class="barfiller">
                                                <div class="tipWrap">
                                                    <span class="tip"></span>
                                                </div>
                                                <span class="fill" data-percentage="{{($campaign->percentage) ? $campaign->percentage : '0'}}"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="prices d-flex justify-content-between">
                                        <p>Raised:<span>{{($campaign->raised) ? $campaign->raised : '0'}} Rs</span></p>
                                        <p>Goal:<span> {{number_format($campaign->goal)}} Rs</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h2>No Campaigns Yet!</h2>
                    @endforelse
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

    <script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>

    <script src="{{asset('js/plugins.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
@endsection
