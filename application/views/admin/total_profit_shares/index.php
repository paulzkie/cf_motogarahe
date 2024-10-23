<div class="row">
    <div class="col-md-3 col-filter">   
        <div class="info-box bg-yellow">
            <span class="info-box-icon">
                <i class="ion-cash"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">Total No of Shares</span>
              <span class="info-box-number"><?php echo $total_prs_share?></span>
              <span class="progress-description"></span>
            </div>
            <!-- /.info-box-content -->
        </div>

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Filter</h3>
            </div>
            <div class="box-body no-padding">
                <form method="POST">
                    <div class="box-header">
                        <div class="form-group">
                            <label>Profit Share:</label>
                            <input type="text" readonly="" class="form-control" name="tps_share" value="₱<?php echo ( isset($profit_share) ? number_format( $profit_share, 2) : ''); ?>">
                        </div>    

                        <div class="form-group">
                            <label>Total Pool:</label>
                            <input type="text" class="form-control" name="total_pool" value="<?php echo set_value('total_pool'); ?>">
                        </div>

                        <div class="form-group">
                            <label>Generate</label>
                            <select class="form-control" name="generating">
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat btn-block" name="generate_mode" value="generate_mode">Submit</button>
                    </div>
                </form>   
            </div>
        </div>

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Filter</h3>
            </div>
            <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                    <li>
                        <a href="<?php echo $all?>"><i class="fa fa-circle-o"></i> All</a>
                    </li>
                    <li>
                        <a href="<?php echo $published?>"><i class="fa fa-circle-o text-blue"></i> Published </a>
                    </li>
                    <li>
                        <a href="<?php echo $draft?>"><i class="fa fa-circle-o text-yellow"></i> On Process </a>
                    </li>
                    <li>
                        <a href="<?php echo $deleted?>"><i class="fa fa-circle-o text-red"></i> Deleted</a>
                    </li>
                </ul>
            </div>
        </div>
        
    </div>
    <div class="col-md-9">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Manage</h3>
                <div class="box-tools">
                <form method="POST" class="form-inline">
                    <div class="form-group"> 
                        <select class="form-control input-sm" name="search_type" style="width: 100px;">
                            <option value="usr_username">Username</option>
                            <option value="tps_amount">Amount</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" name="search_val" class="form-control pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default" name="search_mode" value="search_mode"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>    
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive mailbox-messages">
                    <table id="example1" class="table  table-striped tablesorter table-hover">
                        <thead>
                            <tr>    
                                <th></th>
                                <th>Username</th>
                                <th>Pool Amount</th>
                                <th>Shares</th>
                                <th>Shares Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Tools</th>
                            </tr>
                        </thead>    
                        <tbody>
                        
                        <?php if ( isset( $total_profit_sharess ) ):$x=1;?>
                            <?php foreach($total_profit_sharess as $total_profit_share): ?>
                                <tr>
                                    <!-- <td><input type="checkbox"></td> -->
                                    <!-- <td>
                                        <img src="<?php echo $total_profit_share['tps_image'] ?>" class="img-responsive">
                                    </td> -->
                                    <td>
                                        <?php echo $x; $x++;?>   
                                    </td>
                                    
                                    <td><?php echo $total_profit_share['usr_username']?></td>
                                    <td>₱ <?php echo number_format( $total_profit_share['tps_amount'], 2) ?></td>
                                    <td><?php echo $total_profit_share['tps_share']?></td>
                                    <td>₱ <?php echo number_format( $total_profit_share['tps_each_amount'], 2) ?></td>
                                    <td>
                                        <?php
                                            $label = '';

                                            if ( $total_profit_share['tps_status'] == 'published' ) {
                                                $label = 'label-primary';
                                            } elseif ( $total_profit_share['tps_status'] == 'draft' ) {
                                                $label = 'label-warning';
                                            } elseif ( $total_profit_share['tps_status'] == 'deleted' ) {
                                                $label = 'label-danger';
                                            }
                                        ?>
                                        <span class="label <?php echo $label;?>"><?php echo $total_profit_share['tps_status'] ?></span>
                                    </td>
                                    <td><?php echo date("F j, Y, g:i a",strtotime($total_profit_share['tps_created'])) ?></td>
                                    <td>    
                                        <div class="tools">
                                            <?php if ( $total_profit_share['tps_status'] == 'draft' ) :?>
                                            <a href="<?php echo base_url() . 'admin/shares_generation/confirmed_rebates/' . $total_profit_share['tps_id']?>"><i class="fa fa-check"></i></a>
                                            <a href="<?php echo base_url() . 'admin/shares_generation/delete/' . $total_profit_share['tps_id']?>"><i class="fa fa-trash"></i></a>
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

                <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->

        </div>
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>