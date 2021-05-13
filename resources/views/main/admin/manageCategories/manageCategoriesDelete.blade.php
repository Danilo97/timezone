@extends("layouts.adminLayout")
@section('title') Admin @endsection
@section('desc') Welcome to Admin! Update, Insert and Delete everything! @endsection
@section('keywords') Admin, products, categories, analytics @endsection
@section('content')

    <main>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 text-center mt-5">
                    <h1>Delete Category</h1>
                    <p>A place where you can Update, Insert or Delete Categories!</p>
                </div>
                <div class="row header-right col-12 text-center mt-5 d-flex justify-content-around w-100">

                    <form class="col-12 formInsert" action="{{route("categoryDelete")}}" method="POST">
                        @csrf
                        <div class="col-lg-12 col-sm-12 col-md-12 insertForm d-flex justify-content-center">
                            <select name="categoryDelete" id="categoryDelete" class="selectStyle" required>
                                <option value="0">Select Category</option>
                                @foreach($categoriesDelete as $categoryDelete)
                                    <option value="{{$categoryDelete->id}}">{{$categoryDelete->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-12 col-sm-12 col-md-12 insertForm">
                            <input type="submit" name="submitCatUpdate" id="submitCatUpdate" class="adminSubmit" value="Delete Category"/>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </main>

@endsection




