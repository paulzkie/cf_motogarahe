
<link href="<?php echo SITE_CSS_PATH?>style2.css" rel="stylesheet">
<section class="section-padding our-media has-parallax payment" id="media">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 txt-white head-txt">
                <h3>Cart Review</h3>
            </div>

        </div>

        <div class="row pay-product">
            <div class="col-xs-12 col-md-8">
                <div class="row">
                    <div class="col-md-8 txt-white">
                        <h4>Song Name</h4>
                    </div>
                    <div class="col-md-3 txt-white">
                        <h4>Price</h4>
                    </div>
                </div>
                <!-- <div class="audio-wrap">
                    <div class="col-xs-12 col-sm-1 col-md-1">
                        <div class="audio-play-btn" data-playlist-id="3">
                            <a href="javascript:;">
                                <span class="flaticon-play flaticon-sm"></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-5">
                        <div class="audio-title">
                            <span>Tempered Song</span>
                            <p>Shelter</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-2">
                        <div class="audio-buy">
                            <a href="#" class="btn btn-defualt">$0.99</a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-3">
                        <div class="license-cont">
                            <a href="#" class="license">Review License</a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-1">
                        <div class="close">
                            <a href="#"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                </div>

                <div class="audio-wrap">
                    <div class="col-xs-12 col-sm-1 col-md-1">
                        <div class="audio-play-btn" data-playlist-id="7">
                            <a href="javscript:;">
                                <span class="flaticon-play flaticon-sm"></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5">
                        <div class="audio-title">
                            <span>The Separation</span>
                            <p>Friendly fires</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-2">
                        <div class="audio-buy">
                            <a href="#" class="btn btn-defualt">$0.99</a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="license-cont">
                            <a href="#" class="license">Review License</a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-1 col-md-1">
                        <div class="close">
                            <a href="#"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                </div> -->

                <?php if($this->cart->total_items() > 0): ?> 
                <?php foreach($this->cart->contents() as $item):    ?>
                    <div class="audio-wrap">
                        <div class="col-xs-12 col-sm-8 col-md-8">
                            <div class="audio-title">
                                <span style="font-size: 20px;"><?php echo $item["name"]; ?></span>
                                <p style="font-size: 15px;"><?php echo $item["options"]['artist']; ?></p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3">
                            <div class="audio-buy">
                                <a href="#" class="btn btn-defualt">$<?php echo $item["price"]; ?></a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-1 col-md-1">
                            <div class="close">
                                <a href="<?php echo base_url() . 'payment/remove_item/' . $item['rowid']?>"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                    </div>    
                <?php endforeach;?>
                <?php endif ?>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12 border-box">
                        <div class="check-out-total">
                            <div class="row">
                                <div class="col-md-6 txt-btcol">
                                    <h4>Total Gross</h4>
                                </div>
                                <div class="col-md-6 txt-btcol price-right">
                                    <h4><?php echo '$'.$this->cart->total(); ?></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 txt-btcol">
                                    <h4>Discount</h4>
                                </div>
                                <div class="col-md-6 txt-btcol price-right">
                                    <h4>$0.00</h4>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6 txt-light txt-white total-pr">
                                    <p><span>Total</span></p>
                                </div>
                                <div class="col-md-6 txt-light txt-white total-pr price-right">
                                    <p><span><?php echo '$'.$this->cart->total(); ?><span></p>
                                </div>
                            </div>
                            <div class="sept"></div>
                            <div class="row">
                                <div class="col-md-12" style="text-align: center;">
                                    <span class="txt-btcol">By clicking the button you accept the product(s) License
                                        Agreement(s)</span>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <!-- <div class="col-md-6 email-cont">
                                    <input class="mail-sty" name="" id="" type="text"
                                        placeholder="FIRSTNAME" minlength="10" maxlength="100"
                                        autocomplete="off" required="">
                                </div>
                                <div class="col-md-6 email-cont">
                                    <input class="mail-sty" name="" id="" type="text"
                                        placeholder="LASTNAME" minlength="10" maxlength="100"
                                        autocomplete="off" required="">
                                     
                                </div>
                                <div class="col-md-12 email-cont">
                                    <input class="mail-sty" name="" id="" type="email"
                                        placeholder="E-MAIL" minlength="10" maxlength="100"
                                        autocomplete="off" required="">
                                </div> -->

                                <!-- <br>
                                <br>
                                <br>
                                <br> -->
                                <!-- <div class="col-md-12 btn-cont">
                                    <form method="post">
                                        <button class="pay-btn" type="submit" name="payment_mode" value="payment_mode"><span>Pay via PayPal</span> <i class="fas fa-greater-than"></i></button>   
                                    </form>  
                                </div> -->
                                
                                <div class="col-md-12 btn-cont">
                                    <a class="btn btn-primary btn-block pay-btn" href="<?php echo base_url('payment/process_payment')?>"><i class="fa fa-paypal" aria-hidden="true"></i> <span>Pay via PayPal</span> <i class="fas fa-greater-than"></i></a>
                                </div>
                                <br>
                                <br>
                                <!-- <div class="col-md-12 btn-cont">
                                    <button class="pay-btn"><span>Pay via
                                            Credit Card</span> <i class="fa fa-greater-than"></i></button>
                                </div> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
</section>
