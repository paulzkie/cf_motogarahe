<!-- Select2 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" integrity="sha256-PIRVsaP4JdV/TIf1FR8UHy4TFh+LiRqeclYXvCPBeiw=" crossorigin="anonymous" />

<form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-8">
                
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Description</h3>
                    <div class="box-tools pull-right">
                    </div>
                    <!-- /.box-tools -->
                </div>
                <div class="box-body">

                    <div class="form-group">
                        <label>Model Name</label>

                        <select class=" select2 form-control" name="mot_id" style="width: 100% !important;">
                          <option selected="selected">select model</option>
                          <?php $x = 1; if ( isset( $motorcycles ) ):?>
                            <?php foreach($motorcycles as $motorcycle): ?>
                                <option value="<?php echo $motorcycle['mot_id']?>"><?php echo $motorcycle['mot_model']?></option>
                            <?php $x++?>
                            <?php endforeach;?>
                            <?php endif;?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Dealer - Branch</label>
                        <select class=" select2 form-control" name="deb_id" style="width: 100% !important;">
                          <option selected="selected">select dealer</option>
                          <?php $x = 1; if ( isset( $dealers_branches ) ):?>
                            <?php foreach($dealers_branches as $dealers_branch): ?>
                                <option value="<?php echo $dealers_branch['deb_id']?>"><?php echo $dealers_branch['dea_name'] . " - ". $dealers_branch['name']?></option>
                            <?php $x++?>
                            <?php endforeach;?>
                            <?php endif;?>
                        </select>
                    </div>

                    <!-- <div class="form-group">
                        <label>Total Price</label>
                        <input type="text" autocomplete="off" class="form-control" name="dem_price" value="<?php echo set_value('dem_price'); ?>">
                    </div> -->

                    <!-- <div class="form-group">
                        <label>Downpayment</label>
                        <input type="text" autocomplete="off" class="form-control" name="dem_dp" value="<?php echo set_value('dem_dp'); ?>">
                    </div>

                    <div class="form-group">
                        <label>36mos m.a.</label>
                        <input type="text" autocomplete="off" class="form-control" name="dem_installment" value="<?php echo set_value('dem_installment'); ?>">
                    </div>

                    <div class="form-group">
                         <label>24mos m.a.</label>
                        <input type="text" autocomplete="off" class="form-control" name="dem_installment2" value="<?php echo set_value('dem_installment2'); ?>">
                    </div>

                    <div class="form-group">
                         <label>12mos m.a.</label>
                        <input type="text" autocomplete="off" class="form-control" name="dem_installment3" value="<?php echo set_value('dem_installment3'); ?>">
                    </div> -->

                    <!-- <div class="form-group">
                        <label>Promos List <small class="text-red">(**seperate with commas ",")</small></label>
                        <input type="text" autocomplete="off" class="form-control" name="dem_promo" value="<?php echo set_value('dem_promo'); ?>">
                    </div> -->

                    <div class="form-group">
                        <label>Color Variant List <small class="text-red">(**seperate with commas ",")</small></label>
                        <input type="text" autocomplete="off" class="form-control" name="dem_colors" value="<?php echo set_value('dem_colors'); ?>">
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
        </div>
    </div>
</form>

