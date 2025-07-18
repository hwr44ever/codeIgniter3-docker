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
                                                    <th>Vendor Name</th>
                                                    <th>Full Name</th>
                                                    <th>Contact & Address</th>
                                                    <th>Email</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 0;
                                                foreach ($vendor_data as $vendor_row) {
                                                    $i++;
                                                    $vendor_phone_is_empty = '';
                                                    if ($vendor_row->vendor_phone != '') {
                                                        $vendor_phone_is_empty = "<a href='tel:" . $vendor_row->vendor_phone . "'>" . $vendor_row->vendor_phone . "</a>,";
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td><u><a href="<?php echo base_url('vendor/entries/' . $vendor_row->vendor_hashval); ?>"><?php echo $vendor_row->vendor_company; ?></a></u></td>
                                                        <td><?php echo $vendor_row->vendor_fname . ' ' . $vendor_row->vendor_lname; ?></td>
                                                        <td><?php echo $vendor_phone_is_empty . $vendor_row->vendor_address; ?></td>
                                                        <td><?php echo $vendor_row->vendor_email; ?></td>
                                                        <td><a href="<?php echo base_url('vendor/edit/' . $vendor_row->vendor_hashval); ?>"><button class="btn btn-warning">Edit</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-danger" onclick="delete_vendor(<?php echo $vendor_row->vendor_id; ?>)">Disable Vendor</button></td>

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
                                                        function delete_vendor(id) {
                                                            Swal.fire({
                                                                title: 'Are you sure? You want to be deactivate this vendor?<br>(کیا واقعی  آپ اس صارف کو غیر فعال کرنا چاھتے ہیں ؟)',
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
                                                                                Swal.fire('Success', result.msg, 'success');
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