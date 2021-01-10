(function ($) {
    "use strict";
    
    
    
    if ($(".phosis_preloader").length) {
        jQuery(document).ready(function($) {
            jQuery("body").css('overflow', 'hidden');
        });
        jQuery(window).load(function() {
            setTimeout(
                function() {
                    jQuery('.phosis_preloader').fadeOut();
                    jQuery("body").css('overflow', 'visible');
                }, 2000);
        });


    }
    
    
    
    jQuery(document).ready(function ($) {
        
        $('.video_play_btn').magnificPopup({type:'iframe'});
        
        // Body
        if ($("body").length) {
            new WOW().init();
            $('body').materialScrollTop();
        }
        
        // Responsive Menu
        if ($(".phosis_responsive_menu_btn").length) {
            $(".phosis_responsive_menu_btn, .phosis_menu ul li a").on('click', function(){
                $('.phosis_menu').toggleClass('phosis_menu_opened');
                $('.phosis_responsive_menu_btn .fa').toggleClass('fa-bars').toggleClass('fa-close');
            });
        }
        
        // Include Slider
        if ($(".include-swiper").length) {
            var galleryThumbs = new Swiper(".include-thumb", {
                spaceBetween: 10,
                slidesPerView: 3,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                loop: true,
                freeMode: true,
                watchSlidesVisibility: true,
                watchSlidesProgress: true,

            });
            var galleryTop = new Swiper(".include-swiper", {
                spaceBetween: 0,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                thumbs: {
                    swiper: galleryThumbs
                }
            });
        }

    $("#user_login").attr('required','required');
    $("#user_pass").attr('required','required');
    
      $("th.membership-actions").html('<span class="nobr">Action</span>');
        
    });

}(jQuery));
