<div class="row">
    <div class="col-md-3 col-filter">
        <?php if ( $this->session->userdata('bra_id') == 1 ) :?>
        <a href="<?php echo $create?>" class="btn btn-primary btn-block btn-flat margin-bottom">
        <i class="fa fa-plus-circle" aria-hidden="true"></i> Create
        </a>  
        <?php endif;?>  
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
                <h3 class="box-title">Manage Clients (<?php echo count($clients)?>)</h3>
                <div class="box-tools">
                <form method="POST">
                    <div class="input-group input-group-sm" style="width: 200px;">
                        <input type="text" name="cli_name" class="form-control pull-right" placeholder="Search">
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
                        <tbody>
                        <?php $count = 1;?>
                        <?php if ( isset( $clients ) ):?>
                            <?php foreach($clients as $client): ?>
                                <tr>
                                    <!-- <td><input type="checkbox"></td> -->
                                    <td><p><?php echo $count?></p></td>
                                    <td><a href="<?php echo base_url() . 'admin/clients/view/' . $client['cli_id']?>">
                                        <?php echo $client['cli_name'] ?>
                                    </a></td>
                                    
                                    <td><?php echo date("F j, Y, g:i a",strtotime($client['cli_created'])) ?></td>
                                    <td>
                                        <?php
                                            $label = '';

                                            if ( $client['cli_status'] == 'published' ) {
                                                $label = 'label-success';
                                            } elseif ( $client['cli_status'] == 'draft' ) {
                                                $label = 'label-warning';
                                            } elseif ( $client['cli_status'] == 'deleted' ) {
                                                $label = 'label-danger';
                                            }
                                        ?>
                                        <span class="label <?php echo $label;?>"><?php echo $client['cli_status'] ?></span>
                                    </td>
                                    <td>    
                                        <div class="tools">
                                            <?php if ( $this->session->userdata('acc_id') == 1 ) :?>
                                            <a href="<?php echo base_url() . 'admin/clients/edit/' . $client['cli_id']?>"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo base_url() . 'admin/clients/delete/' . $client['cli_id']?>"><i class="fa fa-trash-o"></i></a>
                                        <?php endif;?>
                                        </div>
                                    </td>
                                </tr>
                                <?php $count = $count + 1;?>
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