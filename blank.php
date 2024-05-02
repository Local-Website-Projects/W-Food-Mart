<?php
session_start();
require_once('config/dbConfig.php');
$db_handle = new DBController();
date_default_timezone_set("Asia/Dhaka");
$inserted_at = date("Y-m-d H:i:s");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Food Mart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include('include/css.php'); ?>
</head>

<body class="">
<!-- Left Sidenav -->
<?php include('include/leftSideBar.php'); ?>
<!-- end left-sidenav-->


<div class="page-wrapper">
    <!-- Top Bar Start -->
    <?php include('include/topBar.php'); ?>
    <!-- Top Bar End -->

    <!-- Page Content-->
    <div class="page-content">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="row">
                            <div class="col">
                                <h4 class="page-title">Page Title</h4>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div>
            <!--end row-->
            <!-- end page title end breadcrumb -->

            <!--add employee modals-->
            <div class="modal fade" id="exampleModalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalDefaultLogin" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title m-0" id="exampleModalDefaultLogin">Login Modal</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div><!--end modal-header-->
                        <div class="modal-body">
                            <div class="card-body p-0 auth-header-box">
                                <div class="text-center">
                                    <a class='logo logo-admin' href='index.html'>
                                        <img src="assets/images/logo-sm.png" height="50" alt="logo" class="auth-logo">
                                    </a>
                                    <h4 class="mt-3 mb-1 fw-semibold font-18">Let's Get Started Maxdot</h4>
                                    <p class="text-muted  mb-0">Sign in to continue to Maxdot.</p>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <ul class="nav-border nav nav-pills" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#LogIn_Tab" role="tab">Log In</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#Register_Tab" role="tab">Register</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active p-3" id="LogIn_Tab" role="tabpanel">
                                        <form class="form-horizontal auth-form" action="https://mannatthemes.com/dastone/default/index.html">

                                            <div class="form-group mb-2">
                                                <label class="form-label" for="username">Username</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                                                </div>
                                            </div><!--end form-group-->

                                            <div class="form-group mb-2">
                                                <label class="form-label" for="userpassword">Password</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password">
                                                </div>
                                            </div><!--end form-group-->

                                            <div class="form-group row my-3">
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch switch-success">
                                                        <input type="checkbox" class="custom-control-input" id="customSwitchSuccess">
                                                        <label class="form-label text-muted" for="customSwitchSuccess">Remember me</label>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-sm-6 text-end">
                                                    <a class='text-muted font-13' href='auth-recover-pw.html'><i class="dripicons-lock"></i> Forgot password?</a>
                                                </div><!--end col-->
                                            </div><!--end form-group-->

                                            <div class="form-group mb-0 row">
                                                <div class="col-12">
                                                    <button class="btn btn-primary w-100 waves-effect waves-light" type="button">Log In <i class="fas fa-sign-in-alt ms-1"></i></button>
                                                </div><!--end col-->
                                            </div> <!--end form-group-->
                                        </form><!--end form-->
                                        <div class="m-3 text-center text-muted">
                                            <p class="mb-0">Don't have an account ?  <a class='text-primary ms-2' href='auth-register.html'>Free Resister</a></p>
                                        </div>
                                        <div class="account-social">
                                            <h6 class="mb-3">Or Login With</h6>
                                        </div>
                                        <div class="btn-group w-100">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Facebook</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Twitter</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Google</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane px-3 pt-3" id="Register_Tab" role="tabpanel">
                                        <form class="form-horizontal auth-form" action="https://mannatthemes.com/dastone/default/index.html">

                                            <div class="form-group mb-2">
                                                <label class="form-label" for="username">Username</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                                                </div>
                                            </div><!--end form-group-->

                                            <div class="form-group mb-2">
                                                <label class="form-label" for="useremail">Email</label>
                                                <div class="input-group">
                                                    <input type="email" class="form-control" name="email" id="useremail" placeholder="Enter Email">
                                                </div>
                                            </div><!--end form-group-->

                                            <div class="form-group mb-2">
                                                <label class="form-label" for="userpassword">Password</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password">
                                                </div>
                                            </div><!--end form-group-->

                                            <div class="form-group mb-2">
                                                <label class="form-label" for="conf_password">Confirm Password</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" name="conf-password" id="conf_password" placeholder="Enter Confirm Password">
                                                </div>
                                            </div><!--end form-group-->

                                            <div class="form-group mb-2">
                                                <label class="form-label" for="mo_number">Mobile Number</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="mobile number" id="mo_number" placeholder="Enter Mobile Number">
                                                </div>
                                            </div><!--end form-group-->

                                            <div class="form-group row my-3">
                                                <div class="col-sm-12">
                                                    <div class="custom-control custom-switch switch-success">
                                                        <input type="checkbox" class="custom-control-input" id="customSwitchSuccess2">
                                                        <label class="form-label text-muted" for="customSwitchSuccess2">You agree to the Dastone <a href="#" class="text-primary">Terms of Use</a></label>
                                                    </div>
                                                </div><!--end col-->
                                            </div><!--end form-group-->

                                            <div class="form-group mb-0 row">
                                                <div class="col-12">
                                                    <button class="btn btn-primary w-100 waves-effect waves-light" type="button">Register <i class="fas fa-sign-in-alt ms-1"></i></button>
                                                </div><!--end col-->
                                            </div> <!--end form-group-->
                                        </form><!--end form-->
                                        <p class="my-3 text-muted">Already have an account ?<a class='text-primary ms-2' href='auth-login.html'>Log in</a></p>
                                    </div>
                                </div>
                            </div><!--end card-body-->
                            <div class="card-body bg-light-alt text-center">
                                                        <span class="text-muted d-none d-sm-inline-block">Mannatthemes © <script>
                                                            document.write(new Date().getFullYear())
                                                        </script></span>
                            </div>
                        </div><!--end modal-body-->

                    </div><!--end modal-content-->
                </div><!--end modal-dialog-->
            </div>
            <!--end modal-->
            <div class="card-body">
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModalLogin">
                    Login demo modal
                </button>
            </div>


        </div><!-- container -->

        <?php include ('include/footer.php');?>
        <!--end footer-->
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->


<!-- jQuery  -->
<?php include('include/js.php'); ?>

</body>

</html>