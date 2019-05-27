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
                                <h4 class="header-title">Confirmed Data</h4><br>
                                <div class="data-tables datatable-dark">
                                    <table id="myTable" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>No.</th>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>BoM</th>
                                                <th>Deadline Start</th>
                                                <th>Responsible</th>
                                                <th>Status</th>
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
                <h3 class="modal-title" id="myModalLabel">Add Data</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group">
                        <div class="col-xs-9">
                            <label for="id_product_category" class="control-label col-xs-3">Product</label>
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

                    <div class="form-group">
                        <div class="col-xs-9">
                            <label class="control-label col-xs-3" >BoM Type</label>
                            <div class="col-xs-9">
                                <select name="bom_type_add" id="bom_type1" class="custom-select">
                                    <option value="Manufacture this product">Manufacture this product</option>
                                    <option value="Kit">Kit</option>
                                </select>
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
                    
                    <input name="id_manufacturing_edit" id="id_manufacturing2" class="form-control" type="hidden" readonly>
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

                    <div class="form-group">
                        <div class="col-xs-9">
                            <label class="control-label col-xs-3" >Deadline Start</label>
                            <div class="col-xs-9">
                                <input name="deadline_start_edit" id="deadline_start2" class="form-control" type="date">
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
            ajax: '<?php echo base_url("C_manufacturing/getAjaxConfirmed") ?>',
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
             { data: 'id_bom' },
             { data: 'deadline_start' },
             { data: 'un' },
             {
                data: null,
                render: function (data, type, row) {
                return '<span class="badge badge-danger"><h7>'+row.status+'</h7></span>';
                }
             },
             {
              data: null,
              render: function ( data, type, row ) {
                var ret = '<a href="javascript:;" class="btn btn-info btn-sm item_edit" data="'+row.id_manufacturing+'">Update</a>';
                ret+= '<a href="javascript:;" class="btn btn-danger btn-sm item_hapus" data="'+row.id_manufacturing+'">Delete</a>';
                ret+= '<a href="<?php echo base_url()?>C_manufacturing/checkstok/'+row.id_manufacturing+'" class="btn btn-warning btn-sm text-white">Check Stok</a>';
                return ret;
               }
             }
             ]
        });
       
        //GET UPDATE
        $('#show_data').on('click','.item_edit',function(){
            var id_manufacturing=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('C_manufacturing/where')?>",
                dataType : "JSON",
                data : {id_manufacturing:id_manufacturing},
                success: function(data){
                    $.each(data,function(id_manufacturing, pn, quantity, deadline_start){
                        $('#ModalUpdate').modal('show');
                        $('[name="id_manufacturing_edit"]').val(data.id_manufacturing);
                        $('[name="id_product_edit"]').val(data.pn);
                        $('[name="quantity_edit"]').val(data.quantity);
                        $('[name="deadline_start_edit"]').val(data.deadline_start);
                    });
                }
            });
            return false;
        });

        //Update Barang
        $('#btn_update').on('click',function(){
            var id_manufacturing=$('#id_manufacturing2').val();
            var quantity=$('#quantity2').val();
            var deadline_start=$('#deadline_start2').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_manufacturing/update')?>",
                dataType : "JSON",
                data : {id_manufacturing:id_manufacturing, quantity:quantity, deadline_start:deadline_start},
                success: function(data){
                    $('[name="id_manufacturing_edit"]').val("");
                    $('[name="quantity_edit"]').val("");
                    $('[name="deadline_start_edit"]').val("");
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
            var id_manufacturing=$(this).attr('data');
            $('#ModalDelete').modal('show');
            $('[name="kode"]').val(id_manufacturing);
        });

        //Hapus
        $('#btn_hapus').on('click',function(){
            var id_manufacturing=$('#textkode').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('C_manufacturing/delete')?>",
                dataType : "JSON",
                data : {id_manufacturing: id_manufacturing},
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
