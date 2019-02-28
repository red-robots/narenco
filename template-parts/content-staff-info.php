<?php
function staff_info_html($post_id,$isPopUp=null) {
    if(!$post_id) return '';
    $output = '';
    if( $post = get_post($post_id) ) {
        ob_start();
        $post_title = $post->post_title;
        $photo = get_the_post_thumbnail($post_id,'large');
        if(!$photo) {
        	$photo = '<img src="'.get_bloginfo('template_url').'/images/no-image.gif" alt="" />';
        }
		$job_title = get_field('title',$post_id);
		$description = get_field('description',$post_id);
		$email = get_field('email_address',$post_id);
		$phone = get_field('phone_number',$post_id);
		$has_sidebar = ($photo || $email || $phone) ? true : false;
        ?>

    	<?php if($isPopUp) { ?>
    	<div class="popup_wrapper animated">
    		<div id="popOverlay" class="popup-overlay"></div>
    		<div class="popup-inner clear">
    			<a href="#" class="closePopUp"><span>x</span></a>
    			<div class="popup-outer-wrap clear">
    				<div class="popup-pad clear content-with-image">
    		<?php } ?>

			<div class="content-left <?php echo ($has_sidebar) ? 'has-image':'no-image'?>">
				<header class="header-info">
					<h1 class="post-title"><?php echo $post_title; ?></h1>
					<?php if ($job_title) { ?>
					<p class="jobtitle"><?php echo $job_title; ?></p>	
					<?php } ?>
				</header>
				<?php echo $description; ?>
			</div>
			<?php if($has_sidebar) { ?>
				<div class="content-right imagediv">
					<?php echo $photo; ?>
					<?php if ($email) { ?>
					<div class="contact-info"><a href="mailto:<?php echo antispambot($email); ?>"><span class="icon"><i class="fas fa-envelope"></i></span><span class="txt"><?php echo $email; ?></span></a></div>	
					<?php } ?>
					<?php if ($phone) { ?>
					<div class="contact-info"><a href="tel:<?php echo format_phone_number($phone); ?>"><span class="icon"><i class="fas fa-phone"></i></span><span class="txt"><?php echo $phone; ?></span></a></div>	
					<?php } ?>
				</div>
			<?php } ?>

			<?php if($isPopUp) { ?>
					</div>
    			</div>
    		</div>
		</div>
        <?php } ?>

        <?php
        $output = ob_get_contents();
        ob_end_clean();
    }
    return $output;
}