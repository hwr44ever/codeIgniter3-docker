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
                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No</th>
                                                    <th>Item Name</th>
                                                    <th>Edit/Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 0;
                                                foreach ($items_data as $item_row) {
                                                    $i++;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $item_row->item_name; ?></td>
                                                        <td><i class="dripicons-trash"></i> <i class="dripicons-trash"></i></td>
                                                    </tr>
                                                <?php } ?>
                                               
                                            </tbody>
                                        </table>

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                2019 © Drezoc.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-right d-none d-sm-block">
                                    Design & Develop by Myra
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>

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

    </body>

</html>