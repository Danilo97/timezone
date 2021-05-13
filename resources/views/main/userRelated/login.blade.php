@extends("layouts.layout")
@section("title") Login @endsection
@section("desc") Welcome to our Login! If you login, you will have the ability to purchase products!. @endsection
@section("keywords") login, user, form @endsection
@section("content")
    @if(\Illuminate\Support\Facades\Session::has('user'))
        <script>window.location.href = '/'</script>
    @endif
    <main>
        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Login</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End-->
        <!--================login_part Area =================-->
        <section class="login_part section_padding ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_text text-center">
                            <div class="login_part_text_iner">
                                <h2>New to our Shop?</h2>
                                <p>There are advances being made in science and technology
                                    everyday, and a good example of this is the</p>
                                <a href="{{route("register")}}" class="btn_3">Create an Account</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_form">
                            <div class="login_part_form_iner">
                                <h3>Welcome Back ! <br>
                                    Please Sign in now</h3>
                                <form class="row contact_form" method="POST">
                                    @csrf
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="emailLog" name="emailLog"
                                               placeholder="Email">
                                        <label class="regLabels" id="emailLogLabel">Wrong Email! (format example: jack@gmail.com)</label>
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" id="passwordLog" name="passwordLog"
                                               placeholder="Password">
                                        <label class="regLabels" id="passLogLabel">Wrong password! (format between 4-10 characters)</label>
                                    </div>
                                    <div class="col-md-12 form-group">

                                        <button type="button" value="submit" id="logIn" name="logIn" class="btn_3">
                                            log in
                                        </button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================login_part end =================-->
    </main>

@endsection
