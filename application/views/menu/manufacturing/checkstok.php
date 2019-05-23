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
                                        	<div class="row">
                                        		<div class="col-md-6">
                                        			<div class="form-group">
		                                                <label for="id_product" class="col-form-label">Product</label>
		                                                <input type="text" class="form-control" name="id_product" id="id_product" value="<?php echo $manufacturing[0]->pn; ?>" readonly>
		                                            </div>
		                                            <div class="form-group">
		                                                <label for="quantity" class="col-form-label">Quantity</label>
		                                                    <input type="number" class="form-control" name="quantity" id="quantity" value="<?php echo $manufacturing[0]->quantity; ?>" readonly>
		                                            </div>
		                                            <div class="form-group">
		                                                <label for="id_bom" class="col-form-label">Bill Of Material</label>
		                                                <input type="text" class="form-control" name="id_product" id="id_product" value="<?php echo $manufacturing[0]->pn; ?>" readonly>
		                                            </div>
                                        		</div>
                                        		<div class="col-md-6">
                                        			<div class="form-group">
		                                                <label for="deadline_start" class="col-form-label">Deadline Start</label>
		                                                <input class="form-control" type="date" name="deadline_start" id="deadline_start" value="<?php echo $manufacturing[0]->deadline_start; ?>" readonly>
		                                            </div>
		                                            <div class="form-group">
		                                                <label for="id_user" class="col-form-label">Responsible</label>
		                                                <input type="text" class="form-control" name="quantity" id="quantity" value="<?php echo $manufacturing[0]->un; ?>" readonly><br><br>
		                                            </div>
		                                            <div class="form-group">
		                                            	<div class="row">
		                                            		<div class="col-md-4"></div>
		                                            		<div class="col-md-4">
		                                            			<a href="<?php echo base_url('C_admin/confirmed'); ?>" class="btn btn-danger btn-block">Kembali</a>
		                                            		</div>
		                                            		<div class="col-md-4">
		                                            			<button class="btn btn-primary btn-block" type="submit">Produce</button>
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

<!-- MODAL ADD -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-success">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Component</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
                    <input type="hidden" name="id_bom_add" id="id_bom1" value="<?php echo $product_bom[0]->id_bom; ?>">
                    <div class="form-group">
                        <div class="col-xs-9">
                            <label class="control-label col-xs-3" >Product</label>
                            <div class="col-xs-9">
                                <input name="product_add" id="product1" class="form-control" type="text" value="<?php echo $product_bom[0]->pn; ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-9">
                            <label for="id_product_category" class="control-label col-xs-3">Component</label>
                            <div class="col-xs-9">
                                <select class="custom-select" name="id_product_add" id="id_product1">
                                    <?php foreach ($product as $key => $value): ?>
                                        <option value="<?php echo $value->id_product; ?>"><?php echo $value->product_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-9">
                            <label class="control-label col-xs-3" >Quantity</label>
                            <div class="col-xs-9">
                                <input name="quantity_add" id="quantity1" class="form-control" type="number">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-success" id="btn_simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END MODAL ADD-->

        <!-- MODAL EDIT -->
<div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-info">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Update Data</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
                    
                    <input name="id_detail_bom_edit" id="id_detail_bom2" class="form-control" type="hidden">
                    <div class="form-group">
                        <label for="id_product_category" class="control-label col-xs-3">Product</label>
                        <div class="col-xs-9">
                            <input name="id_product_edit" id="id_product2" class="form-control" type="text" readonly="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-9">
                            <label class="control-label col-xs-3" >Quantity</label>
                            <div class="col-xs-9">
                                <input name="quantity_edit" id="quantity2" class="form-control" type="number">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_update">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END MODAL EDIT-->

