	</div><!-- #content -->
	<footer id="colophon" class="site-footer clear" role="contentinfo">
		<div class="wrapper">
			<?php 
				//$nav_items = wp_get_nav_menu_items('footer-menu');
				$email = get_field('email','option');
				$linkedin = get_field('linkedin','option');
				$facebook = get_field('facebook','option');
				$youtube = get_field('youtube','option');
				$footer_logo = get_field('footer_logo','option');
			?>

			<div class="footer-menu-wrap">
				<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?>
				<div class="foot-contact-details">
					<div class="contact-link"><a href="<?php echo get_site_url()?>/contact-us/">Contact Us</a></div>
					<div class="social-media clear">
						<?php if($email) { ?>
						<a class="social-link" href="mailto:<?php echo $email?>"><span class="icon"><i class="fa fa-envelope"></i></span></a>
						<?php } ?>
						<?php if($linkedin) { ?>
						<a class="social-link" href="<?php echo $linkedin?>" target="_blank"><span class="icon"><i class="fab fa-linkedin"></i></span></a>
						<?php } ?>
						<?php if($facebook) { ?>
						<a class="social-link" href="<?php echo $facebook?>" target="_blank"><span class="icon"><i class="fab fa-facebook"></i></span></a>
						<?php } ?>
						<?php if($youtube) { ?>
						<a class="social-link" href="<?php echo $youtube?>" target="_blank"><span class="icon"><i class="fab fa-youtube-square"></i></span></a>
						<?php } ?>
					</div>
				</div>
			</div>

			<div class="copyright-info">
				<span class="foot-logo"><img src="<?php echo $footer_logo['url']?>" alt="<?php echo $footer_logo['title']?>" /></span>
				<div class="copyright">
					&copy; Copyright <?php echo get_bloginfo('name'); ?> <?php echo date('Y'); ?>
					<div class="br">All rights reserved.</div>
				</div>
			</div>

		</div><!-- wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
