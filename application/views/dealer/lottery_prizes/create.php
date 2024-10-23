<div class="row">
    <div class="col-md-8">
        <form method="POST" enctype="multipart/form-data">
            <div class="box box-primary">
                <div class="box-body">

                    <div class="form-group">
                        <label>Prize Name</label>
                        <input type="text" class="form-control" name="lop_name" value="<?php echo set_value('lop_name'); ?>">
                    </div> 

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="lop_img">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="lop_status">
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