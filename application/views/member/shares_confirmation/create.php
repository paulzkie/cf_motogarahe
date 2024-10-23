<div class="row">
    <div class="col-md-8">
        <form method="POST" enctype="multipart/form-data">
            <div class="box box-primary">
                <div class="box-body">

                    <div class="form-group">
                        <label>Sale ID</label>
                        <input type="text" class="form-control" name="sale_id" value="<?php echo set_value('sale_id'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Amount</label>
                        <input type="text" class="form-control" name="shc_amount" value="<?php echo set_value('shc_amount'); ?>">
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