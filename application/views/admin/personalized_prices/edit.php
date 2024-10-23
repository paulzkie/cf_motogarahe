<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">
            <form method="POST">
              <?php foreach($personalized_prices as $personalized_price): ?>
                <div class="box-body">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Client</label>
                        <select class="form-control" name="cli_id">
                            <?php foreach ( $clients as $client ) :?>
                                <option value="<?php echo $client['cli_id']?>" <?php echo $client['cli_id'] == $personalized_price['cli_id'] ? 'selected' : '' ?>>
                                    <?php echo $client['cli_name'] ?>        
                                </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Product</label>
                        <select class="form-control" name="pro_id">
                            <?php foreach ( $products as $product ) :?>
                                <option value="<?php echo $product['pro_id']?>" <?php echo $product['pro_id'] == $personalized_price['pro_id'] ? 'selected' : '' ?>>
                                    <?php echo $product['pro_name'] . ' - ₱' . $product['pro_price']?>     
                                </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Discounted Price</label>
                        <input type="text" class="form-control" name="ppr_price" value="<?php echo $personalized_price['ppr_price'] ?>" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label>Return Price</label>
                        <input type="text" class="form-control" name="ppr_return_price" value="<?php echo $personalized_price['ppr_return_price'] ?>" placeholder="Enter ...">
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