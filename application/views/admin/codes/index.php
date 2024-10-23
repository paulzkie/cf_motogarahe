<div class="row">
    <div class="col-md-3 col-filter">
        <a href="<?php echo $create?>" class="btn btn-primary btn-block btn-flat margin-bottom">
        <i class="fa fa-plus-circle" aria-hidden="true"></i> Create
        </a>    
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
                        <a href="<?php echo $published?>"><i class="fa fa-circle-o text-success"></i> Published </a>
                    </li>
                    <li>
                        <a href="<?php echo $draft?>"><i class="fa fa-circle-o text-yellow"></i> Draft </a>
                    </li>
                    <li>
                        <a href="<?php echo $deleted?>"><i class="fa fa-circle-o text-red"></i> Deleted</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="box">
            <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                    <li>
                        <a href="<?php echo $history?>"><i class="fa fa-history"></i>See History</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Manage codes (<?php echo $codes_count?>)</h3>
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
                                <th>Code</th>                         
                                <th>Username</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Date</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        
                        <?php if ( isset( $codes ) ):?>
                            <?php $i = 1; ?>
                            <?php foreach($codes as $item): ?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $item['cod_name'] ?></td>
                                    <td><?php echo $item['usr_name'] ?></td>
                                    <td><?php echo ( $item['cod_type'] == 'sparkle' ) ? 'Premium' : 'Starter'; ?></td>
                                    <td><?php echo date("F j, Y, g:i a",strtotime($item['cod_created'])) ?></td>
                                    <td>
                                        <?php
                                            $label = '';
                                            $status = '';
                                            if ( $item['cod_status'] == 'published' ) {
                                                $label = 'label-success';
                                                $status = 'Published';
                                            } elseif ( $item['cod_status'] == 'draft' ) {
                                                $label = 'label-warning';
                                                $status = 'Draft';
                                            } elseif ( $item['cod_status'] == 'deleted' ) {
                                                $label = 'label-danger';
                                                $status = 'Deleted';
                                            }
                                        ?>
                                        <span class="label <?php echo $label;?>"><?php echo $status ?></span>
                                    </td>
                                    
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