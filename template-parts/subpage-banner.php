<?php
$img = '';

if( is_singular('projects') ) { 
	$page_id = get_page_id_by_template('page-projects');
	$img = get_field('banner_image',$page_id);
	$page_title = get_the_title($page_id); ?>
<?php } else {
$img = get_field('banner_image');
$page_title = get_the_title(); 
} ?>

<?php if($img) { 
	$new_title = title_formatter($page_title); ?>
	<section class="subpage-banner-wrapper clear">
		<div class="bannerImage" style="background-image:url('<?php echo $img['url']?>')"></div>
		<div class="titlediv"><div class="wrapper text-inner"><h1><?php echo $new_title; ?></h1></div></div>
	</section>
<?php } 

