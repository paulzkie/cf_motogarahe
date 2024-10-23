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
                    url: "<?php echo base_url()?>admin/dealers_motorcycles/addmotorcycledealer",
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
    window.location.href='<?php echo base_url()?>admin/dealers_motorcycles/create';
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
        url: "<?php echo base_url()?>admin/dealers_motorcycles/checkexist",
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" integrity="sha256-PIRVsaP4JdV/TIf1FR8UHy4TFh+LiRqeclYXvCPBeiw=" crossorigin="anonymous" />

<form method="POST" enctype="multipart/form-data" id="form-dealermotorcycles">
    <div class="row branchsec">
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

                        <select class=" select2 form-control getmotid" name="mot_id" style="width: 100% !important;" onchange="getmotid()">
                          <option selected="selected">select model</option>
                          <?php $x = 1; if ( isset( $motorcycles ) ):?>
                            <?php foreach($motorcycles as $motorcycle): ?>
                                <option value="<?php echo $motorcycle['mot_id']?>"
                                    data-mot_id="<?php echo $motorcycle['mot_id']?>"><?php echo $motorcycle['mot_model']?></option>
                            <?php $x++?>
                            <?php endforeach;?>
                            <?php endif;?>
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
                                    <input type="checkbox" name="deb_id"  class="checkboxlist"
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
                    <!-- <div class="form-group">
                        <label>Total Price</label>
                        <input type="text" autocomplete="off" class="form-control" name="dem_price" value="<?php echo set_value('dem_price'); ?>">
                    </div> -->

                    <!-- <div class="form-group">
                        <label>Downpayment</label>
                        <input type="text" autocomplete="off" class="form-control" name="dem_dp" value="<?php echo set_value('dem_dp'); ?>">
                    </div>

                    <div class="form-group">
                        <label>36mos m.a.</label>
                        <input type="text" autocomplete="off" class="form-control" name="dem_installment" value="<?php echo set_value('dem_installment'); ?>">
                    </div>

                    <div class="form-group">
                         <label>24mos m.a.</label>
                        <input type="text" autocomplete="off" class="form-control" name="dem_installment2" value="<?php echo set_value('dem_installment2'); ?>">
                    </div>

                    <div class="form-group">
                         <label>12mos m.a.</label>
                        <input type="text" autocomplete="off" class="form-control" name="dem_installment3" value="<?php echo set_value('dem_installment3'); ?>">
                    </div> -->

                    <!-- <div class="form-group">
                        <label>Promos List <small class="text-red">(**seperate with commas ",")</small></label>
                        <input type="text" autocomplete="off" class="form-control" name="dem_promo" value="<?php echo set_value('dem_promo'); ?>">
                    </div> -->

                    <div class="form-group">
                        <label>Color Variant List <small class="text-red">(**seperate with commas ",")</small></label>
                        <input type="text" autocomplete="off" class="form-control dem_colors" name="dem_colors">
                    </div>

                    <div class="form-group">
                        <label>Dealer Branch Promo:</label>
                        <select name="dem_promo" class="form-control selectPromo">
                            <option value="false">Off</option>
                            <option value="true">On</option>
                        </select>
                    </div>

                </div>
                <div class="box-footer">
                    <a href="<?php echo $back?>" class="btn btn-default btn-flat">
                        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back
                    </a>
                    <button class="btn btn-primary btn-flat pull-right btnSave">
                        <i class="fa fa-check" aria-hidden="true"></i> Save
                    </button>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</form>

