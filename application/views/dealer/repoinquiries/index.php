<div class="row">

    <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Filter</h3>

            </div>
            <div class="box-body">
                
                <form role="form" method="POST">

                    <div class="form-group">
                        <label>Name</label>
                        <input  type="text" class="form-control" name="inq_name"  autocomplete="off" value="<?php echo ( $inq_name != 'xallx' ) ? $inq_name : '' ?>">
                    </div>

                    <div class="form-group">
                        <label style="display: block;">Date</label>
                        <span><a class="btn btn-xs btn-success btn-influx" id="thisweekcreated" href="#!">this week</a></span>
                        <span><a class="btn btn-xs btn-success btn-influx" id="thismonthcreated" href="#!">this month</a></span>
                    </div>

                    <div class="form-group">
                        <label>Start Date:</label>
                        <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" id="thiscreatedstartdate" autocomplete="off" class="form-control pull-right datepicker" name="inq_created_from" placeholder="yyyy-mm-dd" value="<?php echo ( $inq_created_from != 'xallx' ) ? $inq_created_from : '' ?> "/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>End Date:</label>
                        <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" id="thiscreatedenddate" autocomplete="off" class="form-control pull-right datepicker" name="inq_created_to" placeholder="yyyy-mm-dd" value="<?php echo ( $inq_created_to != 'xallx' ) ? $inq_created_to : '' ?> "/>
                        </div>
                    </div>

                    <button type="submit" name="search_mode" value="search_mode" class="btn btn-default btn-block btn-influx"><i class="fa fa-search"></i> Search</button> 
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-9">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Manage Inquiries</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="mailbox-controls">
                </div>

                <div class="table-responsive mailbox-messages">
                    <table id="example1" class="table table-hover table-striped tablesorter">
                        <tbody>
                        
                        <?php $x = 1; if ( isset( $inquiries ) ):?>
                            <thead>
                                <tr role="row">
                                    <th></th>
                                    <th>#</th>
                                    <?php if ( $this->session->userdata('acc_head_office') === 'true' ):?>
                                        <th>Branch</th>
                                    <?php endif?>
                                    <th>Name</th>
                                    <th>Contact #</th>
                                    <th>Model Unit</th>
                                    <th>Terms</th>
                                    <th>Color</th>
                                    <th>Date</th>
                                    <th>Last Update</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            
                            <?php foreach($inquiries as $inquiry): ?>
                                <tr>
                                    <?php $current_count_start++?>
                                    <td><p><?php echo $current_count_start;?></p></td>
                                    
                                    <td><?php echo $inquiry['inq_id']?></td>
                                    <?php if ( $this->session->userdata('acc_head_office') === 'true' ):?>
                                        <td><?php echo $inquiry['acc_name']?></td>
                                    <?php endif?>
                                    <td><?php echo $inquiry['inq_name']?></td>
                                    <td><?php echo $inquiry['inq_phone']?></td>
                                    <td><?php echo $inquiry['mot_brand'] .' '. $inquiry['mot_model'] ?></td>
                                    <td><?php echo ( $inquiry['inq_payment'] === 'cash') ? 'cash': 'installment'?></td>
                                    <td><?php echo $inquiry['inq_color']?></td>
                                    <td><?php echo date("F j, Y, g:i a",strtotime($inquiry['inq_created'])) ?></td>
                                    <td><?php echo ( strtotime($inquiry['inq_updated']) != strtotime('0000-00-00 00:00:00') ) ? date("F j, Y, g:i a",strtotime($inquiry['inq_updated'])) : '' ?></td>
                                    <td>
                                        <?php
                                            $label = '';

                                            if ( $inquiry['inq_process'] == 'approved' ) {
                                                $label = 'label-success';
                                            } elseif ( $inquiry['inq_process'] == 'released' ) {
                                                $label = 'label-success';
                                            } elseif ( $inquiry['inq_process'] == 'pending' ) {
                                                $label = 'label-warning';
                                            } elseif ( $inquiry['inq_process'] == 'block' ) {
                                                $label = 'label-danger';
                                            } elseif ( $inquiry['inq_process'] == 'not qualified' ) {
                                                $label = 'label-danger';
                                            } elseif ( $inquiry['inq_process'] == 'on process' ) {
                                                $label = 'label-warning';
                                            } elseif ( $inquiry['inq_process'] == 'declined' ) {
                                                $label = 'label-danger';
                                            }
                                        ?>
                                        <span class="label <?php echo $label;?>"><?php echo $inquiry['inq_process'] ?></span>
                                    </td>
                                    <td>    
                                        <div class="tools">
                                            <a href="<?php echo base_url() . 'dealer/repoinquiries/edit/' . $inquiry['inq_id']?>"><i class="fa fa-edit"></i></a>
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
//download dealer motorcycle inquiries
    $(document).on("click",".btnDownloadXLS",function(){
        //alert($(".dealerid").val() + $(".debid").val());
        if($(".datefrom").val()=="" || $(".dateto").val()==""){
            alert("Enter a date!");
        }else{
         window.open("<?php echo base_url()?>dealer/inquiries/dealers_inquirydownload?datefrom="+$(".datefrom").val()+"&"+"dateto="+$(".dateto").val());
        }
    });

    $(document).on("click",".btnDownloadXLSALL",function(){
        //alert($(".dealerid").val() + $(".debid").val());
        window.open("<?php echo base_url()?>dealer/inquiries/dealers_inquirydownload?downloadall=true");
    });
</script>
<div class="col-md-4">
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Extract Inquiries</h2>
    </div>

    <div class="modal-body">
        
                    <div class="form-group">
                        <label>Start Date:</label>
                        <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" id="thiscreatedstartdate" autocomplete="off" class="form-control pull-right datepicker datefrom" name="inq_created_from" placeholder="yyyy-mm-dd"/>
                        </div>
                    </div>
              
                    <div class="form-group">
                        <label>End Date:</label>
                        <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" id="thiscreatedenddate" autocomplete="off" class="form-control pull-right datepicker dateto" name="inq_created_to" placeholder="yyyy-mm-dd"/>
                        </div>
                    </div>
                    <button class="btn btn-xs btn-success btn-influx btnDownloadXLS">Download File</button>

                    <button class="pull-right btn btn-xs btn-success btn-influx btnDownloadXLSALL">Download All</button>   
                </div> 
    </div>
  </div>

</div>

