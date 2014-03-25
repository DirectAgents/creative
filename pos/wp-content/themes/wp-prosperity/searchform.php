<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label><span class="screen-reader-text"><?php _e( 'Search for:', 'themebeagle' ); ?></span></label>
	<span class="genericon genericon-search"></span>
	<input type="text" class="search-field" placeholder="<?php _e( 'Enter Search Terms', 'themebeagle' ); ?>" value="" name="s" title="<?php _e( 'Enter Search Terms', 'themebeagle' ); ?>" />
	<input type="submit" class="search-submit" value="<?php _e( 'Search', 'themebeagle' ); ?>" />
</form>