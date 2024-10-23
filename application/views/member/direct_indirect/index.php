<div class="row"> 
    <div class="col-md-3">
        <div class="info-box bg-aqua">
            <span class="info-box-icon">
                <i class="ion-cash"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">Total Bonus</span>
              <span class="info-box-number">₱ <?php echo number_format( $total_dir_amount, 3) ?></span>
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
              <span class="info-box-text">Total <br>Month Bonus</span>
              <span class="info-box-number">₱ <?php echo number_format( $total_monthly_dir_amount, 3) ?></span>
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
              <span class="info-box-number">₱ <?php echo number_format( $total_diw_amount, 3) ?></span>
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
              <span class="info-box-text">Available Bonus</span>
              <span class="info-box-number">₱ <?php echo number_format( $left_dir_amount, 3) ?></span>
              <span class="progress-description"></span>
            </div>
            <!-- /.info-box-content -->
          </div>   
    </div> 


    <!-- <div class="col-md-3">
        <div class="info-box bg-green">
            <span class="info-box-icon">
                <i class="ion-cash"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">Captcha <br>Month Bonus</span>
              <span class="info-box-number">₱ <?php echo number_format( $total_monthly_cap_amount, 3) ?></span>
              <span class="progress-description"></span>
            </div>
          </div>   
    </div>   -->


</div>
<div class="row">
    <div class="col-md-12 col-filter"> 
        <!-- <a href="" class="btn btn-success btn-flat btn-xs pull-right" data-toggle="modal" data-target="#modal-activation" style="margin-bottom:5px;margin-left: 5px;">
            <i class="fa fa-check"></i> <span>Activate Account</span>
          </a> -->
        <a href="<?php echo $history;?>" class="btn btn-success btn-flat btn-xs pull-right" style="margin-bottom:5px;margin-left: 5px;">
            <i class="fa fa-list" aria-hidden="true"></i> Encashment History
        </a>  
        <a href="<?php echo $create;?>" class="btn btn-success btn-flat btn-xs pull-right" style="margin-bottom:5px;margin-left: 5px;">
            <i class="fa fa-sign-out" aria-hidden="true"></i> Encash
        </a>      
           
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Manage</h3>
                <a href="<?php echo $refresh?>" style="margin-left: 5px;">
                    <i class="fa fa-refresh" aria-hidden="true"></i>
                </a>
                
                <div class="box-tools">
                <form method="POST" class="form-inline" style="display:none;">
                    <div class="form-group"> 
                        <select class="form-control input-sm" name="search_type" style="width: 100px;">
                            <option value="dir_from_username">From</option>
                            <option value="dir_amount">Amount</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" name="search_val" class="form-control pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search" name="search_mode" value="search_mode"></i></button>
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
                                <th>Amount</th>
                                <!-- <th>Position</th> -->
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        <?php if ( isset( $direct_indirect ) ): $x=1;?>
                            <?php foreach($direct_indirect as $directIndirect): ?>
                                <tr>
                                    <!-- <td><input type="checkbox"></td> -->
                                    <!-- <td>
                                        <img src="<?php echo $directIndirect['dir_image'] ?>" class="img-responsive">
                                    </td> -->
                                    <td>
                                        <?php echo $x; $x++;?>   
                                    </td>
                                    <td><?php echo $directIndirect['dir_to_username'] ?></td>
                                    <td><?php echo $directIndirect['dir_from_username'] ?></td>
                                    <td>₱ <?php echo number_format( $directIndirect['dir_amount'], 3) ?></td>
                                    <!-- <td><?php echo $directIndirect['dir_position'] ?></td> -->
                                    <td><?php echo date("F j, Y, g:i a",strtotime($directIndirect['dir_created'])) ?></td>
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