<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Metamorphosis
 */

?>

<style>
.phosis_call_to_action_area .phosis_buttons {
    margin: 75px auto;
}
</style>
<?php

if(!is_user_logged_in() && !is_page( 'login' )) : ?>
<section class="phosis_call_to_action_area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="phosis_more_classes">
                    <div class="phosis_buttons">
                            <a href="<?php echo esc_url(site_url('get-started'))?>" target="_blank" rel="nofollow" class="btn_color2">Start Your Free Trial</a>
                            <a href="<?php echo esc_url(site_url('get-started'))?>" target="_blank" rel="nofollow" class="btn_color3">Buy Now</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<footer class="phosis_footer_area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="phosis_footer">
                    <p>Copyright &copy; 2020 Meta-Morphosis - All Rights Reserved</p>
                    <p>Designed By: <a href="https://nnennalovette.com" target="_blank">The NL Design Agency</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<button class="material-scrolltop " type="button"></button>
<?php wp_footer(); ?>

</body>
</html>
