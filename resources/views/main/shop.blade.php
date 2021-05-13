@extends("layouts.layout")
@section("title") Shop @endsection
@section("desc") Welcome to our Shop! Here you can discover all of our watches! Feel free to explore it. @endsection
@section("keywords") shop, watch, watches, payment, buy @endsection
@section("content")
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
                                <h2>Watch Shop</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End-->
        <!-- Latest Products Start -->
        <section class="popular-items latest-padding">
            <div class="container">
                <div class="row product-btn justify-content-between mb-40">
                    <div class="properties__button">
                        <!--Nav Button  -->
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link" id="nav-home-tab-all" data-toggle="tab" href="#" role="tab" aria-controls="nav-home" aria-selected="true">All Products</a>
                                <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#" role="tab" aria-controls="nav-home" aria-selected="true">Newest Arrivals</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#" role="tab" aria-controls="nav-contact" aria-selected="false"> Most popular </a>
                                <div class="select-this">
                                    <form action="#">
                                        @csrf
                                        <div class="select-itms">
                                            <select name="select" id="select1" class="selectStyleShop">
                                                <option value="0">Select Sort</option>
                                                @foreach($sorts as $sort)
                                                    <option value="{{$sort->id}}">{{$sort->order_by}} {{$sort->value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </nav>
                        <!--End Nav Button  -->
                    </div>
                    <!-- Grid and List view -->
                    <div class="grid-list-view">
                    </div>
                    <!-- Select items -->
                    <div class="select-this">
                        <form action="#">
                            @csrf

                            <div class="select-itms">
                                <input type="search" id="search" name="search" placeholder="search products..."/>
                            </div>
                        </form>

                    </div>
                    <div class="select-this">

                        <form action="#">
                            @csrf
                            <div class="select-itms">
                                <select name="select" id="select2" class="selectStyleShop">
                                    <option value="0">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Nav Card -->
                <div class="tab-content" id="nav-tabContent">
                    <!-- card one -->
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row" id="productsShop">

                        </div>
                    </div>
                    <!-- Card two -->

                    <!-- Card three -->

                </div>
                <!-- End Nav Card -->
            </div>
        </section>
        <!-- Latest Products End -->
        <!--? Shop Method Start-->
        <div class="shop-method-area">
            <div class="container">
                <div class="method-wrapper">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-method mb-40">
                                <i class="ti-package"></i>
                                <h6>Free Shipping Method</h6>
                                <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-method mb-40">
                                <i class="ti-unlock"></i>
                                <h6>Secure Payment System</h6>
                                <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-method mb-40">
                                <i class="ti-reload"></i>
                                <h6>Secure Payment System</h6>
                                <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Method End-->
    </main>
@endsection
