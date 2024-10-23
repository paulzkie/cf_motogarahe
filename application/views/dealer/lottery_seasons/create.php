<div class="row">
    <div class="col-md-8">
        <form method="POST">
            <div class="box box-primary">
                <div class="box-body">
                    <!-- text input -->

                    <div class="form-group">
                        <label>Season Name</label>
                        <input type="text" class="form-control" name="los_name">
                    </div>
                    <div class="form-group">
                        <label>Max users</label>
                        <input type="text" class="form-control" name="los_max_usr">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="los_status">
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