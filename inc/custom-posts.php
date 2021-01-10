<?php 

add_action( 'init', 'phosis_custom_post' );
function phosis_custom_post() {
    register_post_type( 'classes',
       array(
           'labels' => array(
               'name' => __( 'Clssses' ),
               'singular_name' => __( 'Class' )
           ),
           'supports' => array('title', 'editor', 'thumbnail'),
           'public' => true,
           'show_in_rest' => true,
           'rest_base'          => 'class',
           'rest_controller_class' => 'WP_REST_Posts_Controller',
       ));
}

function phosis_custom_post_taxonomy() {
    register_taxonomy(
        'classes_cat',  
        'classes',                  
        array(
            'hierarchical'          => true,
            'label'                 => 'Class Category',  
            'query_var'             => true,
            'show_admin_column'     => true,
            'show_in_rest'          => true,
            'rewrite'               => array(
                'slug'              => 'class-category', 
                'with_front'        => false 
            )
        )
    );
}
add_action( 'init', 'phosis_custom_post_taxonomy');