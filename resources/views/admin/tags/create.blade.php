@extends('layouts.backend')
@section('title')
    Create new Tag - MBlog
@endsection

@push('css')

@endpush

@section('content')
    <div class="main-content">
        <div class="container-fluid">
{{--             breadcrumb start here--}}
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-file-text bg-blue"></i>
                            <div class="d-inline">
                                <h5>Create New Tag</h5>
                                <span>Create New tag below here</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/home') }}"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard')  }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.tag.index')  }}">Tags</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Create new tag</li>
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
                        <div class="card-header"><h3>Create new tag</h3></div>
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('admin.tag.store') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tag Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror form-control-sm" id="exampleInputUsername2" placeholder="Tag name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-success btn-sm mr-2"><i class="ik ik-check"></i> Add New Tag</button>
                                <a href="{{ route('admin.tag.index') }}" class="btn btn-light">Back</a>
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

