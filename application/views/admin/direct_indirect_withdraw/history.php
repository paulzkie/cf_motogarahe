<meta http-equiv="refresh" content="10"/>
<div class="row">
    <div class="col-md-12">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Manage</h3>
                <a href="<?php echo $refresh?>" style="margin-left: 5px;">
                    <i class="fa fa-refresh" aria-hidden="true"></i>
                </a>
                
                <div class="box-tools">
                <!-- <form method="POST" class="form-inline">
                    <div class="form-group"> 
                        <select class="form-control input-sm" name="search_type" style="width: 100px;">
                            <option value="diw_id">ID</option>
                            <option value="diw_amount">Amount</option>
                            <option value="usr_username">Username</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" name="search_val" class="form-control pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>     -->
                </div>
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
                    <table class="table table-hover table-striped tablesorter">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Withdraw Amount</th>
                                <th>Last Amount</th>
                                
                                <th>Process Amount</th>
                                <th>Tax Amount</th>
                                <th>Left Amount</th>
                                <th>Actual Amount</th>
                                <th>Payment Method</th>
                                <th>Fullname</th>
                                <th>Payment No</th>
                                <th>Contact Number</th>
                                <th>Receive</th>
                                <th>Date Created</th>
                                <th>Date Recieved</th>
                                <th>Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ( isset( $direct_indirect_withdraw ) ):?>

                                <?php foreach($direct_indirect_withdraw as $item): ?> 
                                    
                                    <tr>
                                        <td><?php echo $item['diw_id'] ?></td>
                                        <td><?php echo $item['usr_username'] ?></td>
                                        <td>₱ <?php echo number_format( $item['diw_amount'], 2) ?></td>
                                        <td>₱ <?php echo number_format( $item['diw_lastamount'], 2) ?></td>
                                        
                                        
                                        <td>₱ <?php echo number_format( $item['diw_proccess'], 2) ?></td>
                                        <td>₱ <?php echo number_format( $item['diw_tax'], 2) ?></td>
                                        
                                        <td>₱ <?php echo number_format( $item['diw_leftamount'], 2) ?></td>
                                        <td>₱ <?php echo number_format( $item['diw_realamount'], 2) ?></td>
                                        <td><?php echo $item['usr_payment_method'] ?></td>
                                        <td><?php echo $item['usr_fname'] . ' ' . $item['usr_mname'] . ' ' . $item['usr_lname'] ?></td>
                                        <td><?php echo $item['usr_payment_no'] ?></td>
                                        <td><?php echo $item['usr_contact'] ?></td>
                                        <td><?php echo $item['diw_get'] ?></td>
                                        <td><?php echo date("F j, Y, g:i a",strtotime($item['diw_created'])) ?></td>
                                        <?php if ( $item['diw_updated'] != "0000-00-00 00:00:00" ): ?>
                                            <td><?php echo date("F j, Y, g:i a",strtotime($item['diw_updated'])) ?></td>
                                        <?php else:?>  
                                            <td></td>  
                                        <?php endif;?>    
                                        <td>    
                                        <div class="tools">
                                            <?php if ( $item['diw_get'] == 'no' ) :?>
                                            <a href="<?php echo base_url() . 'admin/direct_indirect_withdraw/confirm/' . $item['diw_id']?>"><i class="fa fa-check"></i></a>
                                            <?php endif;?>
                                            
                                        </div>
                                    </td>
                                    </tr>
    
                                <?php endforeach;?>
                            <?php endif;?>
                        </tbody>
                    </table>
                    <!-- /.table -->
                </div>
                <!-- <div class="box-footer">
                    <a href="<?php echo $back?>" class="btn btn-default btn-flat">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back
                    </a>
                </div> -->
                <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>