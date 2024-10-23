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
</style>
<!-- Select2 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" integrity="sha256-PIRVsaP4JdV/TIf1FR8UHy4TFh+LiRqeclYXvCPBeiw=" crossorigin="anonymous" />

<?php foreach($inquiries as $inquiry): ?>
<form method="POST">
    <div class="row">

        <div class="col-md-9">

            

            <div class="box-body">        
                <?php if ( $this->session->userdata('acc_head_office') === 'true' ):?>
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Branch Name</label>
                            <input readonly type="text" class="form-control" value="<?php echo set_value('name') != NULL ? set_value('name') : $inquiry['name'] ?>">
                        </div>
                    </div>
                </div>
                <?php endif?>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Personal Info</h3>
                        <div class="box-tools pull-right">
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <div class="box-body">

                        <div class="form-group">
                            <label>Name</label>
                            <input readonly type="text" class="form-control" value="<?php echo set_value('inq_name') != NULL ? set_value('inq_name') : $inquiry['inq_name'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input readonly type="text" class="form-control" value="<?php echo set_value('inq_address') != NULL ? set_value('inq_address') : $inquiry['inq_address'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Contact No</label>
                            <input readonly type="text" class="form-control" value="<?php echo set_value('inq_phone') != NULL ? set_value('inq_phone') : $inquiry['inq_phone'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input readonly type="text" class="form-control" value="<?php echo set_value('inq_email') != NULL ? set_value('inq_email') : $inquiry['inq_email'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Occupation</label>
                            <input readonly type="text" class="form-control" value="<?php echo set_value('inq_occupation') != NULL ? set_value('inq_occupation') : $inquiry['inq_occupation'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Position</label>
                            <input readonly type="text" class="form-control" value="<?php echo set_value('inq_position') != NULL ? set_value('inq_position') : $inquiry['inq_position'] ?>">
                        </div>
                    
                    </div>
                </div>


                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Inquiry Info</h3>
                        <div class="box-tools pull-right">
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <div class="box-body">

                        <div class="form-group">
                            <label>Model Unit</label>
                            <input readonly type="text" class="form-control" value="<?php echo set_value('mot_model') != NULL ? set_value('mot_model') : $inquiry['mot_brand'] .' '. $inquiry['mot_model'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Payment Terms</label>
                            <input readonly type="text" class="form-control" value="<?php echo ( $inquiry['inq_payment'] === 'cash') ? 'cash': 'installment' ?>">
                        </div>

                        <div class="form-group">
                            <label>Model Category</label>
                            <input readonly type="text" class="form-control" value="<?php echo set_value('mot_type') != NULL ? set_value('mot_type') : $inquiry['mot_type'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Displacement</label>
                            <input readonly type="text" class="form-control" value="<?php echo set_value('mot_diplacement') != NULL ? set_value('mot_diplacement') : $inquiry['mot_diplacement'] ?> cc">
                        </div>

                        <div class="form-group">
                            <label>Transmission</label>
                            <input readonly type="text" class="form-control" value="<?php echo set_value('mot_transmission') != NULL ? set_value('mot_transmission') : $inquiry['mot_transmission'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Color</label>
                            <input readonly type="text" class="form-control" value="<?php echo set_value('inq_color') != NULL ? set_value('inq_color') : $inquiry['inq_color'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Own Motor</label>
                            <input readonly type="text" class="form-control" value="<?php echo set_value('inq_have_motor') != NULL ? set_value('inq_have_motor') : $inquiry['inq_have_motor'] ?>">
                        </div>

                        <div class="form-group">
                            <label>When to buy</label>
                            <input readonly type="text" class="form-control" value="<?php echo set_value('inq_buy_duration') != NULL ? set_value('inq_buy_duration') : $inquiry['inq_buy_duration'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Message</label>
                            <textarea readonly
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                <?php echo set_value('inq_message') != NULL ? set_value('inq_message') : $inquiry['inq_message'] ?>

                            </textarea>
                        </div>
                    

                        <hr>

                        <div class="form-group">
                            <label>*** INQUIRY STATUS ***</label>
                            <select class="form-control" name="inq_process">
                                <option value="pending" <?php echo 'pending' == $inquiry['inq_process'] ? 'selected' : '' ?>>Pending</option>
                                <option value="on process" <?php echo 'on process' == $inquiry['inq_process'] ? 'selected' : '' ?>>On process</option>
                                <option value="approved" <?php echo 'approved' == $inquiry['inq_process'] ? 'selected' : '' ?>>Approved</option>
                                <option value="released" <?php echo 'released' == $inquiry['inq_process'] ? 'selected' : '' ?>>Released</option>
                                <option value="block" <?php echo 'block' == $inquiry['inq_process'] ? 'selected' : '' ?>>Block</option>
                                <option value="not qualified" <?php echo 'not qualified' == $inquiry['inq_process'] ? 'selected' : '' ?>>Not Qualified</option>
                                <option value="declined" <?php echo 'declined' == $inquiry['inq_process'] ? 'selected' : '' ?>>Declined</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>*** INQUIRY REMARKS ***</label>
                            <textarea name="inq_remarks" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo set_value('inq_remarks') != NULL ? set_value('inq_remarks') : $inquiry['inq_remarks'] ?></textarea>
                        </div>

                    </div>
                    
                    <div class="box-footer">
                        <a href="<?php echo $back ?>" class="btn btn-default btn-flat">
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


    </div>
</form>
<?php endforeach; ?> 