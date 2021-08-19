@extends('layouts.frontend')
@section('content')
    <div class="breadcrumb-area pt-205 breadcrumb-padding pb-210" style="background-image: url({{asset('frontend')}}/assets/img/bg/page1.jpg)">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h2>Home</h2>
            </div>
        </div>
    </div>

    <div class="blog-area pt-40 pb-40">
        <div class="container">
            <div class="section-title-3 text-center mb-50">
                <h2>Our Latest Posts</h2>
            </div>
            <div class="row">
                @foreach($posts as $post)
                <div class="col-md-3 col-sm-4 col-6">
                    <div class="blog-wrapper mb-40">
                        <div class="blog-img blog-hover">
                            <a href="{{ route('post',$post->slug) }}"><img src="{{ asset('upload/posts/'.$post->image) }}"
                                                                     alt=""></a>
                        </div>
                        <div class="blog-info">
                            <h4><a href="{{ route('post',$post->slug) }}">{{ $post->title }}</a></h4>
                            <div class="d-flex mb-2">
                                <b class="mr-15"><i class="pe-7s-look font-weight-bold" style="font-size: 20px;"></i> <span>({{ $post->view_count }})</span></b>
                                <b class="mr-15"><i class="pe-7s-like font-weight-bold @auth {{!Auth::user()->favorites->where('pivot.post_id',$post->id)->count() == 0 ? 'text-info' : '' }} @endauth" style="font-size: 20px;"></i> <span id="count-{{ $post->id }}">({{ $post->favorites->count() }})</span></b>
                                <b><i class="pe-7s-comment font-weight-bold" style="font-size: 20px;"></i> <span>({{ $post->comments->count() }})</span></b>
                            </div>
                            <span>{{ $post->updated_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-12">
                    <a href="{{ route('posts') }}" class="btn btn-block btn-outline-success font-weight-bold btn-lg">See all posts click here</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="blog-area pt-40 pb-40">
                    <div class="container">
                        <div class="section-title-3 text-center mb-50">
                            <h2>Top Ten Popular  Posts</h2>
                        </div>
                        <div class="row">
                            @foreach($popular_posts as $popular_post)
                            <div class="col-md-6 col-6">
                                <div class="blog-wrapper mb-40">
                                    <div class="blog-img blog-hover">
                                        <a href="{{ route('post',$popular_post->slug) }}"><img src="{{ asset('upload/posts/'.$popular_post->image) }}" alt="{{ $popular_post->title }}"></a>
                                    </div>
                                    <div class="blog-info">
                                        <h4><a href="{{ route('post',$popular_post->slug) }}">{{ $popular_post->title }}</a></h4>
                                        <div class="d-flex mb-2">
                                            <b class="mr-15"><i class="pe-7s-look font-weight-bold" style="font-size: 20px;"></i> <span>({{ $popular_post->view_count }})</span></b>
                                            <b class="mr-15"><i class="pe-7s-like font-weight-bold @auth {{!Auth::user()->favorites->where('pivot.post_id',$popular_post->id)->count() == 0 ? 'text-info' : '' }} @endauth" style="font-size: 20px;"></i> <span id="count-{{ $popular_post->id }}">({{ $popular_post->favorites->count() }})</span></b>
                                            <b><i class="pe-7s-comment font-weight-bold" style="font-size: 20px;"></i> <span>({{ $popular_post->comments->count() }})</span></b>
                                        </div>
                                        <span>{{ $popular_post->updated_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="blog-area pt-40 pb-40">
                    <div class="container">
                        <div class="section-title-3 text-center mb-50">
                            <h2>Top Ten Posts Highest View</h2>
                        </div>
                        <div class="row">
                            @foreach($top_ten_view_posts as $top_ten_view_post)
                            <div class="col-md-6 col-6">
                                <div class="blog-wrapper mb-40">
                                    <div class="blog-img blog-hover">
                                        <a href="{{ route('post',$top_ten_view_post->slug) }}"><img src="{{ asset('upload/posts/'.$top_ten_view_post->image) }}" alt="{{ $top_ten_view_post->title }}"></a>
                                    </div>
                                    <div class="blog-info">
                                        <h4><a href="{{ route('post',$top_ten_view_post->slug) }}">{{ $top_ten_view_post->title }}</a></h4>
                                        <div class="d-flex mb-2">
                                            <b class="mr-15"><i class="pe-7s-look font-weight-bold" style="font-size: 20px;"></i> <span>({{ $top_ten_view_post->view_count }})</span></b>
                                            <b class="mr-15"><i class="pe-7s-like font-weight-bold @auth {{!Auth::user()->favorites->where('pivot.post_id',$top_ten_view_post->id)->count() == 0 ? 'text-info' : '' }} @endauth" style="font-size: 20px;"></i> <span id="count-{{ $top_ten_view_post->id }}">({{ $top_ten_view_post->favorites->count() }})</span></b>
                                            <b><i class="pe-7s-comment font-weight-bold" style="font-size: 20px;"></i> <span>({{ $top_ten_view_post->comments->count() }})</span></b>
                                        </div>
                                        <span>{{ $top_ten_view_post->updated_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-area pt-40 pb-40">
        <div class="container">
            <div class="section-title-3 text-center mb-50">
                <h2>Top Favorite Posts</h2>
            </div>
            <div class="row">
                @foreach($top_favorite_posts as $top_favorite_post)
                <div class="col-md-3 col-6">
                    <div class="blog-wrapper mb-40">
                        <div class="blog-img blog-hover">
                            <a href="{{ route('post',$top_favorite_post->slug) }}"><img src="{{ asset('upload/posts/'.$top_favorite_post->image) }}" alt="{{ $top_favorite_post->title }}"></a>
                        </div>
                        <div class="blog-info">
                            <h4><a href="{{ route('post',$top_favorite_post->slug) }}">{{ $top_favorite_post->title }}</a></h4>
                            <div class="d-flex mb-2">
                                <b class="mr-15"><i class="pe-7s-look font-weight-bold" style="font-size: 20px;"></i> <span>({{ $top_favorite_post->view_count }})</span></b>
                                <b class="mr-15"><i class="pe-7s-like font-weight-bold @auth {{!Auth::user()->favorites->where('pivot.post_id',$top_favorite_post->id)->count() == 0 ? 'text-info' : '' }} @endauth" style="font-size: 20px;"></i> <span id="count-{{ $top_favorite_post->id }}">({{ $top_favorite_post->favorites->count() }})</span></b>
                                <b><i class="pe-7s-comment font-weight-bold" style="font-size: 20px;"></i> <span>({{ $top_favorite_post->comments->count() }})</span></b>
                            </div>
                            <span>{{ $top_favorite_post->updated_at->diffForHumans() }} </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
