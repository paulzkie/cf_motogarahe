<div class="row">
    <div class="col-md-9">
        <label>Search Date: </label>
        <input type="date">
    </div>
    <div class="col-md-9">
        <!-- img src="<?php echo $repos_img[0]['set_desc']; ?>" class="img img-responsive">

        <form method="POST" enctype="multipart/form-data">
            <div class="form-group pull-right">
                <button class="btn btn-sm btn-primary" name="upload_mode" value="upload_mode">Upload</button>
            </div> 
            <div class="form-group" style="margin-top: 5px; ">
                <input type="file" name="set_desc">
            </div> 
        </form> -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Admin Logs</h3>
                
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
                        <tbody>
                        
                        <?php $x = 1; if ( isset( $logs ) ):?>
                            <?php foreach($logs as $log): ?>
                                <tr>
                                    <?php $current_count_start++?>
                                    <!-- <td><input type="checkbox"></td> -->
                                    <td><p><?php echo $current_count_start;?></p></td>
                                    <td><?php echo $log['acc_name'] ?></td>
                                    <td><?php echo $log['logdesc'] ?></td>
                                    <td><?php echo date("F j, Y, g:i a",strtotime($log['logdate'])) ?></td>
                                </tr>
                                <?php $x++?>
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