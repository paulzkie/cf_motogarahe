<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">
            <form method="post">
                <div class="box-body">
                    <div class="box-header with-border">
                        <!-- <h3 class="box-title"><?php echo $stocks_infos[0]['sto_from']?></h3> -->
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Company Name:</label>
                            <input type="text" class="form-control" name="sto_from" id="sto_from" value="<?php echo set_value('sto_from') != NULL ? set_value('sto_from') : $stocks_infos[0]['sto_from'] ?>">
                        </div>  
                        <div class="form-group">
                            <label>To Branch:</label>
                            <select class="form-control" name="bra_id">
                                <?php foreach ( $branches as $branch ) :?>
                                    <option value="<?php echo $branch['bra_id']?>" <?php echo $branch['bra_id'] == $stocks_infos[0]['bra_id'] ? 'selected' : '' ?>>
                                        <?php echo $branch['bra_name'] ?>        
                                    </option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="sto_status">
                                <option value="published" <?php echo 'published' == $stocks_infos[0]['sto_status'] ? 'selected' : '' ?>>Published</option>
                                <option value="draft" <?php echo 'draft' == $stocks_infos[0]['sto_status'] ? 'selected' : '' ?>>Draft</option>
                                <option value="deleted" <?php echo 'deleted' == $stocks_infos[0]['sto_status'] ? 'selected' : '' ?>>Deleted</option>
                            </select>
                        </div>
                        <small class="pull-left">Created Date: <?php echo date("F j, Y, g:i a",strtotime( $stocks_infos[0]['sto_created']))?></small>
                        <a class="pull-right" href="<?php echo base_url() .'admin/stocks/edit/' . $stocks_infos[0]['sto_id']. '/add_product'?>">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                    <div class="table-responsive mailbox-messages">
                        <table id="example1" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Unit</th>
                                    <th>Qty</th>
                                    <th width="5px"></th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php if ( isset( $stocks_infos ) ):?>
                                <?php foreach($stocks_infos as $stock): ?>
                                    <tr>
                                        <td><a href="<?php echo base_url() . 'admin/products/view/' . $stock['pro_id']?>">
                                            <?php echo $stock['pro_name'] ?>
                                        </a></td>
                                        <th><?php echo $controller->get_category_name($stock['pro_id']) ?></th>
                                        <td><?php echo $stock['pro_unit'] ?></td>
                                        <td><?php echo $stock['sti_qty'] ?></td>
                                        <td>
                                            <a href="<?php echo base_url() . 'admin/stocks/edit/' . $stock['sto_id'] . '/' . $stock['sti_id']?>">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            <?php endif;?>
                            </tbody>
                        </table>   
                        <!-- /.table -->
                    </div>

                </div>
                
                <div class="box-footer">
                    <a href="<?php echo $back ?>" class="btn btn-default btn-flat">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back
                    </a>
                    <button type="submit" name="save_mode" value="save_mode" class="btn btn-primary pull-right btn-flat"><i class="fa fa-save"></i> Save</button>
                </div>
            <!-- /.box-body -->
            </form>
        </div>
    </div>
    
    <?php if ( isset( $products ) && isset($stocks_updates) ):?>
    <div class="col-md-4">
        <div class="box box-primary">
            <form method="post">
                <div class="box-body">
                    <?php foreach ( $stocks_updates as $stocks_update ) :?>
                    <div class="form-group">
                        <label>Product Name:</label>
                        <select class="form-control" name="pro_id">
                            <?php foreach ( $products as $product ) :?>
                            <option value="<?php echo $product['pro_id']?>" <?php echo $stocks_update['pro_id'] == $product['pro_id'] ? 'selected' : '' ?>><?php echo $controller->get_category_name($product['pro_id']) ?> <?php echo $product['pro_name'] ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Quantity:</label>
                        <input type="text" class="form-control" name="sti_qty" id="sti_qty" value="<?php echo set_value('sti_qty') != NULL ? set_value('sti_qty') : $stocks_update['sti_qty'] ?>">
                    </div>  
                    <?php endforeach;?>   
                </div>
                <div class="box-footer">
                    <button type="submit" name="update_mode" value="update_mode" class="btn btn-primary pull-right btn-flat"><i class="fa fa-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
    <?php endif;?>

    <?php if ( isset( $products ) && !isset($stocks_updates) ):?>
    <div class="col-md-4">
        <div class="box box-primary">
            <form method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label>Product Name:</label>
                        <select class="form-control" name="pro_id">
                            <?php foreach ( $products as $product ) :?>
                            <option value="<?php echo $product['pro_id']?>"><?php echo $controller->get_category_name($product['pro_id']) ?> <?php echo $product['pro_name'] ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Quantity:</label>
                        <input type="text" class="form-control" name="sti_qty" id="sti_qty" value="<?php echo set_value('sti_qty')?>">
                    </div>  
                </div>
                <div class="box-footer">
                    <button type="submit" name="cart_mode" value="cart_mode" class="btn btn-primary pull-right btn-flat"><i class="fa fa-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
    <?php endif;?>
</div>

