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
                    <div class="col-lg-4 col-md-6 mt-5">
                        <div class="card card-bordered">
                            <img class="card-img-top img-fluid" src="<?php echo base_url(); ?>foto/<?php echo $product_bom[0]->fp; ?>" alt="image">
                            <div class="card-body">
                                <h3 class="title">Product : <span class="badge badge-primary"><?php echo $product_bom[0]->pn; ?></span></h3>
                                <p class="card-text">Quantity : <?php echo $product_bom[0]->quantity; ?><br>BoM Type : <?php echo $product_bom[0]->bom_type; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Dark table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Component <?php echo $product_bom[0]->pn; ?></h4>
                                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalAdd"><span class="fa fa-plus"></span> Component</a><br><br>
                                <div class="data-tables datatable-dark">
                                    <table id="myTable" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>No.</th>
                                                <th>Product Component</th>
                                                <th>Quantity</th>
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
            ajax: '<?php echo base_url("C_bom/getAjaxDetail/") ?><?php echo $product_bom[0]->id_bom; ?>',
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
