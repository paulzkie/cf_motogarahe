<div class="row"> 
    <div class="col-md-3">
        <div class="info-box bg-aqua">
            <span class="info-box-icon">
                <i class="ion-cash"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">Total Bonus</span>
              <span class="info-box-number">₱ <?php echo number_format( $total_reb_amount, 2) ?></span>
              <span class="progress-description"></span>
            </div>
            <!-- /.info-box-content -->
          </div>   
    </div>  
    <div class="col-md-3">
        <div class="info-box bg-green">
            <span class="info-box-icon">
                <i class="ion-cash"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">Total Month Bonus</span>
              <span class="info-box-number">₱ <?php echo number_format( $total_monthly_reb_amount, 2) ?></span>
              <span class="progress-description"></span>
            </div>
            <!-- /.info-box-content -->
          </div>   
    </div>  
    <div class="col-md-3">
        <div class="info-box bg-red">
            <span class="info-box-icon">
                <i class="ion-cash"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">Withdraw Bonus</span>
              <span class="info-box-number">₱ <?php echo number_format( $total_rew_amount, 2) ?></span>
              <span class="progress-description"></span>
            </div>
            <!-- /.info-box-content -->
          </div>   
    </div> 

    <div class="col-md-3">
        <div class="info-box bg-yellow">
            <span class="info-box-icon">
                <i class="ion-cash"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">Left Bonus</span>
              <span class="info-box-number">₱ <?php echo number_format( $left_reb_amount, 2) ?></span>
              <span class="progress-description"></span>
            </div>
            <!-- /.info-box-content -->
          </div>   
    </div> 
</div>
<div class="row">
    <div class="col-md-12 col-filter"> 
        <a href="<?php echo $history;?>" class="btn btn-success btn-flat btn-xs pull-right" style="margin-bottom:5px;margin-left: 5px;">
            <i class="fa fa-list" aria-hidden="true"></i> Withdraw History
        </a>  
        <a href="<?php echo $create;?>" class="btn btn-success btn-flat btn-xs pull-right" style="margin-bottom:5px;margin-left: 5px;">
            <i class="fa fa-sign-out" aria-hidden="true"></i> Withdraw
        </a>      
           
    </div>
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Manage</h3>
                <div class="box-tools">
                <form method="POST" class="form-inline">
                    <div class="form-group"> 
                        <select class="form-control input-sm" name="search_type" style="width: 100px;">
                            <option value="reb_amount">Amount</option>
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
                </form>    
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive mailbox-messages">
                    <table id="example1" class="table table-hover table-striped tablesorter">
                        <thead> 
                            <tr>    
                                <th></th>
                                <th>Username</th>
                                <th>From</th>
                                <th>Acct Type</th>
                                <th>Amount</th>
                                <th>Position</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        <?php if ( isset( $rebates ) ): $x=1;?>
                            <?php foreach($rebates as $rebate): ?>
                                <tr>
                                    <!-- <td><input type="checkbox"></td> -->
                                    <!-- <td>
                                        <img src="<?php echo $rebate['reb_image'] ?>" class="img-responsive">
                                    </td> -->
                                    <td>
                                        <?php echo $x; $x++;?>   
                                    </td>
                                    <td><?php echo $rebate['reb_to_username'] ?></td>
                                    <td><?php echo $rebate['reb_from_username'] ?></td>
                                    <td><?php echo $rebate['reb_from_type'] ?></td>
                                    <td>₱ <?php echo number_format( $rebate['reb_amount'], 2) ?></td>
                                    <td><?php echo $rebate['reb_position'] ?></td>
                                    <td><?php echo date("F j, Y, g:i a",strtotime($rebate['reb_created'])) ?></td>
                                </tr>

                            <?php endforeach;?>
                        <?php endif;?>
                        </tbody>
                    </table>   
                    <!-- /.table -->
                </div>

                <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->

        </div>
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>