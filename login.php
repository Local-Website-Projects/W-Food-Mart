<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Food Mart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Food Mart" name="description"/>
    <meta content="" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css"/>

</head>

<body class="account-body accountbg">

<!-- Log In page -->
<div class="container">
    <div class="row vh-100 d-flex justify-content-center">
        <div class="col-12 align-self-center">
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <div class="card">
                        <div class="card-body p-0 auth-header-box">
                            <div class="text-center p-3">
                                <a class='logo logo-admin' href='Home'>
                                    <img src="assets/images/logo-sm-dark.png" height="50" alt="logo" class="auth-logo">
                                </a>
                                <h4 class="mt-3 mb-1 fw-semibold text-white font-18">Let's Get Started</h4>
                                <p class="text-muted  mb-0">Sign in to continue to Food Mart.</p>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="nav-border nav nav-pills" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#LogIn_Tab"
                                       role="tab">Log In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#Register_Tab"
                                       role="tab">Register</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active p-3" id="LogIn_Tab" role="tabpanel">
                                    <form class="form-horizontal auth-form"
                                          action="#">

                                        <div class="form-group mb-2">
                                            <label class="form-label" for="username">Username</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="username" id="username"
                                                       placeholder="Enter username">
                                            </div>
                                        </div><!--end form-group-->

                                        <div class="form-group mb-2">
                                            <label class="form-label" for="userpassword">Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="password"
                                                       id="userpassword" placeholder="Enter password">
                                            </div>
                                        </div><!--end form-group-->


                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <button class="btn btn-primary w-100 waves-effect waves-light"
                                                        type="button">Log In <i class="fas fa-sign-in-alt ms-1"></i>
                                                </button>
                                            </div><!--end col-->
                                        </div> <!--end form-group-->
                                    </form><!--end form-->
                                    <div class="m-3 text-center text-muted">
                                        <p class="mb-0">Don't have an account? <a class='text-primary ms-2'
                                                                                   href='Register'>Free
                                                Register</a></p>
                                    </div>
                                </div>
                                <div class="tab-pane px-3 pt-3" id="Register_Tab" role="tabpanel">
                                    <form class="form-horizontal auth-form"
                                          action="#">
                                        <div class="form-group mb-2">
                                            <label class="form-label" for="username">Full Name</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="full_name" placeholder="Enter Full Name">
                                            </div>
                                        </div><!--end form-group-->

                                        <div class="form-group mb-2">
                                            <label class="form-label" for="mo_number">Mobile Number</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="phone
                                                       id="mo_number" placeholder="Enter Mobile Number">
                                            </div>
                                        </div><!--end form-group-->

                                        <div class="form-group mb-2">
                                            <label class="form-label" for="username">Joining Date</label>
                                            <div class="input-group">
                                                <input type="date" class="form-control" name="joining_date">
                                            </div>
                                        </div><!--end form-group-->

                                        <div class="form-group mb-2">
                                            <label class="form-label" for="username">Username</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="username" placeholder="Username">
                                            </div>
                                        </div><!--end form-group-->

                                        <div class="form-group mb-2">
                                            <label class="form-label" for="useremail">Email</label>
                                            <div class="input-group">
                                                <input type="email" class="form-control" name="email" id="useremail"
                                                       placeholder="Enter Email">
                                            </div>
                                        </div><!--end form-group-->

                                        <div class="form-group mb-2">
                                            <label class="form-label" for="username">Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="username" placeholder="Password">
                                            </div>
                                        </div><!--end form-group-->

                                        <div class="form-group mb-2">
                                            <label class="form-label" for="conf_password">Confirm Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="conf-password"
                                                       id="conf_password" placeholder="Confirm Password">
                                            </div>
                                        </div><!--end form-group-->

                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <button class="btn btn-primary w-100 waves-effect waves-light"
                                                        type="button">Register <i class="fas fa-sign-in-alt ms-1"></i>
                                                </button>
                                            </div><!--end col-->
                                        </div> <!--end form-group-->
                                    </form><!--end form-->
                                    <p class="my-3 text-muted">Already have an account ?<a class='text-primary ms-2'
                                                                                           href='Login'>Log
                                            in</a></p>
                                </div>
                            </div>
                        </div><!--end card-body-->
                        <div class="card-body bg-light-alt text-center">
                                    <span class="text-muted d-none d-sm-inline-block">Food Mart © <script>
                                        document.write(new Date().getFullYear())
                                    </script></span>
                        </div>
                    </div><!--end card-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end col-->
    </div><!--end row-->
</div>
<!--end container-->
<!-- End Log In page -->


<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/feather.min.js"></script>
<script src="assets/js/simplebar.min.js"></script>


</body>

</html>