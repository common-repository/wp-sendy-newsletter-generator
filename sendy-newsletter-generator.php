<?php
/**
 * Plugin Name: WP Sendy Newsletter Generator
 * Plugin URI: http://www.wpsendynewsletter.com/
 * Description: A simple, free newsletter generator that is compatible with Sendy.co.
 * Version: 1.0.1
 * Author: Brent Wilson
 * Author URI: http://www.brentwilson.me/
 */

add_action( 'admin_menu', 'wpsendyng_admin_menu' );

function wpsendyng_admin_menu() {
	add_menu_page(
		'Sendy Newsletter Options',
		'Sendy Newsletter',
		'manage_options',
		'wpsendyng-options',
		'wpsendyng_newsletter_options',
		'dashicons-tickets',
		100  
	);
}

/*WordPress Settings API Demo*/

function wpsendyng_display_options() {
	//section name, display name, callback to print description of section, page to which section is attached.
	add_settings_section(
		'header_section',
		'Template Options',
		'wpsendyng_display_header_options_content',
		'wpsendyng-options'
	);

	//setting name, display name, callback to print form element, page in which field is displayed, section to which it belongs.
	//last field section is optional.
	add_settings_field(
		'wpsendyng_header_logo',
		'Logo Url',
		'wpsendyng_display_logo_form_element',
		'wpsendyng-options',
		'header_section'
	);
	add_settings_field(
		'wpsendyng_header_width',
		'Header Logo Width',
		'wpsendyng_display_logo_width_form_element',
		'wpsendyng-options',
		'header_section'
	);
	add_settings_field(
		'wpsendyng_header_height',
		'Header Logo Height',
		'wpsendyng_display_logo_height_form_element',
		'wpsendyng-options',
		'header_section'
	);
	add_settings_field(
		'wpsendyng_header_color',
		'Header Background Color',
		'wpsendyng_display_header_color_form_element',
		'wpsendyng-options',
		'header_section'
	);
	add_settings_field(
		'wpsendyng_footer_color',
		'Footer Background Color',
		'wpsendyng_display_footer_color_form_element',
		'wpsendyng-options',
		'header_section'
	);
	add_settings_field(
		'wpsendyng_button_color',
		'Button Color',
		'wpsendyng_display_button_color_form_element',
		'wpsendyng-options',
		'header_section'
	);
	add_settings_field(
		'wpsendyng_sendy_title',
		'Title',
		'wpsendyng_display_title_form_element',
		'wpsendyng-options',
		'header_section'
	);
	add_settings_field(
		'wpsendyng_featured_ids',
		'Featured IDs',
		'wpsendyng_display_featured_form_element',
		'wpsendyng-options',
		'header_section'
	);
	add_settings_field(
		'wpsendyng_post_ids',
		'Post IDs',
		'wpsendyng_display_post_ids_form_element',
		'wpsendyng-options',
		'header_section'
	);
	
	add_settings_field(
		'wpsendyng_use_featured_image',
		'Use Featured Image',
		'wpsendyng_display_use_featured_image_element',
		'wpsendyng-options',
		'header_section'
	);

	//section name, form element name, callback for sanitization
	register_setting('header_section', 'wpsendyng_header_logo');
	register_setting('header_section', 'wpsendyng_header_width');
	register_setting('header_section', 'wpsendyng_header_height');
	register_setting('header_section', 'wpsendyng_header_color');
	register_setting('header_section', 'wpsendyng_footer_color');
	register_setting('header_section', 'wpsendyng_button_color');
	register_setting('header_section', 'wpsendyng_sendy_title');
	register_setting('header_section', 'wpsendyng_featured_ids');
	register_setting('header_section', 'wpsendyng_post_ids');
	register_setting('header_section', 'wpsendyng_use_featured_image');
}

