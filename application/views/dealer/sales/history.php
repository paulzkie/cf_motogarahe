<div class="row">
    <div class="col-md-3 col-filter">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Filter</h3>
            </div>
            <div class="box-body no-padding">
                <form method="POST">
                    <div class="box-header">
                        <div class="form-group">
                            <label>Branch Name:</label>
                            <select class="form-control" name="bra_id">
                                

                                <?php if ( $this->session->userdata('bra_id') != '1' ):?> 
                                    <option value="<?php echo $this->session->userdata('bra_id')?>" <?php if ( set_value('bra_id') == $this->session->userdata('bra_id')) echo 'selected'  ?>><?php echo $controller->get_branchname($this->session->userdata('bra_id')) ?></option>
                                <?php else:?>
                                    <option value="all">All</option>
                                    <?php foreach ( $branches as $branch ) :?>
                                            <option value="<?php echo $branch['bra_id']?>" <?php if ( set_value('bra_id') == $branch['bra_id']) echo 'selected'  ?>><?php echo $branch['bra_name'] ?></option>
                                    <?php endforeach;?>
                                <?php endif;?>   
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Client:</label>
                            <select class="form-control" name="cli_id">
                                <option value="all">All</option>
                                <?php foreach ( $clients as $client ) :?>
                                    <option value="<?php echo $client['cli_id']?>" <?php if ( set_value('cli_id') == $client['cli_id']) echo 'selected'  ?>><?php echo $client['cli_name']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>From Date:</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right datepicker" name="date_from" value="<?php echo set_value('date_from'); ?>">
                            </div>
                            <!-- /.input group -->
                        </div>

                        <div class="form-group">
                            <label>To Date:</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right datepicker" name="date_to" value="<?php echo set_value('date_to'); ?>">
                            </div>
                            <!-- /.input group -->
                        </div>

                        <div class="form-group">
                            <label>Product:</label>
                            <input type="text" class="form-control" name="pro_name" value="<?php echo set_value('pro_name'); ?>">
                        </div>

                        <div class="form-group">
                            <label>Category:</label>
                            <select class="form-control" name="cat_id">
                                <option value="all">All</option>
                                <?php foreach ( $categories as $Category ) :?>
                                    <option value="<?php echo $Category['cat_id']?>"  <?php if ( set_value('cat_id') == $Category['cat_id']) echo 'selected'  ?>><?php echo $Category['cat_name'] ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>P.O No:</label>
                            <input type="text" class="form-control" name="sal_po_no" value="<?php echo set_value('sal_po_no'); ?>">
                        </div>

                        <div class="form-group">
                            <label>S.O No:</label>
                            <input type="text" class="form-control" name="sal_id" value="<?php echo set_value('sal_id'); ?>">
                        </div>
                        <div class="form-group">
                            <label>Prepared By:</label>
                            <input type="text" class="form-control" name="sal_prepared_by" value="<?php echo set_value('sal_prepared_by'); ?>">
                        </div>
                        <div class="form-group">
                            <label>Agent:</label>
                            <input type="text" class="form-control" name="sal_agent" value="<?php echo set_value('sal_agent'); ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Export Excel</label>
                            <select class="form-control" name="export">
                                <option value="no" <?php if ( set_value('direct') == 'no') echo 'selected'?> >No</option>
                                <?php if ( $this->session->userdata('bra_id') == '1' ):?> 
                                    <option value="yes" <?php if ( set_value('direct') == 'yes') echo 'selected'?> >Yes</option>
                                <?php endif?>
                                
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Show Pending</label>
                            <select class="form-control" name="pending">
                                <option value="no" <?php if ( set_value('pending') == 'no') echo 'selected'?> >No</option>
                                <?php if ( $this->session->userdata('bra_id') == '1' ):?> 
                                    <option value="yes" <?php if ( set_value('pending') == 'yes') echo 'selected'?> >Yes</option>
                                <?php endif?>
                                
                                
                            </select>
                        </div>
                        
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat btn-block">Submit</button>
                    </div>
                </form>   
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Result</h3>
            </div>
            <div class="box-body no-padding">
                <div class="mailbox-controls">

                </div>
                <div class="table-responsive mailbox-messages">
                    <?php $total = 0;?>
                    <?php $total_qty = 0;?>
                    <table id="example1" class="table table-hover table-striped tablesorter">
                        <thead>
                            <tr>
                                <th>PRODUCT</th>
                                <th>QTY</th>
                                <th>TOTAL</th>
                            </tr>
                        </thead>    
                        <?php if ( isset( $products ) ):?>
                        <?php foreach($products as $key => $value): ?> 
                        <tbody>
                            <tr>
                                <td><?php echo $key?></td>
                                <td><?php echo $value?></td>
                                <td>₱ <?php echo number_format( $products_total[$key], 2) ?></td>
                                <?php $total = $total + $products_total[$key]?>
                                <?php $total_qty = $total_qty + $value?>
                            </tr>
                        </tbody>
                        
                        <?php endforeach; ?>
                        <?php endif;?>
                    </table>
                    <table id="example1" class="table table-hover table-striped tablesorter">
                        <tfoot>
                            <tr>
                                <td width="90%">TOTAL QTY</td>
                                <td><b><?php echo $total_qty?></b></td>
                            </tr>
                            <tr>
                                <td width="90%">TOTAL AMOUNT</td>
                                <td><b>₱ <?php echo number_format( $total, 2) ?></b></td>
                            </tr>
                        </tfoot>
                    </table>  
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">History</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="mailbox-controls">
                    <!-- Check all button -->
                    <!-- <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                    </div> -->
                    <!-- /.btn-group -->
                </div>
                <div class="table-responsive mailbox-messages">
                    <?php $grand_total = 0;?>
                    <?php $grand_sub = 0;?>
                    <table id="example1" class="table table-hover table-striped tablesorter">
                        <thead>
                            <tr>
                                <th></th>
                                
                                <th>S.I No.</th>
                                <th>P.O No.</th>
                                <th>CLIENT</th>
                                <th>BRANCH</th>
                                <th>CATEGORY</th>    
                                <th>PRODUCT</th>
                                <th>QTY</th>
                                
                                <th>UNIT PRICE</th>
                                <th>SUB PRICE</th>
                                <th>TOTAL PRICE</th>
                                <th>PREPARED BY</th>
                                <th>AGENT</th>
                                <th>DATE</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ( isset( $sales ) ):?>
                            <?php foreach($sales as $item): ?>
                                <tr>
                                    <td>
                                        <a target="_blank" href="<?php echo base_url() . 'admin/sales/view/' . $item['sal_id']?>">
                                            <i class="fa fa-file" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td><?php echo $item['sal_id']?></td>
                                    <td><?php echo $item['sal_po_no']?></td>
                                    <td><?php echo $item['cli_name']?></td>
                                    <td><?php echo $item['bra_name']?></td>
                                    <td><?php echo $item['cat_name']?></td>
                                    <td><?php echo $item['pro_name']?></td>
                                    <td><?php echo $item['sai_qty']?></td>
                                    
                                    <td>₱ <?php echo number_format( $item['sai_price'], 2) ?></td>
                                    <td>₱ <?php echo number_format( $item['sai_sub_total'], 2) ?></td>
                                    <td>₱ <?php echo number_format( $item['sal_total'], 2) ?></td>
                                    <td><?php echo $item['sal_prepared_by']?></td>
                                    <td><?php echo $item['sal_agent']?></td>
                                    <td><?php echo date("F j, Y, g:i a",strtotime($item['sat_created'])) ?></td>
                                    <td><?php echo $item['sal_status']?></td>
                                    <?php $grand_sub = $grand_sub + $item['sai_sub_total']?>
                                    <?php $grand_total = $grand_total + $item['sal_total']?>
                                    
                                </tr>   
                            <?php endforeach; ?>
                            <?php endif;?>
                        </tbody>
                    </table> 

                    <table id="example1" class="table table-hover table-striped tablesorter">
                        <tfoot>
                            <tr>
                                <td width="90%">TOTAL SUB PRICE</td>
                                <td><b>₱ <?php echo number_format( $grand_sub, 2) ?></b></td>
                            </tr>
                            <!-- <tr>
                                <td width="90%">GRAND TOTAL</td>
                                <td><b>₱ <?php echo number_format( $grand_total, 2) ?></b></td>
                            </tr> -->
                        </tfoot>
                    </table>  
                    <!-- /.table -->
                </div>

                <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->

        </div>
    </div>
</div>