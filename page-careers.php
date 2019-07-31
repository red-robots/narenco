<?php
/**
 * Template Name: Careers
 */

get_header(); ?>

	<div id="primary" class="full-content-area clear default-temp">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php
			$button_name = get_field('button_1_name');
			$button_link = get_field('button_1_link');
		?>
		<section id="intro" class="section-inner intro">
			<div class="wrapper text-center">
				<?php the_content(); ?>
				<?php if($button_name && $button_link) { ?>
					<div class="project-button clear nomarginbottom">
						<a class="projbutton" href="<?php echo $button_link; ?>"><?php echo $button_name; ?></a>
					</div>
				<?php } ?>
			</div>
		</section>

		<?php
			$content_2_text = get_field('content_2_text');
			$process = get_field('process');
		?>
		<section class="section-inner blue-bg process text-center">
			<div class="wrapper">
				<?php if($content_2_text) { ?>
					<div class="maintext"><?php echo $content_2_text; ?></div>
				<?php } ?>

				<?php if($process) { ?>
				<div class="advantages-info clear">
					<div class="row clear">
						<?php foreach($process as $ad) { 
							$icon = $ad['icon'];
							$title = $ad['title'];
							$description = $ad['textcontent']; ?>
							<div class="column">
								<div class="inside clear">
									<?php if($icon) { ?>
									<div class="icon"><img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['title']; ?>" /></div>
									<?php } ?>
									<div class="textwrap">
										<?php if($title) { ?>
										<div class="title"><?php echo $title; ?></div>
										<?php } ?>
										<?php if($description) { ?>
										<div class="description"><?php echo $description; ?></div>
										<?php } ?>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
				<?php } ?>


			</div>
		</section>


		<?php get_template_part('template-parts/content','jobs'); ?>

		<?php
			$content_3_text = get_field('content_3_text');
			$button_2_name = get_field('button_2_name');
			$button_2_link = get_field('button_2_link');
		?>

		<?php if($content_3_text) { ?>
		<section class="section-inner wwd-bottom-text text-center">
			<div class="wrapper">
				<?php echo $content_3_text; ?>
				<?php if($button_2_name && $button_2_link) { ?>
					<div class="project-button clear nomarginbottom">
						<a class="projbutton" href="<?php echo $button_2_link; ?>"><?php echo $button_2_name; ?></a>
					</div>
				<?php } ?>
			</div>
		</section>
		<?php } ?>

	<?php endwhile;  ?>
	</div><!-- #primary -->

<?php
get_footer();
