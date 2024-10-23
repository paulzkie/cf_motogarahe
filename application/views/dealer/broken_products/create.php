<div class="row">
    <div class="col-md-8">
        <form method="POST">
            <div class="box box-primary">
                <div class="box-body">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control" name="bro_type">
                            <option value="so">S.O. No</option>
                            <option value="ts">T.S. No </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Number</label>
                        <input type="text" class="form-control" name="no_id">
                    </div>

                    <div class="form-group">
                        <label>Product Name:</label>
                        <select class="form-control" name="pro_id">
                            <?php foreach ( $products as $product ) :?>
                            <option value="<?php echo $product['pro_id']?>"><?php echo $controller->get_category_name($product['pro_id'])?> <?php echo $product['pro_name'] ?> 
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Qty</label>
                        <input type="text" class="form-control" name="bro_qty">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="bro_status">
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                            <option value="deleted">Deleted</option>
                        </select>
                    </div>

                    
                </div>
                <div class="box-footer">
                    <a href="<?php echo $back?>" class="btn btn-default btn-flat">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back
                    </a>
                    <button type="submit" class="btn btn-primary btn-flat pull-right">
                    <i class="fa fa-check" aria-hidden="true"></i> Save
                    </button>
                </div>
                <!-- /.box-body -->
            </div>
        </form>    
    </div>
</div>