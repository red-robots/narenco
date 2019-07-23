<?php
get_header(); 
global $post;
$current_link = get_permalink($post->ID);
?>

<div id="primary" class="full-content-area default-temp clear single-project-page">
	<main id="main" class="site-main wrapper" role="main">
		<?php while ( have_posts() ) : the_post(); 
			$post_id = get_the_ID();
			$image = get_field('project_featured_image');
			$project_details = get_field('project_details'); 
			$categories = get_the_terms($post_id,'project_categories'); ?>
			<?php if($image) { ?>
			<div class="feat-image">
				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>" />
			</div>
			<?php } ?>
			<div class="text-content<?php echo ($image) ? ' has-image':''?>">
				<h1 class="page-title"><?php the_title(); ?></h1>

				<?php
				$specifications = get_field('specifications');
				if($specifications) {  ?>
				<div class="specifications clear">
					<?php foreach($specifications as $sp) { 
						$label = $sp['label'];
						$value = $sp['value']; ?>
						<?php if($label && $value) { ?>
						<div class="spec">
							<span class="s_label"><?php echo $label; ?>: </span>
							<span class="s_value"><?php echo $value; ?></span>
						</div>
						<?php } ?>
					<?php } ?>
				</div>
				<?php } ?>


				<?php if($categories) { ?>
				<div class="categories clear">
					<div class="cat">Categories</div>
					<div class="catlist clear">
						<?php $i=1; foreach ($categories as $cat) { 
						$comma = ($i>1) ? '<span>,</span>':''; ?>
						<?php echo $comma; ?><span><?php echo $cat->name; ?></span>
						<?php $i++; } ?>
					</div>
				</div>
				<?php } ?>
			</div>

		<?php endwhile; wp_reset_query(); ?>


		<?php /* NEXT / PREVIOUS CUSTOM POST */ ?>
		<div class="next-prev-post clear">
			<?php
			$args = array(
				'posts_per_page'   => -1,
				'post_type'        => 'projects',
				'post_status'      => 'publish'
			);
			$items = new WP_Query($args);
			$posts = array();
			while ( $items->have_posts() ) : $items->the_post(); 
				$posts[] += $post->ID;
			endwhile;  wp_reset_postdata();

			// Identify the position of the current product within the $posts-array 
			$current = array_search(get_the_ID(), $posts);
			$index = $current-1;
			$key = ($index>0) ? $index : 0;
			// Identify ID of previous product
			$prevID = ( isset($posts[$key]) && $posts[$key] ) ? $posts[$key] : '';

			// Identify ID of next product
			$nextID = ( isset($posts[$current+1]) && $posts[$current+1] ) ? $posts[$current+1] : '';
			$prevLink = (!empty($prevID)) ? get_permalink($prevID) : '';
			$showPrevLink = ($prevLink==$current_link) ?  false : true;

			// Link "previous product"
			if ($showPrevLink) {
				if (!empty($prevID)) { ?>
				<a class="prev" href="<?php echo get_permalink($prevID); ?>">&lt; Previous Project</a>
				<?php }
			}
			// Link "next product"
			if (!empty($nextID)) { ?>
			<a class="next" href="<?php echo get_permalink($nextID); ?>">Next Project &gt;</a>
			<?php } ?>
		</div>


	</main><!-- #main -->

		<?php
			$parent_id = get_page_id_by_template('page-projects');
			$bottom_title = get_field('sp_bottom_title',$parent_id);
			$bottom_text = get_field('sp_bottom_text',$parent_id);
			$bottom_button_label = get_field('sp_button_name',$parent_id);
			$bottom_button_link = get_field('sp_button_link',$parent_id);
		?>

		<?php if($bottom_title || $bottom_text) { ?>
		<section class="section-inner blue-bg sp-bottom-info text-center">
			<div class="wrapper">
				<?php if($bottom_title) { ?><h2 class="section-title"><?php echo $bottom_title; ?></h2><?php } ?>
				<?php if($bottom_text) { ?><div class="textwrap"><?php echo $bottom_text; ?></div><?php } ?>
			
				<?php if($bottom_button_label && $bottom_button_link) { ?>
				<div class="button">
					<a class="btn-white" href="<?php echo $bottom_button_link; ?>"><?php echo $bottom_button_label; ?></a>
				</div>
				<?php } ?>
			</div>
		</section>
		<?php } ?>

	
</div><!-- #primary -->

<?php
get_footer();
