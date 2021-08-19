@extends('layouts.backend')
@section('title')
    Create new post - MBlog
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/summernote/dist/summernote-bs4.css">
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
                                <h5>Create New Post</h5>
                                <span>Create New post below here</span>
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
                                <li class="breadcrumb-item active" aria-current="page">Create new post</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            {{--             breadcrumb end here--}}
            {{--             Content start here--}}
            <form action="{{ route('author.post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header"><h3>Create new Post</h3></div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputUsername2" class="col-form-label">Post Title</label>
                                    <div class="">
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror form-control-sm" placeholder="Enter Post Title">
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Featured Image</label>
                                    <div class="">
                                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror form-control-sm">
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="checkbox-fade @error('publish') is-invalid @enderror fade-in-success">
                                        <label>
                                            <input type="checkbox" name="publish" value="1">
                                            <span class="cr">
                                                <i class="cr-icon ik ik-check txt-success"></i>
                                            </span>
                                            <span>Publish</span>
                                        </label>
                                        @error('publish')
                                        <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header"><h3>Categories And Tag</h3></div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Categories</label>
                                    <select class="form-control @error('categories') is-invalid @enderror select2" multiple="multiple" name="categories[]">
                                        <option disabled>Choose categories</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('categories')
                                    <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Tags</label>
                                    <select class="form-control @error('tags') is-invalid @enderror select2" multiple="multiple" name="tags[]">
                                        <option disabled>Choose tags</option>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tags')
                                    <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('author.post.index') }}" class="btn btn-instagram"><i class="ik ik-skip-back"></i> Back</a>
                                        <button type="submit" class="btn btn-success"><i class="ik ik-check-square"></i> Publish</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"><h3>Post Body</h3></div>
                            <div class="card-body">
                                <textarea class="form-control @error('body') is-invalid @enderror html-editor" name="body" rows="10"></textarea>
                                @error('body')
                                <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            {{--             Content end here--}}
        </div>
    </div>

    @push('jsUp')
        <script src="{{ asset('assets') }}/plugins/select2/dist/js/select2.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/summernote/dist/summernote-bs4.min.js"></script>
    @endpush
    @push('script')
       <script>
           $(".select2").select2();
           $('.html-editor').summernote({
               height: 300,
               tabsize: 2
           });
       </script>
    @endpush
@endsection


