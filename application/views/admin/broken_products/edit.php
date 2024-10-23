<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">
            <form method="POST">
              <?php foreach($broken_products as $broken_product): ?>
                <div class="box-body">
                    <!-- text input -->
                    <!-- <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" name="cat_name" value="<?php echo $category['cat_name'] ?>" placeholder="Enter ...">
                    </div> -->

                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control" name="bro_type">
                            <option value="so" <?php echo $broken_product['bro_type'] == 'so' ? 'selected' : '' ?>>S.O. No</option>
                            <option value="ts" <?php echo $broken_product['bro_type'] == 'ts' ? 'selected' : '' ?>>T.S. No </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Number</label>
                        <input type="text" class="form-control" name="no_id" value="<?php echo $broken_product['no_id'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Product Name:</label>
                        <select class="form-control" name="pro_id">
                            <?php foreach ( $products as $product ) :?>
                            <option value="<?php echo $product['pro_id']?>" <?php echo $broken_product['pro_id'] == $product['pro_id'] ? 'selected' : '' ?>><?php echo $product['pro_name'] ?> 
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Qty</label>
                        <input type="text" class="form-control" name="bro_qty" value="<?php echo $broken_product['bro_qty'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="bro_status">
                            <option value="published" <?php echo $broken_product['bro_status'] == 'published' ? 'selected' : '' ?>>Published</option>
                            <option value="draft" <?php echo $broken_product['bro_status'] == 'draft' ? 'selected' : '' ?>>Draft</option>
                            <option value="deleted" <?php echo $broken_product['bro_status'] == 'deleted' ? 'selected' : '' ?>>Deleted</option>
                        </select>
                    </div>

                </div>
              <?php endforeach; ?>  
                <div class="box-footer">
                    <a href="<?php echo $back ?>" class="btn btn-default btn-flat">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back
                    </a>
                    <button type="submit" class="btn btn-primary btn-flat pull-right">
                    <i class="fa fa-check" aria-hidden="true"></i> Save
                    </button>
                </div>
                <!-- /.box-body -->
            </form>
        </div>
    </div>
</div>