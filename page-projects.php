<?php
/**
 * Template Name: Featured Projects
 */
get_header(); ?>
<div id="primary" class="full-content-area clear default-temp">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php 
			$introl_text1 = get_field('section_1_main_description');
			$introl_text2 = get_field('section_1_secondary_description');
		?>	

		<?php if($introl_text1 || $introl_text2) { ?>
		<section class="section-inner intro">
			<div class="wrapper text-center">
				<?php if($introl_text1) { ?>
					<h2 class="section-title greenspan"><?php echo $introl_text1; ?></h2>
				<?php } ?>
				<?php if($introl_text2) { ?>
					<div class="section-text"><?php echo $introl_text2; ?></div>
				<?php } ?>
			</div>
		</section>
		<?php } ?>

	

		<?php get_template_part('template-parts/featured-projects'); ?>

		<?php
			$bottom_section_description = get_field('bottom_section_description');
			$bottom_bg_image = get_field('bottom_section_background_image');
			$bottom_section_button_text = get_field('bottom_section_button_text');
			$bottom_section_button_link = get_field('bottom_section_button_link');
			$bgStyle = '';
			if($bottom_bg_image){
				$bgStyle = ' style="background-image:url('.$bottom_bg_image['url'].')"';
			}
		?>
		<section class="section-inner projects-bottom">
			<div class="titlediv text-center overlayBg"<?php echo $bgStyle;?>>
				<div class="mid clear">
					<?php if($bottom_section_description) { ?>
					<div class="wrapper">
						<div class="midText clear">
							<?php echo $bottom_section_description; ?>
						</div>
						<?php } ?>
						<?php if($bottom_section_button_text && $bottom_section_button_link) { ?>
						<div class="button"><a class="btn2" href="<?php echo $bottom_section_button_link; ?>"><?php echo $bottom_section_button_text; ?></a></div>
						<?php } ?>
					</div>
				</div>
			</div>
		</section>


	<?php endwhile;  ?>

</div>
<?php
get_footer();
