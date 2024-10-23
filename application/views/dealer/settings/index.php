<div class="row">
    <div class="col-md-3 col-filter">
        <div class="box">
            <!-- <div class="box-header with-border">
                <h3 class="box-title">Filter</h3>
            </div> -->
            <div class="box-body">
                <form method="post">
                    <label>Encashment Status</label>
                    <div class="input-group">
                    <div class="form-group">
                        <select <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control input-xs" name="set_status">
                            <option value="published" <?php echo 'published' == $encashement_status[0]['set_status'] ? 'selected' : '' ?>>Yes</option>
                            <option value="draft" <?php echo 'draft' == $encashement_status[0]['set_status'] ? 'selected' : '' ?>>No</option>
                        </select>
                    </div>
                    <div class="input-group-btn">
                        <button class="btn btn-success" type="submit" name="encashment_settings" value="encashment_settings">Done</button>
                    </div>
                    </div>
                </form>
            </div>

            <div class="box-body">
                <form method="post">
                    <label>Tax (Convert to decimal)</label>
                    <div class="input-group">
                    <div class="form-group">
                    <input type="text" class="form-control" name="set_amount" value="<?php echo $tax[0]['set_amount'] ?>" placeholder="Enter ...">
                    </div>
                    <div class="input-group-btn">
                        <button class="btn btn-success" type="submit" name="tax_post" value="tax_post">Done</button>
                    </div>
                    </div>
                </form>
            </div>

            <div class="box-body">
                <form method="post">
                    <label>Processing Fee (Convert to decimal)</label>
                    <div class="input-group">
                    <div class="form-group">
                    <input type="text" class="form-control" name="set_amount" value="<?php echo $process[0]['set_amount'] ?>" placeholder="Enter ...">
                    </div>
                    <div class="input-group-btn">
                        <button class="btn btn-success" type="submit" name="process_post" value="process_post">Done</button>
                    </div>
                    </div>
                </form>
            </div>

            <div class="box-body">
                <form method="post">
                    <label>Minimum Withdrawal</label>
                    <div class="input-group">
                    <div class="form-group">
                    <input type="text" class="form-control" name="set_amount" value="<?php echo $withdraw[0]['set_amount'] ?>" placeholder="Enter ...">
                    </div>
                    <div class="input-group-btn">
                        <button class="btn btn-success" type="submit" name="withdraw_post" value="withdraw_post">Done</button>
                    </div>
                    </div>
                </form>
            </div>
            
        </div>
        

    </div>
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Manage Settings</h3>
                <div class="box-tools">
                    <form method="POST">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" name="set_name" class="form-control pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
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
                       
                    <table class="table table-hover table-striped tablesorter">
                        <tbody>
                        
                        <?php if ( isset( $settings ) ):?>
                            <?php foreach($settings as $category): ?>
                                <tr>
                                    <!-- <td><input type="checkbox"></td> -->
                                    <td><a href="<?php echo base_url() . 'admin/settings/view/' . $category['set_id']?>">
                                        <?php echo $category['set_name'] ?>
                                    </a></td>
                                    
                                    <td><?php echo date("F j, Y, g:i a",strtotime($category['set_created'])) ?></td>
                                    <td>
                                        <?php
                                            $label = '';

                                            if ( $category['set_status'] == 'published' ) {
                                                $label = 'label-success';
                                            } elseif ( $category['set_status'] == 'draft' ) {
                                                $label = 'label-warning';
                                            } elseif ( $category['set_status'] == 'deleted' ) {
                                                $label = 'label-danger';
                                            }
                                        ?>
                                        <span class="label <?php echo $label;?>"><?php echo $category['set_status'] ?></span>
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
    </div>
</div>