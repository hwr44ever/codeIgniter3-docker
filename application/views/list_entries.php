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
                                                    <th >Debit</th>
                                                    <th >Credit</th>
                                                    <th >Detail</th>
                                                    <th >Action</th>
                                                </tr>

                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($vendor_entries_data)) {
                                                    $total_debit = 0;
                                                    $total_credit = 0;
                                                    $total_amount = 0;
                                                    foreach ($vendor_entries_data as $vendor_entries_row) {
                                                        $total_amount = $total_amount + $vendor_entries_row->amount;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $vendor_entries_row->date; ?></td>
                                                            <?php
                                                            if ($vendor_entries_row->entry_type == 1) {
                                                                $total_debit = $total_debit + $vendor_entries_row->amount;
                                                                ?>
                                                                <td style="color:red;"><?php echo number_format($vendor_entries_row->amount, 2); ?></td>
                                                                <td></td>
                                                            <?php
                                                            } else {
                                                                $total_credit = $total_credit + $vendor_entries_row->amount;
                                                                ?>
                                                                <td></td>
                                                                <td style="color:green;"><?php echo number_format($vendor_entries_row->amount, 2); ?></td>
        <?php } ?>
                                                            <td><?php echo $vendor_entries_row->detail; ?></td>
                                                            <td><a href="<?php echo base_url('cash/edit_entry/' . $vendor_entries_row->entry_hashval); ?>"><i class="dripicons-pencil"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <!-- <a  href="#" ><img src="<?php echo base_url(SITETHEME . 'myImages/bad.png'); ?>" onclick="delete_vendor(<?php echo $vendor_entries_row->vendor_id; ?>)" class="dripicons-trash"></a>--></td>

                                                        </tr>
    <?php } ?>
                                                    <tr>
                                                        <td><b>Total</b></td>
                                                        <td><?php echo number_format($total_debit, 2); ?></td>
                                                        <td><?php echo number_format($total_credit, 2); ?></td>
                                                        <?php
                                                        $grand_total = $total_credit - $total_debit;
                                                        if ($grand_total < 0) {
                                                            ?>
                                                            <td><b>Grand Total</b> <p style="color:red"><?= number_format($grand_total, 2) ?></p></td>
                                                        <?php } else { ?>
                                                            <td><b>Grand Total</b><p style="color:green"> <?= number_format($grand_total, 2) ?></p></td>
                                                    <?php } ?>
                                                        <td></td>
                                                    </tr>
<?php } else { ?>
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
            function delete_vendor(id) {
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
                                        title: ''result.msg,
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