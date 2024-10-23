<div class="row">
    <div class="col-md-8">
        <form method="POST" enctype="multipart/form-data">
            <div class="box box-primary">
                <div class="box-body">

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="pro_name" value="<?php echo set_value('pro_name'); ?>">
                    </div> 

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="pro_desc" value="<?php echo set_value('pro_desc'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Package</label>
                        <input type="text" class="form-control" name="pro_package" value="<?php echo set_value('pro_package'); ?>">
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="pro_image">
                    </div>

                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control" name="pro_type">
                            <option value="accomplished">Accomplished</option>
                            <option value="on-going">On-going</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="pro_status">
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
        </form>    
    </div>
</div>