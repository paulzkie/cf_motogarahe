$("#slideshow-dealer .slick-dealer").slick({lazyLoad:"ondemand",slidesToShow:4,slidesToScroll:1,rows:3,dots:!0,responsive:[{breakpoint:1024,settings:{slidesToShow:3,slidesToScroll:1}},{breakpoint:768,settings:{slidesToShow:3,slidesToScroll:1,infinite:!0,speed:300}}]}),$("#slideshow-merchant .slick-merchant").slick({lazyLoad:"ondemand",slidesToShow:4,slidesToScroll:1,dots:!0,responsive:[{breakpoint:1024,settings:{slidesToShow:3,slidesToScroll:1}},{breakpoint:768,settings:{slidesToShow:1,slidesToScroll:1,rows:1,infinite:!0,speed:300}}]}),$("#slideshowbanner .sliderbanners").slick({lazyLoad:"ondemand",slidesToShow:1,slidesToScroll:1,dots:!0,autoplay:!0,autoplaySpeed:3000,responsive:[{breakpoint:1024,settings:{slidesToShow:3,slidesToScroll:1}},{breakpoint:768,settings:{slidesToShow:1,slidesToScroll:1,rows:1,infinite:!0,speed:300}}]}),document.addEventListener("DOMContentLoaded",function(){let e;if("IntersectionObserver"in window){e=document.querySelectorAll(".lazy-load");let o=new IntersectionObserver(function(e,s){e.forEach(function(e){if(e.isIntersecting){let s=e.target;s.src=s.dataset.src,s.classList.remove("lazy-load"),o.unobserve(s)}})});e.forEach(function(e){o.observe(e)})}else{let s;function o(){s&&clearTimeout(s),s=setTimeout(function(){let s=window.pageYOffset;e.forEach(function(e){e.offsetTop<window.innerHeight+s&&(e.src=e.dataset.src,e.classList.remove("lazy-load"))}),0==e.length&&(document.removeEventListener("scroll",o),window.removeEventListener("resize",o),window.removeEventListener("orientationChange",o))},20)}e=document.querySelectorAll(".lazy-load"),document.addEventListener("scroll",o),window.addEventListener("resize",o),window.addEventListener("orientationChange",o)}});

        //       $('#slideshow-dealer .slick-dealer').slick({
        //         lazyLoad: 'ondemand',
        //           slidesToShow: 4,
        //           slidesToScroll: 1,
        //           rows: 3,
        //           dots: true,
        //           // autoplay: true,
        //           // autoplaySpeed: 2000,
        //           responsive: [
        //                         {
        //                         breakpoint: 1024,
        //                         settings: {
        //                             slidesToShow: 3,
        //                             slidesToScroll: 1,
        //                           }
        //                         },
        //                         {
        //                           breakpoint: 768,
        //                           settings: {
        //                               slidesToShow: 3,
        //                               slidesToScroll: 1,
        //                               infinite: true,
        //                               speed: 300
        //                           }
        //                         }
        //                       ]
        //       });
              
        //       $('#slideshow-merchant .slick-merchant').slick({
        //         lazyLoad: 'ondemand',
        //           slidesToShow: 4,
        //           slidesToScroll: 1,
        //           dots: true,
        //           // autoplay: true,
        //           // autoplaySpeed: 2000,
        //           responsive: [
        //                         {
        //                         breakpoint: 1024,
        //                         settings: {
        //                             slidesToShow: 3,
        //                             slidesToScroll: 1,
        //                           }
        //                         },
        //                         {
        //                           breakpoint: 768,
        //                           settings: {
        //                               slidesToShow: 1,
        //                               slidesToScroll: 1,
        //                               rows: 1,
        //                               infinite: true,
        //                               speed: 300
        //                           }
        //                         }
        //                       ]
        //       });
              
        //       $('#slideshowbanner .sliderbanners').slick({
        //         lazyLoad: 'ondemand',
        //           slidesToShow: 1,
        //           slidesToScroll: 1,
        //           dots: true,
        //           autoplay: true,
        //           autoplaySpeed: 1300,
        //           responsive: [
        //                         {
        //                         breakpoint: 1024,
        //                         settings: {
        //                             slidesToShow: 3,
        //                             slidesToScroll: 1,
        //                           }
        //                         },
        //                         {
        //                           breakpoint: 768,
        //                           settings: {
        //                               slidesToShow: 1,
        //                               slidesToScroll: 1,
        //                               rows: 1,
        //                               infinite: true,
        //                               speed: 300
        //                           }
        //                         }
        //                       ]
        //       });
        //     // lazyload
        //     document.addEventListener("DOMContentLoaded", function() {
        //     let lazyloadImages;
        //     if("IntersectionObserver" in window) {
        //       lazyloadImages = document.querySelectorAll(".lazy-load");
        //       let imageObserver = new IntersectionObserver(function(entries, observer) {
        //         entries.forEach(function(entry) {
        //           if(entry.isIntersecting) {
        //             let image = entry.target;
        //             image.src = image.dataset.src;
        //             image.classList.remove("lazy-load");
        //             imageObserver.unobserve(image);
        //           }
        //         });
        //       });
        //       lazyloadImages.forEach(function(image) {
        //         imageObserver.observe(image);
        //       });
        //     } else {
        //       let lazyloadThrottleTimeout;
        //       lazyloadImages = document.querySelectorAll(".lazy-load");

        //       function lazyload() {
        //         if(lazyloadThrottleTimeout) {
        //           clearTimeout(lazyloadThrottleTimeout);
        //         }
        //         lazyloadThrottleTimeout = setTimeout(function() {
        //           let scrollTop = window.pageYOffset;
        //           lazyloadImages.forEach(function(img) {
        //             if(img.offsetTop < (window.innerHeight + scrollTop)) {
        //               img.src = img.dataset.src;
        //               img.classList.remove("lazy-load");
        //             }
        //           });
        //           if(lazyloadImages.length == 0) {
        //             document.removeEventListener("scroll", lazyload);
        //             window.removeEventListener("resize", lazyload);
        //             window.removeEventListener("orientationChange", lazyload);
        //           }
        //         }, 20);
        //       }
        //       document.addEventListener("scroll", lazyload);
        //       window.addEventListener("resize", lazyload);
        //       window.addEventListener("orientationChange", lazyload);
        //     }
        //   })
          
