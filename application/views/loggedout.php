
<!DOCTYPE html>
<html lang="en">

   <?php $this->load->view('_head'); ?>

    <body>

        <div class="bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex align-items-center min-vh-100">
                            <div class="w-100 d-block bg-white shadow-lg rounded my-5">
                                <div class="row">
                                    <div class="col-lg-5 d-none d-lg-block bg-register rounded-left"></div>
                                    <div class="col-lg-7">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <a href="index.html" class="d-block mb-5">
                                                    <img src="<?php echo base_url('theme/vertical-dark/'); ?>assets/images/logo-dark.png" alt="app-logo" height="18" />
                                                </a>
                                            </div>
                                            
                                            <div class="text-center">
                                                <img src="<?php echo base_url('theme/vertical-dark/'); ?>assets/images/500-error.svg" alt="error" height="140">
                                                <h1 class="h4 mb-3 mt-4">You are logged out. You will be redirected to login page in 5 seconds</h1>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-12 text-center">
                                                    <a href="<?php echo base_url('login'); ?>" class="btn btn-success"><i class="mdi mdi-home mr-2"></i>Back to Login Page </a>
                                                </div> <!-- end col -->
                                            </div>
                                            <!-- end row -->
                                        </div> <!-- end .padding-5 -->
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div> <!-- end .w-100 -->
                        </div> <!-- end .d-flex -->
                    </div> <!-- end col-->
                </div> <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
        <script>setTimeout(function(){window.location.href='<?php echo base_url('login') ?>'},5000);</script>
        <!-- jQuery  -->
        <?php $this->load->view('_scripts'); ?>

    </body>

</html>