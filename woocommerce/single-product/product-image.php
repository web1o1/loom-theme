<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product;

?>
<div class="images">

	<?php
		if ( has_post_thumbnail() ) {

			$image_title 		= esc_attr( get_the_title( get_post_thumbnail_id() ) );
			$image_link  		= wp_get_attachment_url( get_post_thumbnail_id() );
			$attachment_count   = count( $product->get_gallery_attachment_ids() );

			if ( $attachment_count > 0 ) {
				$gallery = '[product-gallery]';
			} else {
				$gallery = '';
			}
			
			$details = get_option('shop_single_image_size');
			$url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
			$resized_image = aq_resize($url[0], $details['width'], $details['height'], $details['crop']);
			$image = '<img src="'.$resized_image.'" alt="'.$image_title.'" />';

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<figure><a href="%s" itemprop="image" class="fancybox-media" rel="'.get_the_ID().'"><div class="text-overlay"><div class="info">View Larger</div></div>%s</a></figure>', $image_link, $image ), $post->ID );

		} else {

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="Placeholder" />', woocommerce_placeholder_img_src() ), $post->ID );

		}
	?>

	<?php do_action( 'woocommerce_product_thumbnails' ); ?>

</div>
