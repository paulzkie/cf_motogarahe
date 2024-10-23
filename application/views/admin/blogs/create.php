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
<form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
                
            <div class="box box-primary">
                <div class="box-body">

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" autocomplete="off" class="form-control" name="blo_title" value="<?php echo set_value('blo_title'); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" autocomplete="off" class="form-control" name="blo_author" value="<?php echo set_value('blo_author'); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Main Image</label>
                        <input type="file" name="blo_image" required>
                    </div> 

                    <div class="form-group">
                        <label>Description</label>
                        <!-- <input type="text" autocomplete="off" > -->
                        <textarea class="form-control" name="blo_desc" value="<?php echo set_value('blo_desc'); ?>" required cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="wysihtml5" 
                          style="width: 100%; height: 700px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="blo_content" value="<?php echo set_value('blo_content'); ?>" required></textarea>
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
