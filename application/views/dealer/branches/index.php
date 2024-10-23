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
                <h3 class="box-title">Manage Branches</h3>
                <div class="box-tools">
                <form method="POST">
                    <div class="input-group input-group-sm" style="width: 200px;">
                        <input type="text" name="bra_name" class="form-control pull-right" placeholder="Search">
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
                    <table class="table table-hover table-striped">
                        <tbody>
                        
                        <?php if ( isset( $branches ) ):?>
                            <?php foreach($branches as $branch): ?>
                                <tr>
                                    <!-- <td><input type="checkbox"></td> -->
                                    <td><a href="<?php echo base_url() . 'admin/branches/view/' . $branch['bra_id']?>">
                                        <?php echo $branch['bra_name'] ?>
                                    </a></td>
                                    
                                    <td><?php echo date("F j, Y, g:i a",strtotime($branch['bra_created'])) ?></td>
                                    <td>
                                        <?php
                                            $label = '';

                                            if ( $branch['bra_status'] == 'published' ) {
                                                $label = 'label-success';
                                            } elseif ( $branch['bra_status'] == 'draft' ) {
                                                $label = 'label-warning';
                                            } elseif ( $branch['bra_status'] == 'deleted' ) {
                                                $label = 'label-danger';
                                            }
                                        ?>
                                        <span class="label <?php echo $label;?>"><?php echo $branch['bra_status'] ?></span>
                                    </td>
                                    <td>    
                                        <div class="tools">
                                            <a href="<?php echo base_url() . 'admin/branches/edit/' . $branch['bra_id']?>"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo base_url() . 'admin/branches/delete/' . $branch['bra_id']?>"><i class="fa fa-trash-o"></i></a>
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