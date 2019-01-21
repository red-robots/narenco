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

			<section class="intro-section introdiv clear">
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
			</section>

			<section class="projects-section clear">
				<?php
				$projects_description = get_field('projects_description');
				$featuredProjects = get_field('selected_projects');
				?>

				<div class="wrapper">
				<?php if($projects_description) { ?>
					<div class="projects_description clear animated fadeInUp wow" data-wow-delay=".4s"><?php echo $projects_description; ?></div>
				<?php } ?>	
				<?php if($featuredProjects) { ?>
					<div class="featured-projects clear animated fadeIn wow" data-wow-delay=".5s">
						<div class="row clear">
						<?php $i=1; foreach($featuredProjects as $proj) { 
							$proj_id = $proj->ID;
							$proj_image = get_the_post_thumbnail($proj_id,'medium');
							$proj_link = get_permalink($proj_id);
							$proj_name = $proj->post_title;
							$project_size = get_field('project_size',$proj_id);
							$categories = get_the_terms($proj_id,'project_categories');
							$sec = $i+1;
							?>
							<a class="box" href="<?php echo $proj_link;?>">
								<span class="inside clear">
									<span class="imagewrap">
										<?php echo $proj_image; ?>
										<span class="projectname">
											<span><?php echo $proj_name; ?></span>
											<?php if($project_size) { ?>
												<span class="size"><?php echo $project_size; ?></span>
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
						<?php $i++; } ?>	
						</div>
					</div>
				<?php } ?>	

				<?php
					$secondary_project_description = get_field('secondary_project_description');
					$project_button_text = get_field('project_button_text');
					$project_button_link = get_field('project_button_link');
				?>

				<?php if($secondary_project_description) { ?>
					<div class="second-description clear">
						<?php echo $secondary_project_description;?>
					</div>
				<?php } ?>

				<?php if($project_button_text && $project_button_link) { ?>
					<div class="project-button clear">
						<a class="projbutton" href="<?php echo $project_button_link;?>"><?php echo $project_button_text;?></a>
					</div>
				<?php } ?>

				</div>
			</section>

			<?php
				$services_description = get_field('services_description');
				$services_secondary_text = get_field('services_secondary_text');
				$services = get_field('services');
				$has_svc_content = ($services_description || $services) ? true:false;

				$what_we_do_box_title = get_field('what_we_do_box_title');
				$what_we_do_description = get_field('what_we_do_description');
				$what_we_do_button = get_field('what_we_do_button');
				$what_we_do_button_page_link = get_field('what_we_do_button_page_link');
			?>
			<?php if($has_svc_content) { ?>
			<section class="services-section clear">
				<div class="midwrapper clear">
					<div class="section-title text-center animated fadeInUp wow" data-wow-delay=".4s"><?php echo $services_description; ?></div>
					
					<?php if($services_secondary_text) { ?>
						<p class="secondary-text text-center animated fadeInUp wow" data-wow-delay=".5s"><?php echo $services_secondary_text; ?></p>
					<?php } ?>

					<div class="services-list clear">
						<?php if($services) { ?>
							<?php $j=1; foreach($services as $svc) { 
								$services_title = $svc['services_title'];
								$services_icon = $svc['services_icon'];
								$services_description = $svc['services_description'];
								$second = $j+1;
								?>
								<div class="service-info text-center animated fadeIn wow" data-wow-delay=".<?php echo $second;?>s">
									<div class="inside clear">
									<?php if($services_icon) { ?>
										<img class="icon" src="<?php echo $services_icon['url'];?>" alt="<?php echo $services_icon['title'];?>" />
									<?php } ?>
									<?php if($services_title) { ?>
										<h3 class="title"><?php echo $services_title; ?></h3>
									<?php } ?>
									<?php if($services_description) { ?>
										<div class="description"><?php echo $services_description; ?></div>
									<?php } ?>
									</div>
								</div>
							<?php $j++; } ?>
						<?php } ?>

						<?php if($what_we_do_box_title || $what_we_do_description) { ?>
							<div class="service-info whatwedo text-center animated zoomIn wow" data-wow-delay=".8s">
								<div class="inside clear">
									<div class="textwrap clear">
										<div class="align-mid">
										<?php if($what_we_do_box_title) { ?>
											<h3 class="ww_title"><?php echo $what_we_do_box_title; ?></h3>
										<?php } ?>
										<?php if($what_we_do_description) { ?>
											<div class="description"><?php echo $what_we_do_description; ?></div>
										<?php } ?>
										<?php if($what_we_do_button && $what_we_do_button_page_link) { ?>
											<div class="ww_button"><a href="<?php echo $what_we_do_button_page_link; ?>"><?php echo $what_we_do_button; ?></a></div>
										<?php } ?>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</section>
			<?php } ?>

		<?php endif; ?>

	</div><!-- #primary -->

<?php
get_footer();
