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
                        <!-- <h3 class="box-title"><?php echo $sales_info[0]['sto_from']?></h3> -->
                        
                        <div class="form-group col-xs-8">
                            <h3>SALES ORDER</h3>
                        </div>

                        <div class="form-group col-xs-4">
                            <label>Date:</label>
                            <input disabled type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control input-xs" name="" 
                            value="<?php echo date("F j, Y, g:i a",strtotime( $sales_info[0]['sat_created']))?>">
                        </div>

                        <div class="form-group col-xs-12">
                            <label>Delivered To:</label>
                            <select disabled class="form-control input-xs" name="bra_id_from">
                                <?php foreach ( $clients as $client ) :?>
                                    <option value="<?php echo $client['cli_id']?>" <?php echo $client['cli_id'] == $sales_info[0]['cli_id'] ? 'selected' : '' ?>>
                                        <?php echo $client['cli_name'] ?>        
                                    </option>
                                <?php endforeach;?>
                            </select>
                        </div>

                        <div class="form-group col-xs-12">
                            <label>Address:</label>
                            <input disabled type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control input-xs" name="" 
                            value="<?php echo $sales_info[0]['cli_address']?>">
                        </div>

                        <div class="form-group col-xs-4">
                            <label>P.O No:</label>
                            <input disabled type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control input-xs" name="" 
                            value="<?php echo $sales_info[0]['sal_po_no']?>">
                        </div>

                        <div class="form-group col-xs-4">
                            <label>S.0 No:</label>
                            <input disabled type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control input-xs" name="" 
                            value="<?php echo $sales_info[0]['sal_id']?>">
                        </div>

                        <div class="form-group col-xs-4">
                            <label>Place:</label>
                            <input disabled type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control input-xs" name="" 
                            value="<?php echo $sales_info[0]['bra_name']?>">
                        </div>
                    </div>
                    <div class="table-responsive mailbox-messages">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 10px;">QTY</th>
                                    <th class="text-center" style="width: 10px;">UNIT</th>
                                    <th class="text-center">DESCRIPTION</th>
                                    <th class="text-center">CATEGORY</th>
                                    <th class="text-center" style="width: 50px;">U. PRICE</th>
                                    <th class="text-center" style="width: 50px;">AMOUNT</th>
                                    <th class="text-center" style="width: 200px;">REMARK</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php if ( isset( $sales_info ) ):?>
                                <?php foreach($sales_info as $item): ?>
                                    <tr>
                                        <td><?php echo $item['sai_qty'] ?></td>
                                        <td><?php echo $item['pro_unit'] ?></td>
                                        <td>
                                            <?php echo $item['pro_name'] ?>
                                        </td>
                                        <td><?php echo $controller->get_category_name($item['pro_id']) ?></td>
                                        <td>₱<?php echo number_format( $item['sai_price'], 2) ?></td>
                                        <td>₱<?php echo number_format( $item['sai_sub_total'], 2) ?></td>
                                        <td><?php echo $item['sai_remark'] ?></td>
                                    </tr>
                                <?php endforeach;?>
                            <?php endif;?>
                            </tbody>
                            <tfoot>
                                <tr>
                                     <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>TOTAL</th>
                                    <th>₱<?php echo number_format( $sales_info[0]['sal_total'], 2)?></th>
                                    <th></th>  
                                </tr>
                            </tfoot>
                        </table>   
                        <!-- /.table --> 
                    </div>

                </div>
                
                <div class="box-footer">
                    <div class="form-group col-xs-4">
                        <label>Checked and Prepared By:</label>
                        <input disabled type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control input-xs" name="sal_checked_by" 
                        value="<?php echo set_value('sal_checked_by') != NULL ? set_value('sal_checked_by') : $sales_info[0]['sal_checked_by'] ?>">
                    </div>
                    <div class="form-group col-xs-4">
                        <label>Agent:</label>
                        <input disabled type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control input-xs" name="sal_agent" 
                        value="<?php echo set_value('sal_agent') != NULL ? set_value('sal_agent') : $sales_info[0]['sal_agent'] ?>">
                    </div>
                    <!-- <div class="form-group col-xs-3">
                        <label>Change Amount:</label>
                        <input disabled type="text" <?php echo $this->session->userdata('acc_type') != 'super admin' ? 'disabled' : ''?> class="form-control input-xs" name="sal_change" 
                        value="₱<?php echo set_value('sal_change') != NULL ? number_format( set_value('sal_change'), 2) : number_format( $sales_info[0]['sal_change'], 2) ?>">
                    </div> -->
                
                    <div class="col-md-offset-1 form-group col-xs-3">
                        <label>Recieved the above goods in good order and condition</label>
                        <label>By: ____________________________________</label>
                        <center><label><i>Print Name and Signature</i></label></center>
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

