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
            <!-- Start Page-content -->
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="text-uppercase font-size-12 text-muted mb-3">Total Debit</h6>
                                            <span class="h3 mb-0" style="color:red"> <?php echo number_format((float)$total_value_of_debit,2); ?> </span>
                                        </div>
                                      <!--  <div class="col-auto">
                                            <span class="badge badge-soft-success">+7.2</span>
                                        </div> -->
                                    </div> <!-- end row -->

                                    <div id="sparkline1" class="mt-3"></div>
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                        
                        <div class="col-lg-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="text-uppercase font-size-12 text-muted mb-3">Total Credit</h6>
                                            <span class="h3 mb-0" style="color:blue"> <?php echo number_format((float)$total_value_of_credit, 2); ?> </span>
                                        </div>
                                       <!-- <div class="col-auto">
                                            <span class="badge badge-soft-danger">-24.5% </span>
                                        </div> -->
                                    </div> <!-- end row -->

                                    <div id="sparkline2" class="mt-3"></div>
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->

                        <!--<div class="col-lg-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="text-uppercase font-size-12 text-muted mb-3">Future Debit</h6>
                                            <span class="h3 mb-0"> <?php echo number_format($total_value_of_future_debit); ?> </span>
                                        </div>
                                        <div class="col-auto">
                                          <!--  <span class="badge badge-soft-success">+3.5%</span> -->
                                        </div>
                                    </div> <!-- end row -->

                                    <div id="sparkline3" class="mt-3"></div>
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> --><!-- end col-->

                        <!--<div class="col-lg-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="text-uppercase font-size-12 text-muted mb-3">Future Credit</h6>
                                            <span class="h3 mb-0"> <?php echo number_format($total_value_of_future_credit); ?> </span>
                                        </div>
                                        <div class="col-auto">
                                       <!--     <span class="badge badge-soft-success">+53.5%</span> -->                                        </div>
                                    </div> <!-- end row -->

                                    <div id="sparkline4" class="mt-3"></div>
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> --><!-- end col-->
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

    <!-- Sparkline Js-->
    <?php $this->load->view('_scripts'); ?>

</body>

</html>