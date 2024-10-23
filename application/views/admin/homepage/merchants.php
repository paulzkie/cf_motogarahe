<script type="text/javascript">
    //add banner
    $(document).ready(function (e){
            $("#uploadmerchants").on('submit',(function(e){
            e.preventDefault();
            if($(".merchantname").val()==""){
              data = "Enter merchant name!";
              $("#msgdesc").html(data);
              $("#myModalmsg").show();
            }
            else if($(".username").val()==""){
              data = "Enter username!";
              $("#msgdesc").html(data);
              $("#myModalmsg").show();
            }
            else if($(".password").val()==""){
              data = "Enter password!";
              $("#msgdesc").html(data);
              $("#myModalmsg").show();
            }
            else if($(".img").val()==""){
              data = "No image attach! Please attach image!";
              $("#msgdesc").html(data);
              $("#myModalmsg").show();
            }
            else{
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>" + "admin/homepage/addhomepageimg",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data){
                        $("#msgdesc").html(data);
                        $("#myModalmsg").show();
                        $("#table_section").load("<?php echo base_url()?>" + "admin/homepage/merchants/index/xallx/xallx"+" .tablesorter");
                        document.getElementById('uploadmerchants').reset();
                    },
                    beforeSend:function(){
                           // $("#showpopup").html("<center><img src='assets/images/loadingqrcode.gif'><img src='assets/images/loadingspin.gif' width='70' height='70'>");   
                    },           
                    });
              }
                }));
    });
   //update banner
   $(document).ready(function (e){
            $("#uploadupdatemerchants").on('submit',(function(e){
            e.preventDefault();
            if($(".updatemerchantname").val()==""){
              data = "Enter merchant name!";
              $("#msgdesc").html(data);
              $("#myModalmsg").show();
            }
            else if($(".updateusername").val()==""){
              data = "Enter username!";
              $("#msgdesc").html(data);
              $("#myModalmsg").show();
            }
            else{
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>" + "admin/homepage/updatehomepageimg",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data){
                        $("#msgdesc").html(data);
                        $("#myModalmsg").show();
                        $("#table_section").load("<?php echo base_url()?>" + "admin/homepage/merchants/index/xallx/xallx"+" .tablesorter");
                        document.getElementById('uploadupdatemerchants').reset();
                    },
                    beforeSend:function(){
                           // $("#showpopup").html("<center><img src='assets/images/loadingqrcode.gif'><img src='assets/images/loadingspin.gif' width='70' height='70'>");   
                    },           
                    });
            }
                }));
    });

   $(document).on("click","#genpw",function(e){
      //alert(Math.random().toString(36).slice(-8));
      $("#genpw").val(Math.random().toString(36).slice(-8));
      copyText = document.getElementById("genpw");
      copyText.select();
      copyText.setSelectionRange(0, 99999)
      document.execCommand("copy");
      alert("Password copied! \n"+copyText.value);
   })

   $(document).on("click",".btnAdd",function(){
        popuuptitle = "ADD MERCHANT";
        $("#myModal").show();
        $(".popuuptitle").html(popuuptitle);
   });

   $(document).on("click",".btnRemove",function(){
        merchantname = $(this).data("title");
        if(confirm('Are you sure you want to delete this data? '+ '('+merchantname+')')==true){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url()?>"+ "admin/homepage/removehomepageimg",
                data: {merchant: 'merchant', id:  $(this).data("id") },
                success: function(data){
                    $("#msgdesc").html(data);
                    $("#myModalmsg").show();
                    $("#table_section").load("<?php echo base_url()?>" + "admin/homepage/merchants/index/xallx/xallx"+" .tablesorter");
                },
                beforeSend:function(){
                // $("#showpopup").html("<center><img src='assets/images/loadingqrcode.gif'><img src='assets/images/loadingspin.gif' width='70' height='70'>");   
                },  
            });
        }
   });

   $(document).on("click",".btnEdit",function(){
        popuuptitle = "UPDATE MERCHANT";
        merchantid = $(this).data("id");
        merchantname = $(this).data("title");
        merchantdesc = $(this).data("desc");
        img = $(this).data("img");
        username =  $(this).data("username");
        //window.history.pushState("state","title","<?php echo base_url()?>admin/homepage/banners/index/xallx/xallx/"+bannerid+"/"+bannertitle+"/"+bannerdesc);
        $("#myModaledit").show();
        $(".merchantid").val(merchantid);
        $(".updatemerchantname").val(merchantname);
        $(".updatedesc").html(merchantdesc);
        $(".updateusername").val(username);
        document.getElementById("merchantdesc").defaultValue = merchantdesc;
        document.getElementById("imgdisplay").src = "<?php echo base_url()?>"+img;
        $(".popuuptitle").html(popuuptitle);
   });

   //filter banners
   function myFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("example1");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }       
      }
  }
    
    $(document).on("click",".btnAll",function(){
          document.getElementById("myInput1").value="";
          input = document.getElementById("myInput1");
          filter = input.value.toUpperCase();
          table = document.getElementById("example1");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[5];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }       
          }
    });

    $(document).on("click",".btnPublished",function(){
          document.getElementById("myInput1").value="published";
          input = document.getElementById("myInput1");
          filter = input.value.toUpperCase();
          table = document.getElementById("example1");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[5];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }       
          }
    });

    $(document).on("click",".btnDraft",function(){
          document.getElementById("myInput1").value="draft";
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput1");
          filter = input.value.toUpperCase();
          table = document.getElementById("example1");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[5];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }       
          }
    });

    $(document).on("click",".btnDel",function(){
          document.getElementById("myInput1").value="deleted";
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput1");
          filter = input.value.toUpperCase();
          table = document.getElementById("example1");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[5];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }       
          }
    });
