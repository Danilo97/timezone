@extends("layouts.adminLayout")
@section('title') Admin @endsection
@section('desc') Welcome to Admin! Update, Insert and Delete everything! @endsection
@section('keywords') Admin, products, categories, analytics @endsection
@section('content')

    <main>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 text-center mt-5">
                    <h1>Welcome to Category Management</h1>
                    <p>A place where you can Update, Insert or Delete Categories!</p>
                </div>
                <div class="row header-right col-12 text-center mt-5 d-flex justify-content-around w-100">

                    <div class="btn hero-btn col-lg-3 col-md-4 col-sm-12 ">
                        <a href="{{route("manageCategoriesInsert")}}" >Insert Categories</a>
                    </div>
                    <div class="btn hero-btn col-lg-3 col-md-4 col-sm-12 ">
                        <a href="{{route("manageCategoriesUpdate")}}">Update Categories</a>
                    </div>
                    <div class="btn hero-btn col-lg-3 col-md-4 col-sm-12 ">
                        <a href="{{route("manageCategoriesDelete")}}">Delete Categories</a>
                    </div>

                </div>
            </div>
        </div>
    </main>

@endsection



