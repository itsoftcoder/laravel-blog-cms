<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name') ?? 'Blog' }} @yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend') }}/assets/img/favicon.png">

    <!-- all css here -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/animate.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/icofont.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/meanmenu.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bundle.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/responsive.css">
    <script src="{{ asset('frontend') }}/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>

<header>
    <div class="header-top-furniture wrapper-padding-2 res-header-sm">
        <div class="container-fluid">
            <div class="header-bottom-wrapper">
                <div class="logo-2 furniture-logo ptb-30">
                    <a href="index.html">
                        <img src="{{ asset('frontend') }}/assets/img/logo/2.png" alt="">
                    </a>
                </div>
                <div class="menu-style-2 furniture-menu menu-hover">
                    <nav>
                        <ul>
                            <li><a class=" {{ \Illuminate\Support\Facades\Request::is('/') ? 'text-info' : '' }}" href="{{ url('/') }}">Home</a></li>
                            <li><a class=" {{ \Illuminate\Support\Facades\Request::is('posts') ? 'text-info' : '' }}" href="{{ route('posts') }}">Posts</a></li>
                            <li><a href="contact.html">contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="mobile-menu-area d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active" style="display: block;">
                            <ul class="menu-overflow">
                                <li><a href="{{ url('/') }}">HOME</a></li>
                                <li><a href="{{ route('posts') }}">pages</a></li>
                                <li><a href="{{ route('contact') }}"> Contact </a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom-furniture wrapper-padding-2 border-top-3">
        <div class="container-fluid">
            <div class="furniture-bottom-wrapper">
                <div class="furniture-login">
                    <ul>
                        @if(Route::has('login'))
                            @auth
                                <li><a href="{{ route('home') }}">Dashboard </a></li>
                                @else
                                <li>Get Access: <a href="{{ url('/login') }}">Login </a></li>
                                @if(Route::has('register'))
                                    <li><a href="{{ url('/register') }}">Reg </a></li>
                                @endif
                                @endauth

                        @endif
                    </ul>
                </div>
                <div class="furniture-search header-cart">
                    <form action="{{ route('search') }}" method="GET">
                        @csrf
                        <input name="search" id="search" placeholder="I am Searching for . . ." type="text">
                        <button>
                            <i class="ti-search"></i>
                        </button>
                    </form>
                    <div id="search_list">

                    </div>
                </div>
                <div class="furniture-wishlist">
                    <ul>
                        <li><a data-toggle="modal" data-target="#exampleCompare" href="#"><i class="ti-reload"></i>
                                Compare</a></li>
                        <li><a href="wishlist.html"><i class="ti-heart"></i> Wishlist</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>


@yield('content')


