<?php

class AQ_Team_Feed_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Team Feed',
			'size' => 'span12',
			'resizable' => 0,
			'block_description' => 'Add a feed of<br />team posts to the page.'
		);
		parent::__construct('aq_team_feed_block', $block_options);
	}//end construct
	
	function form($instance) {
		$defaults = array(
			'pppage' => '6',
			'filter' => 'all',
			'layout' => 'feed'
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		$args = array(
			'orderby'                  => 'name',
			'hide_empty'               => 0,
			'hierarchical'             => 1,
			'taxonomy'                 => 'team-category'
		); 
			
		$filter_options = get_categories( $args );
		
		$layout_options = array(
			'feed' => 'Team Feed',
			'grid' => 'Team Grid'	
		);
	?>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('layout') ?>">
				Team Style
				<?php echo aq_field_select('layout', $block_id, $layout_options, $layout) ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('pppage') ?>">
				Posts Per Page
				<?php echo aq_field_input('pppage', $block_id, $pppage, $size = 'full', $type = 'number') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('filter') ?>">
				Show a specific Team Category?
				<?php echo ebor_portfolio_field_select('filter', $block_id, $filter_options, $filter) ?>
			</label>
		</p>
		
	<?php
	}//end form
	
	function block($instance) {
		extract($instance);
	
		$query_args = array(
			'post_type' => 'team',
			'posts_per_page' => $pppage
		);
		
		if (!( $filter == 'all' )) {
			if( function_exists( 'icl_object_id' ) ){
				$filter = (int)icl_object_id( $filter, 'team-category', true);
			}
			$query_args['tax_query'] = array(
				array(
					'taxonomy' => 'team-category',
					'field' => 'id',
					'terms' => $filter
				)
			);
		}
	
		$team_query = new WP_Query( $query_args );	
		
		if(!( isset( $layout) ))
			$layout = 'feed';
	?>
			
		<div class="row">
		  
			<?php 
				$i = 0;
				if ( $team_query->have_posts() ) : while ( $team_query->have_posts() ) : $team_query->the_post(); 
					$i++;
				
					get_template_part('loop/content','team-' . $layout);
					
					if( $i % 3 == 0 )
						echo '<div class="clear"></div>';
						
				endwhile;
				else : 
					
					/**
					 * Display no posts message if none are found.
					 */
					get_template_part('loop/content','none');
					
				endif;
				wp_reset_query();
			?>
		  
		</div>
			
	<?php	
	}//end block
	
}//end class