<!--MODAL HAPUS-->
<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-danger">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <input type="hidden" name="kode" id="textkode" value="">
                    <div class="alert alert-warning"><p>Apakah Anda yakin ingin menghapus data ini?</p></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-danger" id="btn_hapus">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END MODAL HAPUS-->


        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        <ul class="nav offset-menu-tab">
            <li><a class="active" data-toggle="tab" href="#activity">Activity</a></li>
            <li><a data-toggle="tab" href="#settings">Settings</a></li>
        </ul>
        <div class="offset-content tab-content">
            <div id="activity" class="tab-pane fade in show active">
                <div class="recent-activity">
                    <div class="timeline-task">
                        <div class="icon bg1">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Added</h4>
                            <span class="time"><i class="ti-time"></i>7 Minutes Ago</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>You missed you Password!</h4>
                            <span class="time"><i class="ti-time"></i>09:20 Am</span>
                        </div>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="fa fa-bomb"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Member waiting for you Attention</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="ti-signal"></i>
                        </div>
                        <div class="tm-title">
                            <h4>You Added Kaji Patha few minutes ago</h4>
                            <span class="time"><i class="ti-time"></i>01 minutes ago</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg1">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Ratul Hamba sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Hello sir , where are you, i am egerly waiting for you.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="fa fa-bomb"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="ti-signal"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                </div>
            </div>
            <div id="settings" class="tab-pane fade">
                <div class="offset-settings">
                    <h4>General Settings</h4>
                    <div class="settings-list">
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifications</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch1" />
                                    <label for="switch1">Toggle</label>
                                </div>
                            </div>
                            <p>Keep it 'On' When you want to get all the notification.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show recent activity</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch2" />
                                    <label for="switch2">Toggle</label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show your emails</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch3" />
                                    <label for="switch3">Toggle</label>
                                </div>
                            </div>
                            <p>Show email so that easily find you.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show Task statistics</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch4" />
                                    <label for="switch4">Toggle</label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifications</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch5" />
                                    <label for="switch5">Toggle</label>
                                </div>
                            </div>
                            <p>Use checkboxes when looking for yes or no answers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offset area end -->
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

<script type="text/javascript">
    $(document).ready(function(){  
        //pemanggilan fungsi tampil data.
        //tampil_data(); 

        var rownumber = 0;
        var tableajax = $('#myTable').DataTable({
          responsive: true,
            ajax: '<?php echo base_url("C_bom/getAjaxDetail") ?>',
            columns: [
             { 
                data: null,
                render: function(data,type,row){
                    rownumber++;
                    return rownumber;
                }
             },
             { data: 'pn'},
             { data: 'quantity' },
             {
              data: null,
              render: function ( data, type, row ) {
                var ret = '<a href="javascript:;" class="btn btn-info btn-sm item_edit" data="'+row.id_detail_bom+'">Stok</a>';
                ret+= '<a href="javascript:;" class="btn btn-danger btn-sm item_hapus" data="'+row.id_detail_bom+'">Delete</a>';
                return ret;
               }
             }
             ]
        });

        //Add Barang
        $('#btn_simpan').on('click',function(){
            var id_bom=$('#id_bom1').val();
            var id_product=$('#id_product1').val();
            var quantity=$('#quantity1').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_bom/adddetail')?>",
                dataType : "JSON",
                data : {id_bom:id_bom, id_product:id_product, quantity:quantity},
                success: function(data){
                    $('[name="id_product_add"]').val("");
                    $('[name="quantity_add"]').val("");
                    $('[name="id_bom_add"]').val("");
                    $('#ModalAdd').modal('hide');
                    // tampil_data();
                    rownumber=0;
                    tableajax.ajax.reload();
                }
            });
            return false;
        });
       
        //GET UPDATE
        $('#show_data').on('click','.item_edit',function(){
            var id_detail_bom=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('C_bom/wheredetail')?>",
                dataType : "JSON",
                data : {id_detail_bom:id_detail_bom},
                success: function(data){
                    $.each(data,function(id_detail_bom, pn, quantity){
                        $('#ModalUpdate').modal('show');
                        $('[name="id_detail_bom_edit"]').val(data.id_detail_bom);
                        $('[name="id_product_edit"]').val(data.pn);
                        $('[name="quantity_edit"]').val(data.quantity);
                    });
                }
            });
            return false;
        });

        //Update Barang
        $('#btn_update').on('click',function(){
            var id_detail_bom=$('#id_detail_bom2').val();
            var quantity=$('#quantity2').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_bom/updatedetail')?>",
                dataType : "JSON",
                data : {id_detail_bom:id_detail_bom, quantity:quantity},
                success: function(data){
                    $('[name="id_bom_edit"]').val("");
                    $('[name="id_product_edit"]').val("");
                    $('[name="quantity_edit"]').val("");
                    $('#ModalUpdate').modal('hide');
                    // tampil_data();
                    rownumber=0;
                    tableajax.ajax.reload();
                }
            });
            return false;
        });


        //GET HAPUS
        $('#show_data').on('click','.item_hapus',function(){
            var id_detail_bom=$(this).attr('data');
            $('#ModalDelete').modal('show');
            $('[name="kode"]').val(id_detail_bom);
        });

        //Hapus
        $('#btn_hapus').on('click',function(){
            var id_detail_bom=$('#textkode').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_bom/deletedetail')?>",
                dataType : "JSON",
                data : {id_detail_bom: id_detail_bom},
                success: function(data){
                    $('#ModalDelete').modal('hide');
                    // tampil_data();
                    rownumber=0;
                    tableajax.ajax.reload();
                }
            });
            return false;
        });

    });

</script>  
