<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="../index.html">
{{--            <div class="logo-img">--}}
{{--                <img src="../src/img/brand-white.svg" class="header-brand-img" alt="lavalite">--}}
{{--            </div>--}}
            <span class="text">MBlog</span>
        </a>
        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                @if(Request::user()->role->id == 1)
                    <div class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                    </div>

                    <div class="nav-item {{ Request::is('admin/tag*') ? 'active' : '' }}">
                        <a href="{{ route('admin.tag.index') }}"><i class="ik ik-bar-chart-2"></i><span>Tags</span></a>
                    </div>

                    <div class="nav-item {{ Request::is('admin/category*') ? 'active' : '' }}">
                        <a href="{{ route('admin.category.index') }}"><i class="ik ik-bar-chart-2"></i><span>Category</span></a>
                    </div>

                    <div class="nav-item {{ Request::is('admin/post*') ? 'active' : '' }}">
                        <a href="{{ route('admin.post.index') }}"><i class="ik ik-bar-chart-2"></i><span>Posts</span></a>
                    </div>

                    <div class="nav-item {{ Request::is('admin/pending/post') ? 'active' : '' }}">
                        <a href="{{ route('admin.post.pending') }}"><i class="ik ik-bar-chart-2"></i><span>Pending Posts</span></a>
                    </div>

                    <div class="nav-item {{ Request::is('admin/authors') ? 'active' : '' }}">
                        <a href="{{ route('admin.authors.index') }}"><i class="ik ik-bar-chart-2"></i><span>Authors</span></a>
                    </div>

                    <div class="nav-item {{ Request::is('admin/subscriber') ? 'active' : '' }}">
                        <a href="{{ route('admin.subscriber.index') }}"><i class="ik ik-bar-chart-2"></i><span>Subscriber</span></a>
                    </div>

                    <div class="nav-item {{ Request::is('admin/native') ? 'active' : '' }}">
                        <a href="{{ route('admin.native.index') }}"><i class="ik ik-bar-chart-2"></i><span>Native User</span></a>
                    </div>

                @endif

                @if(Request::user()->role->id == 2)
                    <div class="nav-item {{ Route::is('author.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('author.dashboard') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                    </div>
                        <div class="nav-item {{ Request::is('author/post*') ? 'active' : '' }}">
                            <a href="{{ route('author.post.index') }}"><i class="ik ik-bar-chart-2"></i><span>Posts</span></a>
                        </div>
                @endif
            </nav>
        </div>
    </div>
</div>
