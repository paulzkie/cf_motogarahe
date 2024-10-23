<div class="row">
    <div class="col-md-3">
        <div class="info-box bg-yellow">
            <span class="info-box-icon">
                <i class="ion-cash"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">Available Bonus</span>
              <span class="info-box-number">₱ <?php echo number_format( $left_dir_amount, 3) ?></span>
              <span class="progress-description"></span>
            </div>
            <!-- /.info-box-content -->
          </div>   
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <form method="POST" enctype="multipart/form-data">
            <div class="box box-primary">
                <div class="box-body">

                    <div class="form-group">
                        <label>Amount</label>
                        <input type="text" class="form-control" name="diw_amount" value="<?php echo set_value('diw_amount'); ?>">
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