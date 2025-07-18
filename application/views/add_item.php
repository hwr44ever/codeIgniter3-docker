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
                                                    <label for="validationCustom03">Item Name</label>
                                                    <input type="text" class="form-control" name="item_name" id="item_name" placeholder="Item Name" required>
                                                    <div class="invalid-feedback">
                                                        Please Enter Item Name.
                                                    </div>
                                                </div>
                                            </div>


                                            <button class="btn btn-primary" id="submit_button" type="button">Add Item</button>
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
                    var item_name = document.getElementById('item_name').value;
                    if (item_name == '' || item_name.length < 4) {
                        Swal.fire("No Name has been enterted!<br>Please Enter Item Name containing 4 characters!", 'error');
                        document.getElementById('item_name').focus();
                    } else {//esle start here
                        // disabled the submit button
                        $("#submit_button").prop("disabled", true);

                        $.ajax({
                            url: "<?php echo base_url() . 'home/item_added'; ?>",
                            data: {"item_name": item_name},
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
                                    $("#submit_button").prop("disabled", true);
                                    setTimeout(function () {
                                        window.location.reload(1);
                                    }, 1000);
                                } else {
                                    Swal.fire('Error', result.msg, 'success')
                                    $("#submit_button").prop("disabled", false);
                                }

                            }

                        });
                    }//end if else

                });

            });
        </script>

    </body>

</html>