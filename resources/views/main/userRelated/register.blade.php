@extends("layouts.layout")
@section("title") Register @endsection
@section("desc") Welcome to our Register! If you Register, you will have the ability to purchase products!. @endsection
@section("keywords") register, user, form @endsection
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
                                <h2>Register</h2>
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

                    <div class="col-lg-12 col-md-12 text-center d-flex justify-content-center">
                        <div class="login_part_form">
                            <div class="login_part_form_iner">
                                <h3>Welcome Back ! <br>
                                    Please Register</h3>
                                <form class="row contact_form" method="POST">
                                    @csrf
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="name" name="name"
                                               placeholder="Name">
                                        <label class="regLabels" id="nameLabel">Wrong name format! (example: Jack)</label>
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="lastName" name="lastName"
                                               placeholder="Lastname">
                                        <label class="regLabels" id="lastnameLabel">Wrong LastName format! (example: Nicholson)</label>
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="phone" name="phone"
                                               placeholder="Phone">
                                        <label class="regLabels" id="phoneLabel">Wrong phone format! (example: 0645674350)</label>
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="address" name="address"
                                               placeholder="Address">
                                        <label class="regLabels" id="addressLabel">Wrong address format! (example: bay area 32)</label>
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="city" name="city"
                                               placeholder="City">
                                        <label class="regLabels" id="cityLabel">Wrong city format! (example: New York)</label>
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="emailReg" name="emailReg"
                                               placeholder="Email">
                                        <label class="regLabels" id="emailLabel">Wrong email format! (example: jack@gmail.com)</label>
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" id="passReg" name="passReg"
                                               placeholder="Password">
                                        <label class="regLabels" id="passLabel">Wrong password format! (example: jack345)</label>
                                    </div>
                                    <div class="col-md-12 form-group">

                                        <button id="register" class="btn_3">
                                            Register
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
