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
                                                    <th >Date</th>
                                                    <th >Company</th>
                                                    <th >Weight</th>
                                                    <th >Rate</th>
                                                    <th >Bill Amount</th>
                                                    <th >Detail</th>
                                                    <th >Action</th>
                                                </tr>

                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($invoices_data)) {                                                    
                                                    $total_amount = 0;
                                                    foreach ($invoices_data as $invoices_data_row) {
                                                        //print_r($invoices_data_row);
                                                        
                                                        $total_amount = $total_amount + (float) $invoices_data_row->total_amount;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $invoices_data_row->date; ?></td>
                                                            <td><a href="<?php echo base_url('vendor/entries/' . $invoices_data_row->vendor_hashval); ?>"><?php echo $invoices_data_row->vendor_name; ?></a></td>
                                                            <td><?php echo number_format((float)$invoices_data_row->weight,2); ?></td>
                                                            <td><?php echo number_format((float)$invoices_data_row->rate,2); ?></td>
                                                            <td><?php echo number_format((float)$invoices_data_row->total_amount,2); ?></td>
                                                            <td><?php echo $invoices_data_row->detail_box; ?></td>
   
                                                            <td><a href="<?php echo base_url('Invoice/Edit/'. $invoices_data_row->invoice_hashval); ?>"><button onclick=""  class="btn btn-warning">Edit</button></a>
                                                                &nbsp;&nbsp;<a  href="#" ><button onclick="delete_invoice('<?php echo $invoices_data_row->invoice_hashval; ?>')" class="btn btn-danger">Delete </button></a>
                                                            <a href="<?php echo base_url('Invoice/Generate/'. $invoices_data_row->invoice_hashval); ?>"><button class="btn btn-success">Generate Invoice</button></a>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    <tr>
                                                        <td><h2><b>Total</h2></td>
                                                        <td><h3><?php echo number_format((float) $total_amount, 2); ?></h3></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
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
            function delete_invoice(invoice_hasval) {
                Swal.fire({
                    title: 'Are you sure? You want to be delete this Invoice?<br>(کیا واقعی غیر فعال کرنا چاھتے ہیں ؟)',
                    text: "(کیا واقعی غیر فعال کرنا چاھتے ہیں ؟)",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Delete it (جی ہاں )!',
                    cancelButtonText: 'No, (جی نہیں)!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "<?php echo base_url() . 'Invoices/deactivate_invoice_and_cash_entry_by_hashval'; ?>",
                            data: {"hashval": invoice_hasval},
                            type: "POST",
                            success: function (data) {
                                var result = jQuery.parseJSON(data);
                                if (result.status == 'success') {
                                    Swal.fire({
                                        icon: result.status,
                                        title: '' + result.msg,
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    setTimeout(function () {
                                        window.location.reload(1);
                                    }, 1000);
                                } else {
                                    Swal.fire('Error', result.msg, result.status)
                                }

                            }

                        });//end of ajax
                    }


                });
            }

        </script>

    </body>

</html>