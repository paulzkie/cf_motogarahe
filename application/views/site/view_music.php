
    <link href="<?php echo SITE_CSS_PATH?>style2.css" rel="stylesheet">
    
    <div class="wrapper">
        <!-- Sidebar Holder -->

        <nav id="sidebar">

            <ul class="list-unstyled components">

                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Genre</a>
                    <ul class="collapse list-unstyled scroll_design" id="homeSubmenu">
                        <li><a href="<?php echo base_url();?>music/index/res/all">All</a></li>
                        <?php foreach($genresz as $genrex):?>
                          <li><a href="<?php echo base_url();?>music/index/res/<?php echo $genrex['gen_slug']?>"><?php echo $genrex['gen_name']?></a></li>  
                        <?php endforeach;?>
                    </ul>
                </li>
               <!--  <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Mood</a>
                    <ul class="collapse list-unstyled scroll_design" id="pageSubmenu">
                        <li><a href="#">Page 1</a></li>
                        <li><a href="#">Page 2</a></li>
                        <li><a href="#">Page 3</a></li>
                    </ul>
                </li> -->
            </ul>

        </nav>

        <section class="section-padding our-media has-parallax" id="media" style="width: 100%;">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sticky-nav">
                            <p id="hideshow"><span class="fa fa-filter"></span> Filter</p>
                            

                            <form method="POST">
                              <div class="input-group" style="width:100%;">
                             <span class="input-group-addon"><span class="fa fa-search"></span></span>
                             <input type="text" class="form-control input-lg" name="search" id="search" placeholder="Song, Artist, Mood, etc" style="background-color: transparent;width:100%;">
                             <button type="submit" name="search_mode" id="search_mode" value="search_mode" style="display: none;">asd</button>
                           </div>
                            </form>
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
                                              <a href="<?php echo base_url() . 'music/add_cart/' . $featuredSong['son_id']?>"><i class="fa fa-cart-plus"></i></a>
                                              <a href="<?php echo base_url() . 'music/dl_song/' . $featuredSong['son_id']?>">
                                                <i class="fa fa-download"></i>
                                              </a>
                                            </div> 
                                          </div>
                                           <div class="col-xs-12 col-sm-3 col-md-2">
                                              <div class="audio-buy">
                                                 <a href="<?php echo base_url() . 'music/add_cart/' . $featuredSong['son_id']?>" class="btn btn-defualt">$<?php echo number_format($featuredSong['son_price'],2)?></a>
                                              </div>
                                           </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <?php $x++; endforeach;?>
                                </div>
                            </div>
                            <!-- <a href="#" class="btn btn-success">BROWSE ALL TRACKS</a> -->
                            <?php echo $this->pagination->create_links(); ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </div>

     <script>
         $(document).ready(function() {
             $("#hideshow").on("click", function() {
                 $("#sidebar").toggleClass("active");
                 $(this).toggleClass("active");
             });

             $(".navbar-default").removeClass("menu-is-scrolling");
         });
     </script>

     <script>
$(function () {

  // var songs;
  // $.ajax({
  //   url: "<?php echo base_url();?>music/getSongs/<?php echo $genre?>/<?php echo $featuredSongs[0]['son_id']?>/<?php echo $featuredSongs[0]['son_id'] + 2?>",
  //   dataType: 'text',
  //   type: "POST",
  //   success: function (result) {
  //     songs = $.parseJSON(result);

  //     // myPlaylist.put(pos, jsonObj);
  //     // $.each(result.results,function(item){
  //     //     $('ul').append('<li>' + item + '</li>')
  //     // })
  //     if ($(".audio-player").length) {
        // console.log(songs);
        // var myPlaylist = new jPlayerPlaylist({
        //     jPlayer: "#jquery_jplayer_1",
        //     cssSelectorAncestor: "#jp_container_1"
        //   },
        //   songs,
        //   {
        //     swfPath: "js/plugins",
        //     supplied: "oga, mp3",
        //     wmode: "window",
        //     useStateClassSkin: true,
        //     autoBlur: false,
        //     smoothPlayBar: true,
        //     keyEnabled: true,
        //     playlistOptions: {
        //       autoPlay: false
        //     }
        //   }
        // );
        var cssSelector = {
            jPlayer: "#jquery_jplayer_1",
            cssSelectorAncestor: "#jp_container_1"
        };
        var playlist = []; // Empty playlist
        var options = {
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
        };
        var myPlaylist = new jPlayerPlaylist(cssSelector, playlist, options);

        var baseurl = "<?php echo base_url();?>";
        var plan = "<?php echo $plan;?>";

        $.getJSON("<?php echo base_url();?>music/getSongs/<?php echo $result?>/<?php echo $genre?>/<?php echo $featuredSongs[0]['son_id']?>/<?php echo $featuredSongs[0]['son_id'] + 4?>",function(data){  // get the JSON array produced by my PHP
            $.each(data,function(index,value){
                // console.log(value);

               

               if (plan == 'Premium Account') {
                console.log($(this).attr("mp3_o"));
                  myPlaylist.add({title:$(this).attr("title"),mp3: baseurl + $(this).attr("mp3_o"), artist:$(this).attr("artist")}); // add each element in data in myPlaylist
               } else {
                console.log($(this).attr("mp3"));
                  myPlaylist.add({title:$(this).attr("title"),mp3: baseurl + $(this).attr("mp3"), artist:$(this).attr("artist")}); // add each element in data in myPlaylist
               }

            })

        });


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
                    console.log("%j", myPlaylist);
                  });
              }
        );
     
//     }
//   })
});
</script>
<script>
    $('.navbar').css("background-color", "#0d0c0c");
    $('footer').hide();
</script>