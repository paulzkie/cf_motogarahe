<script>
//index
var myVar;
$(document).ready(function (e){
    $("#updatedealer").on('submit',(function(e){
            e.preventDefault();
            if($(".updatedea_name").val()==""){
              data = "Enter dealer name!";
              $("#msgdesc").html(data);
              $("#myModalmsg").show();
            }
            else if(document.getElementById("updatedea_slug").value==""){
              data = "Enter dealer slug!";
              $("#msgdesc").html(data);
              $("#myModalmsg").show();
            }else if(document.getElementById("updatedea_email").value==""){
              data = "Enter email!";
              $("#msgdesc").html(data);
              $("#myModalmsg").show();
            }
            else{
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>" + "admin/dealerbranches/updatedealer",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data){
                        $("#msgdesc").html(data);
                        $("#myModalmsg").show();
                        $("#table_section").load("<?php echo base_url()?>" + "admin/dealerbranches/dealers/xallx/xallx"+" .tablesorter");
                        document.getElementById('updatedealer').reset();
                        myVar = setInterval(myTimer, 2000);   
                    },
                    beforeSend:function(){
                        $("#msgdesc").html("<center><img src='<?php echo base_url()?>uploads/icon/loadingspin.gif' width='70' height='70'>");
                        $("#myModalmsg").show();   
                    },           
                });
            }
    }));
});
$(document).on("click","#btnEdit",function(){
        popuuptitle = "UPDATE DEALER";
        id = $(this).data("id");
        dea_name = $(this).data("dea_name");
        dea_slug = $(this).data("dea_slug");
        dea_email = $(this).data("repo_slot");
        slot = $(this).data("dea_email");
        img = $(this).data("img");
        //window.history.pushState("state","title","<?php echo base_url()?>admin/homepage/banners/index/xallx/xallx/"+bannerid+"/"+bannertitle+"/"+bannerdesc);
        $("#myModaledit").show();
        $(".dea_id").val(id);
        $(".updatedea_name").val(dea_name);
        $(".updatedea_slug").val(dea_slug);
        $(".updatedea_email").val(dea_email);
        $(".updateslot").val(slot);
        document.getElementById("updatedea_name").defaultValue = dea_name;
        document.getElementById("updatedea_email").defaultValue = dea_email;
        document.getElementById("imgdisplay").src = "<?php echo base_url()?>"+img;
        $(".popuuptitle").html(popuuptitle);
});

//hide popup
function myTimer() {
  $("#myModalmsg").hide();
  $("#myModaledit").hide();
  clearTimeout(myVar);
}
</script>
<div class="row">
    <div class="col-md-3 col-filter">
        <!--<a href="<?php echo $create?>" class="btn btn-primary btn-block btn-flat margin-bottom">-->
        <!--<i class="fa fa-plus-circle" aria-hidden="true"></i> Create-->
        <!--</a>    -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Filter</h3>
            </div>
            <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                    <li>
                        <a href="<?php echo $all?>"><i class="fa fa-circle-o"></i> All</a>
                    </li>
                    <li>
                        <a href="<?php echo $published?>"><i class="fa fa-circle-o text-blue"></i> Published </a>
                    </li>
                    <li>
                        <a href="<?php echo $draft?>"><i class="fa fa-circle-o text-yellow"></i> Draft </a>
                    </li>
                    <li>
                        <a href="<?php echo $deleted?>"><i class="fa fa-circle-o text-red"></i> Delete</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Manage Motorcycles</h3>
                <div class="box-tools">
                <form method="GET" action="<?php echo base_url()?>admin/dealerbranches/dealers" class="form-inline">
                    <div class="form-group">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" name="search_val" class="form-control pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button type="submit" name="search_mode" value="search_mode" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>    
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="table-responsive mailbox-messages" id="table_section">
                    <table id="example1" class="table table-hover table-striped tablesorter">
                        <tbody>
                        
                        <?php $x = 1; if ( isset($dealers) ):?>
                            <?php foreach($dealers as $dealer): ?>
                                <tr>
                                    <td><p><?php echo $dealer['dea_id'];?></p></td>
                                    <td><?php echo $dealer['dea_name'] ?></td>
                                    <td><?php echo $dealer['dea_slug'] ?></td>
                                    <td><?php echo $dealer['dea_email'] ?></td>
                                    <td>
                                        <?php
                                            $label = '';

                                            if ( $dealer['dea_status'] == 'published' ) {
                                                $label = 'label-success';
                                            } elseif ( $dealer['dea_status'] == 'draft' ) {
                                                $label = 'label-warning';
                                            } elseif ( $dealer['dea_status'] == 'deleted' ) {
                                                $label = 'label-danger';
                                            }
                                        ?>
                                        <span class="label <?php echo $label;?>"><?php echo $dealer['dea_status'] ?></span>
                                    </td>
                                    <td>    
                                        <div class="tools">
                                            <a href="javascript:;" id="btnEdit" data-id="<?php echo $dealer['dea_id'];?>"
                                            data-dea_name="<?php echo $dealer['dea_name'];?>"
                                            data-dea_slug="<?php echo $dealer['dea_slug'];?>"
                                            data-dea_email="<?php echo $dealer['dea_email'];?>"
                                            data-repo_slot="<?php echo $dealer['repo_slot'];?>">
                                            <i class="fa fa-edit"></i></a>
                                            <a href=""><i class="fa fa-trash-o"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php $x++?>
                            <?php endforeach;?>
                        <?php endif;?>
                        </tbody>
                    </table>   
                    <!-- /.table -->
                </div>

                <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->

        </div>
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>

