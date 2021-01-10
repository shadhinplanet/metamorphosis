<?php 
/**
 * Enqueue scripts and styles.
 */

function lovette_branding_scripts() {
    $theme_version = wp_get_theme()->get( 'Version' );
    
    wp_enqueue_style( 'metamorphosis-normalize', get_template_directory_uri() . '/assets/css/normalize.css?ts='.time(), array(), '1.0', 'all');
    
    wp_enqueue_style( 'metamorphosis-animate', get_template_directory_uri() . '/assets/css/animate.min.css?ts='.time());
    
    wp_enqueue_style( 'metamorphosis-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css?ts='.time());
    
    wp_enqueue_style( 'metamorphosis-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css?ts='.time());
    
    wp_enqueue_style( 'metamorphosis-font-awesome-5', get_template_directory_uri() . '/assets/css/fontawesome.css?ts='.time());    
    
    wp_enqueue_style( 'metamorphosis-custom-fonts', get_template_directory_uri() . '/assets/fonts/custom-fonts.css?ts='.time());
    
    wp_enqueue_style( 'metamorphosis-scrolltop', get_template_directory_uri() . '/assets/css/material-scrolltop.css?ts='.time());
    
    wp_enqueue_style( 'metamorphosis-reset', get_template_directory_uri() . '/assets/css/main.css?ts='.time());
        
    wp_enqueue_style( 'metamorphosis-sweetalert2', get_template_directory_uri() . '/assets/css/sweetalert2.min.css?ts='.time());    
    
    wp_enqueue_style( 'metamorphosis-owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css?ts='.time());
    wp_enqueue_style( 'metamorphosis-swiper-carousel', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css?ts='.time());  
    
    wp_enqueue_style( 'metamorphosis-hover', get_template_directory_uri() . '/assets/css/hover.css?ts='.time());
    wp_enqueue_style( 'metamorphosis-magnific', get_template_directory_uri() . '/assets/css/magnific-popup.css?ts='.time());
    
    
    wp_enqueue_style( 'metamorphosis-header_top', get_template_directory_uri() . '/assets/css/widgets/header_top.css?ts='.time());
    wp_enqueue_style( 'metamorphosis-partner', get_template_directory_uri() . '/assets/css/widgets/partner.css?ts='.time());
    wp_enqueue_style( 'metamorphosis-hero', get_template_directory_uri() . '/assets/css/widgets/hero.css?ts='.time());
    wp_enqueue_style( 'metamorphosis-intro', get_template_directory_uri() . '/assets/css/widgets/intro.css?ts='.time());
    wp_enqueue_style( 'metamorphosis-titles', get_template_directory_uri() . '/assets/css/widgets/titles.css?ts='.time());
    wp_enqueue_style( 'metamorphosis-how_it_works', get_template_directory_uri() . '/assets/css/widgets/how_it_works.css?ts='.time());
    wp_enqueue_style( 'metamorphosis-tabs', get_template_directory_uri() . '/assets/css/widgets/tabs.css?ts='.time());
    wp_enqueue_style( 'metamorphosis-courses', get_template_directory_uri() . '/assets/css/widgets/courses.css?ts='.time());
    wp_enqueue_style( 'metamorphosis-classes', get_template_directory_uri() . '/assets/css/widgets/classes.css?ts='.time());
    wp_enqueue_style( 'metamorphosis-need_help', get_template_directory_uri() . '/assets/css/widgets/need_help.css?ts='.time());
    wp_enqueue_style( 'metamorphosis-pricing', get_template_directory_uri() . '/assets/css/widgets/pricing.css?ts='.time());
    wp_enqueue_style( 'metamorphosis-sign_up_process', get_template_directory_uri() . '/assets/css/widgets/sign_up_process.css?ts='.time());
    wp_enqueue_style( 'metamorphosis-faq', get_template_directory_uri() . '/assets/css/widgets/faq.css?ts='.time());
    wp_enqueue_style( 'metamorphosis-mentor_qoute', get_template_directory_uri() . '/assets/css/widgets/mentor_qoute.css?ts='.time());
    wp_enqueue_style( 'metamorphosis-footer', get_template_directory_uri() . '/assets/css/widgets/footer.css?ts='.time());
    wp_enqueue_style( 'metamorphosis-banners', get_template_directory_uri() . '/assets/css/widgets/banners.css?ts='.time());
    wp_enqueue_style( 'metamorphosis-two_column', get_template_directory_uri() . '/assets/css/widgets/two_column.css?ts='.time());
    wp_enqueue_style( 'metamorphosis-single_class', get_template_directory_uri() . '/assets/css/widgets/single_class.css?ts='.time());
    
        
        
    wp_enqueue_style( 'metamorphosis-style', get_stylesheet_uri().'?ts='.time(), array(), $theme_version );
    wp_style_add_data( 'metamorphosis-style', 'rtl', 'replace' );
    
    wp_enqueue_style( 'metamorphosis-responsive', get_template_directory_uri() . '/assets/css/responsive.css?ts='.time(), array(), '4.7.0', 'all');

    wp_enqueue_script( 'metamorphosis-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );


    wp_enqueue_script('jquery');
    
    wp_enqueue_script( 'metamorphosis-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js?ts='.time(), array('jquery'), '4.1.3', true );
    
    wp_enqueue_script( 'metamorphosis-scrolltop', get_template_directory_uri() . '/assets/js/material-scrolltop.js?ts='.time(), array('jquery'), '1.5.0', true );
    
    wp_enqueue_script( 'metamorphosis-sticky', get_template_directory_uri() . '/assets/js/jquery.sticky.js?ts='.time(), array('jquery'), '1.5.0', true );    
    
    wp_enqueue_script( 'metamorphosis-owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js?ts='.time(), array('jquery'), '2.0', true );
    wp_enqueue_script( 'metamorphosis-swiper-carousel', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js?ts='.time(), array('jquery'), '2.0', true );
    
    
    wp_enqueue_script( 'metamorphosis-wow', get_template_directory_uri() . '/assets/js/wow-1.3.0.min.js?ts='.time(), array('jquery'), '1.3.0', true );
    wp_enqueue_script( 'metamorphosis-sweetalert2', get_template_directory_uri() . '/assets/js/sweetalert2.all.min.js?ts='.time(), array('jquery'), '1.3.0', true );
    
    wp_enqueue_script( 'metamorphosis-magnific', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js?ts='.time(), array('jquery'), '1.3.0', true );
    
    
    wp_enqueue_script( 'metamorphosis-activate', get_template_directory_uri() . '/assets/js/main.js?ts='.time(), array('jquery'), '1.0', true );
    
    
    

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'lovette_branding_scripts' );