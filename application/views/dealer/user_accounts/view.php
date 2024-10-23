<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">

            <?php foreach($categories as $category): ?>
                <div class="box-body">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" value="<?php echo $category['cat_name'] ?>" readonly>
                    </div>
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