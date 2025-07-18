

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
                                    <div class="col-lg-5 d-none d-lg-block bg-login rounded-left">
                                        <img width="" height="" src="<?php echo base_url(SITETHEME) . 'vertical-dark/assets/images/logo-dark.png' ?>"/>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <a href="<?php echo base_url(); ?>" class="d-block mb-5">
                                                    <img src="<?php echo base_url('theme/vertical-dark/'); ?>assets/images/logo-dark.png" alt="app-logo" height="150" />
                                                </a>
                                            </div>
                                            <h1 class="h5 mb-1">Welcome Back!</h1>
                                            <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>
                                            <form class="user" id="login_form" name="login_form" method="post">
                                                <div class="form-group">
                                                    <input type="email" name="user_email" id="user_email" class="form-control form-control-user" placeholder="Email Address">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" id="password" name="password" class="form-control form-control-user" placeholder="Password">
                                                </div>
                                                <button type="button" class="btn btn-success btn-block" id="login_button" name="login_button"> Log In </button>
                                            </form>

                                            <div class="row mt-4">
                                                <div class="col-12 text-center">
                                                    <p class="text-muted mb-2"><a href="auth-recoverpw.html" class="text-muted font-weight-medium ml-1">Forgot your password?</a></p>
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

        <!-- jQuery  -->
        <script src="<?php echo base_url('theme/vertical-dark/'); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url('theme/vertical-dark/'); ?>assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url('theme/vertical-dark/'); ?>assets/js/metismenu.min.js"></script>
        <script src="<?php echo base_url('theme/vertical-dark/'); ?>assets/js/waves.js"></script>
        <script src="<?php echo base_url('theme/vertical-dark/'); ?>assets/js/simplebar.min.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url('theme/vertical-dark/'); ?>assets/js/theme.js"></script>
        <script type="text/javascript">

            $(document).ready(function () {

                $("#login_button").click(function (event) {
                    var user_email = document.getElementById('user_email').value;
                    var password = document.getElementById('password').value;
                    if (user_email == '' || user_email.length < 4) {
                        Swal.fire('Alert!', "Please enter a valid email address!", 'warning');
                        document.getElementById('user_email').focus();
                    } else {//esle start here
                        // disabled the submit button
                        $("#login_button").prop("disabled", true);

                        $.ajax({
                            url: "<?= base_url('user/login') ?>",
                            data: {"user_email": user_email, "password": password},
                            type: "POST",
                            success: function (data) {
                                var result = jQuery.parseJSON(data);
                                if (result.status == 'success') {
                                    // Swal.fire('Success',  result.msg,  'success');
                                    Swal.fire({
                                        icon: 'success',
                                        title: ''result.msg,
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    setTimeout(function () {
                                        window.location = "<?php echo base_url(); ?>";
                                    }, 3000);
                                } else {
                                    Swal.fire('Error', result.msg, "error");
                                    $("#login_button").prop("disabled", false);
                                }

                            }

                        });
                    }//end if else

                });

            });
        </script>

        <script>


            /*$(document).ready(function () {
             
             $("#login_button").click(function (event) {
             // disabled the submit button
             var user_name = document.getElementById('email').value;
             var passwd = document.getElementById('password').value;
             console.log(user_name,passwd);
             $("#login_button").prop("disabled", true);
             $.ajax({
             type: "POST",
             url: "<?= base_url('user/login') ?>",
             enctype: 'multipart/form-data',
             data: "email="+user_name+"&password="+passwd,
             // contentType: false,
             cache: false,
             dataType: 'json',
             processData: false,
             success: function (data) {
             //var response = jQuery.parseJSON(data);
             if (response.status === 'Success') {
             document.getElementById("msg").innerHTML = '<h3>' + response.msg + '</h3>';
             $('#msg').css({color: 'Green'});
             $('#msg').css({borderColor: 'Green'});
             window.setTimeout(function () {
             location.reload();
             }, 2000);
             } else {
             document.getElementById("msg").innerHTML = '<h3>' + response.msg + '</h3>';
             $('#msg').css({color: 'Red'});
             $('#msg').css({borderColor: 'Red'});
             }
             }
             });
             
             });
             
             });*/

        </script>


    </body>

</html>