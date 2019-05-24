<!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="<?php if($this->session->userdata('level') == "1") { echo base_url('C_admin'); } else if ($this->session->userdata('level') == "2") { echo base_url('C_manager'); }?>"><img src="<?php echo base_url(); ?>assets/images/icon/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="<?php if($this->session->userdata('level') == "1") { echo base_url('C_admin'); } else if ($this->session->userdata('level') == "2") { echo base_url('C_manager'); }?>" aria-expanded="true"><i class="ti-dashboard active"></i><span>dashboard</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-grid3"></i><span>Product</span></a>
                                <ul class="collapse">
                                    <li><a href="<?php if($this->session->userdata('level') == "1") { echo base_url('C_admin/product'); } else if ($this->session->userdata('level') == "2") { echo base_url('C_manager/product'); }?>">Product Data</a></li>
                                    <li><a href="<?php if($this->session->userdata('level') == "1") { echo base_url('C_admin/productcategory'); } else if ($this->session->userdata('level') == "2") { echo base_url('C_manager/productcategory'); }?>">Product Category</a></li>
                                    <li><a href="<?php if($this->session->userdata('level') == "1") { echo base_url('C_admin/taxes'); } else if ($this->session->userdata('level') == "2") { echo base_url('C_manager/taxes'); }?>">Taxes</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?php if($this->session->userdata('level') == "1") { echo base_url('C_admin/bom'); } else if ($this->session->userdata('level') == "2") { echo base_url('C_manager/bom'); }?>" aria-expanded="true"><i class="ti-layers-alt"></i><span>Bill Of Material</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-package"></i><span>Manufacturing</span></a>
                                <ul class="collapse">
                                    <li><a href="<?php if($this->session->userdata('level') == "1") { echo base_url('C_admin/createmanufacturing'); } else if ($this->session->userdata('level') == "2") { echo base_url('C_manager/createmanufacturing'); }?>">Create Manfucturing</a></li>
                                    <li><a href="<?php if($this->session->userdata('level') == "1") { echo base_url('C_admin/manufacturing'); } else if ($this->session->userdata('level') == "2") { echo base_url('C_manager/manufacturing'); }?>">Manufacturing Data</a></li>
                                    <li><a href="<?php if($this->session->userdata('level') == "1") { echo base_url('C_admin/confirmed'); } else if ($this->session->userdata('level') == "2") { echo base_url('C_manager/confirmed'); }?>">Confirmed Data</a></li>
                                    <li><a href="<?php if($this->session->userdata('level') == "1") { echo base_url('C_admin/produce'); } else if ($this->session->userdata('level') == "2") { echo base_url('C_manager/produce'); }?>">In Progress Data</a></li>
                                    <li><a href="<?php if($this->session->userdata('level') == "1") { echo base_url('C_admin/done'); } else if ($this->session->userdata('level') == "2") { echo base_url('C_manager/done'); }?>">Done Data</a></li>
                                </ul>
                            </li>
                            <?php if($this->session->userdata('level') == "1") : ?>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i><span>User Management</span></a>
                                <ul class="collapse">
                                    <li><a href="<?php echo base_url('C_admin/adduser') ?>">Add User</a></li>
                                    <li><a href="<?php echo base_url('C_admin/user') ?>">User Data</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search..." required>
                                <i class="ti-search"></i>
                            </form>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Manufaturing System</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="<?php echo base_url(); ?>assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('name'); ?> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <!-- <a class="dropdown-item" href="#">Message</a> -->
                                <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="<?php echo base_url('C_login/logout'); ?>">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->