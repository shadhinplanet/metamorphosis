<?php

add_action( 'after_setup_theme', 'swp_theme_setup' );

if ( ! function_exists( 'swp_theme_setup' ) ) {
    function swp_theme_setup(){
        /********* TinyMCE Buttons ***********/
        add_action( 'init', 'swp_buttons' );
    }
}


/********* TinyMCE Buttons ***********/
if ( ! function_exists( 'swp_buttons' ) ) {
    function swp_buttons() {
        if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
            return;
        }

        if ( get_user_option( 'rich_editing' ) !== 'true' ) {
            return;
        }

        add_filter( 'mce_external_plugins', 'swp_add_buttons' );
        add_filter( 'mce_buttons', 'swp_register_buttons' );
    }
}

if ( ! function_exists( 'swp_add_buttons' ) ) {
    function swp_add_buttons( $plugin_array ) {
        $plugin_array['swpbtn'] = get_stylesheet_directory_uri().'/assets/js/tinymce_buttons.js';
        return $plugin_array;
    }
}

if ( ! function_exists( 'swp_register_buttons' ) ) {
    function swp_register_buttons( $buttons ) {
        array_push( $buttons, 'swpbtn' );
        return $buttons;
    }
}