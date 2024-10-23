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
                        <a href="<?php echo $approved?>"><i class="fa fa-circle-o text-blue"></i> Approved </a>
                    </li>
                    <li>
                        <a href="<?php echo $published?>"><i class="fa fa-circle-o text-success"></i> Delivered </a>
                    </li>
                    <li>
                        <a href="<?php echo $draft?>"><i class="fa fa-circle-o text-yellow"></i> Pending </a>
                    </li>
                    <!-- <li>
                        <a href="<?php echo $deleted?>"><i class="fa fa-circle-o text-red"></i> Deleted</a>
                    </li> -->
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
                <h3 class="box-title">Manage Transfers</h3>
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
                                <th>T.S. No.</th>
                                <!-- <th>D/R. No.</th> -->
                                <th>From</th>
                                <th>To</th>
                                <th>Date</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        <?php if ( isset( $inventory ) ):?>
                            <?php $i = 0; ?>
                            <?php foreach($inventory as $item): ?>
                                <tr>

                                    <!-- <td><input type="checkbox"></td> -->
                                    <!-- <td>
                                        <img src="<?php echo $product['pro_image'] ?>" class="img-responsive">
                                    </td> -->
                                    <td><a href="<?php echo base_url() . 'admin/transfers/view/' . $item['int_id']?>">
                                        <?php echo $item['int_id'] ?>
                                    </a></td>
                                    <!-- <td><?php echo $item['int_dr'] ?></td> -->
                                    <td><?php echo $item['bra_name'] ?></td>
                                    <td><?php echo $controller->get_branchname( $item['bra_id_to'] ) ?></td>
                                    <td><?php echo date("F j, Y, g:i a",strtotime($item['int_created'])) ?></td>
                                    <td>
                                        <?php
                                            $label = '';
                                            $status = '';
                                            if ( $item['int_status'] == 'published' ) {
                                                $label = 'label-success';
                                                $status = 'Delivered';
                                            } elseif ( $item['int_status'] == 'approved' ) {
                                                $label = 'label-primary';
                                                $status = 'Approved';
                                            } elseif ( $item['int_status'] == 'draft' ) {
                                                $label = 'label-warning';
                                                $status = 'Pending';
                                            } elseif ( $item['int_status'] == 'deleted' ) {
                                                $label = 'label-danger';
                                                $status = 'Deleted';
                                            }
                                        ?>
                                        <span class="label <?php echo $label;?>"><?php echo $status ?></span>
                                    </td>
                                    <td>    
                                        
                                        <div class="tools">
                                            <?php if ( $this->session->userdata('acc_id') == 1 ):?>
                                            <a href="<?php echo base_url() . 'admin/transfers/edit/' . $item['int_id']?>"><i class="fa fa-edit"></i></a>
                                            <?php endif;?>
                                            <?php if ( $this->session->userdata('bra_id') == $item['bra_id_to'] && $item['int_status'] == 'approved'):?>
                                            <a href="<?php echo base_url() . 'admin/transfers/delivered/' . $item['int_id']?>"><i class="fa fa-truck"></i></a>
                                            <?php endif;?>
                                            <?php if ( $this->session->userdata('acc_type') == 'super admin' ):?>
                                            <!-- <a href="<?php echo base_url() . 'admin/transfers/delete/' . $item['int_id']?>"><i class="fa fa-trash-o"></i></a> -->
                                            <?php endif;?>
                                        </div>
                                        
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