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
<div class="row">

    <div class="col-md-12">
                
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
                        <input readonly type="text" class="form-control" name="mot_model" value="<?php echo set_value('mot_model') != NULL ? set_value('mot_model') : $repos['mot_model'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Brand</label>
                        <select disabled class="form-control" name="mot_brand">
                            <option value="Kymco" <?php echo 'Kymco' == $repos['mot_brand'] ? 'selected' : '' ?>>Kymco</option>
                            <option value="Kawasaki" <?php echo 'Kawasaki' == $repos['mot_brand'] ? 'selected' : '' ?>>Kawasaki</option>
                            <option value="Yamaha" <?php echo 'Yamaha' == $repos['mot_brand'] ? 'selected' : '' ?>>Yamaha</option>
                            <option value="Suzuki" <?php echo 'Suzuki' == $repos['mot_brand'] ? 'selected' : '' ?>>Suzuki</option>
                            <option value="Honda" <?php echo 'Honda' == $repos['mot_brand'] ? 'selected' : '' ?>>Honda</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Category (MC Type)</label>
                        <select disabled class="form-control" name="mot_type">
                            <option value="Scooter" <?php echo 'Scooter' == $repos['mot_type'] ? 'selected' : '' ?>>Scooter</option>
                            <option value="Backbone" <?php echo 'Backbone' == $repos['mot_type'] ? 'selected' : '' ?>>Backbone</option>
                            <option value="Underbone" <?php echo 'Underbone' == $repos['mot_type'] ? 'selected' : '' ?>>Underbone</option>
                            <option value="Business" <?php echo 'Business' == $repos['mot_type'] ? 'selected' : '' ?>>Business</option>
                            <option value="ATV" <?php echo 'ATV' == $repos['mot_type'] ? 'selected' : '' ?>>ATV</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Year</label>
                        <input readonly type="text" class="form-control" name="mot_year" value="<?php echo set_value('mot_year') != NULL ? set_value('mot_year') : $repos['mot_year'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Mileage</label>
                        <input readonly type="text" class="form-control" name="mot_mileage" value="<?php echo set_value('mot_mileage') != NULL ? set_value('mot_mileage') : $repos['mot_mileage'] ?>">
                    </div>
                    
                    <div class="form-group">
                        <label>Issue(Optional)</label>
                        <input readonly type="text" class="form-control" name="mot_issue" value="<?php echo set_value('mot_issue') != NULL ? set_value('mot_issue') : $repos['mot_issue'] ?>">
                    </div>
                    
                    <div class="form-group">
                        <label>Remarks</label>
                        <input readonly type="text" class="form-control" name="mot_repo_remarks" value="<?php echo set_value('mot_repo_remarks') != NULL ? set_value('mot_repo_remarks') : $repos['mot_repo_remarks'] ?>">
                    </div>
                    
                    <div class="form-group">
                        <label>Cash Price</label>
                        <input readonly type="text" class="form-control" name="mot_price" value="<?php echo set_value('mot_price') != NULL ? set_value('mot_price') : $repos['mot_price'] ?>">
                    </div>
                    
                    <div class="form-group">
                        <label>Downpayment</label>
                        <input readonly type="text" class="form-control" name="mot_dp" value="<?php echo set_value('mot_dp') != NULL ? set_value('mot_dp') : $repos['mot_dp'] ?>">
                    </div>

                    <div class="form-group">
                        <label>36mos m.a</label>
                        <input readonly type="text" class="form-control" name="mot_ma_36" value="<?php echo set_value('mot_ma_36') != NULL ? set_value('mot_ma_36') : $repos['mot_ma_36'] ?>">
                    </div>

                    <div class="form-group">
                        <label>24mos m.a</label>
                        <input readonly type="text" class="form-control" name="mot_ma_24" value="<?php echo set_value('mot_ma_24') != NULL ? set_value('mot_ma_24') : $repos['mot_ma_24'] ?>">
                    </div>

                    <div class="form-group">
                        <label>12mos m.a</label>
                        <input readonly type="text" class="form-control" name="mot_ma_12" value="<?php echo set_value('mot_ma_12') != NULL ? set_value('mot_ma_12') : $repos['mot_ma_12'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input readonly type="text" class="form-control" name="mot_desc" value="<?php echo set_value('mot_desc') != NULL ? set_value('mot_desc') : $repos['mot_desc'] ?>">
                    </div>

                    <!-- <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="mot_image">
                        </div> -->
                    <div class="form-group">
                        <label>Status</label>
                        <select disabled class="form-control" name="mot_status">
                            <option value="published" <?php echo 'published' == $repos['mot_status'] ? 'selected' : '' ?>>Published</option>
                            <option value="draft" <?php echo 'draft' == $repos['mot_status'] ? 'selected' : '' ?>>Draft</option>
                            <option value="deleted" <?php echo 'deleted' == $repos['mot_status'] ? 'selected' : '' ?>>Deleted</option>
                            <option value="for approval" <?php echo 'for approval' == $repos['mot_status'] ? 'selected' : '' ?>>For approval</option>
                        </select>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="<?php echo $back ?>" class="btn btn-default btn-flat">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back
                    </a>
                    <?php if ( $this->session->userdata('acc_type') == 'super admin' || $this->session->userdata('acc_type') == 'admin' ) :?>
                    <a href="<?php echo $edit ?>" class="btn btn-primary btn-flat pull-right">
                    <i class="fa fa-edit" aria-hidden="true"></i> Edit
                    </a>
                    <?php endif;?>
                </div>
            </div>

    </div>

    <div class="col-md-12">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Images</h3>
                    <div class="box-tools pull-right">
                    </div>
                    <!-- /.box-tools -->
                </div>
                <div class="box-body">
                
                <form class="form-inline" method="POST" enctype="multipart/form-data">
                   
                    <input type="hidden" name="mot_id" value="<?php echo $repo[0]['mot_id']?>">
                    <div class="form-group">
                            <label>Upload</label>
                            <input type="file" name="mop_image[]" multiple="multiple">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-flat btn-xs" style="margin-top: 20px;">
                        <i class="fa fa-check" aria-hidden="true"></i> Submit Image
                        </button>
                    </div>
                </form>

                <br>

                <?php foreach($repo_pictures as $repo_picture): ?>

                    <?php if ( $repo_picture['mop_image'] == 'none' ):?>

                        <div class="card_motors">
                            <div class="close">
                                <a href="<?php echo base_url('admin/repo/delete_picture'). '/' . $repo_picture['mop_id'] . '/'. $repo[0]['mot_id'] ?>"><i class="fa fa-times" style="color: red;"></i></a>
                            </div>
                            <img class='img-responsive img-thumbnail' src="https://dummyimage.com/620x485/4a4a4a/ffffff.jpg&text=No+Image" style="width: 204px; height: auto;margin-bottom: 5px;"/>
                        </div>
                        
                    <?php else:?>

                        <div class="card_motors">
                            <div class="close">
                                <a href="<?php echo base_url('admin/repo/delete_picture'). '/' . $repo_picture['mop_id'] . '/'. $repo[0]['mot_id'] ?>"><i class="fa fa-times" style="color: red;"></i></a>
                            </div>
                            <img class='img-responsive img-thumbnail' src="<?php echo base_url() . $repo_picture['mop_image']?>" style="width: 204px; height: auto;margin-bottom: 5px;"/>
                            <br>
                            <label><?php echo $repo_picture['mop_imgview']?></label>
                        </div>

                    <?php endif;?> 

                <?php endforeach; ?> 

                </div>
                
                <!-- /.box-body -->
            </div>
        </div>


    
