<?php 
	/**
	 * woocommerce.php
	 * The default woocommerce page template in Zonya
	 * @author TommusRhodus
	 * @package Zonya
	 * @since 1.0.0
	 */
	get_header(); 
	
	/**
	 * Get Wrapper Start - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','start'); 
?>
	
	<div class="row">
	
		<div class="col-sm-8">
			<?php woocommerce_content(); ?>
		</div>

		<?php get_sidebar('shop'); ?>
	
	</div>
	
<?php
	/**
	 * Get Wrapper End - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','end'); 
	
	get_footer();