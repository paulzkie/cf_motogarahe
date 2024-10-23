
<div class="row">
   
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Manage Captchas</h3>
                <div class="box-tools">
                <form method="POST" class="form-inline">
                    <div class="form-group"> 
                        <select class="form-control input-sm" name="search_type" style="width: 100px;">
                            <option value="cap_code">Code</option>
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
                                <th>Captcha</th>
                                <th>Username</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $count = 1;?>
                        <?php if ( isset( $captchas ) ):?>
                            <?php foreach($captchas as $captcha): ?>
                                <tr>
                                    <td><?php echo $count?></td>
                                    <td><?php echo $captcha['cap_code']?></td>
                                    <td><?php echo $captcha['usr_username']?></td>
                                    <td>₱ <?php echo number_format( $captcha['cap_amount'], 2) ?></td>
                                    <td><?php echo date("F j, Y",strtotime($captcha['cap_created'])) ?></td>
                                    <!-- <td>    
                                        <div class="tools">
                                            <?php if ( $this->session->userdata('acc_id') == 1 ) :?>
                                            <a href="<?php echo base_url() . 'admin/users/edit/' . $captcha['usr_id']?>"><i class="fa fa-edit"></i></a>
                                            <?php endif;?>
                                            <?php if ( $captcha['usr_activate'] == 'no' ) :?>
                                            <a href="<?php echo base_url() . 'admin/users/activate_account/' . $captcha['usr_id']?>"><i class="fa fa-check"></i></a>
                                            <?php endif;?>
                                        </div>
                                    </td> -->
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