<div class="newsletter-area ptb-60">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Newsletter</h2><div class="section-title-5">

                    <p>Sign Up for get all update news &amp; Get <span>15% off</span></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="newsletter-style-3">
                    <div id="mc_embed_signup" class="subscribe-form-3 pr-50">
                        <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate="">
                            <div id="mc_embed_signup_scroll" class="mc-form">
                                <input type="email" value="" name="EMAIL" class="email" placeholder="Enter Your E-mail" required="">
                                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                <div class="mc-news" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<footer class="footer-area">
    <div class="footer-middle black-bg-2 pt-45 pb-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="footer-services-wrapper mb-30">
                        <div class="footer-services-icon">
                            <i class="pe-7s-car"></i>
                        </div>
                        <div class="footer-services-content">
                            <h3>Free Shipping</h3>
                            <p>Free Shipping on Bangladesh</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="footer-services-wrapper mb-30">
                        <div class="footer-services-icon">
                            <i class="pe-7s-shield"></i>
                        </div>
                        <div class="footer-services-content">
                            <h3>Money Guarentee</h3>
                            <p>Free Shipping on Bangladesh</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="footer-services-wrapper mb-30">
                        <div class="footer-services-icon">
                            <i class="pe-7s-headphones"></i>
                        </div>
                        <div class="footer-services-content">
                            <h3>Online Support</h3>
                            <p>Free Shipping on Bangladesh</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-top-3 black-bg pt-75 pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-xl-4">
                    <div class="footer-widget mb-30">
                        <h3 class="footer-widget-title-3">Contact Us</h3>
                        <div class="footer-info-wrapper-2">
                            <div class="footer-address-electro">
                                <div class="footer-info-icon2">
                                    <span>Address:</span>
                                </div>
                                <div class="footer-info-content2">
                                    <p>77 Seventh Streeth Banasree <br>Road Rampura -2100 Dhaka</p>
                                </div>
                            </div>
                            <div class="footer-address-electro">
                                <div class="footer-info-icon2">
                                    <span>Phone:</span>
                                </div>
                                <div class="footer-info-content2">
                                    <p>+11 (019)  2518  4203 <br>+11 (251)  2223  3353</p>
                                </div>
                            </div>
                            <div class="footer-address-electro">
                                <div class="footer-info-icon2">
                                    <span>Email:</span>
                                </div>
                                <div class="footer-info-content2">
                                    <p><a href="#">domain@mail.com</a> <br><a href="#">company@domain.info</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xl-3">
                    <div class="footer-widget mb-30">
                        <h3 class="footer-widget-title-3">Authors</h3>
                        <div class="footer-widget-content-3">
                            <ul>
                                @foreach($authors as $author)
                                <li><a class="@if(\Illuminate\Support\Facades\Request::path() === 'author/'.$author->username) text-success @endif" href="{{ route('user_posts',$author->username) }}">{{ $author->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-xl-2">
                    <div class="footer-widget mb-30">
                        <h3 class="footer-widget-title-3">Categories</h3>
                        <div class="footer-widget-content-3">
                            <ul>
                                @foreach($categories as $category)
                                    <li><a class="@if(\Illuminate\Support\Facades\Request::path() === 'category/'.$category->slug) text-success @endif" href="{{ route('category_posts',$category->slug) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xl-3">
                    <div class="footer-widget widget-right mb-30">
                        <h3 class="footer-widget-title-3">Tags</h3>
                        <div class="footer-widget-content-3">
                            <ul>
                                @foreach($tags as $tag)

                                    <li><a class="@if(\Illuminate\Support\Facades\Request::path() === 'tag/'.$tag->slug) text-success @endif" href="{{ route('tag_posts',$tag->slug) }}">{{ $tag->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom bg-dark pt-25 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-5">
                    <div class="footer-menu">
                        <nav>
                            <ul>
                                <li><a href="#">Privacy Policy </a></li>
                                <li><a href="{{ route('posts') }}"> Posts</a></li>
                                <li><a href="#">Help Center</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-6 col-md-7">
                    <div class="copyright f-right mrg-5">
                        <p>
                            Copyright ©
                            <a href="https://hastech.company/">HasTech</a>
                            2018 . All Right Reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- all js here -->
<script src="{{ asset('frontend') }}/assets/js/vendor/jquery-1.12.0.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/popper.js"></script>
<script src="{{ asset('frontend') }}/assets/js/bootstrap.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/isotope.pkgd.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/imagesloaded.pkgd.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/jquery.counterup.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/waypoints.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/ajax-mail.js"></script>
<script src="{{ asset('frontend') }}/assets/js/owl.carousel.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins.js"></script>
<script src="{{ asset('frontend') }}/assets/js/sweetalert.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/main.js"></script>
@stack('script')
<script type="text/javascript">
    $(document).ready(function () {
        $('#search').keyup(function () {
            let query = $(this).val();
            if(query != ''){
                let token = $('input[name="_token"]').val();
                $.ajax({
                    url:'{{ route('search.data') }}',
                    method:'POST',
                    data:{query:query,_token:token},
                    success: function (data) {
                        $('#search_list').fadeIn();
                        $('#search_list').html(data);
                    }
                });
            }
        });

        $(document).on('click','.single-product-cart',function () {
            $('#search').val($(this).text());
            $('#search_list').fadeOut();
        });
    });

</script>
</body>
</html>