function wpsendyng_display_header_options_content() {
	echo "Fill in the below options to customize the output of your newsletter.";
}
function wpsendyng_display_logo_form_element() {
?>
	<input type="text" name="wpsendyng_header_logo" id="wpsendyng_header_logo" value="<?php echo get_option('wpsendyng_header_logo'); ?>" />
<?php
}
function wpsendyng_display_logo_width_form_element() {
?>
	<input type="text" name="wpsendyng_header_width" id="wpsendyng_header_width" value="<?php echo get_option('wpsendyng_header_width'); ?>" />
<?php
}
function wpsendyng_display_logo_height_form_element() {
?>
	<input type="text" name="wpsendyng_header_height" id="wpsendyng_header_height" value="<?php echo get_option('wpsendyng_header_height'); ?>" />
<?php
}
function wpsendyng_display_header_color_form_element() {
?>
	<input type="text" name="wpsendyng_header_color" id="wpsendyng_header_color" value="<?php echo get_option('wpsendyng_header_color'); ?>" />
<?php
}
function wpsendyng_display_footer_color_form_element() {
?>
	<input type="text" name="wpsendyng_footer_color" id="wpsendyng_footer_color" value="<?php echo get_option('wpsendyng_footer_color'); ?>" />
<?php
}
function wpsendyng_display_button_color_form_element() {
?>
	<input type="text" name="wpsendyng_button_color" id="wpsendyng_button_color" value="<?php echo get_option('wpsendyng_button_color'); ?>" />
<?php
}
function wpsendyng_display_title_form_element() {
?>
	<input type="text" name="wpsendyng_sendy_title" id="wpsendyng_sendy_title" value="<?php echo get_option('wpsendyng_sendy_title'); ?>" />
	<p>The Title of your Newsletter</p>
<?php
}
function wpsendyng_display_featured_form_element() {
?>
	<input type="text" name="wpsendyng_featured_ids" id="wpsendyng_featured_ids" value="<?php echo get_option('wpsendyng_featured_ids'); ?>" />
	<p>Input Post IDs seperated by a comma.</p>
<?php
}
function wpsendyng_display_post_ids_form_element() {
?>
	<input type="text" name="wpsendyng_post_ids" id="wpsendyng_post_ids" value="<?php echo get_option('wpsendyng_post_ids'); ?>" />
	<p>Input Post IDs seperated by a comma.</p>
<?php
}
function wpsendyng_display_use_featured_image_element() {
?>
	<input type="checkbox" id="wpsendyng_use_featured_image" name="wpsendyng_use_featured_image" value="1"<?php checked(1, get_option('wpsendyng_use_featured_image'), true ); ?>/>
<?php
}

add_action('admin_init', 'wpsendyng_display_options');

function wpsendyng_add_new_image_size() {
    add_image_size( 'wpsendyng_featured_1', 1200, 675, true ); //mobile
}
add_action( 'after_setup_theme', 'wpsendyng_add_new_image_size' );

