  $(document).ready(function(){
    // open sub menu
    $(".sub-menu").click(function(){
      var subId = $(this).attr("data-sub");
      var conData = "#"+subId;
      $("#mySidenav").css("transform","translateX(100%)");
      $("#"+subId).css("transform","translateX(0%)");
      $("#"+subId).addClass("itemsOpen");
      $(".sub-menu").addClass("openSub");
    });
    $(".back-sub").click(function(){
      var dataId = $(this).closest(".sub-items").attr("id");
      $("#"+dataId).css("transform","translateX(-100%)");
      $("#mySidenav").css("transform","translateX(0%)");
      $(".sub-menu").removeClass("openSub");
      $("#"+dataId).removeClass("itemsOpen");

    });
  });
$(window).resize(function() {
    var windowWidth = $(window).width();
    var windowHeight = $(window).height();
    if(windowWidth >= 768){
      $(".back-sub").trigger("click");
      closeNav();
    }
});
  
  // menu toogle
    function toogleMenu(e){
      var sideW = $("#mySidenav").width();
      if($(".sub-menu").hasClass("openSub")){
        bounce()
        return;
      }

      if($("#mySidenav").hasClass("closeNav")){
        openNav();
      }else{
        closeNav();
      }
    }
    function openNav() {
    var space = '<div id="navOpenspacer" class="spacer-8"></div>'
      $("#mySidenav").css("transform","translateX(0%)");
      $(".menu-fa").addClass("fa-times");
      $(".menu-fa").removeClass("fa-bars");
      $("#mySidenav").removeClass("closeNav");
      $(".body-content").after(space);
	    $(".body-content").hide();
      


    }
    function closeNav() {
      // document.getElementById("mySidenav").style.width = "0";
      $(".menu-fa").removeClass("fa-times");
      $(".menu-fa").addClass("fa-bars");
      $("#mySidenav").addClass("closeNav");
      $("#mySidenav").css("transform","translateX(-100%)");
	    $(".body-content").show();
	    $("#navOpenspacer").remove();
    }
    function bounce(){
      $(".itemsOpen").find(".back-sub").addClass("bounce");
      setTimeout(function(){
       $(".itemsOpen").find(".back-sub").removeClass("bounce");
      },1000);

    }
  