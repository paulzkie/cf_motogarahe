<style>
    .form-group label {
        font-size: 12px !important;
        font-weight: 500px !important;
    }

    th, td {
        font-size: 12px !important;
    }

    table {
        margin: 0 !important;
        margin-left: 10px !important;
        margin-right: 10px !important;
        width: 98% !important;
        margin-bottom: 0px !important;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
                <div class="box-body">
                    
                    <center>
                        <img src="https://scontent.fmnl8-1.fna.fbcdn.net/v/t1.0-9/10612905_664013197040764_1266283711177168702_n.jpg?oh=b7c98495b4f39ef2261001d508132c87&amp;oe=5925F1DA" class="img-responsive" style="width: 310px; margin-bottom: 20px;" alt="">
                    </center>    

                    <div class="row box-header with-border">
                        <!-- <h3 class="box-title"><?php echo $inventory_infos[0]['sto_from']?></h3> -->
                        <div class="form-group col-xs-6">
                            <label>From Branch:</label>
                            <select disabled class="form-control input-xs" name="bra_id_from">
                                <?php foreach ( $branches as $branch ) :?>
                                    <option value="<?php echo $branch['bra_id']?>" <?php echo $branch['bra_id'] == $inventory_infos[0]['bra_id_from'] ? 'selected' : '' ?>>
                                        <?php echo $branch['bra_name'] ?>        
                                    </option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        

                        <!-- <div class="form-group col-xs-3">
                            <label>D/R No:</label>
                            <input disabled type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control input-xs" name="int_dr" 
                            value="<?php echo set_value('int_dr') != NULL ? set_value('int_dr') : $inventory_infos[0]['int_dr'] ?>">
                        </div> -->
                        <div class="col-xs-offset-3 form-group col-xs-3">
                            <label>Transfer Slip No:</label>
                            <input disabled type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control input-xs" name="int_id" 
                            value="<?php echo set_value('int_id') != NULL ? set_value('int_id') : $inventory_infos[0]['int_id'] ?>">
                        </div>

                        <div class="form-group col-xs-6">
                            <label>To Branch:</label>
                            <select disabled <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control input-xs" name="bra_id_to">
                                <?php foreach ( $branches as $branch ) :?>
                                    <option value="<?php echo $branch['bra_id']?>" <?php echo $branch['bra_id'] == $inventory_infos[0]['bra_id_to'] ? 'selected' : '' ?>>
                                        <?php echo $branch['bra_name'] ?>        
                                    </option>
                                <?php endforeach;?>
                            </select>
                        </div>

                        <div class="form-group col-xs-6">
                            <label>Created Date:</label>
                            <input disabled type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control input-xs" name="int_pickup_by" 
                            value="<?php echo date("F j, Y, g:i a",strtotime( $inventory_infos[0]['int_created']))?>">
                        </div>
                    </div>
                    <div class="table-responsive mailbox-messages">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Unit</th>
                                    <th>Qty</th>
                                    <th>Remark</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php if ( isset( $inventory_infos ) ):?>
                                <?php foreach($inventory_infos as $item): ?>
                                    <tr>
                                        <td>
                                            <?php echo $item['pro_name'] ?>
                                        </td>
                                        <td><?php echo $controller->get_category_name($item['pro_id']) ?></td>
                                        <td><?php echo $item['pro_unit'] ?></td>
                                        <td><?php echo $item['ini_qty'] ?></td>
                                        <td><?php echo $item['ini_remark'] ?></td>
                                    </tr>
                                <?php endforeach;?>
                            <?php endif;?>
                            </tbody>
                        </table>   
                        <!-- /.table --> 
                    </div>

                </div>
                
                <div class="box-footer">
                    <div class="form-group col-xs-3">
                        <label>Prepared By:</label>
                        <input disabled type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control input-xs" name="int_prepared_by" 
                        value="<?php echo set_value('int_prepared_by') != NULL ? set_value('int_prepared_by') : $inventory_infos[0]['int_prepared_by'] ?>">
                    </div>
                    <div class="form-group col-xs-3">
                        <label>Pick up By:</label>
                        <input disabled type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control input-xs" name="int_pickup_by" 
                        value="<?php echo set_value('int_pickup_by') != NULL ? set_value('int_pickup_by') : $inventory_infos[0]['int_pickup_by'] ?>">
                    </div>
                    <div class="form-group col-xs-3">
                        <label>Approved by:</label>
                        <input disabled type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control input-xs" name="int_approved_by" 
                        value="<?php echo set_value('int_approved_by') != NULL ? set_value('int_approved_by') : $inventory_infos[0]['int_approved_by'] ?>">
                    </div>
                    <div class="form-group col-xs-3">
                        <label>Delivered by:</label>
                        <input disabled type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control input-xs" name="int_delivered_by" 
                        value="<?php echo set_value('int_delivered_by') != NULL ? set_value('int_delivered_by') : $inventory_infos[0]['int_delivered_by'] ?>">
                    </div>
                    <div class="form-group col-xs-3">
                        <label>Checked  and Released By:</label>
                        <input disabled type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control input-xs" name="int_checked_and_released_by" 
                        value="<?php echo set_value('int_checked_and_released_by') != NULL ? set_value('int_checked_and_released_by') : $inventory_infos[0]['int_checked_and_released_by'] ?>">
                    </div>
                    
                    <div class="form-group col-xs-3">
                        <label>Status</label>
                        <select disabled <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control input-xs" name="int_status">
                            <option value="published" <?php echo 'published' == $inventory_infos[0]['int_status'] ? 'selected' : '' ?>>Delivered</option>
                            <option value="draft" <?php echo 'draft' == $inventory_infos[0]['int_status'] ? 'selected' : '' ?>>Pending</option>
                            <option value="deleted" <?php echo 'deleted' == $inventory_infos[0]['int_status'] ? 'selected' : '' ?>>Deleted</option>
                        </select>
                    </div>
                    <div class="form-group col-xs-6">
                        <label>Delivered Date:</label>
                        <input disabled type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control input-xs" name="int_pickup_by" 
                        value="<?php echo date("F j, Y, g:i a",strtotime( $inventory_infos[0]['int_delivered']))?>">
                    </div>
                </div>
                <div class="box-footer">    
                    <a href="<?php echo $back ?>" class="btn btn-default btn-flat">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back
                    </a>

                    <button class="pull-right btn btn-flat btn-primary print">
                        <i class="fa fa-print" aria-hidden="true"></i> Print
                    </button>

                </div>
            <!-- /.box-body -->

        </div>
    </div>

</div>

