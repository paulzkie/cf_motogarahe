<div class="row">
    <div class="col-md-8">
        <form method="POST">
            <div class="box box-primary">
                <div class="box-body">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="acc_username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="acc_password">
                    </div>
                    <div class="form-group">
                        <label>Account Name</label>
                        <input type="text" class="form-control" name="acc_name">
                    </div>
                    <div class="form-group">
                        <label>Account Type:</label>
                        <select class="form-control" name="acc_type">
                            <option value="super admin">super admin</option>
                            <option value="personel">personel</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Assigned to Branch:</label>
                        <select class="form-control" name="bra_id">
                            <?php foreach ( $branches as $branch ) :?>
                                <option value="<?php echo $branch['bra_id']?>"><?php echo $branch['bra_name'] ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="<?php echo $back?>" class="btn btn-default btn-flat">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back
                    </a>
                    <button type="submit" class="btn btn-primary btn-flat pull-right">
                    <i class="fa fa-check" aria-hidden="true"></i> Save
                    </button>
                </div>
                <!-- /.box-body -->
            </div>
        </form>    
    </div>
</div>