function wpsendyng_newsletter_options() {
	
	$site_url = site_url();
	$title = get_option('wpsendyng_sendy_title');
	$header_logo = get_option('wpsendyng_header_logo');
	$header_width = get_option('wpsendyng_header_width', '250');
	$header_height = get_option('wpsendyng_header_height', '250');
	$header_color = get_option('wpsendyng_header_color', '#343a40');
	$footer_color = get_option('wpsendyng_footer_color', '#343a40');
	$button_color = get_option('wpsendyng_button_color', '#c82333');
	
	$use_featured_image = get_option('wpsendyng_use_featured_image');
	
	$p_ids = get_option('wpsendyng_post_ids');
	$f_ids = get_option('wpsendyng_featured_ids');
	
	$post_ids = explode(',', $p_ids);
	$featured_ids = explode(',', $f_ids);
	
	$args = array(
	   'post_type' => 'post',
	   'post__in'      => $post_ids,
	   'orderby'	=>	'ID',
	   'order'		=>	'DESC'
	);
	// The Query
	$the_query = new WP_Query( $args );

	$featured_args = array(
	   'post_type' => 'post',
	   'post__in'      => $featured_ids,
	   'orderby'	=>	'post__in'
	);
	// The Query
	$featured_query = new WP_Query( $featured_args );
	

?>
		<div class="wrap">
		<div id="icon-options-general" class="icon32"></div>
		<h1>Sendy Newsletter Generator Options</h1>
		<form method="post" action="options.php">
			<?php
		   
				//add_settings_section callback is displayed here. For every new section we need to call settings_fields.
				settings_fields('header_section');
			   
				// all the add_settings_field callbacks is displayed here
				do_settings_sections("wpsendyng-options");
		   
				// Add the submit button to serialize the options
				submit_button();
			   
			?>         
		</form>
	</div>
	
	<div class="wrap">
		<h2>Newsletter HTML</h2>
		<p>Copy and paste the below HTML into Sendy using the source button.</p>
	</div>
	<?php

	if ( $the_query->have_posts() ) {
		$html = '';

		$html .='
		<!doctype html>
			<html>
			<head>
			<title>' . $title . '</title>
			<style type="text/css">
			/* CLIENT-SPECIFIC STYLES */
			body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
			table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
			img { -ms-interpolation-mode: bicubic; }

			/* RESET STYLES */
			img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
			table { border-collapse: collapse !important; }
			body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }

			/* iOS BLUE LINKS */
			a[x-apple-data-detectors] {
				color: inherit !important;
				text-decoration: none !important;
				font-size: inherit !important;
				font-family: inherit !important;
				font-weight: inherit !important;
				line-height: inherit !important;
			}

			/* MOBILE STYLES */
			@media screen and (max-width: 600px) {
			  .img-max {
				width: 100% !important;
				max-width: 100% !important;
				height: auto !important;
			  }

			  .max-width {
				max-width: 100% !important;
			  }

			  .mobile-wrapper {
				width: 85% !important;
				max-width: 85% !important;
			  }

			  .mobile-padding {
				padding-left: 5% !important;
				padding-right: 5% !important;
			  }
			  .img-fluid {
				  max-width: 600px;
			  }
			}

			/* ANDROID CENTER FIX */
			div[style*="margin: 16px 0;"] { margin: 0 !important; }
			</style>
			</head>
			<body style="margin: 0 !important; padding: 0; !important background-color: #ffffff;" bgcolor="#ffffff">

			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td align="center" valign="top" width="100%" bgcolor="' . $header_color . '" style="background: ' . $header_color . ' background-size: cover; padding: 0px 15px;" class="mobile-padding">
						<!--[if (gte mso 9)|(IE)]>
						<table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
						<tr>
						<td align="center" valign="top" width="600">
						<![endif]-->
						<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
							<tr>
								<td align="center" valign="top" style="padding: 20px 0 20px 0;">
									<a target="_blank" href="' . $site_url . '"><img src="' . $header_logo . '" border="0" style="display: block; width: ' . $header_width . 'px; height: ' . $header_height . 'px;"></a>
								</td>
							</tr>
						</table>
						<!--[if (gte mso 9)|(IE)]>
						</td>
						</tr>
						</table>
						<![endif]-->
					</td>
				</tr>
				<tr>
					<td align="center" height="100%" valign="top" width="100%" bgcolor="#f6f6f6" style="padding: 50px 15px;" class="mobile-padding">
						<!--[if (gte mso 9)|(IE)]>
						<table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
						<tr>
						<td align="center" valign="top" width="600">
						<![endif]-->
						<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
		';
					
		if ( $featured_query->have_posts() ) {
			while ( $featured_query->have_posts() ) {
				$featured_query->the_post();
				$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'wpsendyng_featured_1' );
				$html .= '
					<tr>
						<td align="center" valign="top" style="padding: 0 0 25px 0; font-family: Open Sans, Helvetica, Arial, sans-serif;">
							<table cellspacing="0" cellpadding="0" border="0" width="100%">';
if ( $use_featured_image == '1' ) {
								$html .='
								<tr>
									<td align="center" bgcolor="#ffffff" style="border-radius: 3px 3px 0 0;">
										<a href="' . get_the_permalink() . '"><img src="' . $thumbnail[0] . '" style="max-width: 600px; height: auto;" /></a>
									</td>
								</tr>';
}
								$html .='
								<tr>
									<td align="center" bgcolor="#ffffff" style="border-radius: 0 0 3px 3px; padding: 25px;">
										<table cellspacing="0" cellpadding="0" border="0" width="100%">
											<tr>
												<td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif;">
													<h2 style="font-size: 20px; color: #444444; margin: 0; padding-bottom: 10px;"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>
													<p style="color: #999999; font-size: 16px; line-height: 24px; margin: 0;">'
														. get_the_excerpt() . '
													</p>
												</td>
											</tr>
											<tr>
												<td align="center" style="padding: 30px 0 0 0;">
													<table border="0" cellspacing="0" cellpadding="0">
														<tr>
															<td align="center" style="border-radius: 26px;" bgcolor="#c82333">
																<a href="' . get_the_permalink() . '" target="_blank" style="font-size: 16px; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 26px; background-color: ' . $button_color . '; padding: 14px 26px; border: 1px solid ' . $button_color . '; display: block;">Read more &rarr;</a>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
						  </table>
						</td>
					</tr>';
		}
	}
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
				$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'wpsendyng_featured_1' );
				$html .= '
					<tr>
						<td align="center" valign="top" style="padding: 0 0 25px 0; font-family: Open Sans, Helvetica, Arial, sans-serif;">
							<table cellspacing="0" cellpadding="0" border="0" width="100%">';
