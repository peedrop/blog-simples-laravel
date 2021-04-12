<!-- Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="overflow-x: hidden;">
    <span>
        <a href="/" id="link-logo" class="brand-link icone-img link-logo">
            <span class="fa-stack">
                <img src="{{ asset('img/logo_fechada.png') }}" id="img-logo-close" class="brand-image display-none">
                <img src="{{ asset('img/codejr.png') }}" id="img-logo" class="img-logo ">
            </span>
        </a>
    </span>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-2 d-flex">
            <div class="image">
                <a href="{{ route('users.profile', Auth::user()->id ) }}">
                    <img src="{{ asset('storage/img/profile/' . Auth::user()->profile_path) }}" class="img-circle" alt="User Image">
                </a>
            </div>
            <div class="info">
                <a href="{{ route('users.profile', Auth::user()->id ) }}" class="d-block">{{ Auth::user()->nameSplit(2) }}</a>
            </div>
            <div class="info align-self-center">
                <form id="logout-form" method="post" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn-dark border-0" type="submit"><a href="" onclick="$('#logout-form').submit()" class="d-block"><i class="nav-icon fas fa-power-off"></i></a></button>
                </form>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="{{ route('home') }}" class="nav-link {{ Route::is('home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @can('is_admin', App\Models\User::class)
                    <li class="nav-item has-treeview">
                        <a href="{{ route('users.index') }}" class="nav-link {{ Route::is('users.index') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>Usuários</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-blog"></i>
                            <p> Blog <i class="right fas fa-angle-left"></i> </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item ml-4">
                                <a href="{{ route('blog.categories.index') }}" class="nav-link {{ Route::is('blog.categories.index') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-list"></i>
                                    <p>Categorias</p>
                                </a>
                            </li>
                            <li class="nav-item ml-4">
                                <a href="{{ route('blog.posts.index') }}" class="nav-link {{ Route::is('blog.posts.index') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-sticky-note"></i>
                                    <p>Posts</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
            </ul>
        </nav>
        <!-- Fim Sidebar Menu -->

    </div>
</aside>
<!-- Fim Sidebar -->
