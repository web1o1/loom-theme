<?php
	/**
	 * searchform.php
	 * The theme searchform
	 * @author TommusRhodus
	 * @package loom
	 * @since 1.0.0
	 */
?>
<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
		<input type="text" id="s" name="s" value="type and hit enter" onfocus="this.value=''" onblur="this.value='<?php _e('type and hit enter','zonya'); ?>'"/>
		<input type="hidden" name="post_type" value="product" />
</form>