@extends('layouts.backend')

@section('title')
    Profile - Mblog
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
                                <h5>Profile</h5>
                                <span>User posts, comments , favorites Post and role below</span>
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
                                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ asset('upload/users/'.$user->profile_photo_path) }}" alt="{{ $user->name }}" class="rounded-circle" width="150">
                                <h4 class="card-title mt-10">{{ $user->name }}</h4>
                                <p class="card-subtitle">{{ $user->role->name }}</p>
                                <div class="row text-center justify-content-md-center">
                                    <div class="col-4"><a href="javascript:void(0)" class="link"><i class="ik ik-user"></i> <font class="font-medium">254</font></a></div>
                                    <div class="col-4"><a href="javascript:void(0)" class="link"><i class="ik ik-image"></i> <font class="font-medium">54</font></a></div>
                                </div>
                            </div>
                        </div>
                        <hr class="mb-0">
                        <div class="card-body">
                            <small class="text-muted d-block">Email address </small>
                            <h6>{{ $user->email }}</h6>
                            <small class="text-muted d-block pt-10">Username</small>
                            <h6>{{ $user->username }}</h6>
                            <small class="text-muted d-block pt-30">Social Profile</small>
                            <br>
                            <button class="btn btn-icon btn-facebook"><i class="fab fa-facebook-f"></i></button>
                            <button class="btn btn-icon btn-twitter"><i class="fab fa-twitter"></i></button>
                            <button class="btn btn-icon btn-instagram"><i class="fab fa-instagram"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="card">
                        <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                            </li>



                            <li class="nav-item">
                                <a class="nav-link" id="pills-posts-tab" data-toggle="pill" href="#posts" role="tab" aria-controls="pills-posts" aria-selected="false">Posts <b>({{$posts->count()}})</b></a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" id="pills-comments-tab" data-toggle="pill" href="#comments" role="tab" aria-controls="pills-comments" aria-selected="false">Comment Posts <b>({{$comments->count()}})</b></a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" id="pills-favorites-tab" data-toggle="pill" href="#favorites" role="tab" aria-controls="pills-favorites" aria-selected="false">Favorite Posts <b>({{$favorites->count()}})</b></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Setting</a>
                            </li>


                        </ul>
                        <div class="tab-content" id="pills-tabContent">

                            <div class="tab-pane fade active show" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 col-6"> <strong>Full Name</strong>
                                            <br>
                                            <p class="text-muted">{{ $user->name }}</p>
                                        </div>
                                        <div class="col-md-4 col-6"> <strong>Username</strong>
                                            <br>
                                            <p class="text-muted">{{ $user->username }}</p>
                                        </div>
                                        <div class="col-md-4 col-6"> <strong>Email</strong>
                                            <br>
                                            <p class="text-muted">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                     <hr/>
                                    <div class="row">
                                        <div class="col-md-4 col-6"> <strong>Total Posts</strong>
                                            <br>
                                            <p class="text-muted">{{ $posts->count() }}</p>
                                        </div>
                                        <div class="col-md-4 col-6"> <strong>Total Comments</strong>
                                            <br>
                                            <p class="text-muted">{{ $comments->count() }}</p>
                                        </div>
                                        <div class="col-md-4 col-6"> <strong>Total Add Favorite Posts</strong>
                                            <br>
                                            <p class="text-muted">{{ $favorites->count() }}</p>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-md-12">{!! $user->about !!}</div>
                                    </div>

                                </div>
                            </div>



                            <div class="tab-pane fade" id="posts" role="tabpanel" aria-labelledby="pills-posts-tab">
                                <div class="card-body chat-box scrollable">
                                    <ul class="chat-list">
                                        @foreach($posts as $post)
                                        <li class="chat-item">
                                            <div class="chat-img"><img src="{{ asset('upload/posts/'.$post->image) }}" alt="user"></div>
                                            <div class="chat-content">
                                                <h6 class="font-medium">{{ $post->title }}</h6>
                                                <div class="box bg-light-info">
                                                    <div>Total View : <b>({{ $post->view_count }})</b> Total Comments : <b>({{ $post->comments->count() }})</b> Total Favorite : <b>({{ $post->favorites->count() }})</b></div>

                                                        <a href="{{ route('admin.post.edit',$post->slug) }}" class="btn text-secondary btn-sm  btn-outline-primary"><i class="ik ik-edit-2"></i></a>

                                                        <button onclick="deleteItem({{$post->id}})" class="btn btn-outline-danger btn-sm"><i class="ik ik-trash-2"></i></button>
                                                        <form style="display: none;" id="delete-item-{{ $post->id }}" action="{{ route('admin.post.destroy',$post->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>

                                                </div>
                                            </div>
                                            <div class="chat-time">{{ $post->updated_at->diffForHumans() }}</div>
                                        </li>
                                        @endforeach
                                        {{ $posts->links() }}
                                    </ul>
                                </div>
                            </div>



                            <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="pills-comments-tab">
                                <div class="card-body chat-box scrollable">
                                    <ul class="chat-list">
                                        @foreach($comments as $comment)
                                        <li class="chat-item">
                                            <div class="chat-img"><img src="{{ asset('upload/posts/'.$comment->post->image) }}" alt="{{ $comment->post->title }}"></div>
                                            <div class="chat-content">
                                                <h6 class="font-medium">{{ $comment->post->title }}</h6>
                                                <div class="box bg-light-info">
                                                    {!! Str::words($comment->comment,10,'....') !!}<br/>

                                                    <a href="{{ route('admin.post.edit',$post->slug) }}" class="btn text-secondary btn-sm  btn-outline-primary"><i class="ik ik-edit-2"></i></a>

                                                    <button onclick="deleteComment({{$comment->id}})" class="btn btn-outline-danger btn-sm"><i class="ik ik-trash-2"></i></button>
                                                    <form style="display: none;" id="delete-comment-{{ $comment->id }}" action="{{ route('admin.comment.destroy',$comment->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>

                                            </div>
                                            <div class="chat-time">{{ $comment->updated_at->diffForHumans() }}</div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>



                            <div class="tab-pane fade" id="favorites" role="tabpanel" aria-labelledby="pills-favorites-tab">
                                <div class="card-body chat-box scrollable">
                                    <ul class="chat-list">
                                        @foreach($favorites as $favorite)
                                        <li class="chat-item">
                                            <div class="chat-img"><img src="{{ asset('upload/posts/'.$favorite->image) }}" alt="{{$favorite->title}}"></div>
                                            <div class="chat-content">
                                                <h6 class="font-medium">{{ $favorite->title }}</h6>
                                                <p>{{ $favorite->user->name }}</p>
                                                <div class="box bg-light-info">
                                                    <div>Total View : <b>({{ $favorite->view_count }})</b> Total Comments : <b>({{ $favorite->comments->count() }})</b> Total Favorite : <b>({{ $favorite->favorites->count() }})</b></div>
                                                    <button onclick="deleteFavorite({{$favorite->id}})" class="btn btn-outline-danger btn-sm"><i class="ik ik-trash-2"></i></button>
                                                    <form style="display: none;" id="delete-favorite-{{ $favorite->id }}" action="{{ route('admin.favorite.destroy',$favorite->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="chat-time">{{ $favorite->updated_at->diffForHumans() }}</div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>




                            <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                                <div class="card-body">
                                    <form class="form-horizontal" action="{{ route('admin.profile.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="example-name">Name</label>
                                            <input type="text"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name ?? old('name')}}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email">Email</label>
                                            <input type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email ?? old('email') }}">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="profile">Profile Image</label>
                                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="example-message">About</label>
                                            <textarea name="about" rows="5" class="form-control @error('about') is-invalid @enderror">{{ $user->about ?? old('about') }}</textarea>
                                            @error('about')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <button class="btn btn-success" type="submit">Update Profile</button>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('jsUp')
    <script src="{{ asset('assets') }}/plugins/sweetalert/dist/sweetalert.min.js"></script>
