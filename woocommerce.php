<?php
/**
 * The template for WooCommerce Products
 */

get_header();
?>

<section class="phosis_woocommerce_area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php woocommerce_content(); ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
