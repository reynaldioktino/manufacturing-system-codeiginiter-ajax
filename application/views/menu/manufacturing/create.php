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
                                        <h4 class="header-title">Create Manufacturing</h4>
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
                                        <form action="<?php echo base_url('C_manufacturing/add'); ?>" method="POST">
                                            <div class="form-group">
                                                <label for="id_product" class="col-form-label">Product</label>
                                                <select class="custom-select" name="id_product" id="id_product">
                                                    <?php foreach ($product as $key => $value): ?>
                                                        <option value="<?php echo $value->id_product; ?>"><?php echo $value->product_name; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="quantity" class="col-form-label">Quantity</label>
                                                    <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Quantity To Produce" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="id_bom" class="col-form-label">Bill Of Material</label>
                                                <select class="custom-select" name="id_bom" id="id_bom">
                                                    <?php foreach ($bom as $key => $value): ?>
                                                        <option value="<?php echo $value->id_bom; ?>"><?php echo $value->pn; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="deadline_start" class="col-form-label">Deadline Start</label>
                                                <input class="form-control" type="date" name="deadline_start" id="deadline_start">
                                            </div>
                                            <div class="form-group">
                                                <label for="id_user" class="col-form-label">Responsible</label>
                                                <select class="custom-select" name="id_user" id="id_user">
                                                    <?php foreach ($user as $key => $value): ?>
                                                        <option value="<?php echo $value->id_user; ?>"><?php echo $value->name; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br>
                                                    <button class="btn btn-primary" type="submit">Create</button>
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
