<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">

            <?php foreach($accounts as $account): ?>
                <div class="box-body">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Username</label>
                        <input readonly type="text" class="form-control" name="acc_username" value="<?php echo $account['acc_username'] ?>" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label>Account Name</label>
                        <input readonly type="text" class="form-control" name="acc_name" value="<?php echo $account['acc_name'] ?>" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label>Account Type:</label>
                        <select readonly class="form-control" name="acc_type">
                            <option value="super admin" <?php echo 'super admin' == $account['acc_type'] ? 'selected' : '' ?>>super admin</option>
                            <option value="personel" <?php echo 'personel' == $account['acc_type'] ? 'selected' : '' ?>>personel</option>
                        </select>
                    </div>
                    <!--<div class="form-group">-->
                    <!--    <label>Assigned to Branch</label>-->
                    <!--    <select readonly class="form-control" name="bra_id">-->
                    <!--        <?php foreach ( $branches as $branch ) :?>-->
                    <!--            <option value="<?php echo $branch['bra_id']?>" <?php echo $branch['bra_id'] == $account['bra_id'] ? 'selected' : '' ?>>-->
                    <!--                <?php echo $branch['bra_name'] ?>        -->
                    <!--            </option>-->
                    <!--        <?php endforeach;?>-->
                    <!--    </select>-->
                    <!--</div>-->
                </div>
                <div class="box-footer">
                    <a href="<?php echo $back ?>" class="btn btn-default btn-flat">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back
                    </a>
                    <a href="<?php echo $edit ?>" class="btn btn-primary btn-flat pull-right">
                    <i class="fa fa-edit" aria-hidden="true"></i> Edit
                    </a>
                </div>
            <?php endforeach; ?>  
            <!-- /.box-body -->
        </div>
    </div>
</div>