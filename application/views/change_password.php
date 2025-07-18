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
                                        <form class="needs-validation" name="add_item_form" id="add_item_form" novalidate>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom03">New Password</label>
                                                    <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter new password" required>
                                                    <div class="invalid-feedback">
                                                        Please Enter Item Name.
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom03">Confirm New Password</label>
                                                    <input type="password" class="form-control" name="conf_new_password" id="conf_new_password" placeholder="Enter new password again" required>
                                                    <div class="invalid-feedback">
                                                        Please Enter Item Name.
                                                    </div>
                                                </div>
                                            </div>


                                            <button class="btn btn-primary" id="submit_button" type="button">Change Password</button>
                                            <div id="status_msg"> </div>

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

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">

            $(document).ready(function () {

                $("#submit_button").click(function (event) {
                    var change_password = document.getElementById('new_password').value;
                    var conf_change_password = document.getElementById('new_password').value;
                    if (change_password != conf_change_password) {
                        Swal.fire("Do you really want to change your password?", 'error');
                        document.getElementById('new_password').focus();
                    } else {//esle start here
                        // disabled the submit button
                        $("#submit_button").prop("disabled", true);

                        $.ajax({
                            url: "<?php echo base_url() . 'user/password_updated'; ?>",
                            data: {"change_password": change_password},
                            type: "POST",
                            success: function (data) {
                                var result = jQuery.parseJSON(data);
                                if (result.status == 'success') {
                                    Swal.fire({
                                        icon: 'success',
                                        title: ''result.msg,
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    setTimeout(function () {
                                        window.location.reload(1);
                                    }, 1000);
                                } else {
                                    Swal.fire('Error',  result.msg,  'success')
                                }

                            }

                        });
                    }//end if else

                });

            });
        </script>



    </body>

</html>