<?php $this->load->view('main/header'); ?>
</head>

<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">

        <?php $this->load->view('main/navbar'); ?>

            <div class="main-content-inner">
                <div class="row">
                    <div class="col-lg-6 col-ml-12">
                        <div class="row">
                            <!-- Textual inputs start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Add User Manufacturing</h4>
                                        <?php 
                                            $berhasil = $this->session->flashdata('berhasil'); 
                                            if(!empty($berhasil)) : ?>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <div class="alert alert-success">
                                                  <p><?php echo $berhasil; ?></p>
                                                </div>
                                                <meta http-equiv="refresh" content="2; url='<?php echo base_url('C_admin/adduser'); ?>'">
                                            <div>
                                        <?php endif; ?>
                                        <form action="<?php echo base_url('C_user/add'); ?>" method="POST">
                                            <div class="form-group">
                                                <label for="name" class="col-form-label">Name</label>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" >
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="col-form-label">Email</label>
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" autocomplete="off" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="col-form-label">Password</label>
                                                    <input type="password" class="form-control" name="password" id="password" placeholder="Your Password" autocomplete="off" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="address" class="col-form-label">Address</label>
                                                    <textarea class="form-control" name="address" id="address" cols="30" rows="5" placeholder="Your Address"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone" class="col-form-label">Phone Number</label>
                                                    <input type="number" class="form-control" name="phone" id="phone" placeholder="Your Phone Number" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="level" class="col-form-label">Role User</label>
                                                    <select class="custom-select" name="level" id="level">
                                                        <option selected="selected">Select Role User</option>
                                                        <option value="1">Administrator</option>
                                                        <option value="2">Manager</option>
                                                    </select>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br>
                                                    <button class="btn btn-primary" type="submit">Add User</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Textual inputs end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    
    <!-- jquery latest version -->
    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/metisMenu.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
</body>

</html>
