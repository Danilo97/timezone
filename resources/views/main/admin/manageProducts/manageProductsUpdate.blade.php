@extends("layouts.adminLayout")
@section('title') Admin @endsection
@section('desc') Welcome to Admin! Update, Insert and Delete everything! @endsection
@section('keywords') Admin, products, categories, analytics @endsection
@section('content')

    <main>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 text-center mt-5">
                    <h1>Update Product</h1>
                    <p>A place where you can Update, Insert or Delete Products!</p>
                </div>
                <div class="row header-right col-12 text-center mt-5 d-flex justify-content-around w-100">

                    <form class="col-12 formDelete" action="{{route("productsUpdate")}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-12 col-sm-12 col-md-12 insertForm d-flex justify-content-center">
                            <select name="prodUpdate" id="prodUpdate" class="selectStyle" required>
                                <option value="0">Select Product</option>
                                @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-md-12 insertForm">
                            <input type="text" name="titleUpdate" id="titleUpdate" placeholder="Product Title" required>
                        </div>

                        <div class="col-lg-12 col-sm-12 col-md-12 insertForm">
                            <input type="text" name="priceUpdate" id="priceUpdate" placeholder="Product price" required>
                        </div>

                        <div class="col-lg-12 col-sm-12 col-md-12 insertForm d-flex justify-content-center">
                            <select name="catUpdate" id="catUpdate" class="selectStyle" required>
                                <option value="0">Select Category</option>
                                @foreach($categories as $categoryInsert)
                                    <option value="{{$categoryInsert->id}}">{{$categoryInsert->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-12 col-sm-12 col-md-12 insertForm">
                            <input type="file" name="pictureUpdate" id="pictureUpdate">
                        </div>

                        <div class="col-lg-12 col-sm-12 col-md-12 insertForm">
                            <textarea name="descriptionUpdate" id="descriptionUpdate" placeholder="product description..." required></textarea>
                        </div>

                        <div class="col-lg-12 col-sm-12 col-md-12 insertForm">
                            <input type="submit" name="submitUpdate" id="submitUpdate" class="adminSubmit" value="Update Product"/>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </main>

@endsection




