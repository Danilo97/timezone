@extends("layouts.adminLayout")
@section('title') Admin @endsection
@section('desc') Welcome to Admin! Update, Insert and Delete everything! @endsection
@section('keywords') Admin, products, categories, analytics @endsection
@section('content')

    <main>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 text-center mt-5">
                    <h1>Delete Product</h1>
                    <p>A place where you can Update, Insert or Delete Products!</p>
                </div>
                <div class="row header-right col-12 text-center mt-5 d-flex justify-content-around w-100">

                    <form class="col-12 formDelete" action="{{route("productsDelete")}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-12 col-sm-12 col-md-12 insertForm d-flex justify-content-center">
                            <select name="prodDelete" id="prodDelete" class="selectStyle" required>
                                <option value="0">Select Product</option>
                                @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-md-12 insertForm" id="delProdGet">

                        </div>

                        <div class="col-lg-12 col-sm-12 col-md-12 insertForm">
                            <input type="submit" name="submitDelete" id="submitDelete" class="adminSubmit" value="Delete Product"/>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </main>

@endsection





