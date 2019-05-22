<!DOCTYPE html>
<html>
<head>
    <title>Manufacturing - App</title>
</head>
<body>
    <!--MODAL HAPUS-->
            <div class="modal-header text-white btn-danger">
                <h3 class="modal-title" id="exampleModalLabel">Delete Confirmation</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <text>Apakah anda yakin ingin menghapus data dari <?php echo $record[0]->product_name; ?> ?</text>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="<?php echo base_url('C_product/delete/'.$record[0]->id_product); ?>" class="btn btn-danger btn-sm">Delete</a>
            </div>
    <!--END MODAL HAPUS-->
</body>
</html>