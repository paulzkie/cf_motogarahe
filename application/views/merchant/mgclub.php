<script type="text/javascript">
   //filter mgclub
   function myFunction() {
      var input, filter, table, tr, td,td1, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("example1");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[3];
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
</script>
<div class="row">
    <div class="col-md-10">
        <input type="hidden" id="myInput1">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">MG Club members</h3>
                <div class="box-tools">
                
                    <div class="form-group">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" name="search_val" class="form-control pull-right" placeholder="Search" id="myInput" onkeyup="myFunction()">
                            <div class="input-group-btn">
                                <button type="submit" name="search_mode" value="search_mode" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
               
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">

                <div class="table-responsive mailbox-messages" id="table_section" style="overflow-y: auto;height: 770px;">
                    <table id="example1" class="table table-hover table-striped tablesorter">
                        <tbody>
                        <?php 
                        $current_count_start=0;    
                        $x = 1; if ( isset( $mgclub ) ):?>
                            <?php foreach($mgclub as $mgclubs): ?>
                                <tr>
                                    <?php $current_count_start++?>
                                    <!-- <td><input type="checkbox"></td> -->
                                    <td><p><?php echo $current_count_start;?></p></td>
                                    <!-- <td>
                                        <?php if (empty($mgclubs['mgclubimg'])):?>
                                            NO IMAGE AVAILABLE
                                        <?php else:?>
                                            <img src="<?php echo base_url() . $mgclubs['mgclubimg'] ?>" class="img-responsive">
                                        <?php endif;?>    
                                    </td> -->
                                    <td><a href="javascript:;" class="btnEdit" data-id="<?php echo $mgclubs['mgclubid']?>" 
                                                data-name="<?php echo $mgclubs['fullname']?>"
                                                data-address="<?php echo $mgclubs['address']?>"
                                                data-contactno="<?php echo $mgclubs['contactno']?>"
                                                data-email="<?php echo $mgclubs['email']?>"
                                                data-accountno="<?php echo $mgclubs['accountno']?>"
                                                data-img="<?php echo $mgclubs['mgclubimg']?>" 
                                                style="font-weight: 600;">
                                        <?php echo $mgclubs['accountno'] ?>
                                    </a></td>
                                    <td><a href="javascript:;" class="btnEdit" data-id="<?php echo $mgclubs['mgclubid']?>" 
                                                data-name="<?php echo $mgclubs['fullname']?>"
                                                data-address="<?php echo $mgclubs['address']?>"
                                                data-contactno="<?php echo $mgclubs['contactno']?>"
                                                data-email="<?php echo $mgclubs['email']?>"
                                                data-accountno="<?php echo $mgclubs['accountno']?>"
                                                data-img="<?php echo $mgclubs['mgclubimg']?>" 
                                                style="font-weight: 600;"><?php echo $mgclubs['fullname'] ?></a>
                                    </td>
                                    <!-- <td><?php echo $mgclubs['contactno'] ?></td>
                                    <td><?php echo date("F j, Y, g:i a",strtotime($mgclubs['datecreated'])) ?></td> -->
                                    <!-- <td>
                                        <?php
                                            $label = '';

                                            if ( $mgclubs['status'] == 'published' ) {
                                                $label = 'label-success';
                                            } elseif ( $mgclubs['status'] == 'draft' ) {
                                                $label = 'label-warning';
                                            } elseif ( $mgclubs['status'] == 'deleted' ) {
                                                $label = 'label-danger';
                                            }
                                        ?>
                                      <span class="label <?php echo $label;?>"><?php echo $mgclubs['status'] ?></span>
                                    </td> -->
                                    <td hidden=""> <?php echo $mgclubs['accountno'] ?>-<?php echo $mgclubs['fullname']?></td>
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
