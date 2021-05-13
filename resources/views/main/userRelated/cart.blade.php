@extends("layouts.layout")
@section("title") Cart @endsection
@section("desc") Welcome to our Cart! Here you can see what products you have in your cart!. @endsection
@section("keywords") cart, user, product, buy, products, quantity @endsection
@section("content")
    @if(!\Illuminate\Support\Facades\Session::has('user'))
        <script>window.location.href = '/'</script>
    @endif
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
                                <h2>Cart List</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================Cart Area =================-->
        <section class="cart_area section_padding">
            <div class="container">
                <div class="cart_inner">
                    <div class="table-responsive">
                        <table class="table">
                            @csrf
                            <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                            </thead>
                            <tbody id="cartBody">

                            </tbody>
                        </table>
                        <div class="checkout_btn_inner float-right">
                            <a class="btn view-btn1" href="{{route("shop")}}">Continue Shopping</a>
                            <a class="btn view-btn1 checkout_btn_1" href="#">Proceed to checkout</a>
                        </div>
                    </div>
                    </div>
                </div>
        </section>
        <!--================End Cart Area =================-->
    </main>

@endsection
