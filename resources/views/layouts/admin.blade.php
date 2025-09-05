<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ??  "Admin Dashboard"}}</title>

  <!-- Tailwind is included -->
  <link rel="stylesheet" href="/css/main.css">

  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png"/>
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png"/>
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png"/>
  <link rel="mask-icon" href="safari-pinned-tab.svg" color="#00b4b6"/>

  <meta name="description" content="Admin One - free Tailwind dashboard">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles
</head>

<body>

<div id="app">

    <nav id="navbar-main" class="navbar is-fixed-top">
    <div class="navbar-brand">
        <a class="navbar-item mobile-aside-button">
        <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
        </a>
        <div class="navbar-item">
        <div class="control"><input placeholder="Search everywhere..." class="input"></div>
        </div>
    </div>
    <div class="navbar-brand is-right">
        <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
        <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
        </a>
    </div>
    <div class="navbar-menu" id="navbar-menu">
        <div class="navbar-end">
            
            <div class="navbar-item dropdown has-divider has-user-avatar">
                <a class="navbar-link">
                    <div class="is-user-name"><span>{{ Auth::user()->name }}</span></div>
                    <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
                </a>
                <div class="navbar-dropdown">
                <a href="profile.html" class="navbar-item">
                    <span class="icon"><i class="mdi mdi-account"></i></span>
                    <span>My Profile</span>
                </a>
                <a class="navbar-item">
                    <span class="icon"><i class="mdi mdi-settings"></i></span>
                    <span>Settings</span>
                </a>
                <a class="navbar-item">
                    <span class="icon"><i class="mdi mdi-email"></i></span>
                    <span>Messages</span>
                </a>
                <hr class="navbar-divider">
                <a class="navbar-item">
                    <span class="icon"><i class="mdi mdi-logout"></i></span>
                    <span>
                    <form method="POST" action="{{ route('logout') }}" x-data class="inline"> @csrf
                        <button type="subnit">{{ __('Log Out') }}</button>                    
                    </form>
                    </span>
                </a>
                </div>
            </div>
            
            <span title="Log out" class="navbar-item desktop-icon-only">
                <form method="POST" action="{{ route('logout') }}" x-data class="inline icon"> @csrf
                        <button type="submit"><i class="mdi mdi-logout"></i></button>                    
                </form>
            </span>
        </div>
    </div>
    </nav>

    <aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
        <div>
        Admin <b class="font-black">One</b>
        </div>
    </div>
    <div class="menu is-menu-main">
        <p class="menu-label">General</p>
        <ul class="menu-list">
        <li class="active">
            <a href="index.html">
            <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
            <span class="menu-item-label">Dashboard</span>
            </a>
        </li>
        </ul>
        <p class="menu-label">Examples</p>
        <ul class="menu-list">
        <li class="--set-active-tables-html">
            <a href="{{ route("admin.brands.index") }}">
            <span class="icon"><i class="mdi mdi-table"></i></span>
            <span class="menu-item-label">Brands</span>
            </a>
        </li>
        <li class="--set-active-tables-html">
            <a href="{{ route("admin.categories.index") }}">
            <span class="icon"><i class="mdi mdi-table"></i></span>
            <span class="menu-item-label">Categories</span>
            </a>
        </li>
        <li class="--set-active-forms-html">
            <a href="{{ route('admin.users') }}">
            <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
            <span class="menu-item-label">Users</span>
            </a>
        </li>
        <li class="--set-active-profile-html">
            <a href="{{route('admin.products')}}">
            <span class="icon"><i class="mdi mdi-account-circle"></i></span>
            <span class="menu-item-label">Products</span>
            </a>
        </li>
        <li>
            <a href="{{route('admin.posts')}}">
            <span class="icon"><i class="mdi mdi-lock"></i></span>
            <span class="menu-item-label">Posts</span>
            </a>
        </li>
        <li>
            <a class="dropdown">
            <span class="icon"><i class="mdi mdi-view-list"></i></span>
            <span class="menu-item-label">Submenus</span>
            <span class="icon"><i class="mdi mdi-plus"></i></span>
            </a>
            <ul>
            <li>
                <a href="#void">
                <span>Sub-item One</span>
                </a>
            </li>
            <li>
                <a href="#void">
                <span>Sub-item Two</span>
                </a>
            </li>
            </ul>
        </li>
        </ul>
        <p class="menu-label">About</p>
        <ul class="menu-list">
        <li>
            <a href="https://justboil.me/tailwind-admin-templates/free-dashboard/" class="has-icon">
            <span class="icon"><i class="mdi mdi-help-circle"></i></span>
            <span class="menu-item-label">About</span>
            </a>
        </li>
        <li>
            <a href="https://github.com/justboil/admin-one-tailwind" class="has-icon">
            <span class="icon"><i class="mdi mdi-github-circle"></i></span>
            <span class="menu-item-label">GitHub</span>
            </a>
        </li>
        </ul>
    </div>
    </aside>

    @if (isset($breadcrumb))
            {{ $breadcrumb }}
    @endif
    <section class="section main-section">
    
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <x-flesh></x-flesh>
        
            @if (isset($header))
                {{ $header }}
            @endif
                    
            {{ $slot }}

        </main>

    </section>

    <footer class="footer">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
            <div class="flex items-center justify-start space-x-3">
                <div>
                    Copyright &copy; {{ date('Y') }}.
                </div>
            </div>
        </div>
    </footer>

    <div id="sample-modal" class="modal">
    <div class="modal-background --jb-modal-close"></div>
    <div class="modal-card">
        <header class="modal-card-head">
        <p class="modal-card-title">Sample modal</p>
        </header>
        <section class="modal-card-body">
        <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
        <p>This is sample modal</p>
        </section>
        <footer class="modal-card-foot">
        <button class="button --jb-modal-close">Cancel</button>
        <button class="button red --jb-modal-close">Confirm</button>
        </footer>
    </div>
    </div>

    <div id="sample-modal-2" class="modal">
    <div class="modal-background --jb-modal-close"></div>
    <div class="modal-card">
        <header class="modal-card-head">
        <p class="modal-card-title">Sample modal</p>
        </header>
        <section class="modal-card-body">
        <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
        <p>This is sample modal</p>
        </section>
        <footer class="modal-card-foot">
        <button class="button --jb-modal-close">Cancel</button>
        <button class="button blue --jb-modal-close">Confirm</button>
        </footer>
    </div>
    </div>

</div>

<script type="text/javascript" src="/js/main.min.js"></script>

<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
@livewireScripts
</body>
</html>
