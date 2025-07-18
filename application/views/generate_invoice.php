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
                                        <section id="printableArea">
                                            <p style="text-align: left">Page 1</p>
                                            <span><h3 style="text-align: right; background-color: black; color:white">
                                                    <?php if ($invoice_data->invoice_type == 2) { ?>
                                                        <?php
                                                        echo "SALE INVOICE";
                                                    } else {
                                                        echo "BUYER INVOICE";
                                                    }
                                                    ?>
                                                </h3>
                                            </span>
                                            <center><img src="<?php echo base_url('theme/vertical-dark/'); ?>assets/images/najam-logo.png" /></center>

                                            <table style="margin-left: auto; margin-right: auto"  border="1">
                                                <tr>
                                                    <th class="col-4">From</th>
                                                    <td>
                                                        <strong>Najam Traders</strong><br>
                                                        Sargodha, Punjab<br>
                                                        Pakistan<br>
                                                        +92-336-6006366
                                                    </td>
                                                    <th >To</th>
                                                    <td colspan="2">

                                                        <strong><?php echo $vendor_data->vendor_company; ?></strong><br>
                                                        <?php echo $vendor_data->vendor_address; ?><br>
                                                        <?php echo $vendor_data->vendor_phone; ?><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="col-3" class="text-uppercase">Date of Purchase</th>
                                                    <th scope="col-3" class="text-uppercase">Detail</th>
                                                    <th scope="col-3" class="text-uppercase">Weight (KG)</th>
                                                    <th scope="col-3" class="text-uppercase text-end">Rate</th>
                                                    <th scope="col-3" class="text-uppercase text-end">Total</th>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: center" scope="col-3" class="text-uppercase"><?php echo $invoice_data->date; ?></td>
                                                    <td style="text-align: center" scope="col-3" class="text-uppercase"><?php echo $invoice_data->detail_box; ?></td>
                                                    <td style="text-align: center" scope="col-3" class="text-uppercase"><?php echo $invoice_data->weight; ?></td>
                                                    <td style="text-align: center" scope="col-3" class="text-uppercase text-end"><?php echo number_format($invoice_data->rate, 2); ?></td>
                                                    <td style="text-align: center" scope="col-3" class="text-uppercase text-end"><?php echo number_format($invoice_data->total_invoice, 2); ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <?php
                                                        $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
                                                        echo strtoupper("<b>total</b>: " . $f->format($invoice_data->total_invoice) . " Rupees Only");
                                                        ?>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <p style="text-align: right"> مال اگر وقت پر نہ پہنچنے تو فوری اطلاح دیں  بعد اذا ہر صورت خریدار ذمہ دار ہو گا <br/>
                                                            واٹس اپپ گروپ میں رابطہ کریں </p>
                                                    </td>
                                                </tr>
                                            </table>

                                        </section>
                                        <center>
                                            <div class="col-12 text-end">
                                                <button type="submit" onclick="printDiv('printableArea')" class="btn btn-danger"> Print</button>
                                            </div>
                                        </center>

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
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

        <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
       
    </body>

</html>