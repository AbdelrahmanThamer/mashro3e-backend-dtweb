<div class="sidebar">
    <div class="side-head">
        <a href="#">
            <img src="{{url('/')}}/assets/imgs/logo.png" alt="" class="side-logo" />
        </a>
        <button class="btn side-toggle">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
    <ul class="side-menu">
        <li class="{{ (request()->routeIs('admin.dashboard*')) ? 'active' : '' }}">
            <a href="{{route('admin.dashboard')}}">
                <img class="menu-icon" src="{{url('/')}}/assets/imgs/dashboard.png" alt="" />
                <span>Dashboard</span>
            </a>
        </li>  
        <li  class="{{ (request()->routeIs('admin.settings*')) ? 'active' : '' }}">
            <a href="{{route('admin.settings')}}">
                <img class="menu-icon" src="{{url('/')}}/assets/imgs/settings.png" alt="" />
                <span>Settings</span>
            </a>
        </li>
        <li  class="{{ (request()->routeIs('admin.app*')) ? 'active' : '' }}">
            <a href="{{route('admin.app')}}">
                <img class="menu-icon" src="{{url('/')}}/assets/imgs/app.png" alt="" />
                <span>App</span>
            </a>
        </li>
        <li  class="{{ (request()->routeIs('admin.users*')) ? 'active' : '' }}">
            <a href="{{route('admin.users')}}">
                <img class="menu-icon" src="{{url('/')}}/assets/imgs/artist.png" alt="" />
                <span>Users</span>
            </a>
        </li>
        <li  class="{{ (request()->routeIs('admin.introduction*')) ? 'active' : '' }}">
            <a href="{{route('admin.introduction')}}">
                <img class="menu-icon" src="{{url('/')}}/assets/imgs/pages.png" alt="" />
                <span>Introduction Screen</span>
            </a>
        </li>
        <li  class="{{ (request()->routeIs('admin.splash_screen*')) ? 'active' : '' }}">
            <a href="{{route('admin.splash_screen')}}">
                <i class="fa fa-file-image-o menu-icon" aria-hidden="true" style="font-size: 24px;vertical-align:middle"></i>
                <!-- <img class="menu-icon" src="{{url('/')}}/assets/imgs/settings.png" alt="" /> -->
                <span>Splash Screen</span>
            </a>
        </li>
        <li  class="{{ (request()->routeIs('admin.menu*')) ? 'active' : '' }}">
            <a href="{{route('admin.menu')}}">
                <i class="fa fa-bars menu-icon" aria-hidden="true" style="font-size: 24px;vertical-align:middle"></i>
                <span>Menu</span>
            </a>
        </li>
        <li  class="{{ (request()->routeIs('admin.floating_menu*')) ? 'active' : '' }}">
            <a href="{{route('admin.floating_menu')}}">
                <img class="menu-icon" src="{{url('/')}}/assets/imgs/categories.png" alt="" />
                <span>Floating Menu</span>
            </a>
        </li>
      <!--   <li  class="{{ (request()->routeIs('admin.social_share*')) ? 'active' : '' }}">
            <a href="{{route('admin.social_share')}}">
                <img class="menu-icon" src="{{url('/')}}/assets/imgs/share.png" alt="" />
                <span>Social Share</span>
            </a>
        </li> -->
        <li  class="{{ (request()->routeIs('admin.messages*')) ? 'active' : '' }}{{ (request()->routeIs('admin.notification*')) ? 'active' : '' }}">
            <a href="{{route('admin.messages')}}">                
                <i class="fa fa-comments menu-icon" aria-hidden="true" style="font-size: 24px;vertical-align:middle"></i>
                <span>Messages</span>
            </a>
        </li>
        
        <li>           
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                <img class="menu-icon" src="{{url('/')}}/assets/imgs/logout.png" alt="" />
                <span>Logout</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>