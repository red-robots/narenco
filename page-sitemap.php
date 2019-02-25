<?php
/**
 * Template Name: Sitemap
 *
 */
get_header(); ?>

	<div id="primary" class="full-content-area clear default-temp">
		<main id="main" class="site-main wrapper" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
			<?php endwhile;  ?>

			<?php get_template_part( 'template-parts/content', 'sitemap' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
