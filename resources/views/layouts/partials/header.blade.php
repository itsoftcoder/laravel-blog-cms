<header class="header-top" header-theme="light">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div class="top-menu d-flex align-items-center">
                <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                <div class="header-search">
                    <div class="input-group">
                        <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                        <input type="text" class="form-control">
                        <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                    </div>
                </div>
                <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
            </div>
            <div class="top-menu d-flex align-items-center">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="notiDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-bell"></i><span class="badge bg-danger">@if(Request::user()->role->id == 1){{ \App\Models\Notification::where('status',0)->count() }}@endif</span></a>
                    <div class="dropdown-menu dropdown-menu-right notification-dropdown" aria-labelledby="notiDropdown">
                        <h4 class="header">Notifications</h4>
                        <div class="notifications-wrap">
                            @if(Request::user()->role->id == 1)
                                @forelse(\App\Models\Notification::latest()->where('status',0)->get() as $notification)
                                <a href="{{ route('admin.post.show',$notification->post->slug) }}" class="media">
                                            <span class="d-flex">
                                                <img src="{{ asset('upload/users/'.$notification->user->image) }}" class="img-fluid img-30 rounded-circle">
                                            </span>
                                <span class="media-body">
                                                <span class="heading-font-family media-heading">{{ $notification->title }}</span>
                                                <span class="media-content">{{ $notification->content ?? $notification->created_at->diffForHumans() }}</span>
                                            </span>
                            </a>
                                    @empty
                                    <span class=" pl-10 text-danger heading-font-family media-heading">New Notification has Empty</span>
                                @endforelse
                                <div class="footer"><a href="javascript:void(0);">See all activity</a></div>
                            @endif
                        </div>
                    </div>
                </div>
{{--                <button type="button" class="nav-link ml-10 right-sidebar-toggle"><i class="ik ik-message-square"></i><span class="badge bg-success">3</span></button>--}}
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-plus"></i></a>
                    <div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Dashboard"><i class="ik ik-bar-chart-2"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Message"><i class="ik ik-mail"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Accounts"><i class="ik ik-users"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Sales"><i class="ik ik-shopping-cart"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Purchase"><i class="ik ik-briefcase"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Pages"><i class="ik ik-clipboard"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Chats"><i class="ik ik-message-square"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Contacts"><i class="ik ik-map-pin"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Blocks"><i class="ik ik-inbox"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Events"><i class="ik ik-calendar"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="Notifications"><i class="ik ik-bell"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="More"><i class="ik ik-more-horizontal"></i></a>
                    </div>
                </div>
                <button type="button" class="nav-link ml-10" id="apps_modal_btn" data-toggle="modal" data-target="#appsModal"><i class="ik ik-grid"></i></button>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="{{ asset('upload/users/'.Auth::user()->profile_photo_path) }}" alt=""></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        @if(Request::user()->role->id == 1)
                            <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="ik ik-user dropdown-icon"></i> Profile</a>
                            <a class="dropdown-item" href="{{ route('admin.setting') }}"><i class="ik ik-settings dropdown-icon"></i> Change Password</a>
                        @endif
                            @if(Request::user()->role->id == 2)
                                <a class="dropdown-item" href="{{ route('author.profile') }}"><i class="ik ik-user dropdown-icon"></i> Profile</a>
                                <a class="dropdown-item" href="{{ route('author.setting') }}"><i class="ik ik-settings dropdown-icon"></i> Change Password</a>
                            @endif
                        <a class="dropdown-item" href="#"><span class="float-right"><span class="badge badge-primary">6</span></span><i class="ik ik-mail dropdown-icon"></i> Inbox</a>
                        <a class="dropdown-item" href="#"><i class="ik ik-navigation dropdown-icon"></i> Message</a>
                        <a class="dropdown-item" href="{{ route('logout')  }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ik ik-power dropdown-icon"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</header>

