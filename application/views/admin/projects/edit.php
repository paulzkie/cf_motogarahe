<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">
            <form method="POST" enctype="multipart/form-data">
                <?php foreach($projects as $project): ?>
                <div class="box-body">

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="pro_name" value="<?php echo set_value('pro_name') != NULL ? set_value('pro_name') : $project['pro_name'] ?>">
                    </div>  

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="pro_desc" value="<?php echo set_value('pro_desc') != NULL ? set_value('pro_desc') : $project['pro_desc'] ?>">
                    </div>  

                    <div class="form-group">
                        <label>Package</label>
                        <input type="text" class="form-control" name="pro_package" value="<?php echo set_value('pro_package') != NULL ? set_value('pro_package') : $project['pro_package'] ?>">
                    </div>  

                    <img src="<?php echo $project['pro_image'] ?>" class="img img-responsive">

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="pro_image">
                    </div>

                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control" name="pro_type">
                            <option value="accomplished" <?php echo 'accomplished' == $project['pro_type'] ? 'selected' : '' ?>>Accomplished</option>
                            <option value="on-going" <?php echo 'on-going' == $project['pro_type'] ? 'selected' : '' ?>>On-going</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="pro_status">
                            <option value="published" <?php echo 'published' == $project['pro_status'] ? 'selected' : '' ?>>Published</option>
                            <option value="draft" <?php echo 'draft' == $project['pro_status'] ? 'selected' : '' ?>>Draft</option>
                            <option value="deleted" <?php echo 'deleted' == $project['pro_status'] ? 'selected' : '' ?>>Deleted</option>
                        </select>
                    </div>

                </div>
                <?php endforeach; ?>  
                <div class="box-footer">
                    <a href="<?php echo $back ?>" class="btn btn-default btn-flat">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back
                    </a>
                    <button type="submit" class="btn btn-primary btn-flat pull-right">
                    <i class="fa fa-check" aria-hidden="true"></i> Save
                    </button>
                </div>
                <!-- /.box-body -->
            </form>
        </div>
    </div>
</div>
