@extends('layouts.backend')
@section('title')
    Admin Dashboard - Blog
@endsection
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-file-text bg-blue"></i>
                            <div class="d-inline">
                                <h5>Dashboard</h5>
                                <span>Welcome {{ Auth::user()->name  }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#your_information">Your information</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#site_information">Website information</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h4 id="your_information" class="text-center bg-teal text-white py-2">Your Information</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-md-4 col-sm-6 col-6">
                    <div class="card analytic-card card-green">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <i class="fas fa-file-archive text-green f-18 analytic-icon"></i>
                                </div>
                                <div class="col text-right">
                                    <h3 class="mb-5 text-white">{{ \Illuminate\Support\Facades\Auth::user()->posts->count() }}</h3>
                                    <h6 class="mb-0 text-white">Total Posts</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 col-6">
                    <div class="card analytic-card card-red">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <i class="fas fa-comments text-green f-18 analytic-icon"></i>
                                </div>
                                <div class="col text-right">
                                    <h3 class="mb-5 text-white">{{ \Illuminate\Support\Facades\Auth::user()->comments->count() }}</h3>
                                    <h6 class="mb-0 text-white">Total Comments</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 col-6">
                    <div class="card analytic-card card-blue">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <i class="fas fa-heart text-green f-18 analytic-icon"></i>
                                </div>
                                <div class="col text-right">
                                    <h3 class="mb-5 text-white">{{ \Illuminate\Support\Facades\Auth::user()->favorites->count() }}</h3>
                                    <h6 class="mb-0 text-white">Total Likes</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-4 col-sm-6 col-6">
                    <div class="card analytic-card bg-teal">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <i class="fas fa-heart text-green f-18 analytic-icon"></i>
                                </div>
                                <div class="col text-right">
                                    <h3 class="mb-5 text-white">{{ $today_posts ?? ''}}</h3>
                                    <h6 class="mb-0 text-white">Today Posts</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-4 col-6">
                    <div class="card prod-p-card bg-purple">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="mb-5 text-white">Today Approved Posts</h6>
                                    <h3 class="mb-0 fw-700 text-white">{{ $today_approved_posts->count() ?? '' }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-money-bill-alt text-red f-18"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-4 col-6">
                    <div class="card prod-p-card bg-orange">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="mb-5 text-white">Today Pending Posts</h6>
                                    <h3 class="mb-0 fw-700 text-white">{{ $today_pending_posts->count() ?? '' }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-money-bill-alt text-red f-18"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-4 col-6">
                    <div class="card prod-p-card bg-lime">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="mb-5 text-white">Today Published Posts</h6>
                                    <h3 class="mb-0 fw-700 text-white">{{ $today_published_posts->count() ?? '' }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-money-bill-alt text-red f-18"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-4 col-6">
                    <div class="card prod-p-card bg-pink">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="mb-5 text-white">Today None Published Posts</h6>
                                    <h3 class="mb-0 fw-700 text-white">{{ $today_none_published_posts->count() ?? '' }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-money-bill-alt text-red f-18"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-4 col-6">
                    <div class="card prod-p-card bg-info">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="mb-5 text-white">Yesterday Posts</h6>
                                    <h3 class="mb-0 fw-700 text-white">{{ $yesterday_posts ?? '' }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-money-bill-alt text-red f-18"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-md-4 col-6">
                    <div class="card prod-p-card bg-warning">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="mb-5 text-white">Yesterday Approved Posts</h6>
                                    <h3 class="mb-0 fw-700 text-white">{{ $yesterday_approved_posts->count() ?? '' }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-money-bill-alt text-red f-18"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-md-4 col-6">
                    <div class="card prod-p-card bg-green">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="mb-5 text-white">Yesterday pending Posts</h6>
                                    <h3 class="mb-0 fw-700 text-white">{{ $yesterday_pending_posts->count() ?? '' }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-money-bill-alt text-red f-18"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-md-4 col-6">
                    <div class="card prod-p-card bg-fuchsia">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="mb-5 text-white">Yesterday Published Posts</h6>
                                    <h3 class="mb-0 fw-700 text-white">{{ $yesterday_published_posts->count() ?? '' }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-money-bill-alt text-red f-18"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-md-4 col-6">
                    <div class="card prod-p-card bg-navy">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="mb-5 text-white">Yesterday No Published Posts</h6>
                                    <h3 class="mb-0 fw-700 text-white">{{ $yesterday_none_published_posts->count() ?? '' }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-money-bill-alt text-red f-18"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-md-4 col-sm-6 col-6">
                    <div class="card analytic-card bg-linkedin">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <i class="fas fa-heart text-green f-18 analytic-icon"></i>
                                </div>
                                <div class="col text-right">
                                    <h3 class="mb-5 text-white">{{ $pending_posts ?? '' }}</h3>
                                    <h6 class="mb-0 text-white">Pending Posts</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-md-4 col-sm-6 col-6">
                    <div class="card analytic-card bg-google">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <i class="fas fa-heart text-green f-18 analytic-icon"></i>
                                </div>
                                <div class="col text-right">
                                    <h3 class="mb-5 text-white">{{ $approved_posts ?? '' }}</h3>
                                    <h6 class="mb-0 text-white">Approved Posts</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-md-4 col-sm-6 col-6">
                    <div class="card analytic-card bg-primary">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <i class="fas fa-heart text-green f-18 analytic-icon"></i>
                                </div>
                                <div class="col text-right">
                                    <h3 class="mb-5 text-white">{{ $published_posts ?? '' }}</h3>
                                    <h6 class="mb-0 text-white">Published Posts</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-4 col-sm-6 col-6">
                    <div class="card analytic-card bg-yellow">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <i class="fas fa-heart text-green f-18 analytic-icon"></i>
                                </div>
                                <div class="col text-right">
                                    <h3 class="mb-5 text-white">{{ $none_published_posts ?? '' }}</h3>
                                    <h6 class="mb-0 text-white">Drafts Posts</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card new-cust-card">
                        <div class="card-header">
                            <h3>Today Pending Posts</h3>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                    <li><i class="ik ik-minus minimize-card"></i></li>
                                    <li><i class="ik ik-x close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block">
                            @forelse($today_pending_posts as $today_pending_post)
                                <div class="align-middle mb-25">
                                    <img src="{{ asset('upload/posts/'.$today_pending_post->image) }}" alt="{{ $today_pending_post->title }}" class="rounded-circle img-40 align-top mr-15">
                                    <div class="d-inline-block">
                                        <a><h6>{{ $today_pending_post->title }}</h6></a>
                                        <p class="text-muted mb-0">{{ $today_pending_post->created_at->diffForHumans() }}</p>
                                        <span class="status active"></span>
                                    </div>
                                </div>
                            @empty
                                today no pending post available here
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-md-6">
                    <div class="card table-card">
                        <div class="card-header">
                            <h3>Today Approved Posts</h3>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                    <li><i class="ik ik-minus minimize-card"></i></li>
                                    <li><i class="ik ik-x close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <tbody>
                                    @forelse($today_approved_posts as $today_approved_post)
                                        <tr>
                                            <td>{{ Str::words($today_approved_post->title,5,'....') }}</td>
                                            <td><img src="{{ asset('upload/posts/'.$today_approved_post->image) }}" alt="{{ $today_approved_post->title }}" class="img-fluid img-20"></td>
                                            <td>{{$today_approved_post->view_count}}</td>
                                            <td>{{$today_approved_post->favorites->count()}}</td>
                                            <td>{{$today_approved_post->comments->count()}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">today no approved post available here</td>
                                        </tr>

                                    @endforelse
                                    </tbody>
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Total Views</th>
                                        <th>Total Likes</th>
                                        <th>Total comments</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card new-cust-card">
                        <div class="card-header">
                            <h3>Today None Published Posts</h3>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                    <li><i class="ik ik-minus minimize-card"></i></li>
                                    <li><i class="ik ik-x close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block">
                            @forelse($today_none_published_posts as $today_none_published_post)
                                <div class="align-middle mb-25">
                                    <img src="{{ asset('upload/posts/'.$today_none_published_post->image) }}" alt="{{ $today_none_published_post->title }}" class="rounded-circle img-40 align-top mr-15">
                                    <div class="d-inline-block">
                                        <a><h6>{{ $today_none_published_post->title }}</h6></a>
                                        <p class="text-muted mb-0">{{ $today_none_published_post->created_at->diffForHumans() }}</p>
                                        <span class="status active"></span>
                                    </div>
                                </div>
                            @empty
                                today no pending post available here
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-md-6">
                    <div class="card table-card">
                        <div class="card-header">
                            <h3>Today Published Posts</h3>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                    <li><i class="ik ik-minus minimize-card"></i></li>
                                    <li><i class="ik ik-x close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <tbody>
                                    @forelse($today_published_posts as $today_published_post)
                                        <tr>
                                            <td>{{ Str::words($today_published_post->title,5,'....') }}</td>
                                            <td><img src="{{ asset('upload/posts/'.$today_published_post->image) }}" alt="{{ $today_published_post->title }}" class="img-fluid img-20"></td>
                                            <td>{{$today_published_post->view_count}}</td>
                                            <td>{{$today_published_post->favorites->count()}}</td>
                                            <td>{{$today_published_post->comments->count()}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">today no approved post available here</td>
                                        </tr>

                                    @endforelse
                                    </tbody>
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Total Views</th>
                                        <th>Total Likes</th>
                                        <th>Total comments</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card new-cust-card">
                        <div class="card-header">
                            <h3>Yesterday Pending Posts</h3>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                    <li><i class="ik ik-minus minimize-card"></i></li>
                                    <li><i class="ik ik-x close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block">
                            @forelse($yesterday_pending_posts as $yesterday_pending_post)
                                <div class="align-middle mb-25">
                                    <img src="{{ asset('upload/posts/'.$yesterday_pending_post->image) }}" alt="{{ $yesterday_pending_post->title }}" class="rounded-circle img-40 align-top mr-15">
                                    <div class="d-inline-block">
                                        <a><h6>{{ $yesterday_pending_post->title }}</h6></a>
                                        <p class="text-muted mb-0">{{ $yesterday_pending_post->created_at->diffForHumans() }}</p>
                                        <span class="status active"></span>
                                    </div>
                                </div>
                            @empty
                                Yesterday no pending post available here
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-md-6">
                    <div class="card table-card">
                        <div class="card-header">
                            <h3>Yesterday Approved Posts</h3>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                    <li><i class="ik ik-minus minimize-card"></i></li>
                                    <li><i class="ik ik-x close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <tbody>
                                    @forelse($yesterday_approved_posts as $yesterday_approved_post)
                                        <tr>
                                            <td>{{ Str::words($yesterday_approved_post->title,5,'....') }}</td>
                                            <td><img src="{{ asset('upload/posts/'.$yesterday_approved_post->image) }}" alt="{{ $yesterday_approved_post->title }}" class="img-fluid img-20"></td>
                                            <td>{{$yesterday_approved_post->view_count}}</td>
                                            <td>{{$yesterday_approved_post->favorites->count()}}</td>
                                            <td>{{$yesterday_approved_post->comments->count()}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Yesterday no approved post available here</td>
                                        </tr>

                                    @endforelse
                                    </tbody>
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Total Views</th>
                                        <th>Total Likes</th>
                                        <th>Total comments</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card new-cust-card">
                        <div class="card-header">
                            <h3>Yesterday None Published Posts</h3>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                    <li><i class="ik ik-minus minimize-card"></i></li>
                                    <li><i class="ik ik-x close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block">
                            @forelse($yesterday_none_published_posts as $yesterday_none_published_post)
                                <div class="align-middle mb-25">
                                    <img src="{{ asset('upload/posts/'.$yesterday_none_published_post->image) }}" alt="{{ $yesterday_none_published_post->title }}" class="rounded-circle img-40 align-top mr-15">
                                    <div class="d-inline-block">
                                        <a><h6>{{ $yesterday_none_published_post->title }}</h6></a>
                                        <p class="text-muted mb-0">{{ $yesterday_none_published_post->created_at->diffForHumans() }}</p>
                                        <span class="status active"></span>
                                    </div>
                                </div>
                            @empty
                                Yesterday none published empty post here
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-md-6">
                    <div class="card table-card">
                        <div class="card-header">
                            <h3>Yesterday Published Posts</h3>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                    <li><i class="ik ik-minus minimize-card"></i></li>
                                    <li><i class="ik ik-x close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <tbody>
                                    @forelse($yesterday_published_posts as $yesterday_published_post)
                                        <tr>
                                            <td>{{ Str::words($yesterday_published_post->title,5,'....') }}</td>
                                            <td><img src="{{ asset('upload/posts/'.$yesterday_published_post->image) }}" alt="{{ $yesterday_published_post->title }}" class="img-fluid img-20"></td>
                                            <td>{{$yesterday_published_post->view_count}}</td>
                                            <td>{{$yesterday_published_post->favorites->count()}}</td>
                                            <td>{{$yesterday_published_post->comments->count()}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Yesterday published post has empty</td>
                                        </tr>

                                    @endforelse
                                    </tbody>
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Total Views</th>
                                        <th>Total Likes</th>
                                        <th>Total comments</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="card new-cust-card">
                        <div class="card-header">
                            <h3>Top 10 ranking posts</h3>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                    <li><i class="ik ik-minus minimize-card"></i></li>
                                    <li><i class="ik ik-x close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block">
                            @forelse($top_ten_ranking_posts as $top_ten_ranking_post)
                                <div class="align-middle mb-25">
                                    <img src="{{ asset('upload/posts/'.$top_ten_ranking_post->image) }}" alt="{{ $top_ten_ranking_post->title }}" class="rounded-circle img-40 align-top mr-15">
                                    <div class="d-inline-block">
                                        <a><h6>{{ $top_ten_ranking_post->title }}</h6></a>
                                        <div class="d-flex">
                                            <b class="mr-10"><i class="ik ik-eye"></i> <em>{{ $top_ten_ranking_post->view_count }}</em></b>
                                            <b class="mr-10"><i class="ik ik-heart-on"></i> <em>{{ $top_ten_ranking_post->favorites->count() }}</em></b>
                                            <b class="mr-10"><i class="fa fa-comments"></i> <em>{{ $top_ten_ranking_post->comments->count() }}</em></b>
                                        </div>
                                        <p class="text-muted mb-0">{{ $top_ten_ranking_post->created_at->diffForHumans() }}</p>
                                        <span class="status active"></span>
                                    </div>
                                </div>
                            @empty
                                Top ranking post has empty
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="card new-cust-card">
                        <div class="card-header">
                            <h3>Top 10 favorites posts</h3>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                    <li><i class="ik ik-minus minimize-card"></i></li>
                                    <li><i class="ik ik-x close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block">
                            @forelse($top_ten_favorite_posts as $top_ten_favorite_post)
                                <div class="align-middle mb-25">
                                    <img src="{{ asset('upload/posts/'.$top_ten_favorite_post->image) }}" alt="{{ $top_ten_favorite_post->title }}" class="rounded-circle img-40 align-top mr-15">
                                    <div class="d-inline-block">
                                        <a><h6>{{ $top_ten_favorite_post->title }}</h6></a>
                                        <div class="d-flex">
                                            <b class="mr-10"><i class="ik ik-eye"></i> <em>{{ $top_ten_favorite_post->view_count }}</em></b>
                                            <b class="mr-10"><i class="ik ik-heart-on"></i> <em>{{ $top_ten_favorite_post->favorites->count() }}</em></b>
                                            <b class="mr-10"><i class="fa fa-comments"></i> <em>{{ $top_ten_favorite_post->comments->count() }}</em></b>
                                        </div>
                                        <p class="text-muted mb-0">{{ $top_ten_favorite_post->created_at->diffForHumans() }}</p>
                                        <span class="status active"></span>
                                    </div>
                                </div>
                            @empty
                                Favorites post has empty
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="card new-cust-card">
                        <div class="card-header">
                            <h3>Top 10 commentable posts</h3>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                    <li><i class="ik ik-minus minimize-card"></i></li>
                                    <li><i class="ik ik-x close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block">
                            @forelse($top_ten_commentable_posts as $top_ten_commentable_post)
                                <div class="align-middle mb-25">
                                    <img src="{{ asset('upload/posts/'.$top_ten_commentable_post->image) }}" alt="{{ $top_ten_commentable_post->title }}" class="rounded-circle img-40 align-top mr-15">
                                    <div class="d-inline-block">
                                        <a><h6>{{ $top_ten_commentable_post->title }}</h6></a>
                                        <div class="d-flex">
                                            <b class="mr-10"><i class="ik ik-eye"></i> <em>{{ $top_ten_commentable_post->view_count }}</em></b>
                                            <b class="mr-10"><i class="ik ik-heart-on"></i> <em>{{ $top_ten_commentable_post->favorites->count() }}</em></b>
                                            <b class="mr-10"><i class="fa fa-comments"></i> <em>{{ $top_ten_commentable_post->comments->count() }}</em></b>
                                        </div>
                                        <p class="text-muted mb-0">{{ $top_ten_commentable_post->created_at->diffForHumans() }}</p>
                                        <span class="status active"></span>
                                    </div>
                                </div>
                            @empty
                                Commentable post has empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6 col-md-6 col-6">
                    <div class="card prod-p-card bg-teal">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="mb-5 text-white">All Posts Total Views</h6>
                                    <h3 class="mb-0 fw-700 text-white">{{ $posts_total_view_count ?? '' }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-money-bill-alt text-red f-18"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-6">
                    <div class="card new-cust-card">
                        <div class="card-header">
                            <h3>Top 10 Popular posts</h3>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                    <li><i class="ik ik-minus minimize-card"></i></li>
                                    <li><i class="ik ik-x close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block">
                            @forelse($top_ten_popular_posts as $top_ten_popular_post)
                                <div class="align-middle mb-25">
                                    <img src="{{ asset('upload/posts/'.$top_ten_popular_post->image) }}" alt="{{ $top_ten_popular_post->title }}" class="rounded-circle img-40 align-top mr-15">
                                    <div class="d-inline-block">
                                        <a><h6>{{ $top_ten_popular_post->title }}</h6></a>
                                        <div class="d-flex">
                                            <b class="mr-10"><i class="ik ik-eye"></i> <em>{{ $top_ten_popular_post->view_count }}</em></b>
                                            <b class="mr-10"><i class="ik ik-heart-on"></i> <em>{{ $top_ten_popular_post->favorites->count() }}</em></b>
                                            <b class="mr-10"><i class="fa fa-comments"></i> <em>{{ $top_ten_popular_post->comments->count() }}</em></b>
                                        </div>
                                        <p class="text-muted mb-0">{{ $top_ten_popular_post->created_at->diffForHumans() }}</p>
                                        <span class="status active"></span>
                                    </div>
                                </div>
                            @empty
                                popular post has empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h4 id="site_information" class="text-center bg-teal text-white py-2">WebSite Information</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-4 col-6">
                    <div class="card prod-p-card bg-teal">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="mb-5 text-white">Total Categories</h6>
                                    <h3 class="mb-0 fw-700 text-white">{{ $total_categories ?? '' }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-money-bill-alt text-red f-18"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 col-6">
                    <div class="card prod-p-card bg-pink">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="mb-5 text-white">Total Tags</h6>
                                    <h3 class="mb-0 fw-700 text-white">{{ $total_tags ?? '' }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-money-bill-alt text-red f-18"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 col-6">
                    <div class="card prod-p-card bg-facebook">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="mb-5 text-white">Total Posts</h6>
                                    <h3 class="mb-0 fw-700 text-white">{{ $total_posts ?? '' }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-money-bill-alt text-red f-18"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 col-6">
                    <div class="card prod-p-card bg-orange">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="mb-5 text-white">Total Users</h6>
                                    <h3 class="mb-0 fw-700 text-white">{{ $total_users ?? '' }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-money-bill-alt text-red f-18"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 col-6">
                    <div class="card prod-p-card bg-purple">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="mb-5 text-white">Total Authors</h6>
                                    <h3 class="mb-0 fw-700 text-white">{{ $total_authors ?? '' }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-money-bill-alt text-red f-18"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 col-6">
                    <div class="card prod-p-card bg-lime">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="mb-5 text-white">Total Subscribers</h6>
                                    <h3 class="mb-0 fw-700 text-white">{{ $total_subscribers ?? '' }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-money-bill-alt text-red f-18"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 col-6">
                    <div class="card prod-p-card bg-google">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="mb-5 text-white">Total Navite User</h6>
                                    <h3 class="mb-0 fw-700 text-white">{{ $total_natives ?? '' }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-money-bill-alt text-red f-18"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 col-6">
                    <div class="card prod-p-card bg-success">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="mb-5 text-white">All Posts Total View</h6>
                                    <h3 class="mb-0 fw-700 text-white">{{ $total_view ?? '' }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-money-bill-alt text-red f-18"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 col-6">
                    <div class="card prod-p-card bg-linkedin">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="mb-5 text-white">Total Comments</h6>
                                    <h3 class="mb-0 fw-700 text-white">{{ $total_comments ?? '' }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-money-bill-alt text-red f-18"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 col-6">
                    <div class="card prod-p-card bg-aqua">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="mb-5 text-white">Total Pending Posts</h6>
                                    <h3 class="mb-0 fw-700 text-white">{{ $total_pending_all_posts ?? '' }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-money-bill-alt text-red f-18"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 col-6">
                    <div class="card prod-p-card bg-warning">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="mb-5 text-white">Total Approved Posts</h6>
                                    <h3 class="mb-0 fw-700 text-white">{{ $total_approved_all_posts ?? '' }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-money-bill-alt text-red f-18"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 col-6">
                    <div class="card prod-p-card bg-navy">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="mb-5 text-white">Total Published Posts</h6>
                                    <h3 class="mb-0 fw-700 text-white">{{ $total_published_all_posts ?? '' }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-money-bill-alt text-red f-18"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 col-6">
                    <div class="card prod-p-card bg-yellow">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="mb-5 text-white">Total None Published Posts</h6>
                                    <h3 class="mb-0 fw-700 text-white">{{ $total_none_published_all_posts ?? '' }}</h3>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-money-bill-alt text-red f-18"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


