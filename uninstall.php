<?php

// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
 
delete_option('wpsendyng_header_logo');
delete_option('wpsendyng_header_width');
delete_option('wpsendyng_header_height');
delete_option('wpsendyng_header_color');
delete_option('wpsendyng_footer_color');
delete_option('wpsendyng_button_color');
delete_option('wpsendyng_sendy_title');
delete_option('wpsendyng_featured_ids');
delete_option('wpsendyng_post_ids');
delete_option('wpsendyng_use_featured_image');
