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
                                                    <th >Type</th>
                                                    <th >Action</th>
                                                </tr>

                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($invoices_data)) {
                                                    $total_buyer = 0;
                                                    $total_seller = 0;
                                                    $total_amount = 0;
                                                    foreach ($invoices_data as $invoices_data_row) {
                                                        //print_r($invoices_data_row);
                                                        if ($invoices_data_row->invoice_type == 1) {
                                                            $total_buyer = $total_buyer + (float) $invoices_data_row->total_amount;
                                                        } else {
                                                            $total_seller = $total_seller + (float) $invoices_data_row->total_amount;
                                                        }
                                                        $total_amount = $total_amount + (float) $invoices_data_row->total_amount;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $invoices_data_row->date; ?></td>
                                                            <td><a href="<?php echo base_url('vendor/entries/' . $invoices_data_row->vendor_hashval); ?>"><?php echo $invoices_data_row->vendor_name; ?></a></td>
                                                            <td><?php echo $invoices_data_row->weight; ?></td>
                                                            <td><?php echo $invoices_data_row->rate; ?></td>
                                                            <td><?php echo $invoices_data_row->total_amount; ?></td>
                                                            <td><?php echo $invoices_data_row->detail_box; ?></td>
        <?php if ($invoices_data_row->invoice_type == 2) {
            ?>
                                                                <td>Seller</td>
        <?php
        } else {
            ?>
                                                                <td>Buyer</td>
                                                            <?php } ?>
                                                            <td><a href="<?php echo base_url('Invoice/Edit/' . $invoices_data_row->invoice_type . '/' . $invoices_data_row->invoice_hashval); ?>"><i class="dripicons-pencil"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <!-- <a  href="#" ><img src="<?php echo base_url(SITETHEME . 'myImages/bad.png'); ?>" onclick="delete_invoice(<?php echo $invoices_data_row->vendor_id; ?>)" class="dripicons-trash"></a>--></td>
                                                        </tr>
                                                        <?php } ?>
                                                    <tr>
                                                        <td><b>Total</b></td>
                                                        <td>Total Buyer <b><?php echo number_format((float) $total_buyer, 2); ?></b></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Total Seller<b> <?php echo number_format((float) $total_seller, 2); ?></b></td>
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
            function delete_invoice(id) {
                Swal.fire({
                    title: 'Are you sure? You want to be deactivate 6his vendor?<br>(کیا واقعی  آپ اس صارف کو غیر فعال کرنا چاھتے ہیں ؟)',
                    text: "You can change it later if you change your mind!آپ اسکو بعد میں واپس تبدیل کر سکتے ہیں ",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, disable it (جی ہاں )!',
                    cancelButtonText: 'No, (جی نہیں)!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "<?php echo base_url() . 'vendor/delete_vendor'; ?>",
                            data: {"vendor_id": id},
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
                                    setTimeout(function () {
                                        window.location.reload(1);
                                    }, 1000);
                                } else {
                                    Swal.fire('Error', result.msg, 'success')
                                }

                            }

                        });//end of ajax
                    }


                });
            }

        </script>

    </body>

</html>