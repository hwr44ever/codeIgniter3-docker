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
                                                    <input type="text" class="form-control" value="<?php echo $item_data->item_name ?>" name="item_name" id="item_name" placeholder="Item Name" required>
                                                    <input type="hidden" class="form-control" value="<?php echo $item_data->item_id ?>" name="item_id" id="item_id" placeholder="Item Name" required>
                                                    <div class="invalid-feedback">
                                                        Please Enter Item Name.
                                                    </div>
                                                </div>
                                            </div>


                                            <button class="btn btn-primary" id="submit_button" type="button">Update Item</button>
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
                    var item_id = document.getElementById('item_id').value;
                    if (item_name == '' || item_name.length < 4) {
                        Swal.fire("No Name has been enterted!<br>Please Enter Item Name containing 4 characters!", 'error');
                        document.getElementById('item_name').focus();
                    } else {//esle start here
                        // disabled the submit button
                        $("#submit_button").prop("disabled", true);
                        $.ajax({
                            url: "<?php echo base_url() . 'home/update_item'; ?>",
                            data: {"item_name": item_name, "item_id": item_id},
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
                                    Swal.fire('Error', result.msg, 'success')
                                    $("#submit_button").prop("disabled", false);
                                }

                            }

                        });//end of ajax
                    }//end if else

                });

            });
        </script>

    </body>

</html>