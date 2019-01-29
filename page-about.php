<?php
/**
 * Template Name: About page
 */

get_header(); ?>

	<div id="primary" class="full-content-area clear default-temp">
	<?php while ( have_posts() ) : the_post(); ?>

		<?php 
			$introl_text1 = get_field('content_1_text1');
			$introl_text2 = get_field('content_1_text2');
			$content_1_button_name = get_field('content_1_button_name');
			$content_1_button_link = get_field('content_1_button_link');
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
				<?php if($content_1_button_name && $content_1_button_link) { ?>
					<div class="button">
						<a href="<?php echo $content_1_button_link; ?>"><?php echo $content_1_button_name; ?></a>
					</div>
				<?php } ?>
			</div>
		</section>
		<?php } ?>

		<?php 
			$content_2_title = get_field('content_2_title');
			$content_2_text = get_field('content_2_text');
			$advantages = get_field('advantages');
		?>	

		<?php if($content_2_title || $content_2_text) { ?>
		<section class="section-inner history">
			<div class="wrapper text-center">
				<?php if($content_2_title) { ?>
					<h2 class="section-title greenspan"><?php echo $content_2_title; ?></h2>
				<?php } ?>
				<?php if($content_2_text) { ?>
					<div class="section-text"><?php echo $content_2_text; ?></div>
				<?php } ?>

				<?php if($advantages) { ?>
				<div class="advantages-info clear">
					<div class="row clear">
						<?php foreach($advantages as $ad) { 
							$icon = $ad['icon'];
							$title = $ad['title'];
							$description = $ad['description']; ?>
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
		<?php } ?>

	<?php endwhile;  ?>
	</div><!-- #primary -->

<?php
get_footer();
