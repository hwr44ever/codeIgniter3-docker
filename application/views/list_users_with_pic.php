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
                        <?php  foreach ($users_data as $user_row) { 
                            $fullName = $user_row->first_name . ' ' . $user_row->last_name;
                            $role ='User';
                            if($user_row->user_type == 1){
                                $role = "Admin";
                            }
                            $profile_pic = '';
                            if($user_row->profile_pic != ''){
                                 $profile_pic = base_url(SITETHEME).$user_row->profile_pic;
                            }else{
                                $profile_pic = 'https://img.freepik.com/free-vector/illustration-businessman_53876-5856.jpg';
                            }
                            
                                    ?>
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <img class="card-img-top img-fluid" src="<?php echo $profile_pic; ?>" alt="Picture not found">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $fullName ?></h5>
                                    <p class="card-text"><?= $role ?></p>
                                    <a href="#"><a href="<?php echo base_url('user/edit/' . $user_row->user_hashval); ?>"><i class="dripicons-pencil"></i></a>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><img src="<?php echo base_url(SITETHEME . 'myImages/bad.png'); ?>" onclick="delete_item(<?php echo $user_row->user_id; ?>)" class="dripicons-trash"></a>
                                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('user/change_user_password/' . $user_row->user_hashval.'/'.$fullName); ?>"><i class="mdi mdi-key-outline" alt="Change Password"></i></a>
                                </div>
                            </div>

                        </div><!-- end col -->
                        <?php }?>
                    </div>
                    <!-- end row -->


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

    <!-- App js -->
    <script src="<?php echo base_url(SITETHEME) ?>assets/js/theme.js"></script>

</body>

</html>