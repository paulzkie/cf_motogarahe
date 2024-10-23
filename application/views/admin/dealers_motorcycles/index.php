<style type="text/css">
    .getdealers:hover{
        background: #f39c12;
    }
    .getBranch:hover{
        background: #f39c12;
    }
    .getdealers a{
        color: #000;
    }
    .showbranchactive{
        display: block;
    }
    .actives {background: #f39c12;}
</style>
<script type="text/javascript">
$(document).on("click",".btnDownload",function(){
    $("#myModal").show();
});

$(document).ready(function(){
    var dealername = '';
    var dealerbranch = '';

    $(document).on("keyup",".dealername",function(e){
        dealername = $(".dealername").val();
        dealerbranch = $(".dealerbranch").val();

        if(dealername==""){
            $("#getitems").hide();
        }

        if(e.keyCode===13){
            $.ajax({
                type:"POST",
                url: "<?php echo base_url()?>"+"admin/dealers_motorcycles/getdealers",
                data: {dealername: dealername},
                success: function(data){
                    $("#getitems").show();
                    $(".showDealers").html(data);
                }
           });
        }
 
        else{
           $.ajax({
                type:"POST",
                url: "<?php echo base_url()?>"+"admin/dealers_motorcycles/getdealers",
                data: {dealername: dealername, dealerbranch: dealerbranch },
                success: function(data){
                    $(".getitems").show();
                    $(".showDealers").html(data);
                }
           });
        }
    });

    $(document).on("keydown",".dealerbranch",function(ev){
        dealername = $(".dealername").val();
        dealerbranch = $(".dealerbranch").val();
        //$(".dealerid").val(dealerid);
        $(".dealername").val(dealername);
        $("#getitems").hide();
        deaid = $(".dealerid").val();

            $.ajax({
                type:"POST",
                url: "<?php echo base_url()?>"+"admin/dealers_motorcycles/getdealerbranch",
                data: {dealerid: deaid, dealerbranch: $(".dealerbranch").val()},
                success: function(data){
                    $("#getitems1").show();
                    $(".showBranch").html(data);
                }
            });
    });

    $(document).on("click",".getdealers",function(e){
        dealerid = $(this).data("id");
        dealername = $(this).data("deaname");
        debid = '';
        $(".dealerid").val(dealerid);
        $(".dealername").val(dealername);
        
        deaid = $(".dealerid").val();
        $("#getitems").hide();
        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>"+"admin/dealers_motorcycles/getdealerbranch",
            data: {dealerid: deaid, dealerbranch: $(".dealerbranch").val()},
            success: function(data){
                //$("#getitems1").show();
                $(".showBranch").html(data);
                $("#getitems1").show();
            }
        });

        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>"+"admin/dealers_motorcycles/dealermotorcycletable",
            data: {dealerid: deaid , debid: debid},
            success: function(data){
                //$("#getitems1").show();
                $(".showDealermotorcycle").html(data);
            },
            beforeSend:function(){
                $(".showDealermotorcycle").html("<center><img src='<?php echo base_url()?>resources/site/newui-assets2/assets/739.gif'>");
            }
        });

    });


    $(document).on("click",".dealername",function(e){
        $("#getitems1").hide();   
    });

    $(document).on("click",".dealerbranch",function(){
        //$("#getitems1").show();
        $("#getitems").hide();
        //$('#getitems1').addClass('showbranchactive');
    });

    $(document).on("click",".getBranch",function(){
        $("#getitems1").hide();
        debid = $(this).data("id");
        dealername = $(this).data("deaname");
        dealerid = $(".dealerid").val();
        $(".debid").val(debid);
        $(".dealerbranch").val(dealername);
        
        //alert(dealerid);
        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>"+"admin/dealers_motorcycles/dealermotorcycletable",
            data: {dealerid: dealerid , debid: debid},
            success: function(data){
                //$("#getitems1").show();
                $(".showDealermotorcycle").html(data);
            },
            beforeSend:function(){
                $(".showDealermotorcycle").html("<center><img src='<?php echo base_url()?>resources/site/newui-assets2/assets/739.gif'>");
            }
        });
    });

});
    $(document).on("click",".cleardealer",function(){
        $(".dealername").val('');
        $(".dealerid").val('');
        $("#getitems").hide();
        $("#getitems1").hide();
        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>"+"admin/dealers_motorcycles/dealermotorcycletable",
            data: {dealerid: '' , debid: ''},
            success: function(data){
                //$("#getitems1").show();
                $(".showDealermotorcycle").html(data);
            },
            beforeSend:function(){
                $(".showDealermotorcycle").html("<center><img src='<?php echo base_url()?>resources/site/newui-assets2/assets/739.gif'>");
            }
        });
    });

    $(document).on("click",".clearbranch",function(){
        $(".dealerbranch").val('');
        $(".debid").val('');
        $("#getitems").hide();
        $("#getitems1").hide();
        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>"+"admin/dealers_motorcycles/dealermotorcycletable",
            data: {dealerid:$(".dealerid").val() , debid: ''},
            success: function(data){
                //$("#getitems1").show();
                $(".showDealermotorcycle").html(data);
            },
            beforeSend:function(){
                $(".showDealermotorcycle").html("<center><img src='<?php echo base_url()?>resources/site/newui-assets2/assets/739.gif'>");
            }
        });
    });
