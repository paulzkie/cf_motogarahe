<div class="row"> 
    <div class="col-md-4">
        <div class="info-box bg-aqua">
            <span class="info-box-icon">
                <i class="ion-cash"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">Total Sponsor</span>
              <span class="info-box-number"><?php echo $total_sponsor; ?></span>
              <span class="progress-description"></span>
            </div>
            <!-- /.info-box-content -->
          </div>   
    </div>  
    <div class="col-md-4">
        <div class="info-box bg-green">
            <span class="info-box-icon">
                <i class="ion-cash"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">Total Month Sponsor</span>
              <span class="info-box-number"><?php echo $month_total_sponsor; ?></span>
              <span class="progress-description"></span>
            </div>
            <!-- /.info-box-content -->
          </div>   
    </div>  
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Manage</h3>
                <div class="box-tools">
                <form method="POST" class="form-inline">
                    <div class="form-group"> 
                        <select class="form-control input-sm" name="search_type" style="width: 100px;">
                            <option value="int_from_username">From</option>
                            <option value="int_to_username">To</option>
                            <option value="int_amount">Amount</option>
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
                                <th>Incentive</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        <?php if ( isset( $incentives ) ): $x=1;?>
                            <?php foreach($incentives as $incentive): ?>
                                <tr>
                                    <!-- <td><input type="checkbox"></td> -->
                                    <!-- <td>
                                        <img src="<?php echo $incentive['int_image'] ?>" class="img-responsive">
                                    </td> -->
                                    <td>
                                        <?php echo $x; $x++;?>   
                                    </td>
                                    <td><?php echo $incentive['usr_username'] ?></td>
                                    <td><?php echo $incentive['set_desc'] ?></td>
                                    <td>
                                        <?php
                                            $label = '';
                                            $label_message = '';

                                            if ( $incentive['int_status'] == 'published' ) {
                                                $label = 'label-primary';
                                                $label_message = 'Done';
                                            } elseif ( $incentive['int_status'] == 'draft' ) {
                                                $label = 'label-warning';
                                                $label_message = 'On Process';
                                            } elseif ( $incentive['int_status'] == 'deleted' ) {
                                                $label = 'label-danger';
                                                $label_message = 'deleted';
                                            }
                                        ?>
                                        <span class="label <?php echo $label;?>"><?php echo $label_message ?></span>
                                    </td>
                                    <td><?php echo date("F j, Y, g:i a",strtotime($incentive['int_created'])) ?></td>
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