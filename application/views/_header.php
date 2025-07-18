<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex align-items-center">
            <button type="button" class="btn btn-sm mr-2 d-lg-none header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <div class="header-breadcumb">
                <h6 class="header-pretitle d-none d-md-block">Overview</h6>
                <h2 class="header-title"><?php echo $heading; ?></h2>
            </div>
        </div>
        <div class="d-flex align-items-center">

           <!-- <button type="button" class="btn btn-primary d-none d-lg-block ml-2">
                <i class="mdi mdi-pencil-outline mr-1"></i> Create Reports
            </button>-->
            <div class="dropdown d-inline-block ml-2">
                <button type="button" class="btn header-item" id="page-header-user-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="<?php echo $_SESSION['user_pic']; ?>"
                         alt="Header Avatar">
                    <span class="d-none d-sm-inline-block ml-1"><?php echo $_SESSION['fullname']; ?></span>
                    <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
           
                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="<?php echo base_url('changePassword'); ?>">
                        <span><i class="mdi mdi-key-outline"></i> Change Password</span>
                        <span>
                        </span>
                    </a>
                    
                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="<?php echo base_url('logout'); ?>">
                        <span><i class="feather-power"> Log Out</i></span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</header>