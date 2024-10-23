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
                        <label>Motor Keywords</label>
                        <input  type="text" class="form-control" name="mot_keyword" value="<?php echo set_value('mot_keyword') != NULL ? set_value('mot_keyword') : $motorcycle['mot_keyword'] ?>">
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
                            <option value="Euro-Motor" <?php echo 'Euro-Motor' == $motorcycle['mot_brand'] ? 'selected' : '' ?>>Euro-Motor</option>
                            <option value="SYM" <?php echo 'SYM' == $motorcycle['mot_brand'] ? 'selected' : '' ?>>SYM</option>
                            <option value="Keeway" <?php echo 'Keeway' == $motorcycle['mot_brand'] ? 'selected' : '' ?>>Keeway</option>
                            <option value="Vespa" <?php echo 'Vespa' == $motorcycle['mot_brand'] ? 'selected' : '' ?>>Vespa</option>
                            <option value="Ducati" <?php echo 'Ducati' == $motorcycle['mot_brand'] ? 'selected' : '' ?>>Ducati</option>
                            <option value="Royal-Enfield" <?php echo 'Royal-Enfield' == $motorcycle['mot_brand'] ? 'selected' : '' ?>>Royal Enfield</option>
                            <option value="BMW" <?php echo 'BMW' == $motorcycle['mot_brand'] ? 'selected' : '' ?>>BMW</option>
                            <option value="KTM" <?php echo 'KTM' == $motorcycle['mot_brand'] ? 'selected' : '' ?>>KTM</option>
                            <option value="TVS" <?php echo 'TVS' == $motorcycle['mot_brand'] ? 'selected' : '' ?>>TVS</option>
                            <option value="Moto-Morini" <?php echo 'Moto-Morini' == $motorcycle['mot_brand'] ? 'selected' : '' ?>>Moto-Morini</option>
                            <option value="Motoguzzi" <?php echo 'Motoguzzi' == $motorcycle['mot_brand'] ? 'selected' : '' ?>>Motoguzzi</option>
                            <option value="Aprilia" <?php echo 'Aprilia' == $motorcycle['mot_brand'] ? 'selected' : '' ?>>Aprilia</option>
                            <option value="Benelli" <?php echo 'Benelli' == $motorcycle['mot_brand'] ? 'selected' : '' ?>>Benelli</option>
                            <option value="Bajaj" <?php echo 'Bajaj' == $motorcycle['mot_brand'] ? 'selected' : '' ?>>Bajaj</option>
                            <option value="CFMOTO" <?php echo 'CFMOTO' == $motorcycle['mot_brand'] ? 'selected' : '' ?>>CFMOTO</option>
                            <option value="Yadea" <?php echo 'Yadea' == $motorcycle['mot_brand'] ? 'selected' : '' ?>>Yadea</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Category (MC Type)</label>
                        <select class="form-control" name="mot_type">
                            <option value="Scooter" <?php echo 'Scooter' == $motorcycle['mot_type'] ? 'selected' : '' ?>>Scooter</option>
                            <option value="Backbone" <?php echo 'Backbone' == $motorcycle['mot_type'] ? 'selected' : '' ?>>Backbone</option>
                            <option value="Underbone" <?php echo 'Underbone' == $motorcycle['mot_type'] ? 'selected' : '' ?>>Underbone</option>
                            <option value="Business" <?php echo 'Business' == $motorcycle['mot_type'] ? 'selected' : '' ?>>Business</option>
                            <option value="Big-Bike" <?php echo 'Big-Bike' == $motorcycle['mot_type'] ? 'selected' : '' ?>>Big-Bike</option>
                            <option value="Sports" <?php echo 'Sports' == $motorcycle['mot_type'] ? 'selected' : '' ?>>Sports</option>
                            <option value="Adventure" <?php echo 'Adventure' == $motorcycle['mot_type'] ? 'selected' : '' ?>>Adventure</option>
                            <option value="Café" <?php echo 'Café' == $motorcycle['mot_type'] ? 'selected' : '' ?>>Café</option>
                            <option value="Cruiser" <?php echo 'Cruiser' == $motorcycle['mot_type'] ? 'selected' : '' ?>>Cruiser</option>
                            <option value="Naked" <?php echo 'Naked' == $motorcycle['mot_type'] ? 'selected' : '' ?>>Naked</option>
                            <option value="Off-Road" <?php echo 'Off-Road' == $motorcycle['mot_type'] ? 'selected' : '' ?>>Off-Road</option>
                            <option value="Retro" <?php echo 'Retro' == $motorcycle['mot_type'] ? 'selected' : '' ?>>Retro</option>
                            <option value="Sport-Touring" <?php echo 'Sport-Touring' == $motorcycle['mot_type'] ? 'selected' : '' ?>>Sport-Touring</option>
                            <option value="Dual-Sport" <?php echo 'Dual-Sport' == $motorcycle['mot_type'] ? 'selected' : '' ?>>Dual-Sport</option>
                            <option value="Supermoto" <?php echo 'Supermoto' == $motorcycle['mot_type'] ? 'selected' : '' ?>>Supermoto</option>
                            <option value="Scrambler" <?php echo 'Scrambler' == $motorcycle['mot_type'] ? 'selected' : '' ?>>Scrambler</option>
                            <option value="Touring" <?php echo 'Touring' == $motorcycle['mot_type'] ? 'selected' : '' ?>>Touring</option>
                            <option value="Adventure-Touring" <?php echo 'Adventure-Touring' == $motorcycle['mot_type'] ? 'selected' : '' ?>>Adventure-Touring</option>
                            <option value="Ebike" <?php echo 'Ebike' == $motorcycle['mot_type'] ? 'selected' : '' ?>>E-bike</option>
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

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" class="form-control" name="mot_desc" cols="30" rows="10" name="mot_desc"><?php echo set_value('mot_desc') != NULL ? set_value('mot_desc') : $motorcycle['mot_desc'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Promo</label>
                        <select  class="form-control" name="mot_promo">
                            <option value="true" <?php echo 'true' == $motorcycle['mot_promo'] ? 'selected' : '' ?>>On</option>
                            <option value="false" <?php echo 'false' == $motorcycle['mot_promo'] ? 'selected' : '' ?>>Off</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Promo Discount: "In whole number"</label>
                        <input type="text" class="form-control" name="mot_discountpromo">
                    </div>

                    <div class="form-group">
                        <label>Promo Content</label>
                        <textarea  class="form-control" class="form-control" name="mot_promo_content" cols="30" rows="3" name="mot_promo_content"><?php echo set_value('mot_promo_content') != NULL ? set_value('mot_promo_content') : $motorcycle['mot_promo_content'] ?></textarea>
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
                        <label>Engine Type/ Motor</label>
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
                        <label>Battery (Ebike)</label>
                        <input  type="text" class="form-control" name="mot_battery" value="<?php echo set_value('mot_battery') != NULL ? set_value('mot_battery') : $motorcycle['mot_battery'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Engine Oil Capacity (L)</label>
                        <input  type="text" class="form-control" name="mot_engine_oil_capacity" value="<?php echo set_value('mot_engine_oil_capacity') != NULL ? set_value('mot_engine_oil_capacity') : $motorcycle['mot_engine_oil_capacity'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Maximum Horse Power/ Speed</label>
                        <input  type="text" class="form-control" name=" mot_maximum_horse_power" value="<?php echo set_value('  mot_maximum_horse_power') != NULL ? set_value('mot_maximum_horse_power') : $motorcycle['mot_maximum_horse_power'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Maximum Torque</label>
                        <input  type="text" class="form-control" name="mot_maximum_torque" value="<?php echo set_value('mot_maximum_torque') != NULL ? set_value('mot_maximum_torque') : $motorcycle['mot_maximum_torque'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Range (Ebike)</label>
                        <input  type="text" class="form-control" name="mot_range" value="<?php echo set_value('mot_range') != NULL ? set_value('mot_range') : $motorcycle['mot_range'] ?>">
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

                    <div class="form-group">
                        <label>Alarm (Ebike)</label>
                        <input  type="text" class="form-control" name="mot_alarm" value="<?php echo set_value('mot_alarm') != NULL ? set_value('mot_alarm') : $motorcycle['mot_alarm'] ?>">
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