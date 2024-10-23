
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <form method="POST">
                <?php foreach($users as $user): ?>
                <div class="box-body">

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Firstname</label>   
                            <input type="text" class="form-control" name="usr_fname" value="<?php echo set_value('usr_fname') != NULL ? set_value('usr_fname') : $user['usr_fname'] ?>">
                        </div>
                        <div class="col-md-4">
                            <label>Middlename</label>
                            <input type="text" class="form-control" name="usr_mname" value="<?php echo set_value('usr_mname') != NULL ? set_value('usr_mname') : $user['usr_mname'] ?>">  
                        </div>
                        <div class="col-md-4">
                            <label>Lastname</label> 
                            <input type="text" class="form-control" name="usr_lname" value="<?php echo set_value('usr_lname') != NULL ? set_value('usr_lname') : $user['usr_lname'] ?>">  
                        </div>
                        
                    </div> 

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>Address</label>
                            <textarea class="form-control" rows="3" name="usr_address" id="myPlaceTextBox"><?php echo set_value('usr_address') != NULL ? set_value('usr_address') : $user['usr_address'] ?>
                        </textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Gender</label>
                            <select class="form-control" name="usr_gender">
                                <option value="male" <?php echo 'male' == $user['usr_gender'] ? 'selected' : '' ?>>Male</option>
                                <option value="female" <?php echo 'female' == $user['usr_gender'] ? 'selected' : '' ?>>Female</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Birthday</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right datepicker" name="usr_bday" value="<?php echo set_value('usr_bday') != NULL ? set_value('usr_bday') : date('m/d/Y', strtotime( $user['usr_bday'])) ?>">
                            </div>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Contact Number</label>
                            <input type="text" class="form-control" name="usr_contact" value="<?php echo set_value('usr_contact') != NULL ? set_value('usr_contact') : $user['usr_contact'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label>Email</label>
                            <input type="text" class="form-control" name="usr_email" value="<?php echo set_value('usr_email') != NULL ? set_value('usr_email') : $user['usr_email'] ?>">
                        </div>
                    </div> 
 
                </div>
                <?php endforeach; ?>  
                <div class="box-footer">
                    <a href="<?php echo $back ?>" class="btn btn-default btn-flat">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back
                    </a>
                    <button type="submit" class="btn btn-primary btn-flat pull-right">
                    <i class="fa fa-check" aria-hidden="true"></i> Save
                    </button>
                </div>
                <!-- /.box-body -->
            </form>
        </div>
    </div>
</div>
