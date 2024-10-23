<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">
            <form method="POST">
              <?php foreach($clients as $client): ?>
                <div class="box-body">
                    <!-- text input -->
                    <div class="form-group">
                        <label>client Name</label>
                        <input type="text" class="form-control" name="cli_name" value="<?php echo $client['cli_name'] ?>" placeholder="Enter ...">
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="cli_address" value="<?php echo $client['cli_address'] ?>" placeholder="Enter ...">
                    </div>

                    <div class="form-group">
                        <label>Company Address</label>
                        <input type="text" class="form-control" name="cli_company_address" value="<?php echo $client['cli_company_address'] ?>" placeholder="Enter ...">
                    </div>

                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" class="form-control" name="cli_contact" value="<?php echo $client['cli_contact'] ?>" placeholder="Enter ...">
                    </div>

                    <div class="form-group">
                        <label>Fax No</label>
                        <input type="text" class="form-control" name="cli_fax" value="<?php echo $client['cli_fax'] ?>" placeholder="Enter ...">
                    </div>

                    <div class="form-group">
                        <label>Contact Person</label>
                        <input type="text" class="form-control" name="cli_person" value="<?php echo $client['cli_person'] ?>" placeholder="Enter ...">
                    </div>

                    <div class="form-group">
                        <label>TIN No</label>
                        <input type="text" class="form-control" name="cli_tin" value="<?php echo $client['cli_tin'] ?>" placeholder="Enter ...">
                    </div>

                    <div class="form-group">
                        <label>Assigned to Account</label>
                        <select class="form-control" name="acc_id">
                            <?php foreach ( $accounts as $account ) :?>
                                <option value="<?php echo $account['acc_id']?>" <?php echo $account['acc_id'] == $client['acc_id'] ? 'selected' : '' ?>>
                                    <?php echo $account['acc_name'] ?>        
                                </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
              <?php endforeach; ?>  
                <div class="box-footer">
                    <a href="<?php echo $back ?>" class="btn btn-default btn-flat">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back
                    </a>
                    <button type="submit" class="btn btn-primary btn-flat pull-right">
                    <i class="fa fa-check" aria-hidden="true"></i> Save
                    </button>
                </div>
                <!-- /.box-body -->
            </form>
        </div>
    </div>
</div>