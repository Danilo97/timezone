@extends('layouts.layout')

@section('title') {{$details->title}} @endsection
@section('desc') Welcome to Timezone! {{$details->title}}, look at the spect for this awesome watch!! @endsection
@section('keywords') {{$details->title}}, watch, buy, new @endsection
@section('content')
    @if(\Illuminate\Support\Facades\Session::has("user"))
        <input type="hidden" id="sesija" value="{{\Illuminate\Support\Facades\Session::get("user")[0]->id}}"/>
    @else
        <input type="hidden" id="sesija" value="0"/>
    @endif
    <main>
        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>{{$details->title}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End-->
        <!--================Single Product Area =================-->
        <div class="product_image_area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <div class="">
                            @foreach($details->images as $singleImage)
                                <div class="single_product_img">
                                    <img src="{{asset("assets/img/gallery/$singleImage->src")}}" alt="{{$details->title}}" class="img-fluid">
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="single_product_text text-center">
                            <h3>{{$details->title}}</h3>
                            <p>
                                {{$details->description}}
                            </p>
                            <span>$ {{$details->price}}</span>
                            <div class="card_area">


                                @if(\Illuminate\Support\Facades\Session::has("user"))
                                    <div class="add_to_cart">
                                        @csrf
                                        <a href="#" class="addToCart btn view-btn1" data-prodid="{{$details->id}}">Add to cart</a>
                                    </div>
                                @else
                                    <div class="add_to_cart">
                                        <a href="{{route("login")}}" class="btn view-btn1">Login in order to purchase</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================End Single Product Area =================-->
    </main>

@endsection
