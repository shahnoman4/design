@extends('front.layouts.master')


@section('styles')
<style>
    .step {
        display: none;
    }

    .active {
        display: block;
    }
</style>
@endsection

@section('front-content')
<!-- Get A Quote Section -->
<section id="get-a-quote-section" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <h1 class="section-heading">GET A QUOTE</h1>
                <p class="section-para mt-4 mb-4">Share your project requirements with us and get started below with
                    our
                    estimation calculator,
                    once you have thought about what you want, save your quote and we will send it to you.</p>
                <div class="instant-quote-wrapper mb-3">
                    <a href="{{route('instantQuote')}}">
                       <button class="btnCss"> Instant Quote </button>
                    </a>
                </div>
                <div class="send-me-quote-wrapper">
                    <button class="btnCss"> Send Me A Quote </button>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="right-image">
                    <img src="assets/images/rightimage.jpg" alt="">
                </div>
            </div>
        </div> <!--/row-->
    </div> <!--/container-->
</section> <!-- Get A Quote Section -->
@endsection
@section('scripts') 
@endsection