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
                        <a href="<?php echo $published?>"><i class="fa fa-circle-o text-blue"></i> Published </a>
                    </li>
                    <li>
                        <a href="<?php echo $draft?>"><i class="fa fa-circle-o text-yellow"></i> Draft </a>
                    </li>
                    <li>
                        <a href="<?php echo $deleted?>"><i class="fa fa-circle-o text-red"></i> Delete</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Manage Damage Items</h3>
                <div class="box-tools">
                <form method="POST">
                    <div class="input-group input-group-sm" style="width: 200px;">
                        <input type="text" name="no_id" class="form-control pull-right" placeholder="No">
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
                                <th>Type</th>
                                <th>No</th>
                                <th>Product</th>
                                <th>Category</th>
                                <th>QTY</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        <?php if ( isset( $broken_products ) ):?>
                            <?php foreach($broken_products as $broken_products): ?>
                                <tr>
                                    <td><?php echo $broken_products['bro_type']?></td>
                                    <!-- <td><input type="checkbox"></td> -->
                                    <td><a href="<?php echo base_url() . 'admin/broken_products/view/' . $broken_products['bro_id']?>">
                                        <?php echo $broken_products['no_id'] ?>
                                    </a></td>
                                    <td><?php echo $broken_products['pro_name']?></td>
                                    <td><?php echo $controller->get_category_name($broken_products['pro_id'])?></td>
                                    <td><?php echo $broken_products['bro_qty']?></td>
                                    <td><?php echo date("F j, Y, g:i a",strtotime($broken_products['bro_created'])) ?></td>
                                    <td>
                                        <?php
                                            $label = '';

                                            if ( $broken_products['bro_status'] == 'published' ) {
                                                $label = 'label-success';
                                            } elseif ( $broken_products['bro_status'] == 'draft' ) {
                                                $label = 'label-warning';
                                            } elseif ( $broken_products['bro_status'] == 'deleted' ) {
                                                $label = 'label-danger';
                                            }
                                        ?>
                                        <span class="label <?php echo $label;?>"><?php echo $broken_products['bro_status'] ?></span>
                                    </td>
                                    <td>    
                                        <div class="tools">
                                            <?php if ( $this->session->userdata('acc_id') == 1 ) :?>
                                            <a href="<?php echo base_url() . 'admin/broken_products/edit/' . $broken_products['bro_id']?>"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo base_url() . 'admin/broken_products/delete/' . $broken_products['bro_id']?>"><i class="fa fa-trash-o"></i></a>
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
    </div>
</div>