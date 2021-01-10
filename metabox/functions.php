<?php


function phosis_metaboxes(array $phosis){
    
    
    //Class Options
    $phosis[] = array(
        'id' => 'phosis_class_additional_meta',
        'title' => 'Class Additional Meta',
        'object_types' => array('classes'),
        'fields' => array(
            array(
                'name'           => 'Class Files',
                'id'             => '_class_files',
                'type'           => 'file_list',
                'show_option_none' => true,
                'default'          => '',
            ),
            array(
                'name'    => 'Document Display Mode',
                'id'      => '_document_display',
                'type'    => 'radio_inline',
                'options' => array(
                    'popup' => __( 'Pop Up', 'cmb2' ),
                    'page'   => __( 'Preview in Page', 'cmb2' ),
                ),
                'default' => 'popup',
            ),
        ), // fields array
    );
    
    //Class Options
    $phosis[] = array(
        'id' => 'phosis_class_additional_module_meta',
        'title' => 'Class Module Meta',
        'object_types' => array('classes'),
        'fields' => array(
            array(
                'name'           => 'Sidebar Menu',
                'desc'           => 'This will appear on the left sidebar.',
                'id'             => '_module_sidebar_menu',
                'type'             => 'select',
                'show_option_none' => true,
                'options'          =>  get_menu_list()
            ),
            array(
                'name'           => 'Sidebar Module Title',
                'desc'           => 'This will appear on the left sidebar.',
                'id'             => '_module_title_sidebar',
                'type'           => 'text',
                'default'           => 'Module ',
            ),
            array(
                'name'           => 'Module Title',
                'id'             => '_module_title',
                'type'           => 'text',
            ),
        ), // fields array
    );
    

    return $phosis;
}
add_filter('cmb2_meta_boxes','phosis_metaboxes');


