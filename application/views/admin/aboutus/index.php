<!-- Select2 -->
<style type="text/css">
    #myUL li a{
        color: #000;
    }

    #myUL li a:hover{
        cursor: default;
        background: #f39c12;
        color: #000;
    }

</style>
<script type="text/javascript">
$(document).on("click","#save_title",function(e){
    e.preventDefault();
    if($(".title").val()==""){
        alert('Enter a title');
    }
    else if($(".desc").val()==""){
        alert('Enter a description!');
    }else{

        $.ajax({
            type: "POST",
            url: "<?php echo base_url()?>admin/aboutus/updateaboutus",
            data: {id:$("#aboutus_id").val(), title: $(".title").val() , desc: $(".desc").val() },
            success: function(data){
                $("#msgdesc").html(data);
                $("#myModalmsg").show();
                $("#table_section").load("<?php echo base_url()?>" + "admin/aboutus/index/xallx/xallx"+" .tablesorter");
                window.location.href='<?php echo base_url()?>admin/aboutus/index/xallx/xallx';  
            },
            beforeSend:function(){
                $("#msgdesc").html("<center><img src='<?php echo base_url()?>uploads/icon/loadingspin.gif' width='70' height='70'>");
                $("#myModalmsg").show();
            }
        });
    }
});
//save video
$(document).on("click","#save_vid",function(e){
    e.preventDefault();
    if($(".video").val()==""){
        alert('Enter a video link');
    }else{
        $.ajax({
            type: "POST",
            url: "<?php echo base_url()?>admin/aboutus/updateaboutusvid",
            data: {id:$("#aboutus_id").val(), video: $(".video").val() },
            success: function(data){
                $("#msgdesc").html(data);
                $("#myModalmsg").show();
                $("#table_section").load("<?php echo base_url()?>" + "admin/aboutus/index/xallx/xallx"+" .tablesorter");
                window.location.href='<?php echo base_url()?>admin/aboutus/index/xallx/xallx';  
            },
            beforeSend:function(){
                $("#msgdesc").html("<center><img src='<?php echo base_url()?>uploads/icon/loadingspin.gif' width='70' height='70'>");
                $("#myModalmsg").show();
            }
        });
    }
});

//save video
// $(document).on("click","#save_img1",function(e){
//     e.preventDefault();
//     if($(".title1").val()==""){
//         alert('Enter a Title');
//     }else if($(".desc1").val()==""){
//         alert('Enter a description');
//     }else if($(".image1").val()==""){
//         alert('upload image!');
//     }else{
//         $.ajax({
//             type: "POST",
//             url: "<?php echo base_url()?>admin/aboutus/updateaboutusdescA",
//             data: $("#section1_desc").serialize(),
//             success: function(data){
//                 $("#msgdesc").html(data);
//                 $("#myModalmsg").show();
//                 $("#table_section").load("<?php echo base_url()?>" + "admin/aboutus/index/xallx/xallx"+" .tablesorter");
                        
//                 myVar = setInterval(myTimer, 2000);
//             },
//             beforeSend:function(){
//                 $("#msgdesc").html("<center><img src='<?php echo base_url()?>uploads/icon/loadingspin.gif' width='70' height='70'>");
//                 $("#myModalmsg").show();
//             }
//         });
//     }
// });

$(document).ready(function (e){
    $("#section1_desc").on('submit',(function(e){
            e.preventDefault();
            if($(".title1").val()==""){
                alert('Enter a Title');
            }else if($(".desc1").val()==""){
                alert('Enter a description');
            }else{
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>admin/aboutus/updateaboutusdescA",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data){
                        $("#msgdesc").html(data);
                        $("#myModalmsg").show();
                        $("#table_section").load("<?php echo base_url()?>" + "admin/aboutus/index/xallx/xallx"+" .tablesorter");
                       	window.location.href='<?php echo base_url()?>admin/aboutus/index/xallx/xallx';       
                    },
                    beforeSend:function(){
                        $("#msgdesc").html("<center><img src='<?php echo base_url()?>uploads/icon/loadingspin.gif' width='70' height='70'>");
                        $("#myModalmsg").show();
                    }
                });
            }
    }));
});

$(document).ready(function (e){
    $("#section2_desc").on('submit',(function(e){
            e.preventDefault();
            if($(".title2").val()==""){
                alert('Enter a Title');
            }else if($(".desc2").val()==null){
                alert('Enter a description');
            }else{
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>admin/aboutus/updateaboutusdescB",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data){
                        $("#msgdesc").html(data);
                        $("#myModalmsg").show();
                        $("#table_section").load("<?php echo base_url()?>" + "admin/aboutus/index/xallx/xallx"+" .tablesorter");
                    },
                    beforeSend:function(){
                        $("#msgdesc").html("<center><img src='<?php echo base_url()?>uploads/icon/loadingspin.gif' width='70' height='70'>");
                        $("#myModalmsg").show();
                    }
                });
            }
    }));
});

