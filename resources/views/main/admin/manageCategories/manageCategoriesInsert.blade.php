@extends("layouts.adminLayout")
@section('title') Admin @endsection
@section('desc') Welcome to Admin! Update, Insert and Delete everything! @endsection
@section('keywords') Admin, products, categories, analytics @endsection
@section('content')

    <main>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 text-center mt-5">
                    <h1>Insert Category</h1>
                    <p>A place where you can Update, Insert or Delete Categories!</p>
                </div>
                <div class="row header-right col-12 text-center mt-5 d-flex justify-content-around w-100">

                    <form class="col-12 formInsert" action="{{route("categoryInsert")}}" method="POST">
                        @csrf
                        <div class="col-lg-12 col-sm-12 col-md-12 insertForm">
                            <input type="text" name="catName" placeholder="Category Name" required>
                        </div>

                        <div class="col-lg-12 col-sm-12 col-md-12 insertForm">
                            <input type="submit" name="submitCatInsert" id="submitCatInsert" class="adminSubmit" value="Insert Category"/>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </main>

@endsection



