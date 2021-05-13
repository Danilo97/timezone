@extends("layouts.adminLayout")
@section('title') Admin @endsection
@section('desc') Welcome to Admin! Update, Insert and Delete everything! @endsection
@section('keywords') Admin, products, categories, analytics @endsection
@section('content')

    <main>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 text-center mt-5">
                    <h1>Welcome to Analytics!</h1>
                    <p>You can filter analytics by using dates!</p>
                </div>
                <div class="row header-right col-12 text-center mt-5 d-flex justify-content-around w-100">

                    <form class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center text-center">
                        @csrf
                        <label>Date From</label>
                        <input type="date" class="dateFilter" id="dateFrom"/>
                        <label>Date To</label>
                        <input type="date" class="dateFilter" id="dateTo"/>
                    </form>
                    <div class="col-lg-12 col-md-12 col-sm-12" id="analyticsGet">

                    </div>


                </div>
            </div>
        </div>
    </main>

@endsection
