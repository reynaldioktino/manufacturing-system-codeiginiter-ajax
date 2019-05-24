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
                    <!-- Dark table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Product Data</h4>
                                <div class="row">
                                    <div class="col-md-1">
                                        <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalAdd"><span class="fa fa-plus"></span> Add</a>
                                    </div>
                                </div><br><br>
                                <div class="data-tables datatable-dark">
                                    <table id="myTable" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>No.</th>
                                                <th>Product Name</th>
                                                <th>Product Type</th>
                                                <th>Sales Price</th>
                                                <th>Product Category</th>
                                                <th>Tax</th>
                                                <th>Stok</th>
                                                <th>Internal Notes</th>
                                                <th>Foto</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="show_data">
                                        	
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dark table end -->
                </div>
            </div>
        </div>
        <!-- main content area end -->

<!-- <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div> -->
<div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="ModalUpdate-container">
        </div>
    </div>
</div>
<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="ModalDelete-container">
        </div>
    </div>
</div>


<!-- MODAL EDIT -->
<div class="modal fade" id="ModalUpdateStok" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-warning">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Update Stok</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
                    
                    <input name="id_product_edit" id="id_product2" class="form-control" type="hidden">
                    <div class="form-group">
                        <label for="id_product_category" class="control-label col-xs-3">Product</label>
                        <div class="col-xs-9">
                            <input name="product_name_edit" id="product_name2" class="form-control" type="text" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-9">
                            <label class="control-label col-xs-3" >Stok</label>
                            <div class="col-xs-9">
                                <input name="stok_edit" id="stok2" class="form-control" type="number">
                            </div>
                        </div>
                    </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_update_stok">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!--END MODAL EDIT-->

<!-- MODAL ADD -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-success text-white">
                <h3 class="modal-title" id="exampleModalLabel">Add Data</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart("C_product/add"); ?>
                <?php echo validation_errors(); ?>
                <div class="form-group row">
                    <label for="product_name" class="col-sm-4 col-form-label">Product Name</label>
                    <div class="col-sm-8">
                        <input type="text" name="product_name" class="form-control" required="" id="product_name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="product_type" class="col-sm-4 col-form-label">Product Type</label>
                    <div class="col-sm-8">
                        <select class="custom-select" name="product_type" id="product_type">
                            <option value="Consumable">Consumable</option>
                            <option value="Service">Service</option>
                            <option value="Storable Product">Storable Product</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sales_price" class="col-sm-4 col-form-label">Sales Price</label>
                    <div class="col-sm-8">
                        <input type="number" name="sales_price" class="form-control" required="" id="sales_price" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_product_category" class="col-sm-4 col-form-label">Product Category</label>
                    <div class="col-sm-8">
                        <select class="custom-select" name="id_product_category" id="id_product_category">
                            <?php foreach ($product_category as $key => $value): ?>
                                <option value="<?php echo $value->id_product_category; ?>"><?php echo $value->name_category; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_tax" class="col-sm-4 col-form-label">Taxes</label>
                    <div class="col-sm-8">
                        <select class="custom-select" name="id_tax" id="id_tax">
                            <?php foreach ($taxes as $key => $value): ?>
                                <option value="<?php echo $value->id_tax; ?>"><?php echo $value->tax_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="intenal_notes" class="col-sm-4 col-form-label">Intenal Notes</label>
                    <div class="col-sm-8">
                        <textarea name="internal_notes" id="internal_notes" cols="30" rows="3" class="form-control" required=""></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="foto" class="col-sm-4 col-form-label">Foto</label>
                    <div class="col-sm-8">
                        <input type="file" name="foto" class="form-control" id="foto">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="add" value="Add" class="btn btn-success">
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>



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

<script type="text/javascript">
    $(document).ready(function(){  
        //pemanggilan fungsi tampil data.
        //tampil_data(); 

        var rownumber = 0;
        var tableajax = $('#myTable').DataTable({
          responsive: true,
            ajax: '<?php echo base_url("C_product/getAjax") ?>',
            columns: [
             { 
                data: null,
                render: function(data,type,row){
                    rownumber++;
                    return rownumber;
                }
             },
             { data: 'product_name'},
             { data: 'product_type' },
             { data: 'sales_price' },
             { data: 'category' },
             { data: 'tax' },
             { data: 'stok' },
             { data: 'internal_notes' },
             {
                data: null,
                render: function (data, type, row) {
                return '<img src="<?php echo base_url() ?>foto/'+row.foto+'" height="100px" width="100px">';
                }
             },
             {
              data: null,
              render: function ( data, type, row ) {
                var ret = '<a href="<?php echo base_url()?>C_product/loadEdit/'+row.id_product+'" class="btn btn-info btn-sm item_edit" data-toggle="modal" data-target="#ModalUpdate">Update</a>';
                ret+= '<a href="<?php echo base_url()?>C_product/loadDelete/'+row.id_product+'" class="btn btn-danger btn-sm item_hapus" data-toggle="modal" data-target="#ModalDelete">Delete</a>';
                ret+= '<a href="javascript:;" class="btn btn-warning btn-sm text-white item_update" data="'+row.id_product+'">New Stok</a>';
                return ret;
               }
             }
             ]
        });

        $('#ModalAdd').on('show.bs.modal', function (event) {
            var modal = $(this)
        });


        //GET UPDATE
        $('#show_data').on('click','.item_update',function(){
            var id_product=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('C_product/where')?>",
                dataType : "JSON",
                data : {id_product:id_product},
                success: function(data){
                    $.each(data,function(id_product, product_name, stok){
                        $('#ModalUpdateStok').modal('show');
                        $('[name="id_product_edit"]').val(data.id_product);
                        $('[name="product_name_edit"]').val(data.product_name);
                        $('[name="stok_edit"]').val(data.stok);
                    });
                }
            });
            return false;
        });

        //Update Barang
        $('#btn_update_stok').on('click',function(){
            var id_product=$('#id_product2').val();
            var product_name=$('#product_name2').val();
            var stok=$('#stok2').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_product/updatestok')?>",
                dataType : "JSON",
                data : {id_product:id_product, product_name:product_name, stok:stok},
                success: function(data){
                    $('[name="id_product_edit"]').val("");
                    $('[name="product_name_edit"]').val("");
                    $('[name="stok_edit"]').val("");
                    $('#ModalUpdateStok').modal('hide');
                    // tampil_data();
                    rownumber=0;
                    tableajax.ajax.reload();
                }
            });
            return false;
        });

        $('#show_data').on('click','.item_edit',function(){
        var url=$(this).attr('href');
        $.ajax({
                url  : url,
                success:function(response){
                    $('#ModalUpdate-container').html(response);
                }
            });
        });

        $('#show_data').on('click','.item_hapus',function(){
            var url=$(this).attr('href');
            $.ajax({
                url  : url,
                success:function(response){
                    $('#ModalDelete-container').html(response);
                }
            });
        });
    });

</script>  
