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

<?php foreach($motorcycles as $motorcycle): ?>
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
                        <label>Model</label>
                        <input  type="text" class="form-control" name="mot_model" value="<?php echo set_value('mot_model') != NULL ? set_value('mot_model') : $motorcycle['mot_model'] ?>">
                    </div>

                    <div class="form-group">
                        <label>SRP</label>
                        <input type="text" class="form-control" name="mot_srp" value="<?php echo set_value('mot_srp') != NULL ? set_value('mot_srp') : $motorcycle['mot_srp'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Brand</label>
                        <select class="form-control" name="mot_brand">
                            <option value="Kymco" <?php echo 'Kymco' == $motorcycle['mot_brand'] ? 'selected' : '' ?>>Kymco</option>
                            <option value="Kawasaki" <?php echo 'Kawasaki' == $motorcycle['mot_brand'] ? 'selected' : '' ?>>Kawasaki</option>
                            <option value="Yamaha" <?php echo 'Yamaha' == $motorcycle['mot_brand'] ? 'selected' : '' ?>>Yamaha</option>
                            <option value="Suzuki" <?php echo 'Suzuki' == $motorcycle['mot_brand'] ? 'selected' : '' ?>>Suzuki</option>
                            <option value="Honda" <?php echo 'Honda' == $motorcycle['mot_brand'] ? 'selected' : '' ?>>Honda</option>
                            <option value="Euro-Motors" <?php echo 'Euro-Motors' == $motorcycle['mot_brand'] ? 'selected' : '' ?>>Euro-Motors</option>
                            <option value="SYM" <?php echo 'SYM' == $motorcycle['mot_brand'] ? 'selected' : '' ?>>SYM</option>
                            <option value="Keeway" <?php echo 'Keeway' == $motorcycle['mot_brand'] ? 'selected' : '' ?>>Keeway</option>
                            <option value="Vespa" <?php echo 'Vespa' == $motorcycle['mot_brand'] ? 'selected' : '' ?>>Vespa</option>
                            <option value="Ducati" <?php echo 'Ducati' == $motorcycle['mot_brand'] ? 'selected' : '' ?>>Ducati</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Category (MC Type)</label>
                        <select class="form-control" name="mot_type">
                            <option value="Scooter" <?php echo 'Scooter' == $motorcycle['mot_type'] ? 'selected' : '' ?>>Scooter</option>
                            <option value="Backbone" <?php echo 'Backbone' == $motorcycle['mot_type'] ? 'selected' : '' ?>>Backbone</option>
                            <option value="Underbone" <?php echo 'Underbone' == $motorcycle['mot_type'] ? 'selected' : '' ?>>Underbone</option>
                            <option value="Business" <?php echo 'Business' == $motorcycle['mot_type'] ? 'selected' : '' ?>>Business</option>
                            <option value="ATV" <?php echo 'ATV' == $motorcycle['mot_type'] ? 'selected' : '' ?>>ATV</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Engine Size Range</label>
                        <input  type="text" class="form-control" name="mot_engine_size_range" value="<?php echo set_value('mot_engine_size_range') != NULL ? set_value('mot_engine_size_range') : $motorcycle['mot_engine_size_range'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Transmission</label>
                        <input  type="text" class="form-control" name="mot_transmission" value="<?php echo set_value('mot_transmission') != NULL ? set_value('mot_transmission') : $motorcycle['mot_transmission'] ?>">
                    </div>

                    <!-- <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="mot_image">
                        </div> -->
                </div>
            </div>

    </div>

    <div class="col-md-8">
                
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Engine</h3>
                    <div class="box-tools pull-right">
                    </div>
                    <!-- /.box-tools -->
                </div>
                <div class="box-body">

                    <div class="form-group">
                        <label>Color Variant</label>
                        <input  type="text" class="form-control" name="mot_color_variant" value="<?php echo set_value('mot_color_variant') != NULL ? set_value('mot_color_variant') : $motorcycle['mot_color_variant'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Engine Type</label>
                        <input  type="text" class="form-control" name="mot_engine_type" value="<?php echo set_value('mot_engine_type') != NULL ? set_value('mot_engine_type') : $motorcycle['mot_engine_type'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Displacement (cc)</label>
                        <input  type="text" class="form-control" name="mot_diplacement" value="<?php echo set_value('mot_diplacement') != NULL ? set_value('mot_diplacement') : $motorcycle['mot_diplacement'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Bore x Stroke (mm)</label>
                        <input  type="text" class="form-control" name=" mot_bore_stroke_mm" value="<?php echo set_value('mot_bore_stroke_mm') != NULL ? set_value('mot_bore_stroke_mm') : $motorcycle['mot_bore_stroke_mm'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Starting System</label>
                        <input  type="text" class="form-control" name="mot_starting_system" value="<?php echo set_value('mot_starting_system') != NULL ? set_value('mot_starting_system') : $motorcycle['mot_starting_system'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Ignition Type</label>
                        <input  type="text" class="form-control" name="mot_ignition_type" value="<?php echo set_value('mot_ignition_type') != NULL ? set_value('mot_ignition_type') : $motorcycle['mot_ignition_type'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Transmission Type</label>
                        <input  type="text" class="form-control" name="mot_transmission_type" value="<?php echo set_value('mot_transmission_type') != NULL ? set_value('mot_transmission_type') : $motorcycle['mot_transmission_type'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Fuel System</label>
                        <input  type="text" class="form-control" name="mot_fuel_system" value="<?php echo set_value('mot_fuel_system') != NULL ? set_value('mot_fuel_system') : $motorcycle['mot_fuel_system'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Engine Oil Capacity (L)</label>
                        <input  type="text" class="form-control" name="mot_engine_oil_capacity" value="<?php echo set_value('mot_engine_oil_capacity') != NULL ? set_value('mot_engine_oil_capacity') : $motorcycle['mot_engine_oil_capacity'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Maximum Horse Power</label>
                        <input  type="text" class="form-control" name=" mot_maximum_horse_power" value="<?php echo set_value('  mot_maximum_horse_power') != NULL ? set_value('mot_maximum_horse_power') : $motorcycle['mot_maximum_horse_power'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Maximum Torque</label>
                        <input  type="text" class="form-control" name="mot_maximum_torque" value="<?php echo set_value('mot_maximum_torque') != NULL ? set_value('mot_maximum_torque') : $motorcycle['mot_maximum_torque'] ?>">
                    </div>

                </div>
            </div>

    </div>

    <div class="col-md-8">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Chasis</h3>
                    <div class="box-tools pull-right">
                    </div>
                    <!-- /.box-tools -->
                </div>
                <div class="box-body">

                    <div class="form-group">
                        <label>Brake System (Front])</label>
                        <input  type="text" class="form-control" name="mot_brake_system_front" value="<?php echo set_value('mot_brake_system_front') != NULL ? set_value('mot_brake_system_front') : $motorcycle['mot_brake_system_front'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Brake System (Rear)</label>
                        <input  type="text" class="form-control" name="mot_brake_system_rear" value="<?php echo set_value('mot_brake_system_rear') != NULL ? set_value('mot_brake_system_rear') : $motorcycle['mot_brake_system_rear'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Suspension (Front)</label>
                        <input  type="text" class="form-control" name="mot_suspension_front" value="<?php echo set_value('mot_suspension_front') != NULL ? set_value('mot_suspension_front') : $motorcycle['mot_suspension_front'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Suspension (Rear)</label>
                        <input  type="text" class="form-control" name="mot_suspension_rear" value="<?php echo set_value('mot_suspension_rear') != NULL ? set_value('mot_suspension_rear') : $motorcycle['mot_suspension_rear'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Wheels Type</label>
                        <input  type="text" class="form-control" name="mot_wheels_type" value="<?php echo set_value('mot_wheels_type') != NULL ? set_value('mot_wheels_type') : $motorcycle['mot_wheels_type'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Front Tire</label>
                        <input  type="text" class="form-control" name="mot_front_tire" value="<?php echo set_value('mot_front_tire') != NULL ? set_value('mot_front_tire') : $motorcycle['mot_front_tire'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Rear Tire</label>
                        <input  type="text" class="form-control" name="mot_rear_tire" value="<?php echo set_value('mot_rear_tire') != NULL ? set_value('mot_rear_tire') : $motorcycle['mot_rear_tire'] ?>">
                    </div>

                </div>
            </div>

    </div>

    <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Dimension</h3>
                    <div class="box-tools pull-right">
                    </div>
                    <!-- /.box-tools -->
                </div>
                <div class="box-body">

                    <div class="form-group">
                        <label>Overall Dimensions (lenght x width x height)</label>
                        <input  type="text" class="form-control" name="mot_overall_dimensions" value="<?php echo set_value('mot_overall_dimensions') != NULL ? set_value('mot_overall_dimensions') : $motorcycle['mot_overall_dimensions'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Wet/Curb Weight (with oil & fuel)</label>
                        <input  type="text" class="form-control" name="mot_wet_curb_weight" value="<?php echo set_value('mot_wet_curb_weight') != NULL ? set_value('mot_wet_curb_weight') : $motorcycle['mot_wet_curb_weight'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Dry Weight (without oil & Fuel)</label>
                        <input  type="text" class="form-control" name="mot_dry_weight" value="<?php echo set_value('mot_dry_weight') != NULL ? set_value('mot_dry_weight') : $motorcycle['mot_dry_weight'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Wheelbase</label>
                        <input  type="text" class="form-control" name="mot_wheelbase" value="<?php echo set_value('mot_wheelbase') != NULL ? set_value('mot_wheelbase') : $motorcycle['mot_wheelbase'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Seat Height</label>
                        <input  type="text" class="form-control" name="mot_seat_height" value="<?php echo set_value('mot_seat_height') != NULL ? set_value('mot_seat_height') : $motorcycle['mot_seat_height'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Minimum Ground Clearance</label>
                        <input  type="text" class="form-control" name="mot_minimum_ground_clearance" value="<?php echo set_value('mot_minimum_ground_clearance') != NULL ? set_value('mot_minimum_ground_clearance') : $motorcycle['mot_minimum_ground_clearance'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Fuel Capacity (L)</label>
                        <input  type="text" class="form-control" name="mot_fuel_capacity" value="<?php echo set_value('mot_fuel_capacity') != NULL ? set_value('mot_fuel_capacity') : $motorcycle['mot_fuel_capacity'] ?>">
                    </div>

                    <!-- <div class="form-group">
                        <label>Type</label>
                        <select class="form-control" name="mot_type">
                            <option value="accomplished">Accomplished</option>
                            <option value="on-going">On-going</option>
                        </select>
                    </div> -->

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="mot_status">
                            <option value="published" <?php echo 'published' == $motorcycle['mot_status'] ? 'selected' : '' ?>>Published</option>
                            <option value="draft" <?php echo 'draft' == $motorcycle['mot_status'] ? 'selected' : '' ?>>Draft</option>
                            <option value="deleted" <?php echo 'deleted' == $motorcycle['mot_status'] ? 'selected' : '' ?>>Deleted</option>
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