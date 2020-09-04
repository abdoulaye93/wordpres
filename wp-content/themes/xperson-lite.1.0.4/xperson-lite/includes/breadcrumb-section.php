<?php global $xpersonlite, $post;

$gbreadcrumb_section_on_off = isset( $xpersonlite['skt-breadcrumb-section'] ) ? $xpersonlite['skt-breadcrumb-section'] : 'on';

if( is_page() || is_singular() ) {
	$breadcrumb_section_on_off  = get_post_meta( $post->ID, 'breadcrumb_section_on_off', true);
	$gbreadcrumb_section_on_off = ( isset($breadcrumb_section_on_off) && $breadcrumb_section_on_off != '' ) ? $breadcrumb_section_on_off : $gbreadcrumb_section_on_off;

	$breadcrumb_on_off  = get_post_meta( $post->ID, 'breadcrumb_on_off', true);

}
if( $gbreadcrumb_section_on_off == 'on' ) {
?>
<!-- BEGIN: BREADCRUMBS -->
<header class="page-header text-center">
	<h1 class="page-title">
		<?php
			
			if( is_404() ) :
				esc_html_e('ERROR 404', 'xperson-lite');
			elseif ( is_single() ) :
				the_title();
			elseif ( is_page() ) :
				the_title();
			elseif ( is_search() ) :
				printf( esc_html__( 'Search Result For : %s', 'xperson-lite' ), get_search_query() );
			else :
				the_archive_title( '<h1 class="page-title">', '</h1>' );
			endif;

		?>
	</h1>

	<div id="page-header-overlay"></div>

</header>
<!-- END: BREADCRUMBS -->
<?php } ?>