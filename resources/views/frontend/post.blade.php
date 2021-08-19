@extends('layouts.frontend')

@section('content')
    <div class="breadcrumb-area pt-205 breadcrumb-padding pb-210" style="background-image: url({{ asset('frontend') }}/assets/img/bg/page4.jpg)">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h2>Post Details</h2>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('posts') }}">Posts</a></li>
                    <li class="active">{{ $post->title }}</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="shop-page-wrapper shop-page-padding ptb-100">
        <div class="container-fluid">
            <div class="row">
               @include('frontend.sidebar')
                <div class="col-lg-9">
                    <div class="blog-details-info">
                        <div class="blog-meta">
                            <ul>
                                @foreach($post->categories as $category)
                                <li><a href="{{ route('category_posts',$category->slug) }}">{{ $category->name }}</a></li>
                                @endforeach
                                <li>{{ $post->updated_at->diffForHumans() }}</li>
                            </ul>
                        </div>
                        <h3 class="mb-0">{{ $post->title }}</h3>
                        <div class="d-flex mb-2">
                            <b class="mr-15"><i class="pe-7s-look font-weight-bold" style="font-size: 20px;"></i> <span>({{ $post->view_count }})</span></b>
                            <b class="mr-15"><i class="pe-7s-like font-weight-bold @auth {{!Auth::user()->favorites->where('pivot.post_id',$post->id)->count() == 0 ? 'text-info' : '' }} @endauth" style="font-size: 20px;"></i> <span id="count-{{ $post->id }}">({{ $post->favorites->count() }})</span></b>
                            <b><i class="pe-7s-comment font-weight-bold" style="font-size: 20px;"></i> <span>({{ $post->comments->count() }})</span></b>
                        </div>
                        <img src="{{ asset('upload/posts/'.$post->image) }}" alt="{{ $post->title }}">
                        <div class="blog-feature">
                         {!! $post->body !!}
                        </div>
                        <div class="blog-meta mb-3">
                            <ul>
                                <li class="font-weight-bold text-danger">Tags</li>
                                @foreach($post->tags as $tag)
                                    <li><a href="{{ route('tag_posts',$tag->slug) }}">{{ $tag->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <button style="cursor: pointer;" id="love-{{$post->id}}"  type="button" @auth onclick="addFavorite({{$post->id}})" @else title="Please login then like this post" @endauth class="font-weight-bold btn btn-block @auth {{!Auth::user()->favorites->where('pivot.post_id',$post->id)->count() == 0 ? 'active' : '' }} btn-outline-info @else btn-outline-danger disabled @endauth">@auth {{!Auth::user()->favorites->where('pivot.post_id',$post->id)->count() == 0 ? 'Do you want to unlike this post please click here' : 'Do you want to like this post please click here' }} @else Do You want like this post please login @endauth </button>
                    </div>
                    <div class="leave-area mt-4">
                        <h4 class="blog-details-title">Leave your thought</h4>
                        <form @auth action="{{ route('comment_store',$post->id) }}" method="POST" @endauth>
                            @auth
                                @csrf
                            @endauth
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-leave">
                                        <textarea name="comment" placeholder="Comment*"></textarea>
                                    </div>
                                    <div class="leave-btn">
                                        <button  @auth style="cursor: pointer;" type="submit"  class="submit btn-hover" @else disabled="disabled" class="btn btn-danger" title="Please login then comment this post" @endauth ><i class="pe-7s-mail"></i> Comment</button>
                                    </div>
                                    @guest
                                        <p class="text-danger"><b>Please login first then comments any posts</b> <a class="btn btn-warning" href="{{ url('login') }}">Login</a></p>
                                    @endguest
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="blog-replay-wrapper">
                        <h4 class="blog-details-title2">HAVE {{ $post->comments->count() }} COMMENTS</h4>
                        @foreach($post->comments as $comment)
                        <div class="single-blog-replay">
                            <div class="replay-img">
                                <a href="{{ route('user_posts',$comment->user->username) }}"><img src="{{ asset('upload/users/'.$comment->user->profile_photo_path) }}" alt="{{ $comment->user->name }}" class="img-fluid rounded-circle" style="width: 80px;height: 80px;"></a>
                            </div>
                            <div class="replay-info-wrapper">
                                <div class="replay-info">
                                    <div class="replay-name-date">
                                        <h5><a href="#">{{ $comment->user->name }}</a></h5>
                                        <span>{{ $comment->updated_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="replay-btn">
                                        <a href="#">Reply</a>
                                    </div>
                                </div>
                                <p>{!! $comment->comment !!}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function addFavorite(id) {
            $.ajax({
                url: "/favorite/"+id+"/add",
                success: function (response) {
                    swal({
                        title: "Success",
                        text: response.success,
                        icon: "success",
                        dangerMode: false,
                    });

                    if(response.status === 'add'){
                        $('#love-'+id).removeClass('btn-outline-info');
                        $('#love-'+id).addClass('active btn-outline-success');
                        $('#love-'+id).text('Do you want to unlike this post please click here');
                        $('#count-'+id).addClass('text-info');
                    }
                    if(response.status === 'remove'){
                        $('#love-'+id).removeClass('active btn-outline-success');
                        $('#love-'+id).addClass('btn-outline-info');
                        $('#love-'+id).text('Do you want to like this post please click here');
                        $('#count-'+id).removeClass('text-info');
                    }
                    if(response.count){
                        $('#count-'+id).text(response.count);
                    }
                }
            });

        }
    </script>

    @if (session('status'))
        <script>
            $(document).ready(function() {
                swal({
                    title: "Success",
                    text: "{{ session('status') }}",
                    icon: "success",
                    dangerMode: false,
                })

            });
        </script>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <script>

                        $(document).ready(function() {
                            swal({
                                title: "Error",
                                text: "{{ $error }}",
                                icon: "error",
                                dangerMode: true,
                            })

                        });
                    </script>

                @endforeach
            </ul>
        </div>
    @endif
@endpush
