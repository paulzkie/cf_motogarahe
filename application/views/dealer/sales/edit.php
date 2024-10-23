<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">
            <form method="post">
                <div class="box-body">
                    <div class="box-header with-border">
                        <!-- <h3 class="box-title"><?php echo $sales_info[0]['sto_from']?></h3> -->
                        <div class="form-group">
                            <label>Client:</label>
                            <select class="form-control input-xs" name="cli_id">
                                <?php foreach ( $clients as $client ) :?>
                                    <option value="<?php echo $client['cli_id']?>" <?php echo $client['cli_id'] == $sales_info[0]['cli_id'] ? 'selected' : '' ?>>
                                        <?php echo $client['cli_name'] ?>        
                                    </option>
                                <?php endforeach;?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>P.O No:</label>
                            <input readonly type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control input-xs" name="sal_po_no" 
                            value="<?php echo set_value('sal_po_no') != NULL ? set_value('sal_po_no') : $sales_info[0]['sal_po_no'] ?>">
                        </div>

                        <div class="form-group">
                            <label>S.0. No:</label>
                            <input readonly type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control input-xs" name="sal_id" 
                            value="<?php echo set_value('sal_id') != NULL ? set_value('sal_id') : $sales_info[0]['sal_id'] ?>">
                        </div>

                    <div class="form-group">
                        <label>Checked and Prepared By:</label>
                        <input type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control input-xs" name="sal_checked_by" 
                        value="<?php echo set_value('sal_checked_by') != NULL ? set_value('sal_checked_by') : $sales_info[0]['sal_checked_by'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Agent:</label>
                        <input type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control input-xs" name="sal_agent" 
                        value="<?php echo set_value('sal_agent') != NULL ? set_value('sal_agent') : $sales_info[0]['sal_agent'] ?>">
                    </div>
                    <!-- <div class="form-group">
                        <label>Paid Amount:</label>
                        <input type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control input-xs" name="sal_paid" 
                        value="<?php echo set_value('sal_paid') != NULL ? set_value('sal_paid') : $sales_info[0]['sal_paid'] ?>">
                    </div> -->
                    <div class="form-group">
                        <label>Total Amount:</label>
                        <input readonly type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control input-xs" name="sal_total" 
                        value="<?php echo set_value('sal_total') != NULL ? set_value('sal_total') : $sales_info[0]['sal_total'] ?>">
                    </div>
                    <!-- <div class="form-group">
                        <label>Change Amount:</label>
                        <input readonly type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control input-xs" name="sal_change" 
                        value="<?php echo set_value('sal_change') != NULL ? set_value('sal_change') : $sales_info[0]['sal_change'] ?>">
                    </div> -->
                
                    <div class="form-group">
                        <label>Status</label>
                        <select <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control input-xs" name="sal_status">
                            <option value="published" <?php echo 'published' == $sales_info[0]['sal_status'] ? 'selected' : '' ?>>Published</option>
                            <option value="draft" <?php echo 'draft' == $sales_info[0]['sal_status'] ? 'selected' : '' ?>>Draft</option>
                            <option value="deleted" <?php echo 'deleted' == $sales_info[0]['sal_status'] ? 'selected' : '' ?>>Deleted</option>
                        </select>
                    </div>

                        <small class="pull-left">Created Date: <?php echo date("F j, Y, g:i a",strtotime( $sales_info[0]['sat_created']))?></small>
                            <a class="pull-right" href="<?php echo base_url() .'admin/sales/edit/' . $sales_info[0]['sal_id']. '/add_product'?>">
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
                                    <th>Amount</th>
                                    <th>Sub Total</th>
                                    <th>Remark</th>
                                    <th width="5px"></th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php if ( isset( $sales_info ) ):?>
                                <?php foreach($sales_info as $item): ?>
                                    <tr>
                                        <td><a href="<?php echo base_url() . 'admin/products/view/' . $item['pro_id']?>">
                                            <?php echo $item['pro_name'] ?>
                                        </a></td>
                                        <td><?php echo $controller->get_category_name($item['pro_id'])?></td>
                                        <td><?php echo $item['pro_unit'] ?></td>
                                        <td><?php echo $item['sai_qty'] ?></td>
                                        <td>₱<?php echo number_format( $item['sai_price'], 2) ?></td>
                                        <td>₱<?php echo number_format( $item['sai_sub_total'], 2) ?></td>
                                        <td><?php echo $item['sai_remark'] ?></td>
                                        <td>
                                            <a href="<?php echo base_url() . 'admin/sales/edit/' . $item['sal_id'] . '/' . $item['sai_id']?>">
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
                    <?php if ( $this->session->userdata('bra_id') == 1 ):?>
                        <button type="submit" name="save_mode" value="save_mode" class="btn btn-primary pull-right btn-flat"><i class="fa fa-save"></i> Save</button>
                    <?php endif;?>
                </div>
            <!-- /.box-body -->
            </form>
        </div>
    </div>
    
    <?php if ( isset( $products ) && isset($sales_updates) ):?>
    <div class="col-md-4">
        <div class="box box-primary">
            <form method="post">
                <div class="box-body">
                    <?php foreach ( $sales_updates as $item ) :?>
                    <div class="form-group">
                        <input readonly type="hidden" class="form-control" name="sal_id" id="sal_id" value="<?php echo set_value('sal_id') != NULL ?  set_value('sal_id') : $item['sal_id'] ?>">
                    </div>  
                    <div class="form-group">
                        <input readonly type="hidden" class="form-control" name="sai_id" id="sai_id" value="<?php echo set_value('sai_id') != NULL ?  set_value('sai_id') : $item['sai_id'] ?>">
                    </div>       
                    <div class="form-group">
                        <input readonly type="hidden" class="form-control" name="sai_old_qty" id="sai_old_qty" value="<?php echo set_value('sai_qty') != NULL ?  set_value('sai_qty') : $item['sai_qty'] ?>">
                    </div>    
                    <div class="form-group">
                        <label>Product Name: <small class="text-red">**Dont Change this!</small></label>
                        <select readonly class="form-control" name="pro_id">
                            <?php foreach ( $products as $product ) :?>
                            <option value="<?php echo $product['pro_id']?>" <?php echo $item['pro_id'] == $product['pro_id'] ? 'selected' : '' ?>><?php echo $controller->get_category_name($product['pro_id'])?> <?php echo $product['pro_name'] ?> - <?php echo $controller->get_stocks_counts( $product['pro_id'], $this->session->userdata('bra_id'), 'published' ) ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Quantity:</label>
                        <input type="text" class="form-control" name="sai_qty" id="sai_qty" value="<?php echo set_value('sai_qty') != NULL ? set_value('sai_qty') : $item['sai_qty'] ?>">
                    </div>  
                    <div class="form-group">
                        <label class="control-label">Price:</label>
                        <input readonly type="text" class="form-control" name="sai_price" id="sai_price" value="<?php echo set_value('sai_price') != NULL ? set_value('sai_price') : $item['sai_price'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Remark:</label>
                        <input type="text" class="form-control" name="sai_remark" id="sai_remark" value="<?php echo set_value('sai_remark') != NULL ? set_value('sai_remark') : $item['sai_remark'] ?>">
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

    <?php if ( isset( $products ) && !isset($sales_updates) ):?>
    <div class="col-md-4">
        <div class="box box-primary">
            <form method="post">
                <div class="box-body">
                    <div class="form-group">
                        <input readonly type="hidden" class="form-control" name="sal_id" id="sal_id" value="<?php echo set_value('sal_id') != NULL ?  set_value('sal_id') : $sales_info[0]['sal_id'] ?>">
                    </div>        
                    <div class="form-group">
                        <label>Product Name:</label>
                        <select class="form-control" name="pro_id" onchange="select_product(this.options[this.selectedIndex].value)">
                            <?php foreach ( $products as $product ) :?>
                            <option value="<?php echo $product['pro_id']?>"> <?php echo $controller->get_category_name($product['pro_id'])?> <?php echo $product['pro_name'] ?> - <?php echo $controller->get_stocks_counts( $product['pro_id'], $this->session->userdata('bra_id'), 'published' ) ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Quantity:</label>
                        <input type="text" class="form-control" name="sai_qty" id="sai_qty" value="<?php echo set_value('sai_qty')?>">
                    </div>  
                    <div class="form-group">
                        <label class="control-label">Price:</label>
                        <input type="text" class="form-control" name="sai_price" id="sai_price" value="<?php echo set_value('sai_price')?>">
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

