<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
    <div class="single-popular-items mb-50 text-center">
        @foreach($cool->images as $image)
            <div class="popular-img">
                <img src="{{asset("assets/img/gallery/".$image->src)}}" alt="{{$cool->title}}">

                @if(\Illuminate\Support\Facades\Session::has("user"))
                    <div class="img-cap">
                        @csrf
                        <span><a href="#" class="addToCart" data-prodid="{{$cool->id}}">Add to cart</a></span>
                    </div>
                @else
                    <div class="img-cap">
                            <span><a href="{{route("login")}}">Login in order to purchase</a></span>
                    </div>
                @endif
                <div class="favorit-items">
                    <span class="flaticon-heart"></span>
                </div>
            </div>
        @endforeach
        <div class="popular-caption">
            <h3><a href="{{route("details",["id"=>$cool->id])}}">{{$cool->title}}</a></h3>
            <span>$ {{$cool->price}}</span>
        </div>
    </div>
</div>
