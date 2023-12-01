<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.header')
</head>

<body class="bg-register">
    <!-- wrapper -->
    <div class="wrapper">
        <div class="section-authentication-register d-flex align-items-center justify-content-center">
            <div class="row">
                <div class="col-12 col-lg-8 mx-auto">
                    <div class="card radius-15 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-xl-6">
                                <div class="card-body p-5">
                                    <div class="text-center">
                                        <img src="assets/images/logo-icon.png" width="80" alt="">
                                        <h3 class="mt-4 font-weight-bold">Create an Account</h3>
                                    </div>
                                    <div class="">
                                        <div class="d-grid">
                                        </div>
                                        <div class="form-body">
                                            <form action="{{ URL::to('register') }}" class="row g-3" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label">Username</label>
                                                    <input type="text" class="form-control" name="username"
                                                        id="username" placeholder="Jhon">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputLastName" class="form-label">Phone number</label>
                                                    <input type="number" class="form-control" id="phone"
                                                        name="phone" placeholder="0123456789">
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputEmailAddress" class="form-label">Email
                                                        Address</label>
                                                    <input type="email" class="form-control" id="email"
                                                        name="email" placeholder="example@user.com">
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputChoosePassword" class="form-label">Password</label>
                                                    <div class="input-group" id="show_hide_password">
                                                        <input type="password" class="form-control border-end-0"
                                                            id="password" name="password" placeholder="Enter Password">
                                                        <a href="javascript:;"
                                                            class="input-group-text bg-transparent"><i
                                                                class="bx bx-hide"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputSelectCountry" class="form-label">Role :</label>
                                                    <label for="" style="color: rgb(23, 202, 173)"> You are
                                                        sign up with a membership</label>
                                                    <div class="input-group" id="show_hide_password"></div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary"><i
                                                                class="bx bx-user me-1"></i>Sign up</button>
                                                    </div>
                                                </div>
                                                <div class="col-12 text-center">
                                                    <p>have an account <a href="{{ URL::to('signin/') }}"
                                                            style="color: red; text-decoration:underline">Sign in
                                                            here</a></p>
                                                </div>
                                                <div class="col-12 text-center">
                                                    <i class="fas fa-long-arrow-alt-left"> &nbsp;</i><a
                                                        href="{{ URL::to('index') }}"
                                                        style="color:rgb(0, 0, 0); text-decoration:underline; font-size:15px;">Back
                                                        to home page</a>
                                                </div>
                                            </form>
											@include('public.alert')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 bg-login-color d-flex align-items-center justify-content-center">
                                <img src="assets/images/login-images/login-frent-img.jpg" class="img-fluid"
                                    alt="...">
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <script src="assets/js/jquery.min.js"></script>
    <!--Password show & hide js -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>
</body>

</html>
