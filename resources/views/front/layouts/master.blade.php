<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('front.layouts.partials.styles')
    @yield('styles')

    <title>Rayan Groups</title>
</head>

<body>

<!-- header -->
@include('front.layouts.partials.header')
<!-- /header -->
    

<!-- page content -->
@yield('front-content')
<!-- /page content -->

<!-- footer -->
@include('front.layouts.partials.footer')
<!-- /footer -->

@include('front.layouts.partials.scripts')
@yield('scripts')
   
</body>

</html>