<?php
$img = get_field('banner_image');
$page_title = get_the_title();
if($img) { 
	$new_title = title_formatter($page_title); ?>
	<section class="subpage-banner-wrapper clear">
		<div class="bannerImage" style="background-image:url('<?php echo $img['url']?>')"></div>
		<div class="titlediv"><div class="wrapper text-inner"><h1><?php echo $new_title; ?></h1></div></div>
	</section>
<?php } ?>

