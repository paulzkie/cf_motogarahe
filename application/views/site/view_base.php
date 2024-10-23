<META HTTP-EQUIV="refresh" CONTENT="100">
<div class="row">
    <div class="col-xs-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Register</h3>
          </div>
          <div class="panel-body">
            <form class="form-horizontal" method="post"> 
                <input type="hidden" class="form-control" name="bas_id" value="<?php echo $this->session->userdata('bas_id')?>">
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label" >Username</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" name="pla_name" maxlength="10" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Fullname</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" name="pla_fullname" maxlength="100" required="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button type="reset" class="btn btn-default">Reset</button>
                      <button type="submit" class="btn btn-primary" name="add_player" value="add_player">Submit</button>
                    </div>
                </div>
            </form>
          </div>
        </div>
    </div>

    <div class="col-xs-6">
        <div class="panel panel-warning">
          <div class="panel-heading">
            <h3 class="panel-title">Load Credit (<?php echo $total_bases_credits?>)</h3>
          </div>
          <div class="panel-body">
            <form class="form-horizontal" method="post"> 
                <input type="hidden" class="form-control" name="bas_id" value="<?php echo $this->session->userdata('bas_id')?>">
                <input type="hidden" class="form-control" name="cre_type" value="accept">
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Username</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" name="pla_name" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Load</label>
                    <div class="col-lg-10">
                      <select class="form-control" name="cre_credit" required="">
                        <option>10</option>
                        <option>20</option>
                        <option>50</option>
                        <option>100</option>
                        <option>200</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button type="reset" class="btn btn-default">Reset</button>
                      <button type="submit" class="btn btn-primary" name="add_credit" value="add_credit">Submit</button>
                    </div>
                </div>
            </form>
          </div>
        </div> 
    </div>

    <div class="col-xs-12">
        <div class="panel panel-success">
          <div class="panel-heading">
            <h3 class="panel-title">Enter Game</h3>
          </div>
          <div class="panel-body">
            <table class="table table-striped table-hover ">
              <thead>
                <tr>
                  <th>#</th>
                  <th>username</th>
                  <th>fullname</th>
                  <th style="text-align: center;">credits left</th>
                  <th>actions</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $i = 1;
                  $sum = 0;
                  if ( isset( $players_sum ) ):?>
                  <?php foreach($players_sum as $player):?>
                  <tr>
                    <td><?php echo $i?></td>
                    <td><?php echo $player['pla_name']?></td>
                    <td><?php echo $player['pla_fullname']?></td>
                    <td style="text-align: center;"><?php echo $controller->load_balance( $player['pla_name'] ) ?></td>
                    <td>
                        <a href="<?php echo base_url('base/withdraw').'/'.$player['pla_name']?>" class="btn btn-success btn-xs btn-block">Withdraw</a>
                    </td>
                  </tr>
                  <?php $i = $i + 1;?>
                  <?php endforeach;?>  
                <?php endif;?>
            </tbody>
            </table>
          </div>
        </div>     
    </div>
</div>

<!-- <h1><span class="red">2</span></h1> -->
<script type="text/javascript">
</script>