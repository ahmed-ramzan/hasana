
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('css')

</head>
<body>

<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="{{asset('img/logo/hsanah.png')}}" alt="">
            </div>
        </div>
    </div>
</div>

<header>
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top d-none d-lg-block">
                <div class="container-fluid">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left d-flex">
                                <ul>
                                    <li>Phone: +99 (0) 101 0000 888</li>
                                    <li>Email: donate@Hsanah</li>
                                </ul>
                                <div class="header-social">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li> <a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="header-info-right d-flex align-items-center">
                                <div class="select-this">
                                        <div class="select-itms">
                                            {{--<select name="select" id="select1" onchange="location = this.value;">
                                                <option value="{{route('lang','ar')}}" @if(Config::get('app.locale')=='en') selected @endif>العربية</option>
                                                <option value="{{route('lang','en')}}" @if(Config::get('app.locale')=='ar') selected @endif>english</option>
                                            </select>--}}
                                            @if(Config::get('app.locale')=='en')
                                                <a style="color: black" href="{{route('lang','ar')}}">العربية</a>
                                            @else
                                                <a style="color: black" href="{{route('lang','en')}}">english</a>
                                            @endif
                                        </div>
                                </div>
                               {{-- <ul class="contact-now">
                                    <li><a href="#">Subscribe Now</a></li>
                                </ul>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">

                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="/"><img style="width: 132px;height: 50px" src="{{asset('img/logo/hsanah.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10">
                            <div class="menu-wrapper  d-flex align-items-center justify-content-end">

                                <div class="main-menu d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="/">{{__('translation.home')}}</a></li>
                                            <li><a href="{{route('latest-causes')}}">{{__('translation.allCampaigns')}}</a></li>
                                            <li><a href="{{route('about')}}">{{__('translation.about')}}</a></li>
{{--                                            <li><a href="{{route('ranked-causes')}}">{{__('translation.rankedCauses')}}</a></li>--}}
                                            <li><a href="{{route('contact')}}">{{__('translation.contact')}}</a></li>
                                        </ul>
                                    </nav>
                                </div>

                                @if(Auth::check())
                                    <div class="header-right-btn d-none d-lg-block ml-20">
                                        <div class="dropdown">
                                            <button class="dropbtn">{{Auth::user()->name}} <i class="fas fa-chevron-down"></i></button>
                                            <div class="dropdown-content">
                                                <a href="{{route('logout')}}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="header-right-btn d-none d-lg-block ml-20">
                                        <a href="{{route('login')}}" class="btn header-btn">{{__('translation.login')}}</a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>

@yield('content')

<footer>
    <div class="footer-wrapper section-bg2" data-background="/img/gallery/footer_bg.png">

        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <div class="footer-tittle">
                                    <div class="footer-logo mb-20">
                                        <a href="/"><img style="width: 132px;height: 50px" src="{{asset('img/logo/hsanah.png')}}" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Contact Info</h4>
                                <ul>
                                    <li>
                                        <p>Address :Your address goes here, your demo address.</p>
                                    </li>
                                    <li><a href="#">Phone : +8880 44338899</a></li>
                                    <li><a href="#">Email : <span class="__cf_email__" data-cfemail="5a33343c351a393536352836333874393537">[email&#160;protected]</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Important Link</h4>
                                <ul>
                                    <li><a href="/"> {{__('translation.home')}}</a></li>
                                    <li><a href="{{route('about')}}">{{__('translation.about')}}</a></li>
                                    <li><a href="{{route('latest-causes')}}">{{__('translation.latestCauses')}}</a></li>
                                    <li><a href="{{route('ranked-causes')}}">{{__('translation.rankedCauses')}}</a></li>
                                    <li><a href="{{route('contact')}}">{{__('translation.contact')}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    {{--<div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Newsletter</h4>
                                <div class="footer-pera footer-pera2">
                                    <p>Heaven fruitful doesn't over lesser in days. Appear creeping.</p>
                                </div>

                                <div class="footer-form">
                                    <div id="mc_embed_signup">
                                        <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative mail_part">
                                            <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address" class="placeholder hide-on-focus" onfocus="this.placeholder = ''" onblur="this.placeholder = ' Email Address '">
                                            <div class="form-icon">
                                                <button type="submit" name="submit" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm"><img src="/img/gallery/form.png" alt=""></button>
                                            </div>
                                            <div class="mt-10 info"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>--}}
                </div>
            </div>
        </div>

        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-xl-10 col-lg-9 ">
                            <div class="footer-copy-right">
                                <p>
                                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                                </p>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3">
                            <div class="footer-social f-right">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div id="back-top">
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

@yield('js')
</body>
</html>
