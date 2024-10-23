<div class="row">
    <div class="col-md-8">
        <form method="POST">
            <div class="box box-primary">
                <div class="box-body">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Client:</label>
                        <select class="form-control" name="cli_id">
                            <?php foreach ( $clients as $client ) :?>
                                <option value="<?php echo $client['cli_id']?>"><?php echo $client['cli_name'] ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Product:</label>
                        <select class="form-control" name="pro_id">
                            <?php foreach ( $products as $product ) :?>
                                <option value="<?php echo $product['pro_id']?>"><?php echo $controller->get_category_name($product['pro_id'])?> <?php echo $product['pro_name'] . ' - ₱' . $product['pro_price']?></option>
                            <?php endforeach;?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Discount Price</label>
                        <input type="text" class="form-control" name="ppr_price">
                    </div>
                    <div class="form-group">
                        <label>Return Price</label>
                        <input type="text" class="form-control" name="ppr_return_price">
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