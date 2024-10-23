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

<?php foreach($repo as $repos): ?>
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
                        <input  type="text" class="form-control" name="mot_model" value="<?php echo set_value('mot_model') != NULL ? set_value('mot_model') : $repos['mot_model'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Brand</label>
                        <select class="form-control" name="mot_brand">
                            <option value="Kymco" <?php echo 'Kymco' == $repos['mot_brand'] ? 'selected' : '' ?>>Kymco</option>
                            <option value="Kawasaki" <?php echo 'Kawasaki' == $repos['mot_brand'] ? 'selected' : '' ?>>Kawasaki</option>
                            <option value="Yamaha" <?php echo 'Yamaha' == $repos['mot_brand'] ? 'selected' : '' ?>>Yamaha</option>
                            <option value="Suzuki" <?php echo 'Suzuki' == $repos['mot_brand'] ? 'selected' : '' ?>>Suzuki</option>
                            <option value="Honda" <?php echo 'Honda' == $repos['mot_brand'] ? 'selected' : '' ?>>Honda</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Category (MC Type)</label>
                        <select class="form-control" name="mot_type">
                            <option value="Scooter" <?php echo 'Scooter' == $repos['mot_type'] ? 'selected' : '' ?>>Scooter</option>
                            <option value="Backbone" <?php echo 'Backbone' == $repos['mot_type'] ? 'selected' : '' ?>>Backbone</option>
                            <option value="Underbone" <?php echo 'Underbone' == $repos['mot_type'] ? 'selected' : '' ?>>Underbone</option>
                            <option value="Business" <?php echo 'Business' == $repos['mot_type'] ? 'selected' : '' ?>>Business</option>
                            <option value="ATV" <?php echo 'ATV' == $repos['mot_type'] ? 'selected' : '' ?>>ATV</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Year</label>
                        <input type="text" class="form-control" name="mot_year" value="<?php echo set_value('mot_year') != NULL ? set_value('mot_year') : $repos['mot_year'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Mileage</label>
                        <input type="text" class="form-control" name="mot_mileage" value="<?php echo set_value('mot_mileage') != NULL ? set_value('mot_mileage') : $repos['mot_mileage'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Downpayment</label>
                        <input type="text" class="form-control" name="mot_dp" value="<?php echo set_value('mot_dp') != NULL ? set_value('mot_dp') : $repos['mot_dp'] ?>">
                    </div>

                    <div class="form-group">
                        <label>36mos m.a</label>
                        <input type="text" class="form-control" name="mot_ma_36" value="<?php echo set_value('mot_ma_36') != NULL ? set_value('mot_ma_36') : $repos['mot_ma_36'] ?>">
                    </div>

                    <div class="form-group">
                        <label>24mos m.a</label>
                        <input type="text" class="form-control" name="mot_ma_24" value="<?php echo set_value('mot_ma_24') != NULL ? set_value('mot_ma_24') : $repos['mot_ma_24'] ?>">
                    </div>

                    <div class="form-group">
                        <label>12mos m.a</label>
                        <input type="text" class="form-control" name="mot_ma_12" value="<?php echo set_value('mot_ma_12') != NULL ? set_value('mot_ma_12') : $repos['mot_ma_12'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="mot_desc" value="<?php echo set_value('mot_desc') != NULL ? set_value('mot_desc') : $repos['mot_desc'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="mot_status">
                            <option value="published" <?php echo 'published' == $repos['mot_status'] ? 'selected' : '' ?>>Published</option>
                            <option value="draft" <?php echo 'draft' == $repos['mot_status'] ? 'selected' : '' ?>>Draft</option>
                            <option value="deleted" <?php echo 'deleted' == $repos['mot_status'] ? 'selected' : '' ?>>Deleted</option>
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