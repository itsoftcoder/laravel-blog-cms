
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title','Blog')</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="../favicon.ico" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets')  }}/plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets')  }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets')  }}/plugins/ionicons/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets')  }}/plugins/icon-kit/dist/css/iconkit.min.css">
    <link rel="stylesheet" href="{{ asset('assets')  }}/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
    @stack('css')
    <link rel="stylesheet" href="{{ asset('assets')  }}/dist/css/theme.min.css">
    <script src="{{ asset('assets')  }}/src/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="wrapper">
@include('layouts.partials.header')
    <div class="page-wrap">
        @include('layouts.partials.sidebar')
        @yield('content')
        @include('layouts.partials.footer')
    </div>
</div>


<div class="modal fade edit-layout-modal" id="editLayoutItem" tabindex="-1" role="dialog" aria-labelledby="editLayoutItemLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLayoutItemLabel">Sed id mi non quam iaculis pulvinar.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p class="lead">Nullam elementum aliquam porta.</p>
                <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus fermentum imperdiet ligula, et mollis quam sagittis ac. In quis interdum sem. Vivamus blandit fringilla hendrerit. Suspendisse vulputate sapien vitae mi convallis dictum. Sed blandit felis ut quam accumsan, at condimentum nibh varius. Mauris ornare ultricies ipsum.</p>
                <div class="row">
                    <div class="col-md-6"><img src="../img/portfolio-1.jpg" class="img-fluid" alt=""></div>
                    <div class="col-md-6"><img src="../img/portfolio-8.jpg" class="img-fluid" alt=""></div>
                </div>
                <div class="jumbotron pt-30 pb-30 mt-30">
                    <h2 class="mt-0">Hello, world!</h2>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                </div>
                <p>Praesent eleifend ac felis dignissim mattis. Suspendisse eget congue enim, ac fermentum risus. Donec eget risus lacus. Nullam nec lectus quis tortor ultrices consectetur. Etiam dui erat, tristique vel quam a, maximus porttitor enim. Ut molestie turpis in est iaculis, ut congue massa porta.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="layout-edit-item.html" class="btn btn-primary">Edit</a>
                <button type="button" class="btn btn-danger list-delete">Delete</button>
            </div>
        </div>
    </div>
</div>




<div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel" aria-hidden="true" data-backdrop="false">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ik ik-x-circle"></i></button>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="quick-search">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 ml-auto mr-auto">
                            <div class="input-wrap">
                                <input type="text" id="quick-search" class="form-control" placeholder="Search..." />
                                <i class="ik ik-search"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="container">
                    <div class="apps-wrap">
                        <div class="app-item">
                            <a href="#"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-mail"></i><span>Message</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-users"></i><span>Accounts</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-shopping-cart"></i><span>Sales</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-briefcase"></i><span>Purchase</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-server"></i><span>Menus</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-clipboard"></i><span>Pages</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-message-square"></i><span>Chats</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-map-pin"></i><span>Contacts</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-box"></i><span>Blocks</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-calendar"></i><span>Events</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-bell"></i><span>Notifications</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-pie-chart"></i><span>Reports</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-layers"></i><span>Tasks</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-edit"></i><span>Blogs</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-settings"></i><span>Settings</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-more-horizontal"></i><span>More</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>window.jQuery || document.write('<script src="{{ asset('assets')  }}/src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
<script src="{{ asset('assets')  }}/plugins/popper.js/dist/umd/popper.min.js"></script>
<script src="{{ asset('assets')  }}/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="{{ asset('assets')  }}/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
<script src="{{ asset('assets')  }}/plugins/screenfull/dist/screenfull.js"></script>
@stack('jsUp')
<script src="{{ asset('assets')  }}/dist/js/theme.min.js"></script>
@stack('jsDown')
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X','auto');ga('send','pageview');

</script>
@stack('script')


</body>
</html>


