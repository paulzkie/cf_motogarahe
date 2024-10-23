<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/css/swiper.min.css" />


<!-- Demo styles -->
<style>
  .swiper-container {
    width: 100%;
    height: 300px;
  }
  .swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #000;

    /* Center slide text vertically */
    display: -webkit-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    -webkit-align-items: center;
    align-items: center;
  }
</style>

<div class="container-fluid">
    <!-- <div class="row">
        <div class="col-md-12">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    
                    <?php if ( isset( $lottery_prizes ) ):?>
                        <?php $i = 1; ?>
                        <?php foreach($lottery_prizes as $lottery_prize): ?>
                            
                            <div class="swiper-slide">
                                <img class="img img-responsive" src="<?php echo $lottery_prize['lop_img']?>" alt="">
                            </div>
                        <?php $i++; ?>
                        <?php endforeach;?>
                    <?php endif;?>
                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div> -->

    <div class="row">
        <div class="col-md-12">   
            <p style="padding: 10px;
    border: 1px solid #cccc;">Referral Link: <span style="word-wrap: break-word;"><a target="_blank" href="<?php echo base_url('member/login/index/'. $this->session->userdata('usr_username'))?>"><?php echo base_url('member/login/index/'. $this->session->userdata('usr_username'))?></a></span></p>
            
        </div>
    </div>

    <div class="row" style="display:none;">
        <div class="col-md-3">
            <h3>Participants Percentage: <?php echo $participant_percentage?>%</h3> 
            <!-- <br> -->
            <!-- <canvas id="barChart"></canvas> -->

            
            <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Participants</span>
                <span class="info-box-number">Lottery Draw</span>

                <div class="progress">
                    <div class="progress-bar" style="width: <?php echo $participant_percentage?>%"></div>
                </div>
                    <span class="progress-description">
                        <?php echo $participant_percentage?>%
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->


        </div>
        <div class="col-md-9">
            <h3>Captcha Winners</h3>     
            <b><p>Participants Percentage for the Next Captcha Draw: <?php echo $participant_percentage?>%</p></b>

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Show All Winners
                        </a>
                    </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            
                                <div class="table-responsive mailbox-messages">
                                    <table id="example1" class="table table-hover table-striped tablesorter">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Username</th>
                                                <th>Prize</th>                         
                                                
                                                <!-- <th>Date</th> -->
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php if ( isset( $lottery_winners ) ):?>
                                            <?php $i = 1; ?>
                                            <?php foreach($lottery_winners as $lottery_winner): ?>
                                                <tr>
                                                    <td><?php echo $i;?></td>
                                                    <td><?php echo $lottery_winner['usr_username'] ?></td>
                                                    <td><?php echo $lottery_winner['lop_name'] ?></td>
                                                    
                                                    <td><img src="<?php echo $lottery_winner['lop_img'] ?>" class="img img-responsive" style="height:50px;"/></td>
                                                    <!-- <td><?php echo date("F j, Y, g:i a",strtotime($lottery_winner['cod_created'])) ?></td> -->
                                                </tr>
                                                <?php $i++; ?>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                        </tbody>
                                    </table>   
                                    <!-- /.table -->
                                </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>


