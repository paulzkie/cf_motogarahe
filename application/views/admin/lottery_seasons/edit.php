<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">
            <form method="POST">
              <?php foreach($lottery_seasons as $lottery_season): ?>
                <div class="box-body">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Season Name</label>
                        <input type="text" class="form-control" name="los_name" value="<?php echo $lottery_season['los_name'] ?>" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label>Max users</label>
                        <input type="text" class="form-control" name="los_max_usr" value="<?php echo $lottery_season['los_max_usr'] ?>" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="los_status">
                            <option value="published" <?php echo 'published' == $lottery_season['los_status'] ? 'selected' : '' ?>>Published</option>
                            <option value="draft" <?php echo 'draft' == $lottery_season['los_status'] ? 'selected' : '' ?>>Draft</option>
                            <option value="deleted" <?php echo 'deleted' == $lottery_season['los_status'] ? 'selected' : '' ?>>Deleted</option>
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