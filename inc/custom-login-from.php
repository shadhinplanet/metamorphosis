<?php

function phosis_add_login_shortcode() {
	add_shortcode( 'phosis-login', 'phosis_login_form_shortcode' );
}

function phosis_login_form_shortcode() {   
   
	if (is_user_logged_in())		
		return '<p>Welcome. You are logged in!</p>'; ?>
    <div class="phosis-login-form">
        <?php  return wp_login_form( 
            array(
                'echo'           => true,
                'redirect'       => isset($_GET['redirect_to']) ? $_GET['redirect_to']: home_url(),
                'form_id'        => 'loginform',
                'label_username' => __( 'Username or Email Address' ),
                'label_password' => __( 'Password' ),
                'label_remember' => __( 'Remember Me' ),
                'label_log_in'   => __( 'Log In' ),
                'id_username'    => 'user_login',
                'id_password'    => 'user_pass',
                'id_remember'    => 'rememberme',
                'id_submit'      => 'wp-submit',
                'remember'       => true,
                'value_username' => '',
                'value_remember' => false,
            )
        ); ?>

    </div>

<?php 
   }

add_action( 'init', 'phosis_add_login_shortcode' );
