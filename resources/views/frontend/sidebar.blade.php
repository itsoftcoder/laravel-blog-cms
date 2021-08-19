<div class="col-lg-3">
    <div class="shop-sidebar">
        @if(\Illuminate\Support\Facades\Request::is('post/*'))
            <div class="sidebar-widget mb-50">
                <img src="{{ asset('upload/users/'.$post->user->profile_photo_path) }}" alt="">
                <div class="sidebar-img-content">
                    <p>{{ $post->user->about }}</p>
                    <h4><a href="{{ route('user_posts',$post->user->username) }}">{{ $post->user->name }}</a></h4>
                    <span>{{ $post->user->role->name }}</span>
                    <div class="sidebar-img-social">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="icofont icofont-social-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icofont icofont-social-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icofont icofont-social-pinterest"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icofont icofont-social-flikr"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        <div class="sidebar-widget mb-50">
            <h3 class="sidebar-title">Search Posts</h3>
            <div class="sidebar-search">
                <form action="#">
                    <input placeholder="Search posts..." type="text">
                    <button><i class="ti-search"></i></button>
                </form>
            </div>
        </div>
        <div class="sidebar-widget mb-45">
            <h3 class="sidebar-title">Categories</h3>
            <div class="sidebar-categories">
                <ul>
                    @foreach($categories as $category)
                        <li><a class="@if(\Illuminate\Support\Facades\Request::path() === 'category/'.$category->slug) text-info @endif" href="{{ route('category_posts',$category->slug)  }}">{{ $category->name }} <span>{{ $category->posts->count() }}</span></a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="sidebar-widget mb-45">
            <h3 class="sidebar-title">Authors</h3>
            <div class="sidebar-categories">
                <ul>
                    @foreach($authors as $author)
                        <li><a class="@if(\Illuminate\Support\Facades\Request::path() === 'author/'.$author->username) text-info @endif" href="{{ route('user_posts',$author->username)  }}">{{ $author->name }} <span>{{ $author->posts->count() }}</span></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="sidebar-widget mb-40">
            <h3 class="sidebar-title">Tags</h3>
            <div class="product-tags">
                <ul>
                    @foreach($tags as $tag)
                        <li><a class="@if(\Illuminate\Support\Facades\Request::path() === 'tag/'.$tag->slug) text-info @endif" href="{{ route('tag_posts',$tag->slug)  }}">{{ $tag->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="sidebar-widget mb-50">
            <h3 class="sidebar-title">Top ranking posts</h3>
            <div class="sidebar-top-rated-all">
                @foreach($top_ranking_posts as $top_ranking_post)
                <div class="sidebar-top-rated mb-30">
                    <div class="single-top-rated">
                        <div class="top-rated-img">
                            <a href="{{ route('post',$top_ranking_post->slug) }}"><img style="width: 91px;height: 88px;" src="{{ asset('upload/posts/'.$top_ranking_post->image) }}" alt="{{ $top_ranking_post->title }}"></a>
                        </div>
                        <div class="top-rated-text">
                            <h4><a href="{{ route('post',$top_ranking_post->slug) }}">{{ $top_ranking_post->title }}</a></h4>
                            <div class="d-flex mb-2">
                                <b class="mr-15"><i class="pe-7s-look font-weight-bold" style="font-size: 20px;"></i> <span>({{ $top_ranking_post->view_count }})</span></b>
                                <b class="mr-15"><i class="pe-7s-like font-weight-bold @auth {{!Auth::user()->favorites->where('pivot.post_id',$top_ranking_post->id)->count() == 0 ? 'text-info' : '' }} @endauth" style="font-size: 20px;"></i> <span id="count-{{ $top_ranking_post->id }}">({{ $top_ranking_post->favorites->count() }})</span></b>
                                <b><i class="pe-7s-comment font-weight-bold" style="font-size: 20px;"></i> <span>({{ $top_ranking_post->comments->count() }})</span></b>
                            </div>
                            <span>{{ $top_ranking_post->updated_at->diffForHumans() }} </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
