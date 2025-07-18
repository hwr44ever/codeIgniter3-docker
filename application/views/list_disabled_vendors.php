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

                <?php $this->load->view('_header');
                ?>
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-10">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $heading ?></h4>
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Sr #</th>
                                                        <th>Company Name</th>
                                                        <th>Full Name</th>
                                                        <th>Contact</th>
                                                        <th>Address</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 0;
                                                    foreach ($users_data as $vendor_row) {
                                                        $i++;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo $vendor_row->vendor_company; ?></td>
                                                            <td><?php echo $vendor_row->vendor_fname . ' ' . $vendor_row->vendor_lname; ?></td>
                                                            <td><?php echo $vendor_row->vendor_phone; ?></td>
                                                            <td><?php echo $vendor_row->vendor_address; ?></td>
                                                            <td><a href="<?php echo base_url('vendor/edit/'.$vendor_row->vendor_hashval); ?>"><button class="btn btn-warning">Edit</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-success" onclick="delete_item(<?php echo $vendor_row->vendor_id; ?>)">Enable Vendor</button></td>

                                                        </tr>
                                                    <?php } ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- end card-body-->
                                </div>
                                <!-- end card -->

                            </div>
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
                                                            function delete_item(id) {
                                                                Swal.fire({
                                                                    title: 'Are you sure? You want User to be active?<br>(کیا واقعی  آپ اس صارف کو فعال کرنا چاھتے ہیں ؟)',
                                                                    text: "You can change it later if you change your mind!آپ اسکو بعد میں واپس تبدیل کر سکتے ہیں ",
                                                                    icon: 'warning',
                                                                    showCancelButton: true,
                                                                    confirmButtonColor: '#3085d6',
                                                                    cancelButtonColor: '#d33',
                                                                    confirmButtonText: 'Yes, delete it!'
                                                                }).then((result) => {
                                                                    if (result.value) {
                                                                        $.ajax({
                                                                            url: "<?php echo base_url() . 'user/enable_user'; ?>",
                                                                            data: {"user_id": id},
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