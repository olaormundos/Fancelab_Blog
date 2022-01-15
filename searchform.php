<form role="search" method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="s">
		<?php echo _x( 'Search for:', 'label', 'FanceLab' ); ?>
	</label>
	<input type="text" class="search-field" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php echo esc_attr_x( 'Search &hellip', 'placeholder', 'FanceLab' ); ?>"/>
	<input type="submit" id="searchsubmit" value="<?php echo _x( 'Search', 'submit button', 'FanceLab' ); ?>" />
	<?php 
	// IF WooCommerce is activated, wee'11 be searching among products, not posts
	if( class_exists( 'WooCommerce' ) ): ?>
		<input type="hidden" value="product" name="post_type" id="post_type">
	<?php endif; ?>	
</form>