</script>
<div class="row">
    <div class="col-md-3 col-filter">
        <a href="javascript:;" class="btn btn-primary btn-block btn-flat margin-bottom btnAdd">
        <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Merchants
        </a>    
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Filter</h3>
            </div>
            <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                    <li>
                        <a href="javascript:;" class="btnAll"><i class="fa fa-circle-o"></i> All</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="btnPublished"><i class="fa fa-circle-o text-blue"></i> Published </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="btnDraft"><i class="fa fa-circle-o text-yellow"></i> Draft </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="btnDel"><i class="fa fa-circle-o text-red"></i> Delete</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <div class="col-md-9">
        <input type="hidden" id="myInput1">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Manage Merchants</h3>
                <div class="box-tools">
                <form method="POST" class="form-inline">
                    <div class="form-group">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" name="search_val" class="form-control pull-right" placeholder="Search" id="myInput" onkeyup="myFunction()">
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
                        
                        <?php 
                        $current_count_start=0;    
                        $x = 1; if ( isset( $merchant ) ):?>
                            <?php foreach($merchant as $merchants): ?>
                                <tr>
                                    <?php $current_count_start++?>
                                    <!-- <td><input type="checkbox"></td> -->
                                    <td><p><?php echo $current_count_start;?></p></td>
                                    <td>
                                        <?php if ( $merchants['merchantimg'] == 'none' ):?>
                                            <img src="https://dummyimage.com/620x485/4a4a4a/ffffff.jpg&text=No+Image" class="img-responsive">
                                        <?php else:?>
                                            <img src="<?php echo base_url() . $merchants['merchantimg'] ?>" class="img-responsive">
                                        <?php endif;?>    
                                    </td>
                                    <td><a href="javascript:;" class="btnEdit" data-id="<?php echo $merchants['merchantid']?>" 
                                                data-title="<?php echo $merchants['merchantname']?>"
                                                data-desc="<?php echo $merchants['merchantdesc']?>"
                                                data-img="<?php echo $merchants['merchantimg']?>"
                                                data-username="<?php echo $merchants['username']?>"
                                                data-password="<?php echo $merchants['password']?>">
                                        <?php echo $merchants['merchantname'] ?>
                                    </a></td>
                                    <td><?php echo base_url() . $merchants['merchantimg'] ?></td>
                                    <td><?php echo date("F j, Y, g:i a",strtotime($merchants['datecreated'])) ?></td>
                                    <td>
                                        <?php
                                            $label = '';

                                            if ( $merchants['status'] == 'published' ) {
                                                $label = 'label-success';
                                            } elseif ( $merchants['status'] == 'draft' ) {
                                                $label = 'label-warning';
                                            } elseif ( $merchants['status'] == 'deleted' ) {
                                                $label = 'label-danger';
                                            }
                                        ?>
                                      <span class="label <?php echo $label;?>"><?php echo $merchants['status'] ?></span>
                                    </td>
                                    <td>    
                                        <div class="tools">
                                            <?php if ( $this->session->userdata('acc_type') == 'super admin' || $this->session->userdata('acc_type') == 'admin' ) :?>
                                            <a href="javascript:;" class="btnEdit" data-id="<?php echo $merchants['merchantid']?>" 
                                                data-title="<?php echo $merchants['merchantname']?>"
                                                data-desc="<?php echo $merchants['merchantdesc']?>"
                                                data-img="<?php echo $merchants['merchantimg']?>"
                                                data-username="<?php echo $merchants['username']?>"
                                                data-password="<?php echo $merchants['password']?>"><i class="fa fa-edit"></i></a>
                                            <?php
                                            if ( $merchants['status'] == 'deleted' ) {
                                                
                                            }else{ ?>
                                             <a href="javascript:;" class="btnRemove" data-id="<?php echo $merchants['merchantid']?>" 
                                                data-title="<?php echo $merchants['merchantname']?>"><i class="fa fa-trash-o"></i></a>                       
                                            <?php } endif;?>
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
<!--popup for adding merchants-->
<button id="myBtn" hidden="">Open Modal</button>
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2 class="popuuptitle"></h2>
    </div>
    <div class="modal-body popupcontent">
        <form method="POST" enctype="multipart/form-data" id="uploadmerchants">
          <input type="hidden" name="addmerchant" value="addmerchant">
            <div class="row">
                <div class="col-md-8">
                        
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">New Merchants</h3>
                            <div class="box-tools pull-right">
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <div class="box-body">

                            <div class="form-group">
                                <label>Merchant Name</label>
                                <input type="text" autocomplete="off" class="form-control merchantname" name="merchantname">
                            </div>

                            <div class="form-group">
                                <label>Merchant description</label>
                                <textarea  class="form-control" class="form-control desc" name="merchantdesc" cols="30" rows="3"></textarea>
                            </div>


                            <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="merchantimg" onchange="readURL(this);" class="img">
                            </div>

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" autocomplete="off" class="form-control username" name="username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" autocomplete="off" class="form-control password" name="password" id="genpw"
                                placeholder="Click here to generate password and copy.">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-4" style="text-align: center;">
                    <img src="" id="imgprev">
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
<!--popup for updating merchants-->
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
<button id="myBtnedit" hidden="">Open Modal</button>
<div id="myModaledit" class="modaledit">
  <!-- Modal content -->
  <div class="modal-contentedit">
    <div class="modal-headeredit">
      <span class="closeedit">&times;</span>
      <h2 class="popuuptitle"></h2>
    </div>
    <div class="modal-bodyedit popupcontent">
        <form method="POST" enctype="multipart/form-data" id="uploadupdatemerchants">
            <input type="hidden" name="merchantid" class="merchantid">
            <input type="hidden" name="updatemerchant" value="updatemerchant">
            <div class="row">
                <div class="col-md-8">
                        
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Merchant</h3>
                            <div class="box-tools pull-right">
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <div class="box-body">

                            <div class="form-group">
                                <label>Merchant Name</label>
                                <input type="text" autocomplete="off" class="form-control updatemerchantname" name="merchantname">
                            </div>

                            <div class="form-group">
                                <label>Merhant description</label>
                                <textarea  class="form-control" class="form-control updatedesc" name="merchantdesc" id="merchantdesc" cols="30" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="merchantimg" onchange="readURL(this);">
                            </div>

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" autocomplete="off" class="form-control updateusername" name="username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" autocomplete="off" class="form-control updatepassword" name="password">
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
                                <select class="form-control" name="mot_status">
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
<script type="text/javascript">
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    } 
</script>