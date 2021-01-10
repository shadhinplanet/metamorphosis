<?php

 $user_id=get_current_user_id();
$plans=wc_memberships_get_membership_plans(); 
sort($plans);
$user_memberships = wc_memberships_get_user_active_memberships($user_id);
$trial_membership = wc_memberships_is_user_active_member($user_id, 'trial-subscription');
$monthly_membership = wc_memberships_is_user_active_member($user_id, 'monthly-subscription');
$yearly_membership = wc_memberships_is_user_active_member($user_id, 'yearly-subscription');
$lock = false;

    $plan_selection='';
    if( $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) ) {

        if(isset($_POST['trial-selection'])){

            $plan_selection=$_POST['trial-selection'];

            if($plan_selection !=''){
                $plan_selection=explode(" ", $plan_selection);

                $plan_id=$plan_selection[0];
                $plan_slug=$plan_selection[1];

                
                $args=array('plan_id'=> $plan_id,
                    'user_id'=> $user_id,
                );
                $membership=wc_memberships_is_user_active_member($user_id, $plan_slug);

                if( !$membership) {
                    wc_memberships_create_user_membership($args);

$q = new WP_Query(
    array(
        'posts_per_page' => -1,             
        'post_type' => 'classes', 
        'order' => 'ASC', 
        'orderby' => 'title', 
    )
);      
if($q->have_posts()){
    while($q->have_posts()){
        $q->the_post();

        $idd = get_the_ID();
        $class_access = can_user_access_content($user_id,$idd);

        if($class_access){
            echo "<script>
                window.location.href = '".get_the_permalink()."';
            </script>";
        }

    }
}
                    
                    
                    
                }
            }
        }else{
            echo '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
   <strong>Attention!</strong> You need to select a class!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        }
        
        
    }
    
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Metamorphosis
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0" />
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <link rel="apple-touch-icon" sizes="57x57"
        href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60"
        href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72"
        href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76"
        href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114"
        href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120"
        href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144"
        href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152"
        href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180"
        href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
        href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96"
        href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/favicons/favicon-16x16.png">
    <link rel="manifest" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage"
        content="<?php echo esc_url(get_template_directory_uri()); ?>/assets/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!--    Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <!--    font-family: 'Pacifico', cursive;
-->



    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="fb-root"></div>
    <script>
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

        <?php 
        
            global $woocommerce;
$cart_count = $woocommerce->cart->cart_contents_count;
if($cart_count == 0){
    echo '<style>
        #wcspc-count {
	display: none;
}
    </style>';
}
        ?>


<?php if(is_user_logged_in(  )): 
$user_id=get_current_user_id();
$plans=wc_memberships_get_membership_plans(); 
$user_memberships = wc_memberships_get_user_active_memberships($user_id);
$trial_membership = wc_memberships_is_user_active_member($user_id, 'trial-subscription');
$monthly_membership = wc_memberships_is_user_active_member($user_id, 'monthly-subscription');
$yearly_membership = wc_memberships_is_user_active_member($user_id, 'yearly-subscription');

if(!$monthly_membership || !$yearly_membership){
    echo '<style>
        td.membership-actions.order-actions a.button.cancel{
            display:none;
    </style>';
}

    ?>

<?php endif; ?>



    <?php if(is_front_page()): ?>
    <div class="phosis_preloader">
        <div class="sk-chase">
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
        </div>
    </div>
    <?php endif; ?>

    <div class="phosis_header_top_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="phosis_header_top">
                        <div class="phosis_header_top_left">
                            <a href="<?php echo site_url(); ?>"><img
                                    src="<?php echo get_template_directory_uri()?>/assets/img/meta-logo.jpg" alt=""></a>
                            <ul>
                                <li>Have any question?</li>
                                <li><a href="#"><i class="fa fa-phone"></i><span>(330) 768-7688</span></a></li>
                                <li><a href="#">N. Canton, OH 44720, US</a></li>
                            </ul>
                        </div>
                        <div class="phosis_header_top_right">
                            <div class="phosis_top_social_media">
                                <ul>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                            <div class="phosis_buttons_area">
                                <?php if( is_user_logged_in() ): ?>
                                <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"
                                    title="<?php _e('Dashboard',''); ?>" class="btn_color1">Dashboard</a>
                                <a href="<?php echo wp_logout_url(); ?>" class="btn_color2">Logout</a>
                                <?php else: ?>
                                <a target="_blank" href="<?php echo esc_url(site_url('plans'))?>" class="btn_color1">Enroll</a>
                                <a href="<?php echo esc_url(site_url('login'))?>"
                                    title="<?php _e('Login',''); ?>" class="btn_color2">Login</a>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="phosis_menu_area">
        <!--
       <div class="phosis_responsive_menu_btn">
           <i class="fa fa-bars"></i>
       </div>
-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="phosis_menu">
                        <?php 
                        if ( has_nav_menu( 'primary-menu' ) ) {
                            wp_nav_menu( array( 
                                'theme_location' => 'primary-menu',
                                'container' => '',
                                'menu_class' => 'phosis_header_menu',
                                'menu_id' => 'phosis_header_menu',
                            ) );
                        }?>
                    </div>
                    <div class="mobile_menu">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">

                                <?php 
                                if ( has_nav_menu( 'primary-menu' ) ) {
                                    wp_nav_menu( array( 
                                        'theme_location' => 'primary-menu',
                                        'container' => '',
                                        'menu_class' => 'navbar-nav',
                                        'walker' => new WP_Bootstrap_Navwalker(),
                                    ) );
                                }?>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>