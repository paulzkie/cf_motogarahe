<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">

            <?php foreach($products as $product): ?>

                <div class="box-body">

                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea readonly class="form-control" rows="3" name="pro_description"><?php echo set_value('pro_description') != NULL ? set_value('pro_description') : $product['pro_description'] ?>
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label>Product Base Price</label>
                        <input readonly type="text" class="form-control" name="pro_price" value="<?php echo set_value('pro_price') != NULL ? set_value('pro_price') : $product['pro_price'] ?>">
                    </div> 

                    <div class="form-group">
                        <label>Product Unit</label>
                        <input readonly type="text" class="form-control" name="pro_unit" value="<?php echo set_value('pro_unit') != NULL ? set_value('pro_unit') : $product['pro_unit'] ?>">
                    </div>

                    <!-- <div class="form-group">
                        <label>Product Image</label>
                        <img class="img-responsive" src="<?php echo $product['pro_image']?>">
                    </div>    --> 

                    <div class="form-group">
                        <label>Stocks Balance Notifications</label>
                        <input readonly type="text" class="form-control" name="pro_bal_stock" value="<?php echo set_value('pro_bal_stock') != NULL ? set_value('pro_bal_stock') : $product['pro_bal_stock'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select disabled class="form-control" name="pro_status">
                            <option value="published" <?php echo 'published' == $product['pro_status'] ? 'selected' : '' ?>>Published</option>
                            <option value="draft" <?php echo 'draft' == $product['pro_status'] ? 'selected' : '' ?>>Draft</option>
                            <option value="deleted" <?php echo 'deleted' == $product['pro_status'] ? 'selected' : '' ?>>Deleted</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select disabled class="form-control" name="cat_id">
                            <?php foreach($categories as $category):?>
                                <option <?php echo $category['cat_id'] == $product['cat_id'] ? 'selected' : '' ?> value="<?php echo $category['cat_id']?>"><?php echo $category['cat_name']?></option>
                            <?php endforeach;?>
                        </select>
                    </div>    
                </div>
                
                <div class="box-footer">
                    <a href="<?php echo $back ?>" class="btn btn-default btn-flat">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back
                    </a>
                    <?php if ( $this->session->userdata('acc_id') == 1 ) :?>
                    <a href="<?php echo $edit ?>" class="btn btn-primary btn-flat pull-right">
                    <i class="fa fa-edit" aria-hidden="true"></i> Edit
                    </a>
                    <?php endif;?>
                </div>
            <?php endforeach; ?>  
            <!-- /.box-body -->
        </div>
    </div>
</div>