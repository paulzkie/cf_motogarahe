<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">
            <form method="post">
                <div class="box-body">
                    <div class="box-header with-border">
                        <!-- <h3 class="box-title"><?php echo $inventory_infos[0]['sto_from']?></h3> -->
                        <div class="form-group">
                            <label>From Branch:</label>
                            <select disabled class="form-control" name="bra_id_from">
                                <?php foreach ( $branches as $branch ) :?>
                                    <option value="<?php echo $branch['bra_id']?>" <?php echo $branch['bra_id'] == $inventory_infos[0]['bra_id_from'] ? 'selected' : '' ?>>
                                        <?php echo $branch['bra_name'] ?>        
                                    </option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>To Branch:</label>
                            <select <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control" name="bra_id_to">
                                <?php foreach ( $branches as $branch ) :?>
                                    <option value="<?php echo $branch['bra_id']?>" <?php echo $branch['bra_id'] == $inventory_infos[0]['bra_id_to'] ? 'selected' : '' ?>>
                                        <?php echo $branch['bra_name'] ?>        
                                    </option>
                                <?php endforeach;?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Prepared By:</label>
                            <input type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control" name="int_prepared_by" 
                            value="<?php echo set_value('int_prepared_by') != NULL ? set_value('int_prepared_by') : $inventory_infos[0]['int_prepared_by'] ?>">
                        </div>
    

                        <!-- <div class="form-group">
                            <label>D/R No:</label>
                            <input type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control" name="int_dr" 
                            value="<?php echo set_value('int_dr') != NULL ? set_value('int_dr') : $inventory_infos[0]['int_dr'] ?>">
                        </div> -->

                        <div class="form-group">
                            <label>Transfer Slip No:</label>
                            <input readonly type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control" name="int_id" 
                            value="<?php echo set_value('int_id') != NULL ? set_value('int_id') : $inventory_infos[0]['int_id'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Pick up By:</label>
                            <input type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control" name="int_pickup_by" 
                            value="<?php echo set_value('int_pickup_by') != NULL ? set_value('int_pickup_by') : $inventory_infos[0]['int_pickup_by'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Approved by:</label>
                            <input type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control" name="int_approved_by" 
                            value="<?php echo set_value('int_approved_by') != NULL ? set_value('int_approved_by') : $inventory_infos[0]['int_approved_by'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Delivered by:</label>
                            <input type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control" name="int_delivered_by" 
                            value="<?php echo set_value('int_delivered_by') != NULL ? set_value('int_delivered_by') : $inventory_infos[0]['int_delivered_by'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Checked  and Released By:</label>
                            <input type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control" name="int_checked_and_released_by" 
                            value="<?php echo set_value('int_checked_and_released_by') != NULL ? set_value('int_checked_and_released_by') : $inventory_infos[0]['int_checked_and_released_by'] ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Status</label>
                            <select <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control" name="int_status">
                                <option value="published" <?php echo 'published' == $inventory_infos[0]['int_status'] ? 'selected' : '' ?>>Delivered</option>
                                <option value="draft" <?php echo 'draft' == $inventory_infos[0]['int_status'] ? 'selected' : '' ?>>Pending</option>
                                <option value="deleted" <?php echo 'deleted' == $inventory_infos[0]['int_status'] ? 'selected' : '' ?>>Deleted</option>
                                <option value="approved" <?php echo 'approved' == $inventory_infos[0]['int_status'] ? 'selected' : '' ?>>Approved</option>
                            </select>
                        </div>
                        <small class="pull-left">Created Date: <?php echo date("F j, Y, g:i a",strtotime( $inventory_infos[0]['int_created']))?></small>
                        <?php //if ( $this->session->userdata('bra_id') == $inventory_infos[0]['bra_id_from'] ):?>
                        <?php if ( $this->session->userdata('acc_id') == 1 ):?>
                            <a class="pull-right" href="<?php echo base_url() .'admin/transfers/edit/' . $inventory_infos[0]['int_id']. '/add_product'?>">
                                <i class="fa fa-plus"></i>
                            </a>
                        <?php endif;?>
                    </div>
                    <div class="table-responsive mailbox-messages">
                        <table id="example1" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Unit</th>
                                    <th>Qty</th>
                                    <th>Remark</th>
                                    <th width="5px"></th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php if ( isset( $inventory_infos ) ):?>
                                <?php foreach($inventory_infos as $item): ?>
                                    <tr>
                                        <td><a href="<?php echo base_url() . 'admin/products/view/' . $item['pro_id']?>">
                                            <?php echo $item['pro_name'] ?>
                                        </a></td>
                                        <td><?php echo $controller->get_category_name($item['pro_id'])?></td>
                                        <td><?php echo $item['pro_unit'] ?></td>
                                        <td><?php echo $item['ini_qty'] ?></td>
                                        <td><?php echo $item['ini_remark'] ?></td>
                                        <td>
                                            <?php //if ( $this->session->userdata('bra_id') == $item['bra_id_from'] ):?>
                                            <?php if ( $this->session->userdata('acc_id') == 1 ):?>
                                            <a href="<?php echo base_url() . 'admin/transfers/edit/' . $item['int_id'] . '/' . $item['ini_id']?>">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <?php endif;?>
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
                    <?php if ( $this->session->userdata('acc_id') == 1 ):?>
                        <button type="submit" name="save_mode" value="save_mode" class="btn btn-primary pull-right btn-flat"><i class="fa fa-save"></i> Save</button>
                    <?php endif;?>
                </div>
            <!-- /.box-body -->
            </form>
        </div>
    </div>
    
    <?php if ( isset( $products ) && isset($inventory_updates) ):?>
    <div class="col-md-4">
        <div class="box box-primary">
            <form method="post">
                <div class="box-body">
                    <?php foreach ( $inventory_updates as $inventory_update ) :?>
                    <div class="form-group">
                        <input readonly type="hidden" class="form-control" name="ini_id" id="ini_id" value="<?php echo set_value('ini_id') != NULL ?  set_value('ini_id') : $inventory_update['ini_id'] ?>">
                    </div>     
                    <div class="form-group">
                        <input readonly type="hidden" class="form-control" name="bra_id_from" id="bra_id_from" value="<?php echo set_value('bra_id_from') != NULL ? set_value('bra_id_from') : $inventory_update['bra_id_from'] ?>">
                    </div> 
                    <div class="form-group">
                        <input readonly type="hidden" class="form-control" name="bra_id_to" id="bra_id_to" value="<?php echo set_value('bra_id_to') != NULL ?  set_value('bra_id_to') : $inventory_update['bra_id_to'] ?>">
                    </div>      
                    <div class="form-group">
                        <label>Product Name: <small class="text-red">**Dont Change this!</small></label>
                        <select readonly class="form-control" name="pro_id">
                            <?php foreach ( $products as $product ) :?>
                            <option value="<?php echo $product['pro_id']?>" <?php echo $inventory_update['pro_id'] == $product['pro_id'] ? 'selected' : '' ?>><?php echo $controller->get_category_name($product['pro_id'])?> <?php echo $product['pro_name'] ?> - <?php echo $controller->get_stocks_counts( $product['pro_id'], $this->session->userdata('bra_id'), 'draft' ) ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Quantity:</label>
                        <input type="text" class="form-control" name="ini_qty" id="ini_qty" value="<?php echo set_value('ini_qty') != NULL ? set_value('ini_qty') : $inventory_update['ini_qty'] ?>">
                    </div>  
                    <div class="form-group">
                        <label class="control-label">Remark:</label>
                        <input type="text" class="form-control" name="ini_remark" id="ini_remark" value="<?php echo set_value('ini_remark') != NULL ? set_value('ini_remark') : $inventory_update['ini_remark'] ?>">
                    </div>  
                    <?php endforeach;?>   
                </div>
                <div class="box-footer">
                    <button type="submit" name="update_mode" value="update_mode" class="btn btn-primary pull-right btn-flat"><i class="fa fa-save"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
    <?php endif;?>

    <?php if ( isset( $products ) && !isset($inventory_updates) ):?>
    <div class="col-md-4">
        <div class="box box-primary">
            <form method="post">
                <div class="box-body">
                    <div class="form-group">
                        <input readonly type="hidden" class="form-control" name="int_id" id="int_id" value="<?php echo set_value('int_id') != NULL ?  set_value('int_id') : $inventory_infos[0]['int_id'] ?>">
                    </div>     
                    <div class="form-group">
                        <input readonly type="hidden" class="form-control" name="bra_id_from" id="bra_id_from" value="<?php echo set_value('bra_id_from') != NULL ? set_value('bra_id_from') : $inventory_infos[0]['bra_id_from'] ?>">
                    </div> 
                    <div class="form-group">
                        <input readonly type="hidden" class="form-control" name="bra_id_to" id="bra_id_to" value="<?php echo set_value('bra_id_to') != NULL ?  set_value('bra_id_to') : $inventory_infos[0]['bra_id_to'] ?>">
                    </div>    
                    <div class="form-group">
                        <label>Product Name:</label>
                        <select class="form-control" name="pro_id">
                            <?php foreach ( $products as $product ) :?>
                            <option value="<?php echo $product['pro_id']?>"><?php echo $controller->get_category_name($product['pro_id'])?> <?php echo $product['pro_name'] ?> - <?php echo $controller->get_stocks_counts( $product['pro_id'], $this->session->userdata('bra_id'), 'draft' ) ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Quantity:</label>
                        <input type="text" class="form-control" name="ini_qty" id="ini_qty" value="<?php echo set_value('ini_qty')?>">
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

