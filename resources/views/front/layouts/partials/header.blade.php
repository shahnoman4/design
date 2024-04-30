<!-- Header_Section -->
<section id="header-section" class="pt-4 pb-4 bg-dark">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="{{ asset('front/assets/images/logo1.png')}}" alt="pic"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto align-items-center gap-4">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Other</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-0" href="#">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-0" href="#">News</a>
                    </li>
                    <li class="nav-item getQuote">
                        <a class="nav-link p-0" href="{{route('instantQuote')}}">Get A Quote</a>
                    </li>
                </ul>
            </div>
        </div> <!--/container-->
    </nav> <!--/nav-->
</section> <!-- /Header_Section -->