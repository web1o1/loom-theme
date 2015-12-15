<?php

/**
 * Ebor Framework
 * Styles & Scripts Enqueuement
 * @since version 1.0
 * @author TommusRhodus
 */

/**
 * Ebor Load Scripts
 * Properly Enqueues Scripts & Styles for the theme
 * @since version 1.0
 * @author TommusRhodus
 */ 
function ebor_load_scripts() {
	$protocol = is_ssl() ? 'https' : 'http';
	      
	//Enqueue Styles
	wp_enqueue_style( 'ebor-loom-raleway-font', "$protocol://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800,900" );
	wp_enqueue_style( 'ebor-bootstrap', get_template_directory_uri() . '/style/css/bootstrap.css' );
	wp_enqueue_style( 'ebor-owl', get_template_directory_uri() . '/style/css/owl.carousel.css' );
	wp_enqueue_style( 'ebor-fancybox', get_template_directory_uri() . '/style/js/fancybox/jquery.fancybox.css' );
	wp_enqueue_style( 'ebor-fancybox-thumbs', get_template_directory_uri() . '/style/js/fancybox/helpers/jquery.fancybox-thumbs.css?v=1.0.2' );
	
	if (class_exists('Woocommerce'))
		wp_enqueue_style( 'ebor-woocommerce', get_template_directory_uri() . '/style/css/woocommerce.css' );
		
	wp_enqueue_style( 'ebor-style', get_stylesheet_uri() );
	wp_enqueue_style( 'ebor-fonts', get_template_directory_uri() . '/style/type/fonts.css' );
	wp_enqueue_style( 'ebor-custom', get_template_directory_uri() . '/custom.css' );
	
	//Dequeue Styles
	wp_dequeue_style('aqpb-view-css');
	wp_deregister_style('aqpb-view-css');
	
	//Enqueue Scripts
	wp_enqueue_script( 'ebor-bootstrap', get_template_directory_uri() . '/style/js/bootstrap.min.js', array('jquery'), false, true  );
	if ( is_ssl() ) {
	    wp_enqueue_script('ebor-googlemapsapi', 'https://maps-api-ssl.google.com/maps/api/js?sensor=false&v=3.exp', array( 'jquery' ), false, true);
	} else {
	    wp_enqueue_script('ebor-googlemapsapi', 'http://maps.googleapis.com/maps/api/js?sensor=false&v=3.exp', array( 'jquery' ), false, true);
	}
	wp_enqueue_script( 'ebor-plugins', get_template_directory_uri() . '/style/js/plugins.js', array('jquery'), false, true  );
	wp_enqueue_script( 'ebor-scripts', get_template_directory_uri() . '/style/js/scripts.js', array('jquery'), false, true  );
	
	//Enqueue Comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	/**
	 * Dequeue Scripts
	 */
	wp_dequeue_script('aqpb-view-js');
	wp_deregister_script('aqpb-view-js');
	
	/**
	 * localize script
	 */
	$script_data = array( 
		'fixed_header' => get_option('fixed_header','1'),
		'site_version' => get_option('site_version', 'multipage')
	);
	wp_localize_script( 'ebor-scripts', 'wp_data', $script_data );
	
	/**
	 * Pass theme options to CSS
	 */
	$highlight = get_option('highlight_colour','#1abb9c');
	$highlightrgb = ebor_hex2rgb( $highlight );
	$highlight_hover = get_option('highlight_hover_colour','#17a78b');
	$dark_wrapper = get_option('wrapper_background_dark', '#f5f5f5');
	$header_bg = get_option('header_bg', '#f5f5f5');
	$header_dropdown_bg = get_option('header_dropdown_bg', '#414141');
	$footer_bg = get_option('footer_bg', '#303030');
	$sub_footer_bg = get_option('sub_footer_bg', '#2d2d2d');
	$header_bg_rgb = ebor_hex2rgb($header_bg);
	
	$custom_styles = "
		/**
		 * Header
		 */
		.navbar-header {
			background: $header_bg;
			border-top: 3px solid $header_dropdown_bg;
		}
		
		.navbar.basic.fixed .navbar-header {
			background: rgba($header_bg_rgb,0.94);
		}
		
		.navbar .dropdown-menu {
			background: $header_dropdown_bg;
		}
		
		/**
		 * Footer
		 */
		.footer {
			background: $footer_bg;
		}
		
		.sub-footer {
			background: $sub_footer_bg;
		}
		
		/**
		 * Page Wrappers Backgounds
		 */
		.light-wrapper,
		#sub-header.sub-footer.social-light {
		    background: #". get_background_color() .";
		}
		.dark-wrapper,
		#sub-header.sub-footer.social-line {
		    background: $dark_wrapper;
		}
		
		/**
		 * Highlight Colours
		 */
		.spinner,
		.tp-loader,
		#fancybox-loading div {
		    border-left: 3px solid rgba($highlightrgb,.15) !important;
		    border-right: 3px solid rgba($highlightrgb,.15) !important;
		    border-bottom: 3px solid rgba($highlightrgb,.15) !important;
		    border-top: 3px solid rgba($highlightrgb,.8) !important;
		}
		a,
		.colored,
		.post-title a:hover,
		ul.circled li:before,
		aside ul li:before,
		.lead.lite a:hover,
		.footer a:hover,
		.nav > li > a:hover,
		.nav > li.current > a,
		.navbar .nav .open > a,
		.navbar .nav .open > a:hover,
		.navbar .nav .open > a:focus,
		.navbar .dropdown-menu > li > a:hover,
		.navbar .dropdown-menu > li > a:focus,
		.navbar .dropdown-submenu:hover > a,
		.navbar .dropdown-submenu:focus > a,
		.navbar .dropdown-menu > .active > a,
		.navbar .dropdown-menu > .active > a:hover,
		.navbar .dropdown-menu > .active > a:focus,
		.filter li a:hover,
		.filter li a.active,
		ul.circled li:before, 
		.widget_categories ul li:before,
		.post-content ul li:before,
		.textwidget a,
		#sub-header .pull-left i,
		#sub-header.sub-footer.social-line .pull-left a:hover,
		#sub-header.sub-footer.social-light .pull-left a:hover,
		#menu-standard-navigation a.active  {
		    color: $highlight;
		}
		.lead.lite a {
		    border-bottom: 1px solid $highlight;
		}
		.btn,
		.parallax .btn-submit,
		.btn-submit,
		.newsletter-wrapper #mc_embed_signup .button,
		.widget_ns_mailchimp form input[type='submit'],
		input[type='submit'],
		.bonfire-slideout-content input[type='submit'],
		input[type='button'],
		.woocommerce .widget_price_filter .ui-slider-horizontal .ui-slider-range, .woocommerce-page .widget_price_filter .ui-slider-horizontal .ui-slider-range,
		.woocommerce span.onsale, .woocommerce-page span.onsale, .woocommerce ul.products li.product .onsale, .woocommerce-page ul.products li.product .onsale,
		.woocommerce .button,
		.added_to_cart,
		.ebor-count {
		    background: $highlight;
		}
		.btn:hover,
		.btn:focus,
		.btn:active,
		.btn.active,
		.parallax .btn-submit:hover,
		input[type='submit']:hover,
		.bonfire-slideout-content input[type='submit']:hover,
		.widget_ns_mailchimp form input[type='submit']:hover,
		input[type='button']:hover,
		.woocommerce .button:hover,
		.added_to_cart:hover,
		.woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle {
		    background: $highlight_hover;
		}
		.tooltip-inner {
		    background-color: $highlight;
		}
		.tooltip.top .tooltip-arrow,
		.tooltip.top-left .tooltip-arrow,
		.tooltip.top-right .tooltip-arrow {
		    border-top-color: $highlight
		}
		.tooltip.right .tooltip-arrow {
		    border-right-color: $highlight
		}
		.tooltip.left .tooltip-arrow {
		    border-left-color: $highlight
		}
		.tooltip.bottom .tooltip-arrow,
		.tooltip.bottom-left .tooltip-arrow,
		.tooltip.bottom-right .tooltip-arrow {
		    border-bottom-color: $highlight
		}
		.services-1 .col-wrapper:hover,
		.services-1 .col-wrapper:hover:before,
		.woocommerce .price {
		    border-color: $highlight !important;
		}
		.services-3 .icon i.icn {
		    color: $highlight;
		    border: 2px solid $highlight;
		}
		.services-3 .col:hover i.icn {
		    background-color: $highlight;
		}
		.panel-title > a:hover {
		    color: $highlight
		}
		.progress-list li em {
		    color: $highlight;
		}
		.progress.plain,
		.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content, .woocommerce-page .widget_price_filter .price_slider_wrapper .ui-widget-content {
		    border: 1px solid $highlight;
		}
		.progress.plain .bar {
		    background: $highlight;
		}
		.meta.tags a:hover {
		    color: $highlight
		}
		.owl-carousel .owl-controls .owl-prev:hover,
		.owl-carousel .owl-controls .owl-next:hover {
		    border: 1px solid $highlight;
		    color: $highlight;
		}
		.navigation a:hover {
		    border: 1px solid $highlight;
		    color: $highlight;
		}
		.tp-caption a,
		#testimonials .author,
		.tabs-top .tab a:hover,
		.tabs-top .tab.active a {
		    color: $highlight
		}
		.parallax a:hover {
		    color: $highlight_hover
		}
		.pagination ul > li > a:hover,
		.pagination ul > li > a:focus,
		.pagination ul > .active > a,
		.pagination ul > .active > span {
		    border: 1px solid $highlight;
		    color: $highlight;
		}
		.sidebox a:hover {
		    color: $highlight
		}
		#comments .info h2 a:hover {
		    color: $highlight
		}
		#comments a.reply-link:hover {
		    color: $highlight
		}
		.pricing .plan h4 span {
		    color: $highlight
		}
		.bonfire-slideout-button:hover {
			color: $highlight;
		}
		.bonfire-slideout-close:hover,
		.woocommerce .button:hover,
		.added_to_cart:hover,
		.woocommerce .price,
		.woocommerce-tabs ul.tabs li a:hover,
		.woocommerce-tabs ul.tabs li.active a {
			color: $highlight !important;
		}
		.bonfire-slideout-content .btn-submit {
		    background: $highlight
		}
		@media (max-width: 991px) { 
			.navbar-nav > li > a,
			.navbar-nav > li > a:focus {
			    color: $highlight
			}
		}
	";
	
	if( get_background_image() ){
		$custom_styles .= "
			.light-wrapper {
			    background: none;
			}
		";
	}
	
	wp_add_inline_style( 'ebor-style', $custom_styles );
		
	wp_add_inline_style( 'ebor-style', get_option('custom_css') );
		
}
add_action('wp_enqueue_scripts', 'ebor_load_scripts', 10);

/**
 * Ebor Load Non Standard Scripts
 * Quickly insert HTML into wp_head()
 * @since version 1.0
 * @author TommusRhodus
 */
function ebor_load_non_standard_scripts() {
	echo '<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		  <!--[if lt IE 9]>
			  <script src="'. get_template_directory_uri() . '/style/js/html5shiv.js"></script>
			  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		  <![endif]-->';
}
add_action('wp_head', 'ebor_load_non_standard_scripts', 95);

/**
 * Ebor Load Admin Scripts
 * Properly Enqueues Scripts & Styles for the theme
 * @since version 1.0
 * @author TommusRhodus
 */
function ebor_admin_load_scripts(){
	wp_enqueue_script('ebor-admin-js', get_template_directory_uri().'/admin/admin.js', array('jquery'), false, true);
	wp_enqueue_style( 'ebor-admin-css', get_template_directory_uri() . '/admin/css/admin.css' );
	wp_enqueue_style( 'ebor-fonts', get_template_directory_uri() . '/style/type/fonts.css' );
}
add_action('admin_enqueue_scripts', 'ebor_admin_load_scripts', 200);