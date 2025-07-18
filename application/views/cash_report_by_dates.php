<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('_head'); ?>
    <body>
        <!-- Begin page -->
        <div id="layout-wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">
                <div data-simplebar class="h-100">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.html" class="logo">
                            <span>
                                <img src="<?php echo base_url('theme/vertical-dark/'); ?>assets/images/logo-light.png" alt="" height="15">
                            </span>
                            <i>
                                <img src="<?php echo base_url('theme/vertical-dark/'); ?>assets/images/logo-small.png" alt="" height="24">
                            </i>
                        </a>
                    </div>

                    <!--- Sidemenu -->
                    <?php $this->load->view('_nav_bar'); ?>
                    <!-- Sidebar -->
                </div>
            </div>
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
                                                <div class="col-md-3 mb-3">
                                                    <label for="validationCustom03">Start Date</label>
                                                    <input type="date" class="form-control" name="report_start_date" id="report_start_date"  required>

                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="validationCustom03">End Date</label>
                                                    <input type="date" class="form-control" name="report_end_date" id="report_end_date"  required>

                                                </div>
                                            </div>


                                            <button class="btn btn-primary" id="submit_button" type="button">Generate Report</button>


                                        </form>

                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Company Name</th>
                                                        <th>Transaction Type</th>
                                                        <th>Amount</th>
                                                        <th>Detail</th>
                                                        <th>Entry By</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="table_data">
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <!-- end card-body-->
                                </div>
                                <!-- end card -->

                            </div>
                            <!-- end col -->

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
        <script src="<?php echo base_url('theme/vertical-dark/'); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url('theme/vertical-dark/'); ?>assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url('theme/vertical-dark/'); ?>assets/js/metismenu.min.js"></script>
        <script src="<?php echo base_url('theme/vertical-dark/'); ?>assets/js/waves.js"></script>
        <script src="<?php echo base_url('theme/vertical-dark/'); ?>assets/js/simplebar.min.js"></script>

        <!-- third party js -->
        <script src="<?php echo base_url('theme/vertical-dark/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url('theme/vertical-dark/'); ?>plugins/datatables/dataTables.bootstrap4.js"></script>
        <script src="<?php echo base_url('theme/vertical-dark/'); ?>plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url('theme/vertical-dark/'); ?>plugins/datatables/responsive.bootstrap4.min.js"></script>
        <script src="<?php echo base_url('theme/vertical-dark/'); ?>plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url('theme/vertical-dark/'); ?>plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url('theme/vertical-dark/'); ?>plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo base_url('theme/vertical-dark/'); ?>plugins/datatables/buttons.flash.min.js"></script>
        <script src="<?php echo base_url('theme/vertical-dark/'); ?>plugins/datatables/buttons.print.min.js"></script>
        <script src="<?php echo base_url('theme/vertical-dark/'); ?>plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="<?php echo base_url('theme/vertical-dark/'); ?>plugins/datatables/dataTables.select.min.js"></script>
        <script src="<?php echo base_url('theme/vertical-dark/'); ?>plugins/datatables/pdfmake.min.js"></script>
        <script src="<?php echo base_url('theme/vertical-dark/'); ?>plugins/datatables/vfs_fonts.js"></script>
        <!-- third party js ends -->

        <!-- Datatables init -->
        <script src="<?php echo base_url('theme/vertical-dark/'); ?>assets/pages/datatables-demo.js"></script>


        <!-- App js -->
        <script src="<?php echo base_url('theme/vertical-dark/'); ?>assets/js/theme.js"></script>


        <script type="text/javascript">

            $(document).ready(function () {

                $("#submit_button").click(function (event) {
                    var start_date = document.getElementById('report_start_date').value;
                    var end_date = document.getElementById('report_end_date').value;
                    if (start_date == '' || end_date == '') {
                        Swal.fire("Select Valid Date!", 'error');
                        document.getElementById('report_start_date').focus();
                    } else {//esle start here
                        // disabled the submit button
                        // $("#submit_button").prop("disabled", true);

                        $.ajax({
                            url: "<?php echo base_url() . 'report/generate_cash_report_by_dates'; ?>",
                            data: {"start_Date": start_date,
                                "end_Date": end_date},
                            type: "POST",
                            success: function (data) {
                                var result = jQuery.parseJSON(data);
                                if (result.status == 'success') {
                                    /*Swal.fire({
                                     icon: 'success',
                                     title: ''+result.msg,
                                     showConfirmButton: false,
                                     timer: 1500
                                     });*/
                                    document.getElementById("table_data").innerHTML = result.cash_data;
                                    //$("#submit_button").prop("disabled", true);
                                    // setTimeout(function () {                                        window.location.reload(1);                                    }, 1000);
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