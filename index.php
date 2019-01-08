<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="full-content-area">
		<main id="main" class="site-main" role="main">

		<?php
			/* Start the Loop */
			$wp_query = new WP_Query(array('post_status'=>'private','pagename'=>'homepage'));
			if ( have_posts() ) : the_post(); 
				$about_large_text = get_field('about_large_text'); 
				$about_small_text = get_field('about_small_text'); 
				$statistics = get_field('statistics'); 
				$statistic_button_text = get_field('statistic_button_text');
				$statistic_button_link = get_field('statistic_button_link');
				?>

				<div class="introdiv clear">
					<div class="wrapper">
						<?php if($about_large_text) { ?>
							<h2 class="section-title animated fadeInUp wow" data-wow-delay=".4s"><?php echo $about_large_text; ?></h2>
						<?php } ?>
						<?php if($about_small_text) { ?>
							<div class="small-text animated fadeInUp wow" data-wow-delay=".6s"><?php echo $about_small_text; ?></div>
						<?php } ?>

						<?php if($statistics) { ?>
						<div class="statistics clear">
							<div class="row clear">
								<?php $i=1; foreach($statistics as $s) { 
									$number = $s['number'];
									$append = $s['append'];
									$secondary_stat = $s['secondary_stat'];
									$text_color = $s['stat_color'];
									$statistic_description = $s['statistic_description'];
									$has_secondary = ($secondary_stat) ? ' has-secondary':' no-secondary';
									$sec = $i+1;
									$a_second = ".".$sec."s";
									?>

									<?php if($number) { ?>
										<div class="stat animated fadeInUp wow <?php echo $text_color . $has_secondary;?>" data-wow-delay="<?php echo $a_second;?>">
											<div class="inside clear">
												<div class="toptext">
													<div class="number">
														<span class="num"><?php echo $number; ?></span>
														<?php if($append=='+') { ?>
														<span class="append plus"><?php echo $append; ?></span>
														<?php } ?>
														<?php if($append=='K') { ?>
														<span class="append ktext"><?php echo $append; ?></span>
														<?php } ?>
													</div>
													<?php if($secondary_stat) { ?>
													<div class="secondary_stat">
														<?php echo $secondary_stat; ?>
													</div>
													<?php } ?>
													<div class="statdesc"><?php echo $statistic_description; ?></div>
												</div>			
											</div>
										</div>
									<?php $i++; } ?>

								<?php } ?>	
							</div>
						</div>
						<?php } ?>

						<?php if($statistic_button_text && $statistic_button_link) { ?>
						<div class="buttondiv">
							<a href="<?php echo $statistic_button_link; ?>"><?php echo $statistic_button_text; ?></a>
						</div>
						<?php } ?>	
					</div>
				</div>


				<?php
					$projects_description = get_field('projects_description');
				?>
				<?php if($projects_description) { ?>
				<div class="projects_description clear">
					<div class="wrapper">
						<?php echo $projects_description; ?>
					</div>
				</div>
				<?php } ?>	

			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
