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
                        <input type="text" autocomplete="off" class="form-control" name="mot_model" value="<?php echo set_value('mot_model'); ?>">
                    </div>

                    <div class="form-group">
                        <label>SRP</label>
                        <input type="text" autocomplete="off" class="form-control" name="mot_srp" value="<?php echo set_value('mot_srp'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Brand</label>
                        <select class="form-control" name="mot_brand">
                            <option value="Kymco">Kymco</option>
                            <option value="Kawasaki">Kawasaki</option>
                            <option value="Yamaha">Yamaha</option>
                            <option value="Suzuki">Suzuki</option>
                            <option value="Honda">Honda</option>
                            <option value="Euro-Motors">Euro-Motors</option>
                            <option value="SYM">SYM</option>
                            <option value="Keeway">Keeway</option>
                            <option value="Vespa">Vespa</option>
                            <option value="Ducati">Ducati</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Category (MC Type)</label>
                        <select class="form-control" name="mot_type">
                            <option value="Scooter">Scooter</option>
                            <option value="Backbone">Backbone</option>
                            <option value="Underbone">Underbone</option>
                            <option value="Big-Bike">Big-Bike</option>
                            <option value="Business">Business</option>
                            <option value="ATV">ATV</option>
                            <option value="Sports">Sports</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Engine Size Range</label>
                        <input type="text" autocomplete="off" class="form-control" name="mot_engine_size_range" value="<?php echo set_value('mot_engine_size_range'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Transmission</label>
                        <input type="text" autocomplete="off" class="form-control" name="mot_transmission" value="<?php echo set_value('mot_transmission'); ?>">
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
                        <input type="text" autocomplete="off" class="form-control" name="mot_color_variant" value="<?php echo set_value('mot_color_variant'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Engine Type</label>
                        <input type="text" autocomplete="off" class="form-control" name="mot_engine_type" value="<?php echo set_value('mot_engine_type'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Displacement (cc)</label>
                        <input type="text" autocomplete="off" class="form-control" name="mot_diplacement" value="<?php echo set_value('mot_diplacement'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Bore x Stroke (mm)</label>
                        <input type="text" autocomplete="off" class="form-control" name="mot_bore_stroke_mm" value="<?php echo set_value('mot_bore_stroke_mm'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Starting System</label>
                        <input type="text" autocomplete="off" class="form-control" name="mot_starting_system" value="<?php echo set_value('mot_starting_system'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Ignition Type</label>
                        <input type="text" autocomplete="off" class="form-control" name="mot_ignition_type" value="<?php echo set_value('mot_ignition_type'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Transmission Type</label>
                        <input type="text" autocomplete="off" class="form-control" name="mot_transmission_type" value="<?php echo set_value('mot_transmission_type'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Fuel System</label>
                        <input type="text" autocomplete="off" class="form-control" name="mot_fuel_system" value="<?php echo set_value('mot_fuel_system'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Engine Oil Capacity (L)</label>
                        <input type="text" autocomplete="off" class="form-control" name="mot_engine_oil_capacity" value="<?php echo set_value('mot_engine_oil_capacity'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Maximum Horse Power</label>
                        <input type="text" autocomplete="off" class="form-control" name="mot_maximum_horse_power" value="<?php echo set_value('mot_maximum_horse_power'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Maximum Torque</label>
                        <input type="text" autocomplete="off" class="form-control" name="mot_maximum_torque" value="<?php echo set_value('mot_maximum_torque'); ?>">
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
                        <input type="text" autocomplete="off" class="form-control" name="mot_brake_system_front" value="<?php echo set_value('mot_brake_system_front'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Brake System (Rear)</label>
                        <input type="text" autocomplete="off" class="form-control" name="mot_brake_system_rear" value="<?php echo set_value('mot_brake_system_rear'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Suspension (Front)</label>
                        <input type="text" autocomplete="off" class="form-control" name="mot_suspension_front" value="<?php echo set_value('mot_suspension_front'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Suspension (Rear)</label>
                        <input type="text" autocomplete="off" class="form-control" name="mot_suspension_rear" value="<?php echo set_value('mot_suspension_rear'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Wheels Type</label>
                        <input type="text" autocomplete="off" class="form-control" name="mot_wheels_type" value="<?php echo set_value('mot_wheels_type'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Front Tire</label>
                        <input type="text" autocomplete="off" class="form-control" name="mot_front_tire" value="<?php echo set_value('mot_front_tire'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Rear Tire</label>
                        <input type="text" autocomplete="off" class="form-control" name="mot_rear_tire" value="<?php echo set_value('mot_rear_tire'); ?>">
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
                        <input type="text" autocomplete="off" class="form-control" name="mot_overall_dimensions" value="<?php echo set_value('mot_overall_dimensions'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Wet/Curb Weight (with oil & fuel)</label>
                        <input type="text" autocomplete="off" class="form-control" name="mot_wet_curb_weight" value="<?php echo set_value('mot_wet_curb_weight'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Dry Weight (without oil & Fuel)</label>
                        <input type="text" autocomplete="off" class="form-control" name="mot_dry_weight" value="<?php echo set_value('mot_dry_weight'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Wheelbase</label>
                        <input type="text" autocomplete="off" class="form-control" name="mot_wheelbase" value="<?php echo set_value('mot_wheelbase'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Seat Height</label>
                        <input type="text" autocomplete="off" class="form-control" name="mot_seat_height" value="<?php echo set_value('mot_seat_height'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Minimum Ground Clearance</label>
                        <input type="text" autocomplete="off" class="form-control" name="mot_minimum_ground_clearance" value="<?php echo set_value('mot_minimum_ground_clearance'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Fuel Capacity (L)</label>
                        <input type="text" autocomplete="off" class="form-control" name="mot_fuel_capacity" value="<?php echo set_value('mot_fuel_capacity'); ?>">
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
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                            <option value="deleted">Deleted</option>
                        </select>
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