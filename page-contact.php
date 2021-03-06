<?php
/**
 * Template Name: Contact page
 */

get_header(); ?>

	<div id="primary" class="full-content-area clear default-temp">
	<?php while ( have_posts() ) : the_post(); ?>

		<?php if( get_the_content() ) { ?>
		<section id="intro" class="section-inner intro">
			<div class="wrapper text-center">
				<?php the_content(); ?>
			</div>
		</section>
		<?php } ?>

		<?php
			$columns = array();
			for( $i=1; $i<=4; $i++ ) {
				$title_field = 'contact_info_'.$i.'_title';
				$text_field = 'contact_info_'.$i.'_text';
				$title_info = get_field($title_field);
				$text_info = get_field($text_field);
				if($title_info || $text_info) {
					$columns[] = array(	
						'title' => $title_info,
						'description' => $text_info
					);
				}
			}

			$contact_form = get_field('contact_form');
		?>

		<?php if($columns) { ?>
		<section class="section-inner flex-container contact">
			<div class="wrapper">
				<div class="row clear">
					<?php foreach($columns as $col) { 
						$c_title = $col['title'];
						$c_text = $col['description']; 
						$strEmails = ($c_text) ? extract_email_from_string($c_text) : '';
						$emailsArr = array();
						if($strEmails) {
							foreach($strEmails as $emails) {
								if($emails) {
									$emails = array_unique($emails);
									foreach($emails as $em) {
										if (filter_var($em, FILTER_VALIDATE_EMAIL)) {
											$emailsArr[] = $em;
										}
									}
								}
							}
						}
						if($emailsArr) {
							foreach($emailsArr as $e) {
								$spambotEmail = antispambot($e,1);
								$find = "mailto:".$e;
								$replace = "mailto:".$spambotEmail;
								$find2 = $e.'</a>';
								$replace2 = antispambot($e).'</a>';
								$c_text = str_replace($find,$replace,$c_text);
								$c_text = str_replace($find2,$replace2,$c_text);
							}
						}
						?>
						<div class="textcol text-center">
							<?php if($c_title) { ?>
								<div class="title"><?php echo $c_title; ?></div>
							<?php } ?>
							<?php if($c_text) { ?>
								<div class="description"><?php echo $c_text; ?></div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>
		<?php } ?>

		<?php if($contact_form) { ?>
		<section class="section-inner contact-form-section">
			<div class="wrapper"><div class="contact-form-wrapper clear"><?php echo $contact_form; ?></div></div>
		</section>
		<?php } ?>


	<?php endwhile;  ?>
	</div><!-- #primary -->

<?php
get_footer();
