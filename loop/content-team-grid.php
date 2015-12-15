<?php 
	global $post;
	$before = '<a href="'. get_permalink() .'">';
	$after = '</a>';
?>

<div class="col-sm-4 team-grid">

	<?php if( has_post_thumbnail() ) : ?>
		<figure>
			<?php echo $before; ?>
				<?php if( $before ) : ?>
					<div class="text-overlay">
						<div class="info"><?php the_title(); ?><br /><?php echo get_post_meta( $post->ID, '_ebor_the_job_title', true ); ?></div>
					</div>
				<?php endif; ?>
				<?php the_post_thumbnail('index'); ?>
			<?php echo $after; ?>
		</figure>
	<?php endif; ?>
	
	<div class="image-caption text-center">
		<?php 
			the_title('<h4 class="post-title upper">' . $before, $after . '</h4>'); 
			echo '<div class="meta">'. get_post_meta( $post->ID, '_ebor_the_job_title', true ) .'</div>';
			the_excerpt();
			get_template_part('loop/loop','social');
		?>
	</div>
	
</div>