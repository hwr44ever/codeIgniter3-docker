<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- LOGO -->
        <div class="navbar-brand-box">
            <a href="<?php echo base_url(); ?>" class="logo">
                <span>
                    <img src="<?php echo base_url('theme/vertical-dark/'); ?>assets/images/najam-logo.png" alt="" height="150">
                </span>
                <i>
                    <img src="<?php echo base_url('theme/vertical-dark/'); ?>assets/images/logo-small.png" alt="" height="50">
                </i>
            </a>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="<?php echo base_url('dashboard'); ?>"><i class="feather-home"></i><span>Dashboard</span></a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow"><i class="mdi mdi-contact-mail-outline"></i><span>Items</span></a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url('item/add'); ?>">Add Item</a></li>
                        <li><a href="<?php echo base_url('item/list'); ?>">Item List</a></li>                        
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow"><i class="feather-users "></i><span>Vendors</span></a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url('vendor/add'); ?>">Add Vendor</a></li>
                        <li><a href="<?php echo base_url('vendor/list'); ?>">Vendor List</a></li>                        
                        <li><a href="<?php echo base_url('vendor/disabled'); ?>">Disabled Vendors</a></li>                        
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow"><i class="feather-dollar-sign"></i><span>Cash Book</span></a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url('cash'); ?>">Add Entry</a></li>
                        <li><a href="<?php echo base_url('cash/list/entries'); ?>">Entry List</a></li>                        
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow"><i class="mdi mdi-cash-multiple"></i><span>Invoices (سودا بک )</span></a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url('Add/Invoice'); ?>">Add Invoice</a></li>
                        <li><a href="<?php echo base_url('view/Buyer/Invoice'); ?>">Buyer Invoice List</a></li>
                        <li><a href="<?php echo base_url('view/Seller/Invoice'); ?>">Seller Invoice List</a></li>                        
                        <li><a href="<?php echo base_url('view/Pending/Invoice'); ?>">Pending Invoices</a></li>                        
                    </ul>
                </li>
                <?php 
                
                if($_SESSION['user_type'] == 1 ){ ?>
                <li>
                    <a href="javascript: void(0);" class="has-arrow"><i class="feather-users"></i><span>Users</span></a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url('user/add'); ?>">Add User</a></li>
                        <li><a href="<?php echo base_url('user/list'); ?>">Users List</a></li>                        
                        <li><a href="<?php echo base_url('user/disabled/list'); ?>">Disabled List</a></li>                        
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow"><i class="feather-file-text"></i><span>Reports</span></a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url('Report/Cash'); ?>">Cash Report</a></li>
                        <li><a href="<?php echo base_url('Report/Invoice'); ?>">Invoice Report</a></li>                               
                    </ul>
                </li>
                <?php }?>

            </ul>
        </div
        <!-- Sidebar -->
    </div>
</div>