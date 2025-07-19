<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <?php $this->load->view('_head'); ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel="stylesheet" href="<?php echo base_url(SITETHEME . 'myAssests') ?>/style.css">
    </head>
   <!--<body style="background-image: url('<?php echo base_url('theme/vertical-dark/'); ?>assets/images/najam-logo.png');">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <h1></h1>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="needs-validation" name="add_item_form" id="add_item_form" novalidate>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom03">Email</label>
                                            <input type="email" id="user_email" name="user_email" placeholder="Email Address Here" required>
                                            <div class="invalid-feedback">
                                                Please Enter Item Name.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom03">Password</label>
                                            <input type="password" id="password" name="password" placeholder="Enter your password" required>
                                            <div class="invalid-feedback">
                                                Please Enter Item Name.
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" id="login_button" class="button button2" value="Login">
                                    <div id="status_msg"> </div>

                                </form>

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
            </div>
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
