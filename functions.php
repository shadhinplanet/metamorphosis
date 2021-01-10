<?php
/**
 * Metamorphosis functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Metamorphosis
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'metamorphosis_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function metamorphosis_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Metamorphosis, use a find and replace
		 * to change 'metamorphosis' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'metamorphosis', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary-menu' => esc_html__( 'Primary', 'metamorphosis' ),
                'module-menu' => esc_html__( 'Module Menu', 'metamorphosis' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'metamorphosis_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'metamorphosis_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function metamorphosis_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'metamorphosis_content_width', 640 );
}
add_action( 'after_setup_theme', 'metamorphosis_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function metamorphosis_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'metamorphosis' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'metamorphosis' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'metamorphosis_widgets_init' );

add_action('wp_logout','auto_redirect_external_after_logout');

function auto_redirect_external_after_logout(){
    wp_redirect( site_url() );
    exit();
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Load Theme Assets
 */
require get_template_directory() . '/inc/theme_assets.php';

/**
 * Load Custom Post Types
 */
require get_template_directory() . '/inc/custom-posts.php';

/**
 * Load Custom Post Types
 */
require get_template_directory() . '/inc/navwalker.php';

/**
 * Load Custom Post Types
 */
require get_template_directory() . '/inc/woo-customise.php';


/**
 * Load Custom Post Types
 */
require get_template_directory() . '/inc/shortcodes.php';



/**
 * Meta Box.
 */    
require get_template_directory() . '/metabox/init.php';
require get_template_directory() . '/metabox/functions.php';



require get_template_directory() . '/inc/custom-login-from.php';


// Get Menu List
function get_menu_list(){
    $wp_menus = get_terms('nav_menu');

    $menus = array('0'=>'None');
    $theme_locations = get_nav_menu_locations();
    $theme_locations = array_flip($theme_locations);
    foreach($wp_menus as $item){
        $menus[$item->term_id] = $item->name;
    }
    return $menus;
}


add_action('admin_head', 'lovette_admin_css');

function lovette_admin_css() {
    echo '<style>
   .ui-dialog.ui-widget.ui-widget-content.ui-corner-all.ui-front.ui-draggable {
	z-index: 9999999 !important;
}
.cs-dialog-load {
	max-height: 250px;
}
  </style>';
}
function can_user_access_content($user_id,$post_id){
    //check if there's a force public on this content    
    if(get_post_meta($post_id,'_wc_memberships_force_public',true)=='yes') return true;
    $args = array( 'status' => array( 'active' ));
    $plans = wc_memberships_get_user_memberships( $user_id, $args );
    $user_plans = array();
    foreach($plans as $plan){
        array_push($user_plans,$plan->plan_id);
    }
    $rules = wc_memberships()->get_rules_instance()->get_post_content_restriction_rules( $post_id );

    foreach($rules as $rule){
        if(in_array($rule->get_membership_plan_id(), $user_plans)){
            return true;
        }
    }       
    return false;
}