<div class="row">
    <div class="col-md-8">
        <form method="POST" enctype="multipart/form-data">
            <div class="box box-primary">
                <div class="box-body">

                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" rows="3" name="pro_description" value="<?php echo set_value('pro_description'); ?>"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Product Base Price</label>
                        <input type="text" class="form-control" name="pro_price" value="<?php echo set_value('pro_price'); ?>">
                    </div> 

                    <div class="form-group">
                        <label>Product Unit</label>
                        <input type="text" class="form-control" name="pro_unit" value="<?php echo set_value('pro_unit'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Stocks Balance Notifications</label>
                        <input type="text" class="form-control" name="pro_bal_stock" value="<?php echo set_value('pro_bal_stock'); ?>">
                    </div>

                    <!-- <div class="form-group">
                        <label>Product Image</label>
                        <input type="file" name="pro_image">
                    </div> -->

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="pro_status">
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                            <option value="deleted">Deleted</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="cat_id">
                            <?php foreach($categories as $category):?>
                                <option value="<?php echo $category['cat_id']?>"><?php echo $category['cat_name']?></option>
                            <?php endforeach;?>
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