@endpush

@push('script')
    <script>
        function deleteItem(id) {
            swal({
                title: "Are you sure?",
                text: "Do you really want to delete this item?",
                icon: "warning",
                buttons: ["Cancel", "Delete Now"],
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        event.preventDefault();
                        document.getElementById('delete-item-'+id).submit();
                        swal({
                            title: "Deleted",
                            text: "The list item has been deleted!",
                            icon: "success",
                        });
                    } else {
                        swal("The item is not deleted!");
                    }
                });
        }


        function deleteComment(id) {
            swal({
                title: "Are you sure?",
                text: "Do you really want to delete this item?",
                icon: "warning",
                buttons: ["Cancel", "Delete Now"],
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        event.preventDefault();
                        document.getElementById('delete-comment-'+id).submit();
                        swal({
                            title: "Deleted",
                            text: "The list item has been deleted!",
                            icon: "success",
                        });
                    } else {
                        swal("The item is not deleted!");
                    }
                });
        }



        function deleteFavorite(id) {
            swal({
                title: "Are you sure?",
                text: "Do you really want to delete this item?",
                icon: "warning",
                buttons: ["Cancel", "Delete Now"],
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        event.preventDefault();
                        document.getElementById('delete-favorite-'+id).submit();
                        swal({
                            title: "Deleted",
                            text: "The list item has been deleted!",
                            icon: "success",
                        });
                    } else {
                        swal("The item is not deleted!");
                    }
                });
        }
    </script>
@endpush
