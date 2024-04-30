<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{ asset('backend/images/favicon.ico')}}" type="image/ico" />

    <title>Probit Consult!</title>

    @include('backend.layouts.partials.styles')
    @yield('styles')

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>GRAND DESIGN</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ asset('backend/images/img.jpg')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::guard('admin')->user()->name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            @include('backend.layouts.partials.sidebar')
            <!-- /sidebar menu -->

            
          </div>
        </div>

        <!-- top navigation -->
        @include('backend.layouts.partials.header')
        <!-- /top navigation -->

        <!-- page content -->
        @yield('admin-content')
        <!-- /page content -->

        <!-- footer content -->
        @include('backend.layouts.partials.footer')
        <!-- /footer content -->
      </div>
    </div>

    @include('backend.layouts.partials.scripts')
    @yield('scripts')
	
  </body>
</html>
