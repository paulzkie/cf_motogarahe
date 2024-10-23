
<div class="row">
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Manage</h3>
                <a href="<?php echo $refresh?>" style="margin-left: 5px;">
                    <i class="fa fa-refresh" aria-hidden="true"></i>
                </a>
                
                <div class="box-tools">
                <!-- <form method="POST" class="form-inline">
                    <div class="form-group"> 
                        <select class="form-control input-sm" name="search_type" style="width: 100px;">
                            <option value="usr_from_username">From</option>
                            <option value="usr_amount">Amount</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" name="search_val" class="form-control pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search" name="search_mode" value="search_mode"></i></button>
                            </div>
                        </div>
                    </div>
                </form>     -->
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive mailbox-messages">
                    <table id="example1" class="table table-hover table-striped tablesorter">
                        <thead> 
                            <tr>    
                                <th></th>
                                <th>Username</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        <?php if ( isset( $users ) ): $x=1;?>
                            <?php foreach($users as $user): ?>
                                <tr>
                                    <!-- <td><input type="checkbox"></td> -->
                                    <!-- <td>
                                        <img src="<?php echo $user['usr_image'] ?>" class="img-responsive">
                                    </td> -->
                                    <td>
                                        <?php echo $x; $x++;?>   
                                    </td>
                                    <td><?php echo $user['usr_username'] ?></td>
                                    <td><?php echo date("F j, Y, g:i a",strtotime($user['usr_created'])) ?></td>
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