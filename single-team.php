<?php get_header(); ?>

	<div id="primary" class="full-content-area single-page-info clear default-temp">
		<main id="staff_details" class="site-main wrapper content-with-image" role="main">
			<?php while ( have_posts() ) : the_post(); 
				$post_id = get_the_ID();
				echo staff_info_html($post_id);
				?>
			<?php endwhile; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
