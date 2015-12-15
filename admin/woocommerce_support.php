<?php 

/**
 * Add Shop Link to Menu
 */
function ebor_cart_icon($items, $args) {
	if($args->theme_location == 'primary'){
		global $woocommerce;
		if (is_cart()) return $items;
		$items .= '<li class="ebor-cart"><a href="'. $woocommerce->cart->get_cart_url() .'"><i class="icon-basket-1"></i><span class="ebor-count">0</span></a></li>';
		return $items;
	} else {
		return $items;
	}
}
add_filter( 'wp_nav_menu_items', 'ebor_cart_icon', 20,2 );

// Remove each style one by one
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	return $enqueue_styles;
}

add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 2;
	}
}

function woocommerce_template_loop_product_thumbnail(){
	global $post;
	global $product;
	$details = get_option('shop_catalog_image_size');
	$url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
	$resized_image = aq_resize($url[0], $details['width'], $details['height'], $details['crop']);
	echo '<figure>';
	if ( $product->is_on_sale() )
		echo '<span class="onsale">' . __( 'Sale!', 'zonya' ) . '</span>';
	echo '<a href="' . get_permalink() . '"><div class="text-overlay"><div class="info">'. get_the_title() .'</div></div><img src="' . $resized_image . '" alt="' . get_the_title() . '" /></a></figure>';
}

//Remove prettyPhoto lightbox
add_action( 'wp_enqueue_scripts', 'fc_remove_woo_lightbox', 99 );
function fc_remove_woo_lightbox() {
    wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
    wp_dequeue_script( 'prettyPhoto' );
    wp_dequeue_script( 'prettyPhoto-init' );
}

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 25);

// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment_total');
function woocommerce_header_add_to_cart_fragment_total( $fragments ) {
	global $woocommerce;
	ob_start();
?>
	<span class="ebor-count"><?php echo $woocommerce->cart->get_cart_contents_count(); ?></span>
	
<?php	
	$fragments['span.ebor-count'] = ob_get_clean();
	return $fragments;
}