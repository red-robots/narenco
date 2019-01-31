<?php
get_header(); ?>

<div id="primary" class="full-content-area default-temp clear">
	<main id="main" class="site-main wrapper" role="main">

	<?php
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/content', get_post_format() );

	endwhile; // End of the loop.
	?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
