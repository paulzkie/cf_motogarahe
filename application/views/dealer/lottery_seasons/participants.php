<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Manage Prices</h3>
                <div class="box-tools">
                <form method="POST">
                    <div class="input-group input-group-sm" style="width: 200px;">
                        <input type="text" name="los_name" class="form-control pull-right" placeholder="Search">
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
                        <thead>
                            <tr>
                                <th>Season Name</th>
                                <th>Max Users</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        <?php if ( isset( $lottery_seasons ) ):?>
                            <?php foreach($lottery_seasons as $lottery_season): ?>
                                <tr>
                                    <!-- <td><input type="checkbox"></td> -->
                                    <!-- <td><?php echo $lottery_season['los_id']?></td> -->
                                    <td><a href="<?php echo base_url() . 'admin/lottery_seasons/view/' . $lottery_season['los_id']?>">
                                        <?php echo $lottery_season['los_name'] ?>
                                    </a></td>
                                    <td><?php echo $lottery_season['los_max_usr']?></td>
                                    <td><?php echo date("F j, Y, g:i a",strtotime($lottery_season['los_created'])) ?></td>
                                    <td>
                                        <?php
                                            $label = '';

                                            if ( $lottery_season['los_status'] == 'published' ) {
                                                $label = 'label-success';
                                            } elseif ( $lottery_season['los_status'] == 'draft' ) {
                                                $label = 'label-warning';
                                            } elseif ( $lottery_season['los_status'] == 'deleted' ) {
                                                $label = 'label-danger';
                                            }
                                        ?>
                                        <span class="label <?php echo $label;?>"><?php echo $lottery_season['los_status'] ?></span>
                                    </td>
                                    <td>    
                                        <div class="tools">
                                            <a href="<?php echo base_url() . 'admin/lottery_seasons/edit/' . $lottery_season['los_id']?>"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo base_url() . 'admin/lottery_seasons/delete/' . $lottery_season['los_id']?>"><i class="fa fa-trash-o"></i></a>
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
    </div>
</div>