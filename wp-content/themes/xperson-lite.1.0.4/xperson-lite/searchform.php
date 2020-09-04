<?php
/**
 * Template for displaying search forms in xPerson Lite
 *
 * @package WordPress
 * @subpackage xPerson Lite
 * @since xPerson Lite 1.0.0
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'xperson-lite' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'xperson-lite' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit"><?php esc_html_e('Search', 'xperson-lite'); ?><span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'xperson-lite' ); ?></span></button>
</form>
