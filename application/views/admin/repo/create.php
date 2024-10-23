<style>
    .card_motors {position: relative;    display: inline-block;}
    .close {
            float: right;
    font-size: 21px;
    font-weight: bold;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    filter: alpha(opacity=20);
    opacity: .2;
    position: absolute;
    top: 1px;
    right: 4px;
    }
    
    #myUL li a{
        color: #000;
    }

    #myUL li a:hover{
        cursor: default;
        background: #f39c12;
        color: #000;
    }
    .branchbox{
        display: block;
    }
</style>
<script type="text/javascript">
    function myFunctions() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
    function getmotid(){
        $(".branchbox").show();
    }
$(document).on("click",".btnSave",function(e){
    e.preventDefault();
    if($(".getmotid").val()=="select model"){
        alert('Select motorcycle!');
    }
    else if($(".dem_colors").val()==""){
        alert('Enter a color!');
    }else{
    if($('input.checkboxlist').is(":checked")){
    $(".branchbox").find('input[name="deb_id"]').each(function(){
            if($(this).is(":checked")){
                mot_id = $(".getmotid").val();
                dem_colors = $(".dem_colors").val();
                dem_promo = $(".selectPromo").val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>admin/repo/create",
                    data: {mot_id: mot_id, deb_id: [$(this).val()] , dem_colors: dem_colors,
                        dem_promo: dem_promo},
                    success: function(data){
                    },
                    beforeSend:function(){
                        $("#msgdesc").html("<center><img src='<?php echo base_url()?>resources/site/newui-assets2/assets/739.gif'>");
                        $("#myModalmsg").show();
                    }
                });
            }   
    });
    alert('Motorcycles successfully added!');
    //$("#msgdesc").html('Motorcycles successfully added!');
    //$("#myModalmsg").show();
    //document.getElementById('form-dealermotorcycles').reset();
    window.location.href='<?php echo base_url()?>admin/repo/create';
    //$(".branchsec").load("<?php echo base_url()?>"+ "admin/dealers_motorcycles/create"+" #form-dealermotorcycles");
    }else{
        alert('Select a branch!');
    }
    }
});

$(document).on("click",".checkboxlist",function(){
    //alert($(this).data('id'));
    mot_id = $(".getmotid").val();
    var id = $(this).val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url()?>admin/repo/checkexist",
        data: {mot_id: mot_id, deb_id: $(this).val()},
        success: function(data){
            var val = JSON.parse(data);
            if(val.stat=="1"){
                var chk = $("#deb"+id);
                $("#msgdesc").html(val.msg);
                $("#myModalmsg").show();
                chk.prop('checked',false);
                chk.attr('disabled', true);
            }else{

            }
        }
    });
});
</script>

<form method="POST" enctype="multipart/form-data">
<div class="row">

    <div class="col-md-8">
                
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Description</h3>
                    <div class="box-tools pull-right">
                    </div>
                    <!-- /.box-tools -->
                </div>
                <div class="box-body">

                    <div class="form-group">
                        <label>Model Name</label>
                        <input type="text" class="form-control" name="mot_model" value="">
                    </div>

                    <div class="form-group">
                        <label>Brand</label>
                        <select class="form-control" name="mot_brand">
                            <option value="Kymco">Kymco</option>
                            <option value="Kawasaki">Kawasaki</option>
                            <option value="Yamaha" >Yamaha</option>
                            <option value="Suzuki">Suzuki</option>
                            <option value="Honda">Honda</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Category (MC Type)</label>
                        <select class="form-control" name="mot_type">
                            <option value="Scooter" >Scooter</option>
                            <option value="Backbone" >Backbone</option>
                            <option value="Underbone">Underbone</option>
                            <option value="Business">Business</option>
                            <option value="ATV" >ATV</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Dealer - Branch</label>
                        <!-- <select class=" select2 form-control" name="deb_id" style="width: 100% !important;">
                          <option selected="selected">select dealer</option>
                          <?php $x = 1; if ( isset( $dealers_branches ) ):?>
                            <?php foreach($dealers_branches as $dealers_branch): ?>
                                <option value="<?php echo $dealers_branch['deb_id']?>"><?php echo $dealers_branch['dea_name'] . " - ". $dealers_branch['name']?></option>
                            <?php $x++?>
                            <?php endforeach;?>
                            <?php endif;?>
                        </select> -->
                        <div class="branch-section">
                            <input type="text" class="form-control dealername" name="" id="myInput" placeholder="Search dealer branch" onkeyup="myFunctions()">
                            <div class="branchbox" style="height: 100px;overflow-y: auto;" hidden="">
                            <ul id="myUL">
                            <?php
                            $tabindex=1;
                            foreach ($dealers_branches as $dealers_branch) { ?>
                                <li class="branchlist" tabindex="<?php echo $tabindex?>">
                                    <input type="radio" name="deb_id"  class="checkboxlist"
                                    value="<?php echo $dealers_branch['deb_id']?>" 
                                    data-id="<?php echo $dealers_branch['deb_id']?>"
                                    id="deb<?php echo $dealers_branch['deb_id']?>">
                                    <a href="javascript:;">
                                    <?php echo $dealers_branch['dea_name'] . " - ". $dealers_branch['name']?>
                                    </a>
                                </li>
                        <?php $tabindex++; } ?>
                            </ul>
                            </div>
                        </div>
                    </div>

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
                    
                    <div class="form-group">
                        <label>Year</label>
                        <input type="text" class="form-control" name="mot_year" value="">
                    </div>

                    <div class="form-group">
                        <label>Mileage</label>
                        <input type="text" class="form-control" name="mot_mileage" value="">
                    </div>
                    
                    <div class="form-group">
                        <label>Issue(Optional)</label>
                        <input type="text" class="form-control" name="mot_issue" value="">
                    </div>
                    
                    <div class="form-group">
                        <label>Remarks</label>
                        <input type="text" class="form-control" name="mot_repo_remarks" value="">
                    </div>
                    
                    <div class="form-group">
                        <label>Cash Price</label>
                        <input type="text" class="form-control" name="mot_price" value="">
                    </div>
                    
                    <div class="form-group">
                        <label>Downpayment</label>
                        <input type="text" class="form-control" name="mot_dp" value="">
                    </div>

                    <div class="form-group">
                        <label>36mos m.a</label>
                        <input type="text" class="form-control" name="mot_ma_36" value="">
                    </div>

                    <div class="form-group">
                        <label>24mos m.a</label>
                        <input type="text" class="form-control" name="mot_ma_24" value="">
                    </div>

                    <div class="form-group">
                        <label>12mos m.a</label>
                        <input type="text" class="form-control" name="mot_ma_12" value="">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="mot_desc" value="">
                    </div>
                    
        <div class="col-md-12">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Images</h3>
                    <div class="box-tools pull-right">
                    </div>
                    <!-- /.box-tools -->
                </div>
                <div class="box-body">
                    <div class="form-group">
                            <label>Upload</label>
                            <input type="file" name="mot_image">
                    </div>
                </div>
                
                <!-- /.box-body -->
            </div>
        </div>
        
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="mot_status">
                            <option value="published">Published</option>
                            <option value="draft" >Draft</option>
                            <option value="deleted" >Deleted</option>
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
        </div>
</div>
</form>



