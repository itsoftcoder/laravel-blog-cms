@extends('layouts.frontend')

@section('content')
    <div class="breadcrumb-area pt-205 breadcrumb-padding pb-210" style="background-image: url({{ asset('frontend') }}/assets/img/bg/page5.jpg); background-position: bottom">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h2>{{ \Illuminate\Support\Str::title($category->name) }}</h2>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li> <a>Category</a></li>
                    <li>{{ $category->name }}</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="shop-page-wrapper shop-page-padding ptb-100">
        <div class="container-fluid">
            <div class="row">
               @include('frontend.sidebar')
                <div class="col-lg-9">
                    <div class="shop-product-wrapper res-xl res-xl-btn">
                        <div class="shop-bar-area">
                            <div class="shop-bar pb-60">
                                <div class="shop-found-selector">
                                    <div class="shop-found">
                                        <p><span>{{ $posts->count() }}</span> Post Found of <span>{{ $posts->total() }}</span></p>
                                    </div>
                                    <div class="shop-selector">
                                        <label>Sort By : </label>
                                        <select name="select">
                                            <option value="">Default</option>
                                            <option value="">A to Z</option>
                                            <option value=""> Z to A</option>
                                            <option value="">In stock</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="shop-filter-tab">
                                    <div class="shop-tab nav" role="tablist">
                                        <a class="active" href="#grid-sidebar1" data-toggle="tab" role="tab" aria-selected="false">
                                            <i class="ti-layout-grid4-alt"></i>
                                        </a>
                                        <a href="#grid-sidebar2" data-toggle="tab" role="tab" aria-selected="true">
                                            <i class="ti-menu"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-product-content tab-content">
                                <div id="grid-sidebar1" class="tab-pane fade active show">
                                    <div class="row">
                                        @foreach($posts as $post)
                                            <div class="col-lg-6 col-md-6 col-xl-3">
                                                <div class="product-wrapper mb-30">
                                                    <div class="product-img">
                                                        <a href="{{ route('post',$post->slug) }}">
                                                            <img src="{{ asset('upload/posts/'.$post->image) }}" alt="{{ $post->title }}">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <h4><a href="{{ route('post',$post->slug) }}">{{ $post->title }} </a></h4>
                                                        <div class="d-flex mb-2">
                                                            <b class="mr-15"><i class="pe-7s-look font-weight-bold" style="font-size: 20px;"></i> <span>({{ $post->view_count }})</span></b>
                                                            <b class="mr-15"><i class="pe-7s-like font-weight-bold @auth {{!Auth::user()->favorites->where('pivot.post_id',$post->id)->count() == 0 ? 'text-info' : '' }} @endauth" style="font-size: 20px;"></i> <span id="count-{{ $post->id }}">({{ $post->favorites->count() }})</span></b>
                                                            <b><i class="pe-7s-comment font-weight-bold" style="font-size: 20px;"></i> <span>({{ $post->comments->count() }})</span></b>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div id="grid-sidebar2" class="tab-pane fade">
                                    <div class="row">
                                        @foreach($posts as $post)
                                            <div class="col-lg-12 col-xl-6">
                                                <div class="product-wrapper mb-30 single-product-list product-list-right-pr mb-60">
                                                    <div class="product-img list-img-width">
                                                        <a href="#">
                                                            <img src="{{ asset('upload/posts/'.$post->image) }}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product-content-list">
                                                        <div class="product-list-info">
                                                            <h4><a href="#">{{ $post->title }}</a></h4>
                                                            <div class="d-flex mb-2">
                                                                <b class="mr-15"><i class="pe-7s-look font-weight-bold" style="font-size: 20px;"></i> <span>({{ $post->view_count }})</span></b>
                                                                <b class="mr-15"><i class="pe-7s-like font-weight-bold @auth {{!Auth::user()->favorites->where('pivot.post_id',$post->id)->count() == 0 ? 'text-info' : '' }} @endauth" style="font-size: 20px;"></i> <span id="count-{{ $post->id }}">({{ $post->favorites->count() }})</span></b>
                                                                <b><i class="pe-7s-comment font-weight-bold" style="font-size: 20px;"></i> <span>({{ $post->comments->count() }})</span></b>
                                                            </div>
                                                        </div>
                                                        <div class="product-list-cart-wishlist">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
