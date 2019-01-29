
<?php
$wp_query = new WP_Query(array('post_status'=>'private','pagename'=>'homepage'));
if ( have_posts() ) : the_post(); 
	$img = get_field('homepage_banner_image');
	$tagline_1 = get_field('tagline_1');
	$tagline_2 = get_field('tagline_2');
	if($img) { ?>
	<section class="banner-wrapper parallax-window" data-parallax="scroll" data-position="middle" data-bleed="10" data-natural-width="1200" data-natural-height="800" data-image-src="<?php echo $img['url']?>">
		<img src="<?php echo $img['url']?>" alt="<?php echo $img['title']?>" />
		<?php if($tagline_1 || $tagline_2) { ?>
		<div class="banner-caption animated zoomIn">
			<div class="inside clear">
				<?php if($tagline_1) { ?>
				<h2 class="tagline1"><?php echo $tagline_1; ?></h2>
				<?php } ?>
				<?php if($tagline_2) { ?>
				<p class="tagline2"><?php echo $tagline_2; ?></p>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
	</section>
	<?php } ?>
<?php endif; ?>
