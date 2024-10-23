<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">

            <?php foreach($clients as $client): ?>
                <div class="box-body">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Client Name</label>
                        <input type="text" class="form-control" value="<?php echo $client['cli_name'] ?>" readonly>
                    </div>

                    <?php if ( $this->session->userdata('acc_id') == 1 ) :?>

                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" value="<?php echo $client['cli_address'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Company Address</label>
                        <input type="text" class="form-control" value="<?php echo $client['cli_company_address'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Fax No</label>
                        <input type="text" class="form-control" value="<?php echo $client['cli_fax'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Contact Person</label>
                        <input type="text" class="form-control" value="<?php echo $client['cli_person'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" class="form-control" value="<?php echo $client['cli_contact'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>TIN No</label>
                        <input type="text" class="form-control" value="<?php echo $client['cli_tin'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Assigned to Account</label>
                        <input type="text" class="form-control" value="<?php echo $client['acc_name'] ?>" readonly>
                    </div>

                    <?php endif;?>
                </div>
                <div class="box-footer">
                    <a href="<?php echo $back ?>" class="btn btn-default btn-flat">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back
                    </a>
                    <?php if ( $this->session->userdata('acc_id') == 1 ) :?>
                    <a href="<?php echo $edit ?>" class="btn btn-primary btn-flat pull-right">
                    <i class="fa fa-edit" aria-hidden="true"></i> Edit
                    </a>
                    <?php endif;?>
                </div>
            <?php endforeach; ?>  
            <!-- /.box-body -->
        </div>
    </div>
</div>