if ( $use_featured_image == '1' ) {
								$html .='
								<tr>
									<td align="center" bgcolor="#ffffff" style="border-radius: 3px 3px 0 0;">
										<a href="' . get_the_permalink() . '"><img src="' . $thumbnail[0] . '" style="max-width: 600px; height: auto;" /></a>
									</td>
								</tr>';
}
								$html .='
								<tr>
									<td align="center" bgcolor="#ffffff" style="border-radius: 0 0 3px 3px; padding: 25px;">
										<table cellspacing="0" cellpadding="0" border="0" width="100%">
											<tr>
												<td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif;">
													<h2 style="font-size: 20px; color: #444444; margin: 0; padding-bottom: 10px;"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>
													<p style="color: #999999; font-size: 16px; line-height: 24px; margin: 0;">'
														. get_the_excerpt() . '
													</p>
												</td>
											</tr>
											<tr>
												<td align="center" style="padding: 30px 0 0 0;">
													<table border="0" cellspacing="0" cellpadding="0">
														<tr>
															<td align="center" style="border-radius: 26px;" bgcolor="#c82333">
																<a href="' . get_the_permalink() . '" target="_blank" style="font-size: 16px; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 26px; background-color: ' . $button_color . '; padding: 14px 26px; border: 1px solid ' . $button_color . '; display: block;">Read more &rarr;</a>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
						  </table>
						</td>
					</tr>';
		}
			$html .= '
				</table>
				<!--[if (gte mso 9)|(IE)]>
				</td>
				</tr>
				</table>
				<![endif]-->
			</td>
		</tr>
		<tr>
			<td align="center" height="100%" valign="top" width="100%" bgcolor="' . $footer_color . '" style="padding: 20px 15px 40px 15px;">
				<!--[if (gte mso 9)|(IE)]>
				<table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
				<tr>
				<td align="center" valign="top" width="600">
				<![endif]-->
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
					<tr>
						<td align="center" valign="top" style="padding: 0 0 5px 0;">
							<a target="_blank" href="' . $site_url . '"><img src="' . $header_logo . '" border="0" style="display: block; width: ' . $header_width . 'px; height: ' . $header_height . 'px;"></a>
						</td>
					</tr>
					<tr>
						<td align="center" valign="top" style="padding: 0; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #999999;">
							<p style="font-size: 14px; line-height: 20px;">
							  <webversion>View Online</webversion>
							  &nbsp; &bull; &nbsp;
							  <unsubscribe>Unsubscribe</unsubscribe>
							</p>
						</td>
					</tr>
				</table>
				<!--[if (gte mso 9)|(IE)]>
				</td>
				</tr>
				</table>
				<![endif]-->
			</td>
		</tr>
	</table>
	</body>
	</html>';
	}
	echo '<div style="padding-right: 10px;"><textarea style="width: 100%; height: 800px;" onmouseover="this.select()">' . htmlentities($html) . '</textarea></div>';
	echo '<h2>Preview</h2>';
	echo '<div style="overflow: scroll; height: 800px;">' . $html . '</div>';
}

//this action callback is triggered when wordpress is ready to add new items to menu.
add_action("wpsendyng_admin_menu", "add_new_menu_items");
