<div class="row">
    <div class="col-md-8">
        <form method="POST">
            <div class="box box-primary">
                <div class="box-body">
                    <!-- text input -->
                    

                    <div class="form-group">
                        <label>Client Name</label>
                        <input type="text" class="form-control" name="cli_name">
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="cli_address">
                    </div>
    
                    <div class="form-group">
                        <label>Company Address</label>
                        <input type="text" class="form-control" name="cli_company_address">
                    </div>

                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" class="form-control" name="cli_contact">
                    </div>

                    <div class="form-group">
                        <label>Fax No</label>
                        <input type="text" class="form-control" name="cli_fax">
                    </div>

                    <div class="form-group">
                        <label>Contact Person</label>
                        <input type="text" class="form-control" name="cli_person">
                    </div>

                    <div class="form-group">
                        <label>TIN No</label>
                        <input type="text" class="form-control" name="cli_tin">
                    </div>

                    <div class="form-group">
                        <label>Assigned to Account:</label>
                        <select class="form-control" name="acc_id">
                            <?php foreach ( $accounts as $account ) :?>
                                <option value="<?php echo $account['acc_id']?>"><?php echo $account['acc_name'] ?></option>
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