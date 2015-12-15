<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class('centered-header'); ?>>

<?php 
	if( get_option('use_preloader', '1') )
		get_template_part('inc/content','preloader'); 
?>

<div class="body-wrapper">

  <div class="navbar yamm basic default">
    <div class="navbar-header">
    
      <div class="container">
      
        <div class="basic-wrapper"> 
        
        	<a class="btn responsive-menu pull-right" data-toggle="collapse" data-target=".navbar-collapse">
        		<i class='icon-menu-1'></i>
        	</a> 
        	
        	<a class="navbar-brand" href="<?php echo home_url(); ?>">
        		<?php if( get_option('custom_logo') ) : ?>
        			<img src="<?php echo get_option('custom_logo'); ?>" alt="<?php echo get_option('custom_logo_alt_text'); ?>" class="retina" />
        		<?php else : ?>
        			<span><?php echo bloginfo('name'); ?></span>
        		<?php endif; ?>
        	</a> 
        	
        </div>
        
      </div>
    </div>
  </div>
  <div class="offset"></div>