//download dealer motorcycle branch
    $(document).on("click",".btnDownloadXLS",function(){
        //alert($(".dealerid").val() + $(".debid").val());
        if($(".dealerid").val()==""){
            alert("No data selected!");
        }else{
        window.open("<?php echo base_url()?>admin/dealers_motorcycles/dealers_motorcyclesdownload?dealerid="+$(".dealerid").val()+"&"+"debid="+$(".debid").val());
        }
    });
</script>
<div class="row">
    <div class="col-md-3 col-filter">
        <a href="<?php echo $create?>" class="btn btn-primary btn-block btn-flat margin-bottom">
        <i class="fa fa-plus-circle" aria-hidden="true"></i> Create
        </a> 
        <a href="javascript:;" class="btn btn-primary btn-block btn-flat margin-bottom btnDownload">
            <i class="fa fa-plus-circle" aria-hidden="true"></i> Download 
        </a>
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
        <!-- img src="<?php echo $dealers_branches_img[0]['set_desc']; ?>" class="img img-responsive">

        <form method="POST" enctype="multipart/form-data">
            <div class="form-group pull-right">
                <button class="btn btn-sm btn-primary" name="upload_mode" value="upload_mode">Upload</button>
            </div> 
            <div class="form-group" style="margin-top: 5px; ">
                <input type="file" name="set_desc">
            </div> 
        </form> -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Manage Motorcycles</h3>
                <div class="box-tools">
                <form method="POST" class="form-inline">
                    <div class="form-group"> 
                        <select class="form-control input-sm" name="search_type" style="width: 100px;">
                            <option value="mot_model">Model</option>
                            <option value="dealers.dea_name">Dealer</option>
                            <option value="mot_brand">Brand</option>
                        </select>
                    </div>
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
                <div class="mailbox-controls">
                    <!-- Check all button -->
                    <!-- <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                    </div> -->
                    <!-- /.btn-group -->
                </div>

                <div class="table-responsive mailbox-messages">
                    <table id="example1" class="table table-hover table-striped tablesorter">
                        <tbody>
                        
                        <?php $x = 1; if ( isset( $dealers_branches ) ):?>
                            <?php foreach($dealers_branches as $dealers_branches): ?>
                                <tr>
                                    <?php $current_count_start++?>
                                    <!-- <td><input type="checkbox"></td> -->
                                    <td><p><?php echo $current_count_start;?></p></td>
                                    <!-- <td>
                                        <img src="<?php echo base_url() . $dealers_branches['mop_image'] ?>">
                                    </td> -->
                                    <td><a href="<?php echo base_url() . 'admin/dealers_motorcycles/view/' . $dealers_branches['dem_id']?>">
                                        <?php echo $dealers_branches['mot_model']  ?>
                                    </a></td>
                                    <td><?php echo $dealers_branches['dea_name'] . ' ' . $dealers_branches['name']?></td>
                                    <td><?php echo date("F j, Y, g:i a",strtotime($dealers_branches['dem_created'])) ?></td>
                                    <td>
                                        <?php
                                            $label = '';

                                            if ( $dealers_branches['dem_status'] == 'published' ) {
                                                $label = 'label-success';
                                            } elseif ( $dealers_branches['dem_status'] == 'draft' ) {
                                                $label = 'label-warning';
                                            } elseif ( $dealers_branches['dem_status'] == 'deleted' ) {
                                                $label = 'label-danger';
                                            }
                                        ?>
                                        <span class="label <?php echo $label;?>"><?php echo $dealers_branches['dem_status'] ?></span>
                                    </td>
                                    <td>    
                                        <div class="tools">
                                            <?php if ( $this->session->userdata('acc_type') == 'super admin' || $this->session->userdata('acc_type') == 'admin' ) :?>
                                            <a href="<?php echo base_url() . 'admin/dealers_motorcycles/edit/' . $dealers_branches['dem_id']?>"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo base_url() . 'admin/dealers_motorcycles/delete/' . $dealers_branches['dem_id']?>"><i class="fa fa-trash-o"></i></a>
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
<!--popup for adding testimonials-->
<button id="myBtn" hidden="">Open Modal</button>
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2 class="popuuptitle">DOWNLOAD DEALER BRANCHES MOTORCYCLES</h2>
    </div>
    <div class="modal-body popupcontent">
        <!-- <form method="POST" enctype="multipart/form-data" id="upload"> -->
          <input type="hidden" name="dealerid" class="dealerid">
          <input type="hidden" name="debid" class="debid">
            <div class="row">
                <div class="col-md-3">
                        <div class="form-group">
                            <label>Dealer Name</label>
                            <div class="input-group input-group-sm" >
                            <input type="text" autocomplete="off" class="form-control dealername" name="dealername" placeholder="Select Dealer"> 
                            <div class="input-group-btn">  
                            <button class="btn btn-default cleardealer">X</button>
                            </div>
                            </div>   
                            <div id="getitems" style="display: none;z-index: 999;">
                                <div class="showDealers"></div>
                            </div>
                        </div>
                </div>
                <div class="col-md-3">
                        <div class="form-group">
                            <label>Dealer Branch</label>
                            <div class="input-group input-group-sm" >
                            <input type="text" autocomplete="off" class="form-control dealerbranch" name="dealerbranch" placeholder="Select Branch">
                            <div class="input-group-btn">  
                            <button class="btn btn-default clearbranch">X</button>
                            </div>
                            </div>
                            <div id="getitems1" class="" style="border: solid 1px;height: 200px;overflow-y: auto;display: none;z-index: 999;">
                                <div class="showBranch"></div>
                            </div>
                        </div>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive mailbox-messages showDealermotorcycle" style="height: auto;overflow-y: auto;">
                    </div>     
                </div>
            </div>   
            <div class="row">
                <div class="col-md-8">
                    <div class="box box-primary">
                        <div class="box-footer">
                            <button class="btn btn-primary btn-flat pull-right btnDownloadXLS">
                                <i class="fa fa-check" aria-hidden="true"></i> Download
                            </button>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
             </div>    
            </div>
        <!-- </form> -->
    </div>
  </div>
