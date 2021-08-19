@extends('layouts.backend')
@section('title')
    Details post - MBlog
@endsection

@push('css')
@endpush

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            {{--             breadcrumb start here--}}
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-6">
                        <div class="page-header-title">
                            <i class="ik ik-file-text bg-blue"></i>
                            <div class="d-inline">
                                <h5>Details Post</h5>
                                <span>Details post below here</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/home') }}"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('author.dashboard')  }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('author.post.index')  }}">Posts</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Details post</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            {{--             breadcrumb end here--}}
            {{--             Content start here--}}

                <div class="row mb-2">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('author.post.index') }}" class="btn btn-warning"><i class="ik ik-skip-back"></i> Back</a>
                            <button class="btn btn-success" disabled>
                                @if($post->is_approved == 1)
                                    <i class="ik ik-check"></i> Approved
                                @else
                                    <i class="ik ik-refresh-ccw"></i> Pending
                                @endif
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="card">
                            <div class="bg-aqua">
                                <h1 class="text-google pl-2"><b>{{ Str::title($post->title) }}</b></h1>
                                <p class="pl-2 p">Added by <b>{{ $post->user->name }}</b> On <small>{{ $post->updated_at->format('d M Y h:i:s a') }}</small></p>
                            </div>
                            <div class="card-body">
                               {!! $post->body !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header bg-teal"><h3 class="text-light">Categories</h3></div>
                            <div class="card-body">
                                @foreach($post->categories as $category)
                                    <span class="badge badge-success">{{ $category->name }}</span>
                                @endforeach
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header bg-orange"><h3 class="text-light">Tags</h3></div>
                            <div class="card-body">
                                @foreach($post->tags as $tag)
                                    <span class="badge badge-teal text-light">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header bg-facebook"><h3 class="text-light">Featured Image</h3></div>
                            <div class="card-body text-center">
                               <img class="card-img img-fluid" src="{{ asset('upload/posts/'.$post->image) }}">
                            </div>
                        </div>
                    </div>
                </div>
            {{--             Content end here--}}
        </div>
    </div>

    @push('jsUp')

    @endpush
    @push('script')

    @endpush
@endsection


