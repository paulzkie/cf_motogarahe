<div class="row">
    <div class="col-md-3 col-filter">   
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
                        <a href="<?php echo $draft?>"><i class="fa fa-circle-o text-yellow"></i> On Process </a>
                    </li>
                    <li>
                        <a href="<?php echo $deleted?>"><i class="fa fa-circle-o text-red"></i> Deleted</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Manage</h3>
                <div class="box-tools">
                <form method="POST" class="form-inline">
                    <div class="form-group"> 
                        <select class="form-control input-sm" name="search_type" style="width: 100px;">
                            <option value="rec_from_username">Username</option>
                            <option value="pro_code">Product Code</option>
                            <option value="sale_id">Sale ID</option>
                            <option value="rec_amount">Amount</option>
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
            <div class="box-body">
                <div class="table-responsive mailbox-messages">
                    <table id="example1" class="table  table-striped tablesorter table-hover">
                        <thead>
                            <tr>    
                                <th></th>
                                <th>Sale ID</th>
                                <th>Product Code</th>
                                <th>Username</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Tools</th>
                            </tr>
                        </thead>    
                        <tbody>
                        
                        <?php if ( isset( $rebates_confirmations ) ):$x=1;?>
                            <?php foreach($rebates_confirmations as $rebates_confirmation): ?>
                                <tr>
                                    <!-- <td><input type="checkbox"></td> -->
                                    <!-- <td>
                                        <img src="<?php echo $rebates_confirmation['rec_image'] ?>" class="img-responsive">
                                    </td> -->
                                    <td>
                                        <?php echo $x; $x++;?>   
                                    </td>
                                    <td><?php echo $rebates_confirmation['sale_id']?></td>
                                    <td><?php echo $rebates_confirmation['pro_code']?></td>
                                    <td><?php echo $rebates_confirmation['rec_from_username']?></td>
                                    <td>₱ <?php echo number_format( $rebates_confirmation['rec_amount'], 2) ?></td>
                                    
                                    
                                    <td>
                                        <?php
                                            $label = '';

                                            if ( $rebates_confirmation['rec_status'] == 'published' ) {
                                                $label = 'label-primary';
                                            } elseif ( $rebates_confirmation['rec_status'] == 'draft' ) {
                                                $label = 'label-warning';
                                            } elseif ( $rebates_confirmation['rec_status'] == 'deleted' ) {
                                                $label = 'label-danger';
                                            }
                                        ?>
                                        <span class="label <?php echo $label;?>"><?php echo $rebates_confirmation['rec_status'] ?></span>
                                    </td>
                                    <td><?php echo date("F j, Y, g:i a",strtotime($rebates_confirmation['rec_created'])) ?></td>
                                    <td>    
                                        <div class="tools">
                                            <?php if ( $rebates_confirmation['rec_status'] == 'draft' ) :?>
                                            <a href="<?php echo base_url() . 'admin/rebates_confirmation/confirmed_rebates/' . $rebates_confirmation['rec_id']?>"><i class="fa fa-check"></i></a>
                                            <a href="<?php echo base_url() . 'admin/rebates_confirmation/delete/' . $rebates_confirmation['rec_id']?>"><i class="fa fa-trash"></i></a>
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
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>