@extends('layouts.layout')

@section('title') About @endsection
@section('desc') Welcome to About! My name is Danilo! @endsection
@section('keywords') About, Danilo, Development, ICT @endsection
@section('content')
    <main>
        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>About Me</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End-->
        <!-- About Details Start -->
        <div class="about-details section-padding30">
            <div class="container">
                <div class="row">
                    <div class="offset-xl-1 col-lg-12 col-sm-12 d-flex justify-content-between row">
                        <div class="about-details-cap mb-50 col-lg-6 col-md-6 col-sm-12">
                            <img id="authorPic" src="{{asset("assets/img/about/profile.jpg")}}" alt="Author"/>
                        </div>

                        <div class="about-details-cap mb-50 col-lg-6 col-md-6 col-sm-12">
                            <h4>About Me</h4>
                            <p>My name is Danilo Mijailovic. I am studying Web Development at the "High ICT School" in Belgrade. My passion for Web Development started a few years ago when I realized that this is what I love to do and I never get bored! Skills that I have are HTML5, CSS3 (Bootstrap, Materialize, SASS), Js(Jquery), PHP(Laravel) and SEO.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Details End -->


    </main>
@endsection
