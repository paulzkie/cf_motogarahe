<meta http-equiv="refresh" content="180"/>
<!-- <meta http-equiv="refresh" content="10"/> -->
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
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
                                <th>BRANCH</th>
                                <th>PRODUCT</th>
                                <th>CATEGORY</th>
                                <th>STOCK REMINDER</th>
                                <th>MESSAGE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ( isset( $notifs ) ):?>

                                <?php foreach($notifs as $item): ?> 
                                    
                                    <tr>
                                        <td><?php echo $item['branch_name']?></td>
                                        <td><?php echo $item['product']?></td>
                                        <td><?php echo $item['category']?></td>  
                                        <td><?php echo $item['stock']?></td>    
                                        <td><?php echo $item['message']?></td>
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