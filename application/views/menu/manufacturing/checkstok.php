<?php $this->load->view('main/header'); ?>

<!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">

  </head>

<body>

    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- navbar -->
        <?php $this->load->view('main/navbar'); ?>
            <div class="main-content-inner">
                <div class="row">
                    <div class="col-lg-6 col-ml-12">
                        <div class="row">
                            <!-- Textual inputs start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Manufacturing <?php echo $manufacturing[0]->pn; ?></h4>
                                        <form action="<?php echo base_url('C_manufacturing/produce'); ?>" method="POST">
                                        	<input type="hidden" name="id_manufacturing" value="<?php echo $manufacturing[0]->id_manufacturing; ?>">
                                        	<input type="hidden" name="id_bom" value="<?php echo $manufacturing[0]->id_bom; ?>">
                                        	<input type="hidden" name="id_product" value="<?php echo $manufacturing[0]->id_product; ?>">
                                        	<div class="row">
                                        		<div class="col-md-6">
                                        			<div class="form-group">
		                                                <label for="id_product" class="col-form-label">Product</label>
		                                                <input type="text" class="form-control" name="product" id="product" value="<?php echo $manufacturing[0]->pn; ?>" readonly>
		                                            </div>
		                                            <div class="form-group">
		                                                <label for="quantity" class="col-form-label">Quantity</label>
		                                                    <input type="number" class="form-control" name="quantity" id="quantity" value="<?php echo $manufacturing[0]->quantity; ?>" readonly>
		                                            </div>
		                                            <div class="form-group">
		                                                <label for="id_bom" class="col-form-label">Bill Of Material</label>
		                                                <input type="text" class="form-control" name="bom" id="bom" value="<?php echo $manufacturing[0]->pn; ?>" readonly>
		                                            </div>
                                        		</div>
                                        		<div class="col-md-6">
                                        			<div class="form-group">
		                                                <label for="deadline_start" class="col-form-label">Deadline Start</label>
		                                                <input class="form-control" type="date" name="deadline_start" id="deadline_start" value="<?php echo $manufacturing[0]->deadline_start; ?>" readonly>
		                                            </div>
		                                            <div class="form-group">
		                                                <label for="id_user" class="col-form-label">Responsible</label>
		                                                <input type="text" class="form-control" name="responsible" id="responsible" value="<?php echo $manufacturing[0]->un; ?>" readonly><br><br>
		                                            </div>
		                                            <div class="form-group">
		                                            	<div class="row">
		                                            		<div class="col-md-4"></div>
		                                            		<div class="col-md-4">
		                                            			<a href="<?php echo base_url('C_admin/confirmed'); ?>" class="btn btn-danger btn-block">Kembali</a>
		                                            		</div>
		                                            		<div class="col-md-4">
		                                            			<button class="btn btn-primary btn-block" type="submit"
																<?php foreach ($detail_bom as $key => $value) : ?>
																<?php $qty = $manufacturing[0]->quantity; $bom = $value->quantity; $consumed = $qty*$bom; ?>
																<?php if($consumed <= $value->sp) { } else { echo "disabled"; } ?>
																<?php endforeach; ?>
		                                            			>Produce</button>
		                                            		</div>
		                                            	</div>
		                                            </div>
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
                <div class="row">
                    <!-- Contextual Classes start -->
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Component of <?php echo $manufacturing[0]->pn; ?></h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-dark text-center">
                                            <thead class="text-uppercase">
                                                <tr class="table-active">
                                                    <th scope="col">Product</th>
                                                    <th scope="col">To Consume</th>
                                                    <th scope="col">Stock</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            	<?php foreach ($detail_bom as $key => $value) : ?>
                                            	<?php $qty = $manufacturing[0]->quantity; $bom = $value->quantity; $consumed = $qty*$bom; ?>
                                                <tr class="<?php if($consumed <= $value->sp) { echo "table-success"; } else { echo "table-danger"; } ?>">
                                                    <th scope="row"><?php echo $value->pn; ?></th>
                                                    <td><?php echo $consumed; ?></td>
                                                    <td><?php echo $value->sp; ?></td>
                                                    <td><?php if($consumed <= $value->sp) { echo "Tersedia"; } else { echo "Tidak Tersedia"; } ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Contextual Classes end -->
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

    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <!-- others plugins -->
    <script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
</body>

</html>