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
                <h3 class="box-title">Manage Accounts (<?php echo $codes_count?>)</h3>
                <div class="box-tools">
                <form method="POST">
                    <div class="input-group input-group-sm" style="width: 200px;">
                        <input type="text" name="sto_id" class="form-control pull-right" placeholder="Search">
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
                    <table id="example1" class="table table-hover table-striped tablesorter">
                        <thead>
                            <tr>
                                <th></th>     
                                <th>Username</th>
                                <th>Type</th>

                            </tr>
                        </thead>
                        <tbody>
                        
                        <?php if ( isset( $codes ) ):?>
                            <?php $i = 1; ?>
                            <?php foreach($codes as $item): ?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <!-- <td><?php echo $item['cod_name'] ?></td> -->
                                    <td><?php echo $item['usr_name'] ?></td>
                                    <td><?php echo ( $item['cod_type'] == 'sparkle' ) ? 'Premium' : 'Starter'; ?></td>
                                </tr>
                                <?php $i++; ?>
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