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


<form method="POST" enctype="multipart/form-data">
<div class="row">

    <div class="col-md-8">
            
            <input autocomplete="off" type="hidden" name="deb_id" value="<?php echo $this->session->userdata('deb_id');?>">

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
                        <input autocomplete="off" type="text" class="form-control" name="mot_model" value="">
                    </div>

                    <div class="form-group">
                        <label>Brand</label>
                        <select class="form-control" name="mot_brand">
                            <option value="Kymco">Kymco</option>
                            <option value="Kawasaki">Kawasaki</option>
                            <option value="Yamaha" >Yamaha</option>
                            <option value="Suzuki">Suzuki</option>
                            <option value="Honda">Honda</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Category (MC Type)</label>
                        <select class="form-control" name="mot_type">
                            <option value="Scooter" >Scooter</option>
                            <option value="Backbone" >Backbone</option>
                            <option value="Underbone">Underbone</option>
                            <option value="Business">Business</option>
                            <option value="ATV" >ATV</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Year</label>
                        <input autocomplete="off" type="text" class="form-control" name="mot_year" value="">
                    </div>

                    <div class="form-group">
                        <label>Mileage</label>
                        <input autocomplete="off" type="text" class="form-control" name="mot_mileage" value="">
                    </div>

                    <div class="form-group">
                        <label>Downpayment</label>
                        <input autocomplete="off" type="text" class="form-control" name="mot_dp" value="">
                    </div>

                    <div class="form-group">
                        <label>36mos m.a</label>
                        <input autocomplete="off" type="text" class="form-control" name="mot_ma_36" value="">
                    </div>

                    <div class="form-group">
                        <label>24mos m.a</label>
                        <input autocomplete="off" type="text" class="form-control" name="mot_ma_24" value="">
                    </div>

                    <div class="form-group">
                        <label>12mos m.a</label>
                        <input autocomplete="off" type="text" class="form-control" name="mot_ma_12" value="">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input autocomplete="off" type="text" class="form-control" name="mot_desc" value="">
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



