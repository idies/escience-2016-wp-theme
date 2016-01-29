<?php
/**
 * Alters <title> element in <head>
 */
/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 * @return string Filtered title.
 */
function escience_filter_wp_title( $title, $sep ) {
 
	global $paged, $page;
	$new_sep = "|";

	if ( is_feed() ) {
			return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title = "$title $new_sep $site_description";
	}

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title = "$title $new_sep " . sprintf( __( 'Page %s', 'roots' ), max( $paged, $page ) );
	}

	return $title;
 
}
add_filter( 'wp_title', 'escience_filter_wp_title', 10, 2 ); 