<button id="myBtnedit" hidden="">Open Modal</button>
<div id="myModaledit" class="modaledit">
  <!-- Modal content -->
  <div class="modal-contentedit">
    <div class="modal-headeredit">
      <span class="closeedit">&times;</span>
      <h2 class="popuuptitle"></h2>
    </div>
    <div class="modal-bodyedit popupcontent">
        <form method="POST" enctype="multipart/form-data" id="updatedealer">
            <input type="hidden" name="dea_id" class="dea_id">
            <input type="hidden" name="updatedealer" value="updatedealer">
            <div class="row">
                <div class="col-md-8">
                        
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Dealer</h3>
                            <div class="box-tools pull-right">
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <div class="box-body">

                            <div class="form-group">
                                <label>Dealer Name</label>
                                <input type="text" autocomplete="off" class="form-control updatedea_name" id="updatedea_name" name="updatedea_name" readonly>
                            </div>
                            
                            <div class="form-group">
                                <label>Dealer Slug</label>
                                <input type="text" autocomplete="off" class="form-control updatedea_slug" id="updatedea_slug" name="updatedea_slug" readonly>
                            </div>
                            
                            <div class="form-group">
                                <label>Dealer Email</label>
                                <input type="text"  class="form-control" class="form-control updatedea_email" id="updatedea_email" name="updatedea_email"></textarea>
                            </div>

                            <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="updatedea_img" onchange="readURL(this);">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4" style="text-align: center;">
                    <img src="" id="imgdisplay">
                </div>
                <div class="col-md-8">
                    <div class="box box-primary">
          
                        <div class="box-body">

                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="dea_status">
                                    <option value="published">Published</option>
                                    <option value="draft">Draft</option>
                                    <option value="deleted">Deleted</option>
                                </select>
                            </div>

                        </div>
                        <div class="box-footer">
                            <button class="btn btn-primary btn-flat pull-right">
                                <i class="fa fa-check" aria-hidden="true"></i> Update
                            </button>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                
            </div>
        </form>
    </div>
    <div class="modal-footeredit">
    </div>
  </div>
</div>
<!--popup for updating dealer-->
 <style>
    /* The Modal (background) */
    .modaledit {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 999; /* Sit on top */
      padding-top: 70px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-contentedit {
      position: relative;
      background-color: #fefefe;
      margin: auto;
      padding: 0;
      border: 1px solid #888;
      width: 80%;
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
      -webkit-animation-name: animatetop;
      -webkit-animation-duration: 0.4s;
      animation-name: animatetop;
      animation-duration: 0.4s
    }

    /* Add Animation */
    @-webkit-keyframes animatetop {
      from {top:-300px; opacity:0} 
      to {top:0; opacity:1}
    }

    @keyframes animatetop {
      from {top:-300px; opacity:0}
      to {top:0; opacity:1}
    }

    /* The Close Button */
    .closeedit {
      color: black;
      float: right;
      font-size: 35px;
      font-weight: bold;
    }

    .closeedit:hover,
    .closeedit:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }

    .modal-headeredit {
      padding: 2px 16px;
      background-color: #f39c12;
      color: white;
    }

    .modal-bodyedit {padding: 2px 16px;}

    .modal-footeredit {
      padding: 2px 16px;
      background-color: #f39c12;
      color: white;
    }

  </style>
<script type="text/javascript">
    // Get the modal
    var modaledit = document.getElementById("myModaledit");

    // Get the button that opens the modal
    var btnedit = document.getElementById("myBtnedit");

    // Get the <span> element that closes the modal
    var spanedit = document.getElementsByClassName("closeedit")[0];

    // When the user clicks the button, open the modal 
    btnedit.onclick = function() {
      modaledit.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    spanedit.onclick = function() {
      modaledit.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modaledit) {
        modaledit.style.display = "none";
      }
    } 
</script>