@extends("layouts.adminLayout")
@section('title') Admin @endsection
@section('desc') Welcome to Admin! Update, Insert and Delete everything! @endsection
@section('keywords') Admin, products, categories, analytics @endsection
@section('content')

    <main>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 text-center mt-5">
                    <h1>Insert Product</h1>
                    <p>A place where you can Update, Insert or Delete Products!</p>
                </div>
                <div class="row header-right col-12 text-center mt-5 d-flex justify-content-around w-100">

                    <form class="col-12 formInsert" action="{{route("productInsert")}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-12 col-sm-12 col-md-12 insertForm">
                            <input type="text" name="title" placeholder="Product Title" required>
                        </div>

                        <div class="col-lg-12 col-sm-12 col-md-12 insertForm">
                            <input type="text" name="price" placeholder="Product price" required>
                        </div>

                        <div class="col-lg-12 col-sm-12 col-md-12 insertForm d-flex justify-content-center">
                            <select name="catInsert" class="selectStyle" required>
                                <option value="0">Select Category</option>
                                @foreach($categories as $categoryInsert)
                                    <option value="{{$categoryInsert->id}}">{{$categoryInsert->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-12 col-sm-12 col-md-12 insertForm">
                            <input type="file" name="pictureInsert" required>
                        </div>

                        <div class="col-lg-12 col-sm-12 col-md-12 insertForm">
                            <textarea name="description" placeholder="product description..." required></textarea>
                        </div>

                        <div class="col-lg-12 col-sm-12 col-md-12 insertForm">
                            <input type="submit" name="submitInsert" id="submitInsert" class="adminSubmit" value="Insert Product"/>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </main>

@endsection



