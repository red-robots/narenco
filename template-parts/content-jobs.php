<?php
$title = get_field('jtitle');
$jobs = get_field('jobs');
if ( $jobs ) { ?>
<div class="section-inner leadership">
	<div class="wrapper text-center" style="padding-bottom:0;">
		<div class="departments clear nomargintop">
			<div class="section-title med-width"><h2 class="deptname"><?php echo $title ?></h2></div>
			<div class="dept-row clear">
			<?php foreach($jobs as $job) {  
				$id = $job->ID;
				$job_title = $job->post_title;
				$job_details = get_field('job_details',$id); 
				$file = ($job_details) ? $job_details['url']:'';
				if($file) { ?>
				<div class="teamdiv">
					<a class="team" href="<?php echo $file ?>" target="_blank">
						<span class="name">
							<?php echo $job_title; ?>
							<span class="readmore"><i>View Details</i></span>
						</span>
						<span class="greenbg"></span>
					</a>	
				</div>
				<?php } ?>
			<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php } ?>

