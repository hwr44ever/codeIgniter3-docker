<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('_head'); ?>

    <body>

        <!-- Begin page -->
        <div id="layout-wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <?php $this->load->view('_nav_bar') ?>
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <?php $this->load->view('_header'); ?>
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="needs-validation" novalidate id="add_user_form" method="POST">
                                            <div class="form-row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">First name</label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="First name"  required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom02">Last name</label>
                                                    <input type="text" class="form-control" id="validationCustom02" placeholder="Last name"  required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustomUsername">Email</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                        </div>
                                                        <input type="email" class="form-control" id="validationCustomUsername" onblur="checkEmail()" placeholder="Email Address" aria-describedby="inputGroupPrepend" required>
                                                        <div id="emailStatus" style="color:red"></div>
                                                        <div class="invalid-feedback">
                                                            Please Enter correct email address.
                                                        </div>
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom02">Password</label>
                                                    <input type="password" class="form-control" id="my_password" name="my_password" placeholder="Enter user password here"  required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom03">Contact</label>
                                                    <input type="number" class="form-control" minlength="11" id="validationCustom03" placeholder="Phone Number" required>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid phone number.
                                                    </div>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom04">Address</label>
                                                    <input type="text" class="form-control" id="validationCustom04" placeholder="address" required>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid Address.
                                                    </div>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    User Type:&nbsp;&nbsp;
                                                    <input type="radio" id="radio1" name="user_type" value="2" checked="">&nbsp;&nbsp;User&nbsp;&nbsp;
                                                    <input type="radio" id="radio2" name="user_type" value="1"> &nbsp;&nbsp;Admin

                                                </div>
                                            </div>
                                            <br>
                                            <button class="btn btn-primary" type="button" id="submit_button" name="submit_button">Add User</button>
                                        </form>

                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                <?php $this->load->view('_footer'); ?>
            </div>
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->

        <!-- Overlay-->
        <div class="menu-overlay"></div>

        <!-- jQuery  -->
        <script src="<?php echo base_url(SITETHEME) ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(SITETHEME) ?>assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(SITETHEME) ?>assets/js/metismenu.min.js"></script>
        <script src="<?php echo base_url(SITETHEME) ?>assets/js/waves.js"></script>
        <script src="<?php echo base_url(SITETHEME) ?>assets/js/simplebar.min.js"></script>

        <!-- Validation custom js-->
        <script src="<?php echo base_url(SITETHEME) ?>assets/pages/validation-demo.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url(SITETHEME) ?>assets/js/theme.js"></script>

        <script type="text/javascript">

                                                            $(document).ready(function () {

                                                                $("#submit_button").click(function (event) {
                                                                    var user_type = document.querySelector('input[name="user_type"]:checked').value;
                                                                    var first_name = document.getElementById('validationCustom01').value;
                                                                    var last_name = document.getElementById('validationCustom02').value;
                                                                    var contact = document.getElementById('validationCustom03').value;
                                                                    var email = document.getElementById('validationCustomUsername').value;
                                                                    var address = document.getElementById('validationCustom04').value;
                                                                    var my_password = $('#my_password').val();
                                                                    if (email == '') {
                                                                        //Swal.fire("Please Enter correct email!", 'error');
                                                                        document.getElementById('validationCustomUsername').focus();
                                                                        //$("#submit_button").prop("disabled", true);
                                                                    } else if (password = '') {
                                                                        document.getElementById('password').focus();
                                                                    } else {//esle start here
                                                                        // disabled the submit button
                                                                        $.ajax({
                                                                            //alert(email);
                                                                            url: "<?php echo base_url() . 'user/user_added'; ?>",
                                                                            data: {"first_name": first_name,
                                                                                "last_name": last_name,
                                                                                "contact": contact,
                                                                                "email": email,
                                                                                "address": address,
                                                                                "user_password": my_password,
                                                                                "user_type": user_type},
                                                                            type: "POST",
                                                                            success: function (data) {
                                                                                var result = jQuery.parseJSON(data);
                                                                                if (result.status == 'success') {
                                                                                    Swal.fire({
                                                                                        icon: 'success',
                                                                                        title: '' + result.msg,
                                                                                        showConfirmButton: false,
                                                                                        timer: 1500
                                                                                    });
                                                                                    $("#submit_button").prop("disabled", true);
                                                                                    setTimeout(function () {
                                                                                        window.location.reload(1);
                                                                                    }, 3000);
                                                                                } else {
                                                                                    Swal.fire('Error', result.msg, 'success')
                                                                                    $("#submit_button").prop("disabled", false);
                                                                                }

                                                                            }

                                                                        });
                                                                    }//end if else

                                                                });

                                                            });


                                                            //Email Check
                                                            function checkEmail() {
                                                                var email = document.getElementById('validationCustomUsername').value;
                                                                $.ajax({
                                                                    method: "POST",
                                                                    url: "<?php echo base_url('user/check_email_if_exist'); ?>",
                                                                    data: {emailId: email},
                                                                    success: function (data) {
                                                                        var result = jQuery.parseJSON(data);
                                                                        if (result.status == 'success') {
                                                                            Swal.fire('Error', result.msg, 'error')
                                                                            $('#emailStatus').html(result.msg);
                                                                            $("#submit_button").prop("disabled", true);
                                                                            setTimeout(function () {
                                                                                window.location.reload(1);
                                                                            }, 3000);
                                                                        } else {
                                                                            $("#submit_button").prop('disabled', false);
                                                                        }
                                                                    }
                                                                });
                                                            }
        </script>

    </body>

</html>