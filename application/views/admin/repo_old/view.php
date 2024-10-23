<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">

            <?php foreach($repo as $rep): ?>

                <div class="box-body">

                    <div class="form-group">
                        <label>Name</label>
                        <input readonly type="text" class="form-control" name="mot_model" value="<?php echo set_value('mot_model') != NULL ? set_value('mot_model') : $rep['mot_model'] ?>">
                    </div> 

                    <div class="form-group">
                        <label>Brand</label>
                        <input readonly type="text" class="form-control" name="mot_brand" value="<?php echo set_value('mot_brand') != NULL ? set_value('mot_brand') : $rep['mot_brand'] ?>">
                    </div> 

                    <div class="form-group">
                        <label>Year</label>
                        <input readonly type="text" class="form-control" name="mot_year" value="<?php echo set_value('mot_year') != NULL ? set_value('mot_year') : $rep['mot_year'] ?>">
                    </div> 

                    <div class="form-group">
                        <label>Mileage</label>
                        <input readonly type="text" class="form-control" name="mot_mileage" value="<?php echo set_value('mot_mileage') != NULL ? set_value('mot_mileage') : $rep['mot_mileage'] ?>">
                    </div> 

                    <div class="form-group">
                        <label>Downpayment</label>
                        <input readonly type="text" class="form-control" name="mot_dp" value="<?php echo set_value('mot_dp') != NULL ? set_value('mot_dp') : $rep['mot_dp'] ?>">
                    </div> 

                    <div class="form-group">
                        <label>MA(36mos.)</label>
                        <input readonly type="text" class="form-control" name="mot_ma_36" value="<?php echo set_value('mot_ma_36') != NULL ? set_value('mot_ma_36') : $rep['mot_ma_36'] ?>">
                    </div> 

                    <div class="form-group">
                        <label>MA(24mos.)</label>
                        <input readonly type="text" class="form-control" name="mot_ma_24" value="<?php echo set_value('mot_ma_24') != NULL ? set_value('mot_ma_24') : $rep['mot_ma_24'] ?>">
                    </div> 

                    <div class="form-group">
                        <label>MA(12mos.)</label>
                        <input readonly type="text" class="form-control" name="mot_ma_12" value="<?php echo set_value('mot_ma_12') != NULL ? set_value('mot_ma_12') : $rep['mot_ma_12'] ?>">
                    </div> 

                    <img src="<?php echo base_url() . $rep['mot_image'] ?>" class="img img-responsive">



                   <!--  <div class="form-group">
                        <label>Type</label>
                        <select disabled class="form-control" name="mot_type">
                            <option value="accomplished" <?php echo 'accomplished' == $rep['mot_type'] ? 'selected' : '' ?>>Accomplished</option>
                            <option value="on-going" <?php echo 'on-going' == $rep['mot_type'] ? 'selected' : '' ?>>On-going</option>
                        </select>
                    </div> -->

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="mot_status">
                            <option value="published" <?php echo 'published' == $rep['mot_status'] ? 'selected' : '' ?>>Published</option>
                            <option value="draft" <?php echo 'draft' == $rep['mot_status'] ? 'selected' : '' ?>>Draft</option>
                            <option value="deleted" <?php echo 'deleted' == $rep['mot_status'] ? 'selected' : '' ?>>Deleted</option>
                        </select>
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