</div>
<button id="myBtn1" hidden="">Open Modal</button>
<script type="text/javascript">
// $(document).on("keydown",".dealername", function(e){
// $('div.containerdealer').on('focus', 'li', function() {
//     $this = $('li.getdealers');
//     //$this.addClass('actives').siblings().removeClass();
//     $(this).css('background', '#f39c12').siblings().css('background','');
//     $this.closest('div.containerdealer').scrollTop($this.index() * $this.outerHeight());
// }).on('keydown', 'li', function(e) {
//     $this = $(this);
//     if (e.keyCode == 40) {     
//         $this.next().focus();
//         return false;
//     } else if (e.keyCode == 38) {       
//         $this.prev().focus();
//         return false;
//     }
//     if(e.keyCode===13){
//         dealerid = $(this).data("id");
//         dealername = $(this).data("deaname");
//         $(".dealerid").val(dealerid);
//         $(".dealername").val(dealername);
//         alert(dealername);``
//     }
// }).find('li').first().focus();

// });

$(document).ready(function(){

      window.onclick = function(event) {
        $("#getitems1").hide();
      }  

      $(document).on("keydown",".dealername", function(ev){
      if(ev.keyCode==40 || ev.keyCode==38){  
        $('div.containerdealer').on('focus', 'li', function() {    
            $this = $('li.getdealers');
            //$this.addClass('actives').siblings().removeClass();
            $(this).css('background', '#f39c12').siblings().css('background','');
            $this.closest('div.containerdealer').scrollTop($this.index() * $this.outerHeight());
            }).on('keydown', 'li', function(e) {
                $this = $(this);
                if (e.keyCode == 40) {     
                    $this.next().focus();
                    return false;
                } else if (e.keyCode == 38) {       
                    $this.prev().focus();
                    return false;
                }
                if(e.keyCode===13){
                    $("#getitems").hide();
                    $(".dealerbranch").focus();
                    dealerid = $(this).data("id");
                    dealername = $(this).data("deaname");
                    $(".dealerid").val(dealerid);
                    $(".dealername").val(dealername);
                    deaid = $(".dealerid").val();
                    $("#getitems").hide();
                    $("#getitems1").show();
                    $.ajax({
                        type:"POST",
                        url: "<?php echo base_url()?>"+"admin/dealers_motorcycles/getdealerbranch",
                        data: {dealerid: deaid, dealerbranch: $(".dealerbranch").val()},
                        success: function(data){
                            //$("#getitems1").show();
                            $(".showBranch").html(data);
                            $("#getitems1").show();
                        }
                    });

                    $.ajax({
                        type:"POST",
                        url: "<?php echo base_url()?>"+"admin/dealers_motorcycles/dealermotorcycletable",
                        data: {dealerid: deaid , debid: debid},
                        success: function(data){
                            //$("#getitems1").show();
                            $(".showDealermotorcycle").html(data);
                        },
                        beforeSend:function(){
                            $(".showDealermotorcycle").html("<center><img src='<?php echo base_url()?>resources/site/newui-assets2/assets/739.gif'>");
                        }
                    });

                }
            }).find('li').first().focus();   
        }
      });
});

</script>
<script type="text/javascript">
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");
    var btn1 = document.getElementById("myBtn1");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    var getitem = document.getElementById("getitems1");
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

    window.onclick = function(event) {
      if (event.target == getitem) {
        getitem.style.display = "none";
      }
    } 
</script>