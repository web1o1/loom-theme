<?php
	/*
	Template Name: Coming Soon
	*/
	get_header('soon');
	
	/**
	 * Get Wrapper Start - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','start'); 
?>

	<div class="whoopsie-daisy-wrapper">
		<?php the_title('<h1 class="coming-soon">', '</h1>'); ?>
	</div>
	
	<div class="row">
		<aside class="col-md-6 col-md-offset-3 text-center">
			<?php dynamic_sidebar('comingsoon'); ?>
		</aside>
	</div>

<?php
	/**
	 * Get Wrapper End - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','end'); 
	
	get_footer();