</div>

<div class="row">
    <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Dealers List</h3>
                    <div class="box-tools pull-right">
                    </div>
                    <!-- /.box-tools -->
                </div>
                <div class="box-body">

                    <table class="table table-bordered table-hover" width="100%"> 
                        <thead>
                            <tr>
                                <th>Dealer</th>
                                <th>Branch</th>
                                <!-- <th>Price</th> -->
                                <th>Downpayment</th>
                                <th>36 mos</th>
                                <th>24 mos</th>
                                <th>12 mos</th>
                                <!-- <th>Promo</th> -->
                            </tr>
                        </thead>
                        <tbody> 
                            <tr>
                                <td><?php echo $repos['dea_name']?></td>
                                <td><?php echo $repos['name']?></td>
                                <!-- <td><?php echo $repos['dem_price']?></td> -->
                                <td><?php echo $repos['mot_dp']?></td>
                                <td><?php echo $repos['mot_ma_36']?></td>
                                <td><?php echo $repos['mot_ma_24']?></td>
                                <td><?php echo $repos['mot_ma_12']?></td>
                                <!-- <td><?php echo $repos['dem_promo']?></td> -->
                            </tr>   
                        </tbody>
                    </table>

                </div>
                <!-- /.box-body -->
            </div>
    </div>
</div>


<?php endforeach; ?> 