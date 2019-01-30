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
		<section id="intro" class="section-inner intro">
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
		<section id="history" class="section-inner history">
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

				<?php $timelines = get_field('timelines'); ?>
				<?php if($timelines) { 
					$count = count($timelines); ?>
					<div class="history-timelines clear">
						<div class="row clear">
							<div class="line"><span></span></div>
							<?php $k=1; foreach($timelines as $tm) { 
								$timeline_year = $tm['timeline_year'];
								$timeline_description = $tm['timeline_description'];
							?>
							<div class="info <?php echo ($k % 2==0) ? 'even':'odd'; ?><?php echo ($k==1) ? ' first':''?><?php echo ($count==$k) ? ' last':''?>">
								<div class="inside clear">
									<div class="year"><?php echo $timeline_year; ?></div>
									<div class="desc"><?php echo $timeline_description; ?></div>
								</div>
							</div>
							<?php $k++; } ?>
						</div>
					</div>
				<?php } ?>

				<?php 
					$content_2_bottom_text = get_field('content_2_bottom_text'); 
					$content_2_bottom_btn_label = get_field('content_2_bottom_btn_label'); 
					$content_2_bottom_btn_link = get_field('content_2_bottom_btn_link'); 
				?>

				<div class="history-bottom-text clear">
					<?php if($content_2_bottom_text) { ?>
					<div class="text clear"><?php echo $content_2_bottom_text; ?></div>
					<?php } ?>
					<?php if($content_2_bottom_btn_label && $content_2_bottom_btn_link) { ?>
					<div class="button clear"><a class="btn" href="<?php echo $content_2_bottom_btn_link; ?>"><?php echo $content_2_bottom_btn_label; ?></a></div>
					<?php } ?>
				</div>

			</div>
		</section>
		<?php } ?>

		<?php 
			$values_title = get_field('values_title'); 
			$values_bg_image = get_field('values_bg_image'); 
			$values_style = '';
			if($values_bg_image){
				$values_style = ' style="background-image:url('.$values_bg_image['url'].')"';
			}
			$values_text_1 = get_field('values_text_1'); 
		?>
		<section id="values" class="section-inner core-values">
			<?php if($values_title) { ?>
			<div class="titlediv text-center"<?php echo $values_style;?>>
				<div class="mid clear"><h2 class="title"><?php echo $values_title; ?></h2></div>
			</div>
			<?php } ?>
			<div class="wrapper text-center">
				<?php if($values_text_1) { ?>
				<div class="textwrap clear"><?php echo $values_text_1; ?></div>
				<?php } ?>

				<?php
					$values = get_field('values');
					$mission_text = get_field('mission_text');
					$mission_button_name = get_field('mission_button_name');
					$mission_button_link = get_field('mission_button_link');
				?>
				<?php if($values) { ?>
				<div class="services-list clear values-list">
					<?php $j=1; foreach($values as $val) { 
						$s_title = $val['title'];
						$s_icon = $val['icon'];
						$s_description = $val['description'];
						?>
						<div class="service-info text-center">
							<div class="inside clear">
							<?php if($s_icon) { ?>
								<img class="icon" src="<?php echo $s_icon['url'];?>" alt="<?php echo $s_icon['title'];?>" />
							<?php } ?>
							<?php if($s_title) { ?>
								<h3 class="title"><?php echo $s_title; ?></h3>
							<?php } ?>
							<?php if($s_description) { ?>
								<div class="description"><?php echo $s_description; ?></div>
							<?php } ?>
							</div>
						</div>
					<?php $j++; } ?>

					<?php if($mission_text) { ?>
						<div class="service-info whatwedo mission text-center">
							<div class="inside clear">
								<div class="textwrap clear">
									<div class="align-mid-v">
									<?php if($mission_text) { ?>
										<div class="description"><?php echo $mission_text; ?></div>
									<?php } ?>
									<?php if($mission_button_name && $mission_button_link) { ?>
										<div class="ww_button"><a href="<?php echo $mission_button_link; ?>"><?php echo $mission_button_name; ?></a></div>
									<?php } ?>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>

				</div>
				<?php } ?>

			</div>
		</section>


		<?php
			/* LEADERSHIP */
			$leader_title = get_field('leader_title');
			$leader_text = get_field('leader_text');
			$leader_bottom_text = get_field('leader_bottom_text');
			$leader_button_name = get_field('leader_button_name');
			$leader_button_link = get_field('leader_button_link');
		?>

		<section id="leadership" class="section-inner leadership">
			<div class="wrapper text-center">
				<?php if($leader_title) { ?>
					<h2 class="section-title med-width clear"><?php echo $leader_title; ?></h2>
				<?php } ?>
				<?php if($leader_text) { ?>
					<div class="section-text clear"><?php echo $leader_text; ?></div>
				<?php } ?>

				<?php
					$terms = get_terms([
					    'taxonomy' => 'departments',
					    'hide_empty' => true,
					]);
				?>
				<?php if($terms) { ?>
				<div class="departments clear">
					<?php foreach($terms as $tm) { 
						$term_id = $tm->term_id;
						$args = array(
							'posts_per_page'   => -1,
							'post_type'        => 'team',
							'post_status'      => 'publish',
							'tax_query' => array(
								    array(
									    'taxonomy' => 'departments',
									    'field' => 'term_id',
									    'terms' => $term_id
								    )
								)
						);
						$items = new WP_Query($args);

					?>
					<div class="dept">
						<h2 class="deptname"><?php echo $tm->name; ?></h2>
						<?php if ( $items->have_posts() ) { ?>
						<div class="dept-row clear">
							<?php while ( $items->have_posts() ) : $items->the_post();
								$staff_name = get_the_title(); 
								$job_title = get_field('title'); 
								$pagelink = get_permalink(); ?>
							<div class="teamdiv">
								<a class="team" href="<?php echo $pagelink; ?>">
									<span class="name">
										<?php echo $staff_name; ?>
										<?php if($job_title) { ?>
										<span class="jobtitle"><?php echo $job_title; ?></span>
										<?php } ?>	
										<span class="readmore"><i>Read More</i></span>
									</span>
									<span class="greenbg"></span>
								</a>	
							</div>
							<?php endwhile; wp_reset_postdata(); ?>
						</div>
						<?php } ?>
					</div>
					<?php } ?>
				</div>
				<?php } ?>

				<?php if($leader_bottom_text) { ?>
					<div class="section-text bottomText clear"><?php echo $leader_bottom_text; ?></div>
				<?php } ?>
				<?php if($leader_button_name && $leader_button_link) { ?>
					<div class="section-text clear button"><a href="<?php echo $leader_button_link; ?>"><?php echo $leader_button_name; ?></a></div>
				<?php } ?>

			</div>
		</section>

	<?php endwhile;  ?>
	</div><!-- #primary -->

<?php
get_footer();
