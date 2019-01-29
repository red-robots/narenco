<?php
/**
 * The header for theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

<script defer src="<?php bloginfo( 'template_url' ); ?>/assets/svg-with-js/js/fontawesome-all.js"></script>


<?php wp_head(); 
$is_home_page = ( is_front_page() || is_home() ) ? true : false;
$classes[] = ( $is_home_page ) ? 'homepage':'subpage';
$logo = get_custom_logo();
?>
</head>

<body <?php body_class($classes); ?>>
<div id="page" class="site clear">
	<div id="mobile-navigation" class="mobile-navigation" role="navigation">
		<span id="toggleMenu" class="burger"><i></i></span>
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-mobile-menu' ) ); ?>
	</div>
	<header id="masthead" class="site-header clear" role="banner">
		<div class="wrapper">
			<div class="logo">
                <?php if($logo) { ?>
                    <?php echo $logo; ?>
                <?php } else { ?>
                    <a class="siteLogo" href="<?php bloginfo('url'); ?>">
                        <span><?php bloginfo('name'); ?></span>
                    </a>
                <?php } ?>
            </div>

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		</div><!-- wrapper -->
	</header><!-- #masthead -->

	<?php if( $is_home_page ) { 
		get_template_part('template-parts/home-banner'); 
	} else { 
		get_template_part('template-parts/subpage-banner'); 
	} ?>


	<div id="content" class="site-content clear">
