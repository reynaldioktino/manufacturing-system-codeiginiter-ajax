
            <div class="modal-header btn-info text-white">
                <h3 class="modal-title" id="exampleModalLabel">Update Data</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modalUpdate">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart("C_product/update"); ?>
                <?php echo validation_errors(); ?>
                <input type="hidden" name="id_product" value="<?php echo $record[0]->id_product; ?>">
                <div class="form-group row">
                    <label for="product_name" class="col-sm-4 col-form-label">Product Name</label>
                    <div class="col-sm-8">
                        <input type="text" name="product_name" class="form-control" required="" id="product_name" value="<?php echo $record[0]->product_name; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="product_type" class="col-sm-4 col-form-label">Product Type</label>
                    <div class="col-sm-8">
                        <select class="custom-select" name="product_type" id="product_type" value="">
                            <option <?php echo ($record[0]->product_type == "Consumable" ? "selected" : "")?> value="Consumable">Consumable</option>
                            <option <?php echo ($record[0]->product_type == "Service" ? "selected" : "")?> value="Service">Service</option>
                            <option <?php echo ($record[0]->product_type == "Storable Product" ? "selected" : "")?> value="Storable Product">Storable Product</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sales_price" class="col-sm-4 col-form-label">Sales Price</label>
                    <div class="col-sm-8">
                        <input type="number" name="sales_price" class="form-control" required="" id="sales_price" value="<?php echo $record[0]->sales_price; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_product_category" class="col-sm-4 col-form-label">Product Category</label>
                    <div class="col-sm-8">
                        <select class="custom-select" name="id_product_category" id="id_product_category" value="<?php echo $record[0]->id_product_category; ?>">
                            <?php foreach ($product_category as $key => $value): ?>
                                <option value="<?php echo $value->id_product_category; ?>"><?php echo $value->name_category; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_tax" class="col-sm-4 col-form-label">Taxes</label>
                    <div class="col-sm-8">
                        <select class="custom-select" name="id_tax" id="id_tax" value="<?php echo $record[0]->id_tax; ?>">
                            <?php foreach ($taxes as $key => $value): ?>
                                <option value="<?php echo $value->id_tax; ?>"><?php echo $value->tax_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="intenal_notes" class="col-sm-4 col-form-label">Intenal Notes</label>
                    <div class="col-sm-8">
                        <textarea name="internal_notes" id="internal_notes" cols="30" rows="3" class="form-control" required=""><?php echo $record[0]->internal_notes; ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="foto" class="col-sm-4 col-form-label">Foto</label>
                    <div class="col-sm-8">
                        <input type="hidden"  id="foto_old"  name="foto_old"  value="<?php echo $record[0]->foto;   ?>">
                        <img src="<?php echo base_url()."foto/".$record[0]->foto ?>" alt="" height="100px" width="100px">
                        <input type="file" name="foto" class="form-control" id="foto" value="<?php echo $record[0]->foto; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="update" value="Update" class="btn btn-info">
                </div>
                <?php echo form_close(); ?>
            </div>
        
    <!-- END MODAL -->
    <script type="text/javascript">
        $(document).ready(function(){

            $('#id_product_category').val('<?php echo $record[0]->id_product_category ?>');

            $('#id_tax').val('<?php echo $record[0]->id_tax ?>');

        
        });
    </script>
