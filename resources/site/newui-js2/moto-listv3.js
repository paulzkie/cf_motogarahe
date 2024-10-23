

 $(document).ready(function(){

    $("#showLeft").click(function(){
      var space = '<div id="navOpenspacer" class="spacer-8"></div>'
      $("#mob-filter-left").css("transform","translateX(0%)");
      $(".body-content").after(space);
      $(".body-content").hide();
    });
    $("#showRight").click(function(){
      var space = '<div id="navOpenspacer" class="spacer-8"></div>';
      $("#mob-filter-right").show();
      $(".body-content").after(space);
      $(".body-content").hide();
      setTimeout(function(){ $("#mob-filter-right").css("transform","translateX(0%)");},100);
    });
    // open sub menu
    $(".sub-filter-right").click(function(){
        var subId = $(this).attr("data-sub");
        var conData = "#"+subId;
        // $("#mySidenav").css("transform","translateX(100%)");
        $("#"+subId).css("transform","translateX(0%)");
        $("#"+subId).addClass("itemsOpen");
        $(".sub-menu").addClass("openSub");
        $("#"+subId).show();
      });
    $(".sub-filter-right-back").click(function(){
        var dataId = $(this).closest(".sub-items").attr("id");
        $(this).closest(".left-slide").css("transform","translateX(-100%)");
        // $(this).closest(".left-slide").css("transform","translateX(0%)");
        $(".sub-menu").removeClass("openSub");
        $("#"+dataId).removeClass("itemsOpen");
    });
    $(".sub-filter-left-back-last").click(function(){
        $(this).closest(".left-slide").css("transform","translateX(-100%)");
        $(".body-content").show();
        $("#navOpenspacer").remove();
        $(this).closest(".right-slide").hide();
  
    });
    $(".sub-filter-right-back-last").click(function(){
        $(this).closest(".right-slide").css("transform","translateX(100%)");
        $(".body-content").show();
        $("#navOpenspacer").remove();
        console.log("1")
        // $(this).closest(".right-slide").hide();
         setTimeout(function(){ $(".right-slide").hide();},500);
    });
  
   });