<style>
    .pagination {
        margin: 0px !important;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <form method="post">
                <div class="box-header row">
                    <div class="form-group col-md-10">
                        <label>Client Name:</label>
                        <select class="form-control" name="cli_id">
                            <?php foreach ( $clients as $client ) :?>
                                <option value="<?php echo $client['cli_id']?>" <?php if ( $this->session->userdata('selected_client') == $client['cli_id']) echo 'selected'  ?> ><?php echo $client['cli_name'] ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <button type="submit" name="client_mode" value="client_mode" class="btn btn-primary col-md-1 btn-flat" style="    position: relative; top: 25px; width: 7%;">
                            <i class="fa fa-save" aria-hidden="true"></i> Select
                        </button> 
                    <a href="<?php echo base_url() . 'admin/sales/reset_sale_transaction'; ?>" class="btn btn-danger col-md-1 btn-flat" style="    position: relative; top: 25px; left:10px; width: 7%;">Reset</a>    
                </div>
            </form>
        </div>
    </div>    

    <?php if ( $this->session->userdata('selected_client') != NULL ) :?>            
        <div class="col-md-5">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Available Products</h3>
                    <div class="box-tools">
                    <form method="POST">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" name="pro_name" class="form-control pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button type="submit" name="search_mode" value="search_mode" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>    
                    </div>
                </div>
                <div class="box-body no-padding">
                    <div class="mailbox-controls">
                    </div>
                    <div class="table-responsive mailbox-messages">
                        <table id="example1" class="table table-hover table-striped">
                            <tbody>
                            
                            <?php if ( isset( $products ) ):?>
                                <?php foreach($products as $product): ?>
                                    <tr>
                                        <!-- <td><input type="checkbox"></td> -->
                                        <!-- <td>
                                            <img src="<?php echo $product['pro_image'] ?>" class="img-responsive">
                                        </td> -->
                                        <td><a href="<?php echo base_url() . 'admin/products/view/' . $product['pro_id']?>">
                                            <?php echo $product['pro_name'] ?>
                                        </a></td>
                                        <td>
                                            <?php
                                                $label = '';

                                                if ( $product['pro_status'] == 'published' ) {
                                                    $label = 'label-success';
                                                } elseif ( $product['pro_status'] == 'draft' ) {
                                                    $label = 'label-warning';
                                                } elseif ( $product['pro_status'] == 'deleted' ) {
                                                    $label = 'label-danger';
                                                }
                                            ?>
                                            <span class="label label-default"><?php echo $product['cat_name'] ?></span>
                                            <span class="label <?php echo $label;?>"><?php echo $product['pro_status'] ?></span>
                                        </td>
                                        <td><?php echo $controller->get_stocks_counts( $product['pro_id'], $this->session->userdata('bra_id'), 'published' ) ?></td>
                                        <td>    
                                            <div class="tools">
                                                <a href="#" data-toggle="modal" data-target="#exampleModal2" data-id="<?php echo $product['pro_id'] ?>" data-name="<?php echo $product['pro_name'] ?>" data-unit="<?php echo $product['pro_unit'] ?>" data-price="<?php echo $product['pro_price'] ?>"><i class="fa fa-plus"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                <?php endforeach;?>
                            <?php endif;?>
                            </tbody>
                        </table>   
                        <!-- /.table -->
                    </div>

                    <!-- /.mail-box-messages -->
                </div>
                <div class="box-footer">
                    <a href="<?php echo $back?>" class="btn btn-default btn-flat">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back
                    </a>
                    <div class="pull-right"> 
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>    
        </div>
        <div class="col-md-7">
            <div class="box box-primary">
                <div class="box-body no-padding">
                    <div class="table-responsive mailbox-messages">
                        <table id="example1" class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Qty</th>
                                    <th>Unit</th>
                                    <th>Category</th>
                                    <th>Product Name</th>
                                    <th style="text-align:right">Item Price</th>
                                    <th style="text-align:right">Sub-Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($this->cart->contents() as $items): ?>
                                <tr>
                                    <td>
                                        <?php echo $items['qty']; ?>
                                    </td>
                                    <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                        <?php foreach ( $this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
                                            <td><?php echo $option_value; ?></td>


                                        <?php endforeach; ?>

                                    <?php endif; ?>
                                    <td> <?php echo $items['name']; ?></td>
                                    <td style="text-align:right">₱<?php echo $this->cart->format_number($items['price']); ?></td>
                                    <td style="text-align:right">₱<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                                    <td>
                                        <a href="<?php echo base_url() . 'admin/sales/create/' . $items['rowid'] ?>">
                                            <i class="fa fa-trash-o text-red"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>   
                                <tr>
                                    <td colspan="4"> </td>
                                    <td style="text-align:right"><strong>Total</strong></td>
                                    <td style="text-align:right"><strong>₱<?php echo $this->cart->format_number($this->cart->total()); ?></strong></td>
                                </tr> 
                            </tbody>
                        </table>    
                    </div>
                </div>
            </div>
        </div>    
        <div class="col-md-12">
            <div class="box box-primary">
                <form method="post">
                    <div class="box-header">
                        <div class="form-group">
                            <label>Client Name:</label>
                            <select readonly class="form-control" name="cli_id">
                                <?php foreach ( $clients as $client ) :?>
                                    <option value="<?php echo $client['cli_id']?>" <?php if ( $this->session->userdata('selected_client') == $client['cli_id']) echo 'selected'  ?>><?php echo $client['cli_name'] ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Sale PO</label>
                            <select class="form-control" name="sal_po_no">
                                <option value="no" <?php if ( set_value('sal_po_no') == 'no') echo 'selected'?> >No</option>
                                <?php if ( $this->session->userdata('bra_id') == '1' ):?> 
                                    <option value="yes" <?php if ( set_value('sal_po_no') == 'yes') echo 'selected'?> >Yes</option>
                                <?php endif?>
                            </select>
                        </div>
                        
                        <!-- <div class="form-group">
                            <label>P.O. No:</label>
                            <input type="text" class="form-control" name="sal_po_no" value="<?php echo set_value('sal_po_no'); ?>">
                        </div> -->

                        <!-- <div class="form-group">
                            <label>S.I. No:</label>
                            <input type="text" class="form-control" name="sal_so_no" value="<?php echo set_value('sal_so_no'); ?>">
                        </div> -->

                        <div class="form-group">
                            <label>Checked and Release By:</label>
                            <input type="text" class="form-control" name="sal_checked_by" value="<?php echo set_value('sal_checked_by'); ?>">
                        </div>
                        <div class="form-group">
                            <label>Agent:</label>
                            <select class="form-control" name="sal_agent">
                                <option value="Sugar" <?php if ( set_value('sal_agent') == 'Sugar' ){echo 'selected';}?> >Sugar</option>
                                <option value="Basil" <?php if ( set_value('sal_agent') == 'Basil' ){echo 'selected';}?> >Basil</option>
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label>Amount:</label>
                            <input type="text" class="form-control" name="sal_paid" value="<?php echo set_value('sal_paid'); ?>">
                        </div> -->
                    </div>
                    <div class="box-footer">
                        <button type="submit" name="save_mode" value="save_mode" class="pull-right btn btn-primary col-md-2 btn-flat">
                            <i class="fa fa-save" aria-hidden="true"></i> Save
                        </button>
                        <a href="<?php echo base_url('admin/stocks/create/cancel')?>" class="pull-left btn btn-danger col-md-2 btn-flat">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>    
        </div>
    <?php endif;?>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <form method="post">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Warehouse</h4>
          </div>
          <div class="modal-body">
            
              <div class="form-group">
                <label for="recipient-name" class="control-label">Product ID:</label>
                <input readonly type="text" class="form-control" name="pro_id" id="pro_id">
              </div>  
              <div class="form-group">
                <label for="recipient-name" class="control-label">Product Name:</label>
                <input readonly type="text" class="form-control" name="pro_name" id="pro_name">
              </div>  
              <div class="form-group">
                <label for="recipient-name" class="control-label">Product Unit:</label>
                <input readonly type="text" class="form-control" name="pro_unit" id="pro_unit">
              </div> 
              <div class="form-group">
                <label for="recipient-name" class="control-label">Product Price:</label>
                <input readonly type="text" class="form-control" name="pro_price" id="pro_price">
              </div> 
              <div class="form-group">
                <label for="recipient-name" class="control-label">Quantity:</label>
                <input type="text" class="form-control" name="sti_qty" id="sti_qty">
              </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" name="add_product" value="add_product" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add Product</button>
          </div>
        </div>
    </form>
  </div>
</div>


