<div class="top_nav">
  <div class="nav_menu">
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>
      <nav class="nav navbar-nav">
      <ul class=" navbar-right">
        <li class="nav-item dropdown open" style="padding-left: 15px;">
          <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('backend/images/img.jpg')}}" alt="">{{ Auth::guard('admin')->user()->name }}
          </a>
          <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item"  href="javascript:;"> Profile</a>
            <a class="dropdown-item"  href="{{ route('admin.logout.submit') }}"
        onclick="event.preventDefault();
                      document.getElementById('admin-logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
          </div>
          <form id="admin-logout-form" action="{{ route('admin.logout.submit') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </li>
      </ul>
    </nav>
  </div>
</div>