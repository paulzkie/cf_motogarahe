<div class="row"> 
    <div class="col-md-4">
        <div class="info-box bg-aqua">
            <span class="info-box-icon">
                <i class="ion-person"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">Total Accounts</span>
              <span class="info-box-number"><?php echo $users_count?></span>
              <span class="progress-description"></span>
            </div>
            <!-- /.info-box-content -->
          </div>   
    </div> 

    <div class="col-md-4">
        <div class="info-box bg-aqua">
            <span class="info-box-icon">
                <i class="ion-person"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">Total Premium Accounts</span>
              <span class="info-box-number"><?php echo $sparkle_users_count?></span>
              <span class="progress-description"></span>
            </div>
            <!-- /.info-box-content -->
          </div>   
    </div> 

    <div class="col-md-4">
        <div class="info-box bg-aqua">
            <span class="info-box-icon">
                <i class="ion-person"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">Total Lite Accounts</span>
              <span class="info-box-number"><?php echo $starter_users_count?></span>
              <span class="progress-description"></span>
            </div>
            <!-- /.info-box-content -->
          </div>   
    </div> 

    <div class="col-md-4">
        <div class="info-box bg-yellow">
            <span class="info-box-icon">
                <i class="ion-cash"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">Total Amount</span>
              <span class="info-box-number">₱ <?php echo number_format( $users_amount, 2) ?></span>
              <span class="progress-description"></span>
            </div>
            <!-- /.info-box-content -->
          </div>   
    </div> 

    <div class="col-md-4">
        <div class="info-box bg-yellow">
            <span class="info-box-icon">
                <i class="ion-cash"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">Total PREMIUM ACCOUNTS Amount</span>
              <span class="info-box-number">₱ <?php echo number_format( $sparkle_users_amount, 2) ?></span>
              <span class="progress-description"></span>
            </div>
            <!-- /.info-box-content -->
          </div>   
    </div> 

    <div class="col-md-4">
        <div class="info-box bg-yellow">
            <span class="info-box-icon">
                <i class="ion-cash"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">Total Lite ACCOUNTS Amount</span>
              <span class="info-box-number">₱ <?php echo number_format( $starter_users_amount, 2) ?></span>
              <span class="progress-description"></span>
            </div>
            <!-- /.info-box-content -->
          </div>   
    </div> 
</div>
<div class="row">
   
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Manage Users</h3>
                <div class="box-tools">
                <form method="POST" class="form-inline">
                    <div class="form-group"> 
                        <select class="form-control input-sm" name="search_type" style="width: 100px;">
                            <option value="usr_fname">Firstname</option>
                            <option value="usr_lname">Lastname</option>
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
                                <th>Username</th>
                                <th>Account Type</th>
                                <th>Fullname</th>
                                <th>Sponsor</th>
                                <th>Date Registered</th>
                                <th>Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $count = 1;?>
                        <?php if ( isset( $users ) ):?>
                            <?php foreach($users as $user): ?>
                                <tr>
                                    <td><?php echo $count?></td>
                                    <!-- <td><input type="checkbox"></td> -->
                                    <!-- <td>
                                        <img src="<?php echo $user['usr_image'] ?>" class="img-responsive">
                                    </td> -->
                                    <td>
                                        <a href="<?php echo base_url() . 'admin/users/view/' . $user['usr_id']?>">
                                            <?php echo $user['usr_username']?>
                                        </a>    
                                    </td>
                                    <td><?php echo $user['usr_type']?></td>
                                    <td class="text-capitalize">
                                        <?php echo $user['usr_lname'] . ", " . $user['usr_fname'] . " " . $user['usr_mname'] ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url() . 'admin/users/view/' . $user['dir_to_id']?>">
                                            <?php echo $user['dir_to_username']?>
                                        </a>    
                                    </td>
                                    <!--<td><?php echo date("F j, Y, g:i a",strtotime($user['usr_bday'])) ?></td>-->
                                    <td><?php echo date("F j, Y",strtotime($user['usr_bday'])) ?></td>
                                    <td>    
                                        <div class="tools">
                                            <?php if ( $this->session->userdata('acc_id') == 1 ) :?>
                                            <a href="<?php echo base_url() . 'admin/users/edit/' . $user['usr_id']?>"><i class="fa fa-edit"></i></a>
                                            <?php endif;?>
                                            <?php if ( $user['usr_activate'] == 'no' ) :?>
                                            <a href="<?php echo base_url() . 'admin/users/activate_account/' . $user['usr_id']?>"><i class="fa fa-check"></i></a>
                                            <?php endif;?>
                                        </div>
                                    </td>
                                </tr>
                                <?php $count = $count + 1;?>
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