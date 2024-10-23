$(document).on("keyup","#search_mode",function(e){model=$("#search_mode").val(),13===e.keyCode&&(window.location.href="<?php echo base_url(); ?>motorcycles?model="+model)}),$(document).ready(function(e){$("#header_search_section").on("submit",function(e){slug=document.getElementById("brandmodel").getAttribute("data-value"),document.getElementById("search_mode").value=slug}),$.ajax({type:"GET",url:"<?php echo base_url()?>blogs/landingpageblogs",success:function(e){$("#showBlogs").html(e)}})});const toggle=document.querySelector(".toggle"),menu=document.querySelector(".menu");function toggleMenu(){menu.classList.contains("active")?(menu.classList.remove("active"),toggle.querySelector("a").innerHTML="<i class=’fas fa-bars’ style='color:white;'>≡</i>&nbsp;<span style='font-size: 16px;color:white;'>MENU</span>"):(menu.classList.add("active"),toggle.querySelector("a").innerHTML="<i class=’fas fa-times’ style='color:white;'>≡</i>&nbsp;<span style='font-size: 16px;color:white;'>MENU</span>")}toggle.addEventListener("click",toggleMenu,!1);const items=document.querySelectorAll(".item");function toggleItem(){this.classList.contains("submenu-active")?this.classList.remove("submenu-active"):menu.querySelector(".submenu-active")?(menu.querySelector(".submenu-active").classList.remove("submenu-active"),this.classList.add("submenu-active")):this.classList.add("submenu-active")}for(let e of items)e.querySelector(".submenu")&&(e.addEventListener("click",toggleItem,!1),e.addEventListener("keypress",toggleItem,!1));function closeSubmenu(e){!menu.contains(e.target)&&menu.querySelector(".submenu-active")&&menu.querySelector(".submenu-active").classList.remove("submenu-active")}function pickResultNav(e){$(".nav-input-search").val(e),split=e.split(" "),brand=split[0],model=split[1],window.location.href="<?php echo base_url(); ?>motorcycles/"+brand+"/"+model}function hoverInResNav(e){console.log(e.target),$(".activeSuggestion-nav-input-search").removeClass("activeSuggestion-nav-input-search"),e.target.classList.add("class","activeSuggestion-nav-input-search"),console.log("in")}function hoverOutResNav(e){console.log("out"),e.target.classList.remove("class","activeSuggestion-nav-input-search"),$(".moto-result-nav-input-search:first-child").addClass("activeSuggestion-nav-input-search")}function firstHoverNav(){$(".moto-result-nav-input-search:first-child").addClass("activeSuggestion-nav-input-search")}function inputInNav(){var e=$(".nav-input-search").val().length;$(".moto-result-nav-input-search").length;e>=1&&($(".suggestions-nav-input-search").show(),$(".suggestions-nav-input-search").css("z-index","999"),$(".suggestions-nav-input-search").css("height","30vh"),$(".suggestions-div-nav-input-search").addClass("scrollySuggestion-nav-input-search"))}function inputOutNav(){setTimeout(function(){$(".suggestions-nav-input-search").hide(),$(".suggestions-div-nav-input-search").removeClass("scrollySuggestion-nav-input-search"),$(".suggestions-nav-input-search").css("z-index","0"),$(".suggestions-nav-input-search").css("height","0")},150)}document.addEventListener("click",closeSubmenu,!1),$(document).ready(function(){$(".nav-input-search").keyup(function(){var e=$(this).val(),t=$(this).val().length,s=0==t?null:e;try{$.ajax({type:"POST",data:{search:s},url:' <?php echo base_url("motorcycles/search_suggestion_nav"); ?>',success:function(e){""==e?inputOutNav():($(".suggestions-nav-input-search").html(e),inputInNav(),firstHoverNav()),t>=1?inputInNav():inputOutNav()}})}catch(e){console.log("Error")}})}),$(".closeFooterAd").click(function(){$("#addfooter").hide()});
        
        //   $(document).on("keyup","#search_mode",function(e){
        //       model = $("#search_mode").val();
        //       if(e.keyCode===13){
        //         window.location.href = "<?php echo base_url(); ?>motorcycles?model="+model;
        //       }
        //   });
          
        //   $(document).ready(function (e){
        //     $("#header_search_section").on('submit',(function(e){
        //     //e.preventDefault(); 
        //           slug = document.getElementById("brandmodel").getAttribute("data-value");
        //           document.getElementById("search_mode").value = slug;
        //     }));

        //     $.ajax({
        //         type: "GET",
        //         url: "<?php echo base_url()?>blogs/landingpageblogs",
        //         success: function(data){
        //           $("#showBlogs").html(data);
        //         },
        //     });
        //   });
        //   //Navigation bar
        //     const toggle = document.querySelector(".toggle");
        //     const menu = document.querySelector(".menu");
             
        //     /* Toggle mobile menu */
        //     function toggleMenu() {
        //         if (menu.classList.contains("active")) {
        //             menu.classList.remove("active");
                     
        //             // adds the menu (hamburger) icon
        //             toggle.querySelector("a").innerHTML = "<i class=’fas fa-bars’ style='color:white;'>≡</i>&nbsp;<span style='font-size: 16px;color:white;'>MENU</span>";
        //         } else {
        //             menu.classList.add("active");
                     
        //             // adds the close (x) icon
        //             toggle.querySelector("a").innerHTML = "<i class=’fas fa-times’ style='color:white;'>≡</i>&nbsp;<span style='font-size: 16px;color:white;'>MENU</span>";
        //         }
        //     }
             
        //     /* Event Listener */
        //     toggle.addEventListener("click", toggleMenu, false);

        //     const items = document.querySelectorAll(".item");
 
        //     /* Activate Submenu */
        //     function toggleItem() {
        //       if (this.classList.contains("submenu-active")) {
        //         this.classList.remove("submenu-active");
        //       } else if (menu.querySelector(".submenu-active")) {
        //         menu.querySelector(".submenu-active").classList.remove("submenu-active");
        //         this.classList.add("submenu-active");
        //       } else {
        //         this.classList.add("submenu-active");
        //       }
        //     }
             
        //     /* Event Listeners */
        //     for (let item of items) {
        //         if (item.querySelector(".submenu")) {
        //           item.addEventListener("click", toggleItem, false);
        //           item.addEventListener("keypress", toggleItem, false);
        //         }   
        //     }

        //     /* Close Submenu From Anywhere */
        //     function closeSubmenu(e) {
        //       let isClickInside = menu.contains(e.target);
             
        //       if (!isClickInside && menu.querySelector(".submenu-active")) {
        //         menu.querySelector(".submenu-active").classList.remove("submenu-active");
        //       }
        //     }
             
        //     /* Event listener */
        //     document.addEventListener("click", closeSubmenu, false);

        //     // $(document).on("click",".close",function(){
        //     //     $("#myModal").hide();
        //     //     $("#myModal iframe").attr("src", '');
        //     // });

        //     // $(document).on("click",".minimize",function(){
        //     //     $("#myModal").hide();
        //     //     $(".minbox").show();
        //     //     $("#myModal iframe").attr("src", '');
        //     // });

        //     // $(document).on("click",".minbox",function(){
        //     //     $("#myModal").show();
        //     //     vid = 'https://www.youtube.com/embed/jG3RfuyNt3M?autoplay=1';
        //     //     document.getElementById("vid").src = vid;
        //     //     $(".minbox").hide();
        //     // });

        //     // $(document).ready(function(){
        //     //     $("#myModal").show();
        //     // });
        //     // Get the modal
        //     // var modal = document.getElementById("myModal");

        //     // // Get the button that opens the modal
        //     // var btn = document.getElementById("myBtn");

        //     // // Get the <span> element that closes the modal
        //     // var span = document.getElementsByClassName("close")[0];

        //     // // When the user clicks the button, open the modal 
        //     // btn.onclick = function() {
        //     //   modal.style.display = "block";
        //     // }

        //     // // When the user clicks on <span> (x), close the modal
        //     // span.onclick = function() {
        //     //   modal.style.display = "none";
        //     //   $(".minbox").show();
        //     //   $("#myModal iframe").attr("src", '');
        //     // }

        //     // // When the user clicks anywhere outside of the modal, close it
        //     // window.onclick = function(event) {
        //     //   if (event.target == modal) {
        //     //     modal.style.display = "none";
        //     //     $(".minbox").show();
        //     //     $("#myModal iframe").attr("src", '');
        //     //   }
        //     // }

        //     function pickResultNav(slug){
        //         $(".nav-input-search").val(slug);
        //         split = slug.split(" ");
        //         brand = split[0];
        //         model = split[1];
        //         window.location.href = "<?php echo base_url(); ?>motorcycles"+"/"+brand+"/"+model;
                
        //         // setTimeout(function(){$(".nav-input-search2").trigger("click");},800)
        //     }

        //     function hoverInResNav (event){
        //         console.log(event.target);
        //         $(".activeSuggestion-nav-input-search").removeClass("activeSuggestion-nav-input-search");
        //         event.target.classList.add('class', 'activeSuggestion-nav-input-search');
        //         console.log("in");
        //     }

        //     function hoverOutResNav(event){
        //         console.log("out");
        //         event.target.classList.remove('class', 'activeSuggestion-nav-input-search');
        //         $(".moto-result-nav-input-search:first-child").addClass("activeSuggestion-nav-input-search");
                

        //     }

        //     function firstHoverNav(){
        //         $(".moto-result-nav-input-search:first-child").addClass("activeSuggestion-nav-input-search");
        //     }

        //     function inputInNav(){
        //         var searchres = $(".nav-input-search").val().length;
        //         var countresult  = $(".moto-result-nav-input-search").length;
        //             if(searchres >= 1){
        //                 $(".suggestions-nav-input-search").show();
        //                 $(".suggestions-nav-input-search").css("z-index","999");
        //                 $(".suggestions-nav-input-search").css("height","30vh");
        //                 // getMobileOperatingSystem("open");
        //                 $(".suggestions-div-nav-input-search").addClass("scrollySuggestion-nav-input-search");
        //             }
        //             // if(countresult >= 11){
        //             // }else{
        //             //  $(".suggestions-div").removeClass("scrollySuggestion");

        //             // }
        //     }

        //     function inputOutNav(){
        //         setTimeout(function(){
        //             $(".suggestions-nav-input-search").hide();
        //             $(".suggestions-div-nav-input-search").removeClass("scrollySuggestion-nav-input-search");
        //             $(".suggestions-nav-input-search").css("z-index","0");
        //             $(".suggestions-nav-input-search").css("height","0");


        //             // getMobileOperatingSystem("close");

        //         },150); 
        //     }

        //     $(document).ready(function(){

        //     $(".nav-input-search").keyup(function(){
        //                 var getVal = $(this).val();
        //                 var valLen = $(this).val().length;
        //                 var searchResult = valLen == 0 ?  null : getVal ;

        //                 try{
        //                     $.ajax({
        //                     type: "POST",
        //                     data:{ search : searchResult },
        //                     url:' <?php echo base_url("motorcycles/search_suggestion_nav"); ?>',
        //                     success:function(res){

        //                         if(res == ""){
        //                             inputOutNav();
        //                         }else{
        //                             $(".suggestions-nav-input-search").html(res);
        //                             inputInNav();
        //                             firstHoverNav();
        //                         }
        //                         if( valLen>= 1){
        //                             inputInNav();
                                
        //                         }else{
        //                             inputOutNav();

        //                         }
        //                     }

        //                 });

        //                 }catch (e){
        //                     console.log("Error");

        //                 }
        //             });
        //     });
        //     $('.closeFooterAd').click(function() {
        //         $('#addfooter').hide();
        //      });
