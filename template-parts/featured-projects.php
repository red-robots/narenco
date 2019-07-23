<?php
$args = array(
		'posts_per_page'   => -1,
		'post_type'        => 'projects',
		'post_status'      => 'publish'
	);
$items = new WP_Query($args);
if ( $items->have_posts() ) { ?>
<section class="section-inner featured-projects clear">
	<div class="wrapper">
		<div class="row clear">
			<?php while ( $items->have_posts() ) : $items->the_post(); 
				$proj_id = get_the_ID();
				$pImg = get_field('project_featured_image');
				$proj_image_src = ($pImg) ? $pImg['url']:'';
				$proj_image_alt = ($pImg) ? $pImg['title']:'';
				$proj_link = get_permalink();
				$proj_name = get_the_title();
				$project_details = get_field('project_details');
				//$project_details = get_field('size');
				$categories = get_the_terms($proj_id,'project_categories'); 
				$square_img = get_bloginfo("template_url") . '/images/square.png';
				$imgAtt = ($proj_image_src) ? ' style="background-image:url('.$proj_image_src.')"':''; ?>
				<a class="box" href="<?php echo $proj_link;?>">
					<span class="inside clear">
						<span class="imagewrap"<?php echo $imgAtt ?>>
							<img class="px" src="<?php echo $square_img ?>" alt="" aria-hidden="true">
							<?php if($proj_image_src) { ?>
								<img class="thumb" src="<?php echo $proj_image_src; ?>" alt="<?php echo $proj_image_alt; ?>" />
							<?php } ?>
							<span class="projectname">
								<span><?php echo $proj_name; ?></span>
								<?php if($project_details) { ?>
									<span class="size">(<?php echo $project_details; ?>)</span>
								<?php } ?>	
							</span>
							
							<span class="category">
								<span class="cat-inner">
								<?php if($categories) { ?>
									<?php foreach($categories as $cat) { ?>
									<i><?php echo $cat->name;?></i>
									<?php } ?>	
								<?php } ?>	
									<span class="button"><i class="readmore">Read More</i></span>
								</span>
							</span>
						</span>
					</span>
				</a>
			<?php endwhile;  wp_reset_postdata(); ?>
		</div>
	</div>
</section>
<?php } ?>