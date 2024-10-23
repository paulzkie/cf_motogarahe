<header class="slider-bg has-parallax" id="slider">
    <div class="container">
      <div class="row">
          <div class="col-md-12 clearfix">
            <div class="slider-wrap">
                <div class="header-slider">
                  <div class="header-slide">
                      <div class="hero-wrap">
                        <div class="no-overflow">
                            <div class="hero-block">
                              <h1 class="hero-title">When music hits you </h1>
                              <h1 class="hero-text">you feel no pain</h1>
                              <!-- <span class="attr"> &mdash; Bob Marley</span> -->
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
            </div>
          </div>
      </div>
    </div>
</header>

<section class="section-padding our-media has-parallax" id="media">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h2 class="media-title"><span>Feature Songs</span></h2>
                  <p class="media-subtitle">
                  In hac habitasse platea dictumst. Phasellus egestas ipsum mi, a fringilla ex consectetur ut. Cras hendrerit velit vitae tortor gravidaa tempor ligula!
               </p>
               </div>
               <div class="btn-position">
                  <div class="tab-content">
                     <div role="tabpanel" class="tab-pane audio-tab active" id="audio">
                        
                        <?php $x=0; foreach($featuredSongs as $featuredSong):?>
                        <div class="audio-wrap">
                           <div class="col-xs-12 col-sm-12 col-md-1">
                              <div class="audio-play-btn" data-playlist-id='<?php echo $x;?>'>
                                 <a href="javascript:;">
                                 <span class="flaticon-play flaticon-sm"></span>
                                 </a>
                              </div>
                           </div>
                           <div class="col-xs-12 col-sm-12 col-md-7">
                              <div class="audio-title">
                                 <span><?php echo $featuredSong['title']?></span>
                                 <p><?php echo $featuredSong['artist']?></p>
                              </div>
                           </div>
                           <div class="col-xs-12 col-sm-12 col-md-2">
                            <p class="audio-duration"><?php echo $featuredSong['son_duration']?></p> 
                           <div class="audio-options">
                              <a href="#"><i class="fa fa-cart-plus"></i></a>
                              <a href="#"><i class="fa fa-download"></i></a>
                            </div> 
                          </div>
                           <div class="col-xs-12 col-sm-3 col-md-2">
                              <div class="audio-buy">
                                 <a href="#" class="btn btn-defualt">BUY $0.99</a>
                              </div>
                           </div>
                        </div>
                        <div class="clearfix"></div>
                        <?php $x++; endforeach;?>

                        <!-- <div class="audio-wrap">
                           <div class="col-xs-12 col-sm-1 col-md-1">
                              <div class="audio-play-btn" data-playlist-id="0">
                                 <a href="javascript:;">
                                 <span class="flaticon-play flaticon-sm"></span>
                                 </a>
                              </div>
                           </div>
                           <div class="col-xs-12 col-sm-8 col-md-7">
                              <div class="audio-title">
                                 <span>Tempered Song</span>
                                 <p>Shelter</p>
                              </div>
                           </div>
                           <div class="col-md-2">
                            <p class="audio-duration">5:49</p> 
                           <div class="audio-options">
                              <a href="#"><i class="fa fa-cart-plus"></i></a>
                              <a href="#"><i class="fa fa-download"></i></a>
                            </div> 
                          </div>
                           <div class="col-xs-12 col-sm-3 col-md-2">
                              <div class="audio-buy">
                                 <a href="#" class="btn btn-defualt">BUY $0.99</a>
                              </div>
                           </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="audio-wrap">
                           <div class="col-xs-12 col-sm-1 col-md-1">
                              <div class="audio-play-btn" data-playlist-id="7">
                                 <a href="javscript:;">
                                 <span class="flaticon-play flaticon-sm"></span>
                                 </a>
                              </div>
                           </div>
                           <div class="col-xs-12 col-sm-8 col-md-7">
                              <div class="audio-title">
                                 <span>The Separation</span>
                                 <p>Friendly fires</p>
                              </div>
                           </div>
                           <div class="col-md-2">
                            <p class="audio-duration">5:49</p> 
                           <div class="audio-options">
                              <a href="#"><i class="fa fa-cart-plus"></i></a>
                              <a href="#"><i class="fa fa-download"></i></a>
                            </div> 
                          </div>
                           <div class="col-xs-12 col-sm-3 col-md-2">
                              <div class="audio-buy">
                                 <a href="#" class="btn btn-defualt">BUY $0.99</a>
                              </div>
                           </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="audio-wrap">
                           <div class="col-xs-12 col-sm-1 col-md-1">
                              <div class="audio-play-btn" data-playlist-id="10">
                                 <a href="javascript:;"><span class="flaticon-play flaticon-sm"></span></a>
                              </div>
                           </div>
                           <div class="col-xs-12 col-sm-8 col-md-7">
                              <div class="audio-title">
                                 <span>Stirring of a foot</span>
                                 <p>The Meanies</p>
                              </div>
                           </div>
                           <div class="col-md-2">
                            <p class="audio-duration">5:49</p> 
                           <div class="audio-options">
                              <a href="#"><i class="fa fa-cart-plus"></i></a>
                              <a href="#"><i class="fa fa-download"></i></a>
                            </div> 
                          </div>
                           <div class="col-xs-12 col-sm-3 col-md-2">
                              <div class="audio-buy">
                                 <a href="#" class="btn btn-defualt">BUY $0.99</a>
                              </div>
                           </div>
                        </div> -->
                        
                     </div>
                  </div>
                  <a href="<?php echo base_url('music/index/res/all')?>" class="btn btn-success">BROWSE ALL TRACKS</a>
               </div>
               
            </div>
         </div>
      </section>

      <section class="section-padding album" id="album">
         <img src="<?php echo SITE_IMG_PATH?>particles/triangle_1.svg" alt="triangle" class="particle pos_c" data-rellax-speed="3" data-rellax-percentage="0.5" />
         <img src="<?php echo SITE_IMG_PATH?>particles/triangle_1.svg" alt="triangle" class="particle pos_b" data-rellax-speed="2" data-rellax-percentage="0.5" />
         <img src="<?php echo SITE_IMG_PATH?>particles/triangle_4.svg" alt="triangle" class="particle pos_d" data-rellax-speed="1" data-rellax-percentage="0.5" />
         <img src="<?php echo SITE_IMG_PATH?>particles/triangle_5.svg" alt="triangle" class="particle pos_e" data-rellax-speed="4" data-rellax-percentage="0.5" />
         <img src="<?php echo SITE_IMG_PATH?>particles/circle_1.svg" alt="circle" class="particle pos_a" data-rellax-speed="2" data-rellax-percentage="0.5" />
         <img src="<?php echo SITE_IMG_PATH?>particles/circle_2.svg" alt="circle" class="particle pos_f" data-rellax-speed="3" data-rellax-percentage="0.5" />
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="album-wrap">
                     <h2 class="album-title"><span>ALBUM</span></h2>
                     <p class="album-subtitle">In hac habitasse platea dictumst. Phasellus egestas ipsum mi, a fringilla ex consectetur ut. Cras hendrerit velit vitae tortor gravidaa tempor ligula!</p>
                     <div class="row">
                        <div class="col-md-4">
                           <a href="#" class="album-cover">
                              <div class="atvImg">
                                 <img src="<?php echo SITE_IMG_PATH?>album-img-01.jpg" class="img-responsive" alt="album">
                                 <div class=" atvImg-layer" data-img="<?php echo SITE_IMG_PATH?>album-img-01.jpg"></div>
                              </div>
                           </a>
                           <div class="album-block">
                              <span class="album-block-title">Warm winds</span>
                              <p class="album-block-subtitle">Top Dawg Entertainment</p>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <a href="#" class="album-cover">
                              <div class="atvImg">
                                 <img src="<?php echo SITE_IMG_PATH?>album-img-02.jpg" class="img-responsive" alt="album">
                                 <div class="atvImg-layer" data-img="<?php echo SITE_IMG_PATH?>album-img-02.jpg"></div>
                              </div>
                           </a>
                           <div class="album-block">
                              <span class="album-block-title">Sadajam</span>
                              <p class="album-block-subtitle">Studio and Digital arts</p>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <a href="#" class="album-cover">
                              <div class="atvImg">
                                 <img src="<?php echo SITE_IMG_PATH?>album-img-03.jpg" class="img-responsive" alt="album">
                                 <div class="atvImg-layer" data-img="<?php echo SITE_IMG_PATH?>album-img-03.jpg"></div>
                              </div>
                           </a>
                           <div class="album-block">
                              <span class="album-block-title">Video Star</span>
                              <p class="album-block-subtitle">Michael jackson, Dr. Dre</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      
      <section class="admire clearfix" id="featured-album2">
         <div class="container">
            <div class="row">
               <div class="col-md-8">
                  <div class="admire-block">
                     <h3 class="admire-title-clr"> Lorem ipsum dolor </h3>
                     <h5 class="admire-subtitle-clr">Donec condimentum</h5>
                     <ul class="star-review">
                        <li><i class="flaticon-favorite"></i></li>
                        <li><i class="flaticon-favorite"></i></li>
                        <li><i class="flaticon-favorite"></i></li>
                        <li><i class="flaticon-favorite"></i></li>
                        <li><i class="flaticon-favorite"></i></li>
                     </ul>
                     <p class="admire-subtitle02">
                        Nam ultricies nibh odio, vel volutpat odio tempus et. Phasellus laoreet, nisl quis sagittis sollicitudin, metus augue pulvinar odio, non varius ex ante eget ipsum.. In hac habitasse platea dictumst.
                     </p>
                     <a href="#" class="btn btn-success">BUY MP3 ALBUM</a>
                     <a href="#" class="btn btn-primary">BUY CD ALBUM</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="img-wrap-right">
            <a href="javascript:;" class="audio-play-btn" data-playlist-id="10">
            <img src="<?php echo SITE_IMG_PATH?>admire-02.jpg" class="img-responsive compact-img" alt="admire-02">
            <span class="flaticon-play-1 album-play-button"></span>
            </a>
         </div>
      </section>

