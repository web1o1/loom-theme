<?php $protocols = array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet', 'skype'); ?>

<ul class="social pull-right">
	<?php 
		for( $i = 0; $i < 8; $i++ ){
			if( get_option("footer_social_link_$i") ) {
				echo '<li><a href="' . esc_url(get_option("footer_social_link_$i"), $protocols) . '" target="_blank">
						  <i class="icon-s-' . get_option("footer_social_$i") . '"></i>
					  </a></li>';
			}
		} 
	?>
</ul>