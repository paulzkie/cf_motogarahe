<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">
            <form method="POST">
              <?php foreach($settings as $setting): ?>
                <div class="box-body">
                    <!-- text input -->
                    <div class="form-group">
                        <label><?php echo $setting['set_name'] ?> Amount</label>
                        <input type="text" class="form-control" name="set_amount" value="<?php echo $setting['set_amount'] ?>" placeholder="Enter ...">
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