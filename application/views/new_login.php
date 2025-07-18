<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <?php $this->load->view('_head'); ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel="stylesheet" href="<?php echo base_url(SITETHEME . 'myAssests') ?>/style.css">
        <style>
            .button {
                background-color: #4CAF50; /* Green */
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }

            .button2 {background-color: #008CBA;} /* Blue */
        </style>
    </head>
    <body>

        <div id="login-form-wrap">
            <h2>Login</h2>
            <form id="login-form">
                <p>
                    <input type="email" id="user_email" name="user_email" placeholder="Email Address" required><i class="validation"><span></span><span></span></i>
                </p>
                <p>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required><i class="validation"><span></span><span></span></i>
                </p>
                <p>
                    <input type="button" id="login_button" class="button button2" value="Login">
                </p>
            </form>
        </div>

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
                                        title: '' + result.msg,
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



    </body>
</html>
