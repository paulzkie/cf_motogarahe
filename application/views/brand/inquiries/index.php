<div class="row">
    <!-- <div class="col-md-2 col-filter">
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
    </div> -->
    <div class="col-md-12">
        <!-- img src="<?php echo $inquiry_img[0]['set_desc']; ?>" class="img img-responsive">

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
                <h3 class="box-title">Manage Inquiries</h3>
                <!-- <div class="box-tools">
                <form method="POST" class="form-inline">
                    <div class="form-group"> 
                        <select class="form-control input-sm" name="search_type" style="width: 100px;">
                            <option value="mot_model">Model</option>
                            <option value="dealers.dea_name">Dealer</option>
                            <option value="mot_brand">Brand</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" name="search_val" class="form-control pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button type="submit" name="search_mode" value="search_mode" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>    
                </div> -->
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
                        
                        <?php $x = 1; if ( isset( $inquiries ) ):?>
                            <thead>
                                <tr role="row">
                                    <th></th>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Contact #</th>
                                    <th>Model Unit</th>
                                    <th>Terms</th>
                                    <th>Color</th>
                                    <th>Date</th>
                                    <th>Last Update</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            
                            <?php foreach($inquiries as $inquiry): ?>
                                <tr>
                                    <?php $current_count_start++?>
                                    <td><p><?php echo $current_count_start;?></p></td>
                                    <td><?php echo $inquiry['inq_id']?></td>
                                    <td><?php echo $inquiry['inq_name']?></td>
                                    <td><?php echo $inquiry['inq_phone']?></td>
                                    <td><?php echo $inquiry['mot_brand'] .' '. $inquiry['mot_model'] ?></td>
                                    <td><?php echo ( $inquiry['inq_payment'] === 'cash') ? 'cash': 'installment'?></td>
                                    <td><?php echo $inquiry['inq_color']?></td>
                                    <td><?php echo date("F j, Y, g:i a",strtotime($inquiry['inq_created'])) ?></td>
                                    <td><?php echo ( strtotime($inquiry['inq_updated']) != strtotime('0000-00-00 00:00:00') ) ? date("F j, Y, g:i a",strtotime($inquiry['inq_updated'])) : '' ?></td>
                                    <td>
                                        <?php
                                            $label = '';

                                            if ( $inquiry['inq_process'] == 'approve' ) {
                                                $label = 'label-success';
                                            } elseif ( $inquiry['inq_process'] == 'released' ) {
                                                $label = 'label-success';
                                            } elseif ( $inquiry['inq_process'] == 'pending' ) {
                                                $label = 'label-warning';
                                            } elseif ( $inquiry['inq_process'] == 'block' ) {
                                                $label = 'label-danger';
                                            } elseif ( $inquiry['inq_process'] == 'not qualified' ) {
                                                $label = 'label-danger';
                                            } elseif ( $inquiry['inq_process'] == 'on process' ) {
                                                $label = 'label-warning';
                                            }
                                        ?>
                                        <span class="label <?php echo $label;?>"><?php echo $inquiry['inq_process'] ?></span>
                                    </td>
                                    <td>    
                                        <div class="tools">
                                            <?php if ( $this->session->userdata('acc_type') == 'brand'):?>
                                            <a href="<?php echo base_url() . 'brand/inquiries/edit/' . $inquiry['inq_id']?>"><i class="fa fa-eye"></i></a>
                                            <?php endif;?>
                                        </div>
                                    </td>
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