$(document).ready(function (e){
    $("#section3_desc").on('submit',(function(e){
            e.preventDefault();
            if($(".title3").val()==""){
                alert('Enter a Title');
            }else if($(".desc3").val()==""){
                alert('Enter a description');
            }else{
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>admin/aboutus/updateaboutusdescC",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data){
                        $("#msgdesc").html(data);
                        $("#myModalmsg").show();
                        $("#table_section").load("<?php echo base_url()?>" + "admin/aboutus/index/xallx/xallx"+" .tablesorter");
                                
                    },
                    beforeSend:function(){
                        $("#msgdesc").html("<center><img src='<?php echo base_url()?>uploads/icon/loadingspin.gif' width='70' height='70'>");
                        $("#myModalmsg").show();
                    }
                });
            }
    }));
});

</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" integrity="sha256-PIRVsaP4JdV/TIf1FR8UHy4TFh+LiRqeclYXvCPBeiw=" crossorigin="anonymous" />


    <div class="row branchsec">
        <div class="col-md-8">
                
            <div class="box box-primary" id="table_section">
                <div class="box-header with-border tablesorter">
                    <h3 class="box-title">Description</h3>
                    <div class="box-tools pull-right">
                    </div>
                    <!-- /.box-tools -->
                </div>
                <div class="box-body tablesorter">
                    <input type="hidden" name="aboutus_id" id="aboutus_id" value="<?php echo $data[0]['aboutus_id']?>">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" autocomplete="off" class="form-control title" name="aboutus_title" value="<?php echo $data[0]['title']?>">
                    </div>
                    
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="wysihtml5 desc" 
                          style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="aboutus_desc"required><?php echo $data[0]['desc']?></textarea>
                        <!-- <textarea autocomplete="off" class="form-control desc" name="aboutus_desc"><?php echo $data[0]['desc']?></textarea> -->
                    </div>
                    
                    <button class="btn btn-primary btn-flat pull-right" id="save_title">Save</button>
                    
                    <div class="form-group">
                        <label>Video</label>
                        <input type="text" autocomplete="off" class="form-control video" name="aboutus_vid" value="<?php echo $data[0]['video']?>">
                    </div>
                    
                    <button class="btn btn-primary btn-flat pull-right" id="save_vid">Save</button>
                    <form id="section1_desc" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="id" id="aboutus_id" value="<?php echo $data[0]['aboutus_id']?>">
                        <div class="form-group">
                            <label>Description A</label>
                            <input type="text" autocomplete="off" class="form-control title1" name="aboutus_title1" value="<?php echo $data[0]['title1']?>" placeholder="Title">
                            <textarea class="wysihtml5 desc1" 
                          style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="aboutus_desc1"required><?php echo $data[0]['desc1']?></textarea>
                            <!-- <textarea type="text" autocomplete="off" class="form-control desc1" name="aboutus_desc1"  placeholder="Description"><?php echo $data[0]['desc1']?></textarea> -->
                            <input type="file" class="form-control image1" name="aboutus_img1">
                        </div>
                    <button class="btn btn-primary btn-flat pull-right" id="save_img1">Save</button>
                    </form>
                    
                    <div class="form-group">
                    	<form id="section2_desc" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="id" id="aboutus_id" value="<?php echo $data[0]['aboutus_id']?>">
                        <label>Description B</label>
                        <input type="text" autocomplete="off" class="form-control title2" name="aboutus_title2" value="<?php echo $data[0]['title2']?>" placeholder="Title">
                        <textarea type="text" autocomplete="off" class="form-control desc1" name="aboutus_desc2" placeholder="Description"><?php echo $data[0]['desc2']?></textarea>
                        <input type="file" autocomplete="off" class="form-control image2" name="aboutus_img2">
                    </div>
                    
                    <button class="btn btn-primary btn-flat pull-right" id="save_img2">Save</button>
                    </form>

                    <div class="form-group">
                    	<form id="section3_desc" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="id" id="aboutus_id" value="<?php echo $data[0]['aboutus_id']?>">
                        <label>Description C</label>
                        <input type="text" autocomplete="off" class="form-control title3" name="aboutus_title3" value="<?php echo $data[0]['title3']?>" placeholder="Title">
                        <textarea type="text" autocomplete="off" class="form-control desc3" name="aboutus_desc3" placeholder="Description"><?php echo $data[0]['desc3']?></textarea>
                        <input type="file" autocomplete="off" class="form-control image3" name="aboutus_img3">
                    </div>
                    
                    <button class="btn btn-primary btn-flat pull-right" id="save_img3">Save</button>
               	 	</form>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            window.onclick = function(event) {
                                  $('li.branchlist').css('background','');
                                  //$("#myModalmsg").hide();
                              } 
                          $(document).on("keydown",".dealername", function(ev){
                          if(ev.keyCode==40 || ev.keyCode==38){  
                            $('div.branchbox').on('focus', 'li', function() {    
                                $this = $('li.branchlist');
                                //$this.addClass('actives').siblings().removeClass();
                                $(this).css('background', '#f39c12').siblings().css('background','');
                                //$this.closest('div.branchbox').scrollTop($this.index() * $this.outerHeight());
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
                                    }
                                }).find('li').first().focus();   
                            }
                          });
                    });
                    </script>

                </div>

                <!-- /.box-body -->
            </div>
        </div>
    </div>


