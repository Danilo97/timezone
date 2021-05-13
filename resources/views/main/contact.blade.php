@extends("layouts.layout")
@section("title") Contact @endsection
@section("desc") Welcome to our Contact! Feel free to contact us anytime! @endsection
@section("keywords") contact, form, message, feedback @endsection
@section("content")
<main>
    <!--? Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Contacts</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--? Hero Area End-->
    <!-- ================ contact section start ================= -->
    <section class="contact-section">
        <div class="container">

            <div class="row d-flex justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="contact-title">Send Email to Admin</h2>
                </div>
                <div class="col-lg-8">

                    <form class="form-contact contact_form" action="/emailSend" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" type="text" name="name" placeholder="name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" type="text" name="email" placeholder="email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="message" placeholder="message"></textarea>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input class="button button-contactForm boxed-btn" type="submit" value="Send"/>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
</main>
@endsection
