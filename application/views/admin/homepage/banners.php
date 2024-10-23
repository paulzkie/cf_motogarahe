<script type="text/javascript">
    //add banner
    $(document).ready(function (e){
            $("#uploadbanner").on('submit',(function(e){
            e.preventDefault();
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
                        $("#table_section").load("<?php echo base_url()?>" + "admin/homepage/banners/index/xallx/xallx"+" .tablesorter");
                        document.getElementById('uploadbanner').reset();
                            
                    },
                    beforeSend:function(){
                           // $("#showpopup").html("<center><img src='assets/images/loadingqrcode.gif'><img src='assets/images/loadingspin.gif' width='70' height='70'>");   
                    },           
                    });
                }));
    });
   //update banner
   $(document).ready(function (e){
            $("#uploadupdatebanner").on('submit',(function(e){
            e.preventDefault();
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
                        $("#table_section").load("<?php echo base_url()?>" + "admin/homepage/banners/index/xallx/xallx"+" .tablesorter");
                        document.getElementById('uploadbanner').reset();

                    },
                    beforeSend:function(){
                           // $("#showpopup").html("<center><img src='assets/images/loadingqrcode.gif'><img src='assets/images/loadingspin.gif' width='70' height='70'>");   
                    },           
                    });
                }));
    });

   $(document).on("click",".btnAdd",function(){
        popuuptitle = "ADD BANNER";
        $("#myModal").show();
        $(".popuuptitle").html(popuuptitle);
   });

   $(document).on("click",".btnRemove",function(){
        bannertitle = $(this).data("title");
        if(confirm('Are you sure you want to delete this data? '+ '('+bannertitle+')')==true){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url()?>"+ "admin/homepage/removehomepageimg",
                data: {banner:'banner', id:  $(this).data("id") },
                success: function(data){
                    $("#msgdesc").html(data);
                    $("#myModalmsg").show();
                    $("#table_section").load("<?php echo base_url()?>" + "admin/homepage/banners/index/xallx/xallx"+" .tablesorter");
                },
                beforeSend:function(){
                // $("#showpopup").html("<center><img src='assets/images/loadingqrcode.gif'><img src='assets/images/loadingspin.gif' width='70' height='70'>");   
                },  
            });
        }
   });

   $(document).on("click",".btnEdit",function(){
        popuuptitle = "UPDATE BANNER";
        bannerid = $(this).data("id");
        bannertitle = $(this).data("title");
        bannerdesc = $(this).data("desc");
        img = $(this).data("img");
        //window.history.pushState("state","title","<?php echo base_url()?>admin/homepage/banners/index/xallx/xallx/"+bannerid+"/"+bannertitle+"/"+bannerdesc);
        $("#myModaledit").show();
        $(".bannerid").val(bannerid);
        $(".bannertitle").val(bannertitle);
        $(".bannerdesc").html(bannerdesc);
        document.getElementById("bannerdesc").defaultValue = bannerdesc;
        document.getElementById("imgdisplay").src = "<?php echo base_url()?>" + img;
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
        <i class="fa fa-plus-circle" aria-hidden="true"></i> Add banner
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
                <h3 class="box-title">Manage Banner</h3>
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
                        $x = 1; if ( isset( $banner ) ):?>
                            <?php foreach($banner as $banners): ?>
                                <tr>
                                    <?php $current_count_start++?>
                                    <!-- <td><input type="checkbox"></td> -->
                                    <td><p><?php echo $current_count_start;?></p></td>
                                    <td>
                                        <?php if ( $banners['bannerimg'] == 'none' ):?>
                                            <img src="https://dummyimage.com/620x485/4a4a4a/ffffff.jpg&text=No+Image" class="img-responsive">
                                        <?php else:?>
                                            <img src="<?php echo base_url() . $banners['bannerimg'] ?>" class="img-responsive">
                                        <?php endif;?>    
                                    </td>
                                    <td><a href="javascript:;" class="btnEdit" data-id="<?php echo $banners['bannerid']?>" 
                                                data-title="<?php echo $banners['bannertitle']?>"
                                                data-desc="<?php echo $banners['bannerdesc']?>"
                                                data-img="<?php echo $banners['bannerimg']?>">
                                        <?php echo $banners['bannertitle'] ?>
                                    </a></td>
                                    <td><?php echo base_url() . $banners['bannerimg'] ?></td>
                                    <td><?php echo date("F j, Y, g:i a",strtotime($banners['datecreated'])) ?></td>
                                    <td>
                                        <?php
                                            $label = '';

                                            if ( $banners['status'] == 'published' ) {
                                                $label = 'label-success';
                                            } elseif ( $banners['status'] == 'draft' ) {
                                                $label = 'label-warning';
                                            } elseif ( $banners['status'] == 'deleted' ) {
                                                $label = 'label-danger';
                                            }
                                        ?>
                                      <span class="label <?php echo $label;?>"><?php echo $banners['status'] ?></span>
                                    </td>
                                    <td>    
                                        <div class="tools">
                                            <?php if ( $this->session->userdata('acc_type') == 'super admin' || $this->session->userdata('acc_type') == 'admin' ) :?>
                                            <a href="javascript:;" class="btnEdit" data-id="<?php echo $banners['bannerid']?>" 
                                                data-title="<?php echo $banners['bannertitle']?>"
                                                data-desc="<?php echo $banners['bannerdesc']?>"
                                                data-img="<?php echo $banners['bannerimg']?>"><i class="fa fa-edit"></i></a>
                                            <a href="javascript:;" class="btnRemove" data-id="<?php echo $banners['bannerid']?>" 
                                                data-title="<?php echo $banners['bannertitle']?>"><i class="fa fa-trash-o"></i></a>
                                            <?php endif;?>
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