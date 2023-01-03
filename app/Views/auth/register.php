<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Abstack - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url('DarkAbstackAdmin/assets/images/favicon.ico') ?>">

        <!-- App css -->
        <link href="<?= base_url('DarkAbstackAdmin/assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('DarkAbstackAdmin/assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('DarkAbstackAdmin/assets/css/app.min.css') ?>" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg bg-gradient">

            <div class="account-pages pt-5 mt-5 mb-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-5">
                            <div class="card bg-pattern">
    
                                <div class="card-body p-4">
                                    
                                    <div class="text-center w-75 m-auto">
                                        <a href="index.html">
                                            <span><img src="assets/images/logo-light.png" alt="" height="18"></span>
                                        </a>
                                        <h5 class="text-uppercase text-center font-bold mt-4">Register</h5>
                                    </div>
    
                                    <form action="mt-3">
    
                                        <div class="form-group">
                                            <label for="fullname">Full Name</label>
                                            <input class="form-control" type="text" id="fullname" placeholder="Enter your name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="emailaddress">Email address</label>
                                            <input class="form-control" type="email" id="emailaddress" required placeholder="Enter your email">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input class="form-control" type="password" required id="password" placeholder="Enter your password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox checkbox-success">
                                                <input type="checkbox" class="custom-control-input" id="checkbox-signup">
                                                <label class="custom-control-label" for="checkbox-signup">I accept <a href="javascript: void(0);" class="text-dark">Terms and Conditions</a></label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0 text-center">
                                            <button class="btn btn-gradient btn-block" type="submit"> Sign Up Free </button>
                                        </div>
    
                                    </form>
    
                                    <div class="row mt-4">
                                            <div class="col-sm-12 text-center">
                                                <p class="text-muted mb-0">Don't have an account? <a href="pages-login.html" class="text-dark ml-1"><b>Sign Up</b></a></p>
                                            </div>
                                        </div>
    
                                </div> <!-- end card-body -->
                            </div>
                            <!-- end card -->
    
                     
    
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </div>
            <!-- end page -->

        <!-- Vendor js -->
        <script src="<?= base_url('DarkAbstackAdmin/assets/js/vendor.min.js') ?>"></script>

        <!-- App js -->
        <script src="<?= base_url('DarkAbstackAdmin/assets/js/app.min.js') ?>"></script>
        
    </body>
</html>