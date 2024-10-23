
<style>
.modal-backdrop {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1 !important;
    background-color: #000;
}
</style>
<?php foreach($blogs as $blog): ?>
<div class="row">

    <div class="col-md-12">
                
            <div class="box box-primary">
                <div class="box-body">

                    <div class="form-group">
                        <label>Title</label>
                        <input readonly type="text" autocomplete="off" class="form-control" name="blo_title" value="<?php echo set_value('blo_title') != NULL ? set_value('blo_title') : $blog['blo_title'] ?>" >
                    </div>

                    <div class="form-group">
                        <label>Author</label>
                        <input readonly type="text" autocomplete="off" class="form-control" name="blo_author" value="<?php echo set_value('blo_author') != NULL ? set_value('blo_author') : $blog['blo_author'] ?>" >
                    </div>

                    <div class="form-group">
                        <label>Main Image</label>
                        <img src="<?php echo base_url() . $blog['blo_image']?>" alt="" width="500">

                    </div> 

                    <!-- <div class="form-group">
                        <label>Description</label>
                        <input readonly type="text" autocomplete="off" class="form-control" name="blo_desc" value="<?php echo set_value('blo_desc') != NULL ? set_value('blo_desc') : $blog['blo_desc'] ?>">
                    </div> -->

                    <div class="form-group">
                        <label>Description</label>
                        <textarea disabled class="form-control" class="form-control" name="blo_desc" cols="30" rows="10" name="blo_desc"><?php echo set_value('blo_desc') != NULL ? set_value('blo_desc') : $blog['blo_desc'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Content</label>
                        <textarea disabled class="wysihtml5" 
                          style="width: 100%; height: 700px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="blo_content">
                              <?php echo set_value('blo_content') != NULL ? set_value('blo_content') : $blog['blo_content'] ?>

                          </textarea>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select readonly class="form-control" name="blo_status">
                            <option value="published" <?php echo 'published' == $blog['blo_status'] ? 'selected' : '' ?>>Published</option>
                            <option value="draft" <?php echo 'draft' == $blog['blo_status'] ? 'selected' : '' ?>>Draft</option>
                            <option value="deleted" <?php echo 'deleted' == $blog['blo_status'] ? 'selected' : '' ?>>Deleted</option>
                        </select>
                    </div>







                </div>
                
                <div class="box-footer">
                    <a href="<?php echo $back ?>" class="btn btn-default btn-flat">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back
                    </a>

                    <a href="<?php echo $edit ?>" class="btn btn-primary btn-flat pull-right">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Edit
                    </a>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
</div>

<?php endforeach; ?> 