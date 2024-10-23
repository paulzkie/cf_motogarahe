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
        <!-- <div class="box">
            <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                    <li>
                        <a href="<?php echo $accomplished?>"><i class="fa fa-circle-o"></i> Kymco</a>
                    </li>
                    <li>
                        <a href="<?php echo $ongoing?>"><i class="fa fa-circle-o text-blue"></i> Kawasaki </a>
                    </li>
                    <li>
                        <a href="<?php echo $accomplished?>"><i class="fa fa-circle-o"></i> Yamaha</a>
                    </li>
                    <li>
                        <a href="<?php echo $ongoing?>"><i class="fa fa-circle-o text-blue"></i> Suzuki </a>
                    </li>
                    <li>
                        <a href="<?php echo $accomplished?>"><i class="fa fa-circle-o"></i> Honda</a>
                    </li>
                </ul>
            </div>
        </div> -->
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
                <h3 class="box-title">Manage repo</h3>
                <div class="box-tools">
                <form method="POST" class="form-inline">
                    <div class="form-group"> 
                        <select class="form-control input-sm" name="search_type" style="width: 100px;">
                            <option value="mot_model">Model</option>
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
                        <tbody>
                        
                        <?php $x = 1; if ( isset( $repo ) ):?>
                            <?php foreach($repo as $repos): ?>
                                <tr>
                                    <?php $current_count_start++?>
                                    <!-- <td><input type="checkbox"></td> -->
                                    <td><p><?php echo $current_count_start;?></p></td>
                                    <td>
                                        <?php if ( $repos['mop_image'] == 'none' ):?>
                                            <img src="https://dummyimage.com/620x485/4a4a4a/ffffff.jpg&text=No+Image" class="img-responsive">
                                        <?php else:?>
                                            <img src="<?php echo base_url() . $repos['mot_image'] ?>" class="img-responsive">
                                        <?php endif;?>    
                                    </td>
                                    <!-- <td>
                                        <img src="<?php echo base_url() . $repos['mop_image'] ?>">
                                    </td> -->
                                    <td><a href="<?php echo base_url() . 'admin/repo/view/' . $repos['mot_id']?>">
                                        <?php echo $repos['mot_model'] ?>
                                    </a></td>
                                    <td><?php echo base_url() . $repos['mop_image'] ?></td>
                                    <td><?php echo date("F j, Y, g:i a",strtotime($repos['mot_created'])) ?></td>
                                    <td>
                                        <?php
                                            $label = '';

                                            if ( $repos['mot_type'] == 'accomplished' ) {
                                                $label = 'label-primary';
                                            } elseif ( $repos['mot_type'] == 'on-going' ) {
                                                $label = 'label-primary';
                                            }
                                        ?>
                                        <span class="label <?php echo $label;?>"><?php echo $repos['mot_type'] ?></span>
                                    </td>
                                    <td>
                                        <?php
                                            $label = '';

                                            if ( $repos['mot_status'] == 'published' ) {
                                                $label = 'label-success';
                                            } elseif ( $repos['mot_status'] == 'draft' ) {
                                                $label = 'label-warning';
                                            } elseif ( $repos['mot_status'] == 'deleted' ) {
                                                $label = 'label-danger';
                                            } elseif ( $repos['mot_status'] == 'for approval' ) {
                                                $label = 'label-warning';
                                            }
                                        ?>
                                        <span class="label <?php echo $label;?>"><?php echo $repos['mot_status'] ?></span>
                                    </td>
                                    <td>    
                                        <div class="tools">
                                            <?php if ( $this->session->userdata('acc_type') == 'super admin' || $this->session->userdata('acc_type') == 'admin' ) :?>
                                            <a href="<?php echo base_url() . 'admin/repo/edit/' . $repos['mot_id']?>"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo base_url() . 'admin/repo/delete/' . $repos['mot_id']?>"><i class="fa fa-trash-o"></i></a>
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