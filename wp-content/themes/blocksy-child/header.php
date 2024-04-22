<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blocksy
 */

?>
<!doctype html>
<html <?php language_attributes(); ?><?php echo blocksy_html_attr() ?>>


<head>
	<?php do_action('blocksy:head:start') ?>

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, viewport-fit=cover">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<?php do_action('blocksy:head:end') ?>
</head>

<body <?php body_class(); ?> <?php echo blocksy_body_attr() ?>>

	<a class="skip-link show-on-focus" href="<?php echo apply_filters('blocksy:head:skip-to-content:href', '#main') ?>">
		<?php echo __('Skip to content', 'blocksy'); ?>
	</a>

	<?php
	if (function_exists('wp_body_open')) {
		wp_body_open();
	}
	?>

	<div id="main-container">
		<?php
		do_action('blocksy:header:before');
		?>


		<header class="header">
			<div class="logo">
				<a href="<?php echo esc_url(home_url('/')); ?>">
					<img src="<?php echo site_url('/wp-content/Image/Logo.png'); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
				</a>
			</div>


			<?php
			// menu de navigation 
			wp_nav_menu(array(
				'theme_location' => 'menu_mobile',
				'container'      => 'nav',
				'container_class' => 'menu-container',
				'menu_class'     => 'menu',
				'fallback_cb'    => false,
			));
			?>

		</header>



		<?php
		do_action('blocksy:header:after');
		do_action('blocksy:content:before');
		?>

		<main <?php echo blocksy_main_attr() ?>>

			<?php
			do_action('blocksy:content:top');
			blocksy_before_current_template();
			?>