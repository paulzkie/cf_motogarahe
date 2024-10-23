<style>
    .card_motors {position: relative;    display: inline-block;}
    .close {
            float: right;
    font-size: 21px;
    font-weight: bold;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    filter: alpha(opacity=20);
    opacity: .2;
    position: absolute;
    top: 1px;
    right: 4px;
    }
</style>
<!-- Select2 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" integrity="sha256-PIRVsaP4JdV/TIf1FR8UHy4TFh+LiRqeclYXvCPBeiw=" crossorigin="anonymous" />

<?php foreach($dealers_motorcycles as $dealers_motorcycle): ?>
<form method="POST">
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
                                <option <?php echo $dealers_motorcycle['mot_id'] == $motorcycle['mot_id'] ? 'selected' : '' ?> value="<?php echo $motorcycle['mot_id']?>"><?php echo $motorcycle['mot_model']?></option>
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
                                <option <?php echo $dealers_motorcycle['deb_id'] == $dealers_branch['deb_id'] ? 'selected' : '' ?> value="<?php echo $dealers_branch['deb_id']?>"><?php echo $dealers_branch['dea_name'] . " - ". $dealers_branch['name']?></option>
                            <?php $x++?>
                            <?php endforeach;?>
                            <?php endif;?>
                        </select>
                    </div>

                   <!--  <div class="form-group">
                        <label>Total Price</label>
                        <input type="text" class="form-control" name="dem_price" value="<?php echo set_value('dem_price') != NULL ? set_value('dem_price') : $dealers_motorcycle['dem_price'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Downpayment</label>
                        <input type="text" class="form-control" name="dem_dp" value="<?php echo set_value('dem_dp') != NULL ? set_value('dem_dp') : $dealers_motorcycle['dem_dp'] ?>">
                    </div>

                    <div class="form-group">
                        <label>36mos m.a.</label>
                        <input type="text" class="form-control" name="dem_installment" value="<?php echo set_value('dem_installment') != NULL ? set_value('dem_installment') : $dealers_motorcycle['dem_installment'] ?>">
                    </div>

                    <div class="form-group">
                        <label>24mos m.a.</label>
                        <input type="text" class="form-control" name="dem_installment2" value="<?php echo set_value('dem_installment2') != NULL ? set_value('dem_installment2') : $dealers_motorcycle['dem_installment2'] ?>">
                    </div>

                    <div class="form-group">
                        <label>12mos m.a.</label>
                        <input type="text" class="form-control" name="dem_installment3" value="<?php echo set_value('dem_installment3') != NULL ? set_value('dem_installment3') : $dealers_motorcycle['dem_installment3'] ?>">
                    </div> -->

                    <!-- <div class="form-group">
                         <label>Promos List <small class="text-red">(**seperate with commas ",")</small></label>
                        <input type="text" class="form-control" name="dem_promo" value="<?php echo set_value('dem_promo') != NULL ? set_value('dem_promo') : $dealers_motorcycle['dem_promo'] ?>">
                    </div> -->

                    <div class="form-group">
                        <label>Color Variant List <small class="text-red">(**seperate with commas ",")</small></label>
                        <input type="text" class="form-control" name="dem_colors" value="<?php echo set_value('dem_colors') != NULL ? set_value('dem_colors') : $dealers_motorcycle['dem_colors'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="dem_status">
                            <option value="published" <?php echo 'published' == $dealers_motorcycle['dem_status'] ? 'selected' : '' ?>>Published</option>
                            <option value="draft" <?php echo 'draft' == $dealers_motorcycle['dem_status'] ? 'selected' : '' ?>>Draft</option>
                            <option value="deleted" <?php echo 'deleted' == $dealers_motorcycle['dem_status'] ? 'selected' : '' ?>>Deleted</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Dealer Promo Status:</label>
                        <select name="dem_promo" class="form-control selectPromo">
                            <option value="false">Off</option>
                            <option value="true">On</option>
                        </select>
                    </div>

                </div>
                
                <div class="box-footer">
                    <a href="<?php echo $back ?>" class="btn btn-default btn-flat">
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
<?php endforeach; ?> 