<script>
$(function () {

  var songs;
  $.ajax({
    url: "<?php echo base_url();?>home/getSongs",
    dataType: 'text',
    type: "POST",
    success: function (result) {
      songs = $.parseJSON(result);

      // myPlaylist.put(pos, jsonObj);
      // $.each(result.results,function(item){
      //     $('ul').append('<li>' + item + '</li>')
      // })
      if ($(".audio-player").length) {
        console.log(songs);
        var myPlaylist = new jPlayerPlaylist({
            jPlayer: "#jquery_jplayer_1",
            cssSelectorAncestor: "#jp_container_1"
          },
          songs,
          {
            swfPath: "js/plugins",
            supplied: "oga, mp3",
            wmode: "window",
            useStateClassSkin: true,
            autoBlur: false,
            smoothPlayBar: true,
            keyEnabled: true,
            playlistOptions: {
              autoPlay: false
            }
          }
        );
        $("#jquery_jplayer_1").on(
          $.jPlayer.event.ready + " " + $.jPlayer.event.play,
          function (event) {
            var current = myPlaylist.current;
            var playlist = myPlaylist.playlist;
            $.each(playlist, function (index, obj) {
              if (index == current) {
                $(".jp-now-playing").html(
                  "<div class='jp-track-name'>" +
                  obj.title +
                  "</div> <div class='jp-artist-name'>" +
                  obj.artist +
                  "</div>"
                );
              }
            });
            $(".jp-volume-bar")
              .mousedown(function () {
                var parentOffset = $(this).offset(),
                  width = $(this).width();
                $(window).mousemove(function (e) {
                  var x = e.pageX - parentOffset.left,
                    volume = x / width;
                  if (volume > 1) {
                    $("#jquery_jplayer_1").jPlayer("volume", 1);
                  } else if (volume <= 0) {
                    $("#jquery_jplayer_1").jPlayer("mute");
                  } else {
                    $("#jquery_jplayer_1").jPlayer("volume", volume);
                    $("#jquery_jplayer_1").jPlayer("unmute");
                  }
                });
                return false;
              })
              .mouseup(function () {
                $(window).unbind("mousemove");
              });
            var timeDrag = false;
            $(".jp-play-bar").mousedown(function (e) {
              timeDrag = true;
              updatebar(e.pageX);
            });
            $(document).mouseup(function (e) {
              if (timeDrag) {
                timeDrag = false;
                updatebar(e.pageX);
              }
            });
            $(document).mousemove(function (e) {
              if (timeDrag) {
                updatebar(e.pageX);
              }
            });
            var updatebar = function (x) {
              var progress = $(".jp-progress");
              var position = x - progress.offset().left;
              var percentage = (100 * position) / progress.width();
              if (percentage > 100) {
                percentage = 100;
              }
              if (percentage < 0) {
                percentage = 0;
              }
              $("#jquery_jplayer_1").jPlayer("playHead", percentage);
              $(".jp-play-bar").css("width", percentage + "%");
            };
            $("#playlist-toggle, #playlist-text, #playlist-wrap li a")
              .unbind()
              .on("click", function () {
                $("#playlist-wrap").fadeToggle();
                $("#playlist-toggle, #playlist-text").toggleClass(
                  "playlist-is-visible"
                );
              });
            $(".hide_player")
              .unbind()
              .on("click", function () {
                $(".audio-player").toggleClass("is_hidden");
                $(this).html(
                  $(this).html() == '<i class="fa fa-angle-down"></i> HIDE' ?
                  '<i class="fa fa-angle-up"></i> SHOW PLAYER' :
                  '<i class="fa fa-angle-down"></i> HIDE'
                );
              });
            $("body")
              .unbind()
              .on("click", ".audio-play-btn", function () {
                $(".audio-play-btn").removeClass("is_playing");
                $(this).addClass("is_playing");
                var playlistId = $(this).data("playlist-id");
                myPlaylist.play(playlistId);
              });
          }
        );
      }
    }
  })
});
</script>