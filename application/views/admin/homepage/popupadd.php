<button id="myBtn" hidden="">Open Modal</button>
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2 class="popuuptitle"></h2>
    </div>
    <div class="modal-body popupcontent">
        <form method="POST" enctype="multipart/form-data" id="uploadbanner">
            <input type="hidden" name="addbanner" value="addbanner">
            <div class="row">
                <div class="col-md-8">
                        
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">New Banner</h3>
                            <div class="box-tools pull-right">
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <div class="box-body">

                            <div class="form-group">
                                <label>Banner Title</label>
                                <input type="text" autocomplete="off" class="form-control" name="bannertitle">
                            </div>

                            <div class="form-group">
                                <label>Banner description</label>
                                <textarea  class="form-control" class="form-control" name="bannerdesc" cols="30" rows="3"></textarea>
                            </div>


                            <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="bannerimg" onchange="readURL(this);">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-4" style="text-align: center;border: solid 1px;padding:10px;">
                    <img src="" id="imgprev" style="width: 100%;">
                </div>

                <div class="col-md-8">
                    <div class="box box-primary">
          
                        <div class="box-body">

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
                            <button class="btn btn-primary btn-flat pull-right">
                                <i class="fa fa-check" aria-hidden="true"></i> Save
                            </button>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
    </div>
  </div>
</div>