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
                            <select class="form-control" name="bra_id_to">
                                <!-- <option value="all">All</option> -->
                                <?php if ( $this->session->userdata('bra_id') != '1' ):?> 
                                    <option value="<?php echo $this->session->userdata('bra_id')?>" <?php if ( set_value('bra_id_to') == $this->session->userdata('bra_id')) echo 'selected'  ?>><?php echo $controller->get_branchname($this->session->userdata('bra_id')) ?></option>
                                <?php else:?>
                                    <!-- <option value="all">All</option> -->
                                    <?php foreach ( $branches as $branch ) :?>
                                            <option value="<?php echo $branch['bra_id']?>" <?php if ( set_value('bra_id_to') == $branch['bra_id']) echo 'selected'  ?>><?php echo $branch['bra_name'] ?></option>
                                    <?php endforeach;?>
                                <?php endif;?>    
                                    
                            </select>
                        </div>

                        <div class="form-group">
                            <label>From Branch:</label>
                            <select class="form-control" name="bra_id_from">
                                <option value="all">All</option>
                                <?php foreach ( $branches as $branch ) :?>
                                    <option value="<?php echo $branch['bra_id']?>" <?php if ( set_value('bra_id_from') == $branch['bra_id']) echo 'selected'  ?>><?php echo $branch['bra_name']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Include Direct Stocks?</label>
                            <select class="form-control" name="direct">
                                <option value="yes" <?php if ( set_value('direct') == 'yes') echo 'selected'?> >Yes</option>
                                <option value="no" <?php if ( set_value('direct') == 'no') echo 'selected'?> >No</option>
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
                            <label>T.S No:</label>
                            <input type="text" class="form-control" name="int_id" value="<?php echo set_value('int_id'); ?>">
                        </div>

                        <div class="form-group">
                            <label>D/R No:</label>
                            <input type="text" class="form-control" name="int_dr" value="<?php echo set_value('int_dr'); ?>">
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
                    <?php $total_qty = 0;?>
                    <table id="example1" class="table table-hover table-striped tablesorter">
                        <thead>
                            <tr>
                                <th>PRODUCT</th>
                                <th>QTY</th>
                            </tr>
                        </thead>    
                        <?php if ( isset( $products ) ):?>
                        <?php foreach($products as $key => $value): ?>
                        <tbody>
                            <tr>
                                <td><?php echo $key?></td>
                                <td><?php echo $value?></td>
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
                    
                    <table id="example1" class="table table-hover table-striped tablesorter">
                        <thead>
                            <tr>
                                <th></th>
                                <th>T.S. No.</th>
                                <th>D/R. No.</th>
                                <th>PRODUCT</th>
                                <th>CATEGORY</th>
                                <th>QTY</th>
                                <th>FROM</th>
                                <th>TO</th>
                                <th>DATE</th>
                                <th>METHOD</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ( isset( $inventory ) ):?>
                            <?php foreach($inventory as $item): ?>
                                <tr>
                                    <td>
                                        <a target="_blank" href="<?php echo base_url() . 'admin/transfers/view/' . $item['int_id']?>">
                                            <i class="fa fa-file" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td><?php echo $item['int_id']?></td>
                                    <td><?php echo $item['int_dr']?></td>
                                    <td><?php echo $item['pro_name']?></td>
                                    <td><?php echo $item['cat_name']?></td>
                                    <td><?php echo $item['ini_qty']?></td>
                                    <td><?php echo $controller->get_branchname($item['bra_id_from'])?></td>
                                    <td><?php echo $controller->get_branchname($item['bra_id_to'])?></td>
                                    <td><?php echo date("F j, Y, g:i a",strtotime($item['int_created'])) ?></td>
                                    <td>Transfer</td>
                                    <td><?php echo $item['int_status']?></td>
                                </tr>   
                            <?php endforeach; ?>
                            <?php endif;?>

                            <?php if ( isset( $stocks ) ):?>
                            <?php foreach($stocks as $item): ?>
                                <tr>
                                    <td>
                                        <a target="_blank" href="<?php echo base_url() . 'admin/stocks/view/' . $item['sto_id']?>">
                                            <i class="fa fa-file" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td><?php echo $item['pro_name']?></td>
                                    <td><?php echo $item['cat_name']?></td>
                                    <td><?php echo $item['sti_qty']?></td>
                                    <td><?php echo $item['sto_from']?></td>
                                    <td><?php echo $controller->get_branchname($item['bra_id'])?></td>
                                    <td><?php echo date("F j, Y, g:i a",strtotime($item['sto_created'])) ?></td>
                                    <td>Direct</td>
                                    <td></td>
                                </tr>   
                            <?php endforeach; ?>
                            <?php endif;?>
                        </tbody>
                        
                    </table>   
                    <!-- /.table -->
                </div>

                <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->

        </div>
    </div>
</div>