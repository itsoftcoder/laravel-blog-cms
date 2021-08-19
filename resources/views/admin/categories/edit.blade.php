@extends('layouts.backend')
@section('title')
    Edit Category {{ $category->name }} - MBlog
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
                                <h5>Edit Category <b class="text-google">{{ $category->name }}</b></h5>
                                <span>Edit Category below here</span>
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
                                    <a href="{{ route('admin.dashboard')  }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.category.index')  }}">Categories</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Category <b class="text-instagram">{{ $category->name }}</b></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            {{--             breadcrumb end here--}}
            {{--             Content start here--}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><h3>Edit Category</h3></div>
                        <div class="card-body">
                            <div class="card-img-top">
                                <img src="{{ asset('upload/category/'.$category->image) }}">
                            </div>
                            <form class="forms-sample" action="{{ route('admin.category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Category Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{ $category->name ?? old('name') }}" name="name" class="form-control @error('name') is-invalid @enderror form-control-sm" placeholder="Enter category name">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-sm mr-2"><i class="ik ik-check"></i> Update Category</button>
                                <a href="{{ route('admin.category.index') }}" class="btn btn-light">Back</a>
                            </form>
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

