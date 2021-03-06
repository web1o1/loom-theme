<?php
	/**
	 * index.php
	 * The main post loop in loom
	 * @author TommusRhodus
	 * @package loom
	 * @since 1.0.0
	 */
	get_header();
	
	/**
	 * Get Wrapper Start - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','start'); 

		/**
		 * Get the blog layout
		 */
		get_template_part('loop/loop', get_option('blog_layout','blog') ); 

	/**
	 * Get Wrapper End - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','end'); 
	
	get_footer();