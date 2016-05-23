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
/**
 * Creates a side menu as a vertical button group with dropdowns.
 *
 * @param string $content Default content text
 * @param string $nav_menu 
 * @param string $args 
 * @param string $instance 
 * @return string Filtered title.
 */
function escience_filter_custom_menu( $content, $nav_menu, $args, $instance ) {
 
	//idies_debug( $args );
	return $content;
 
}
add_filter( 'widget_nav_menu_args', 'escience_filter_custom_menu', 10, 4 ); 


/*
 * Print Debug values.
 */
function idies_debug( $var ) {
	if ( WP_DEBUG ) :
	
		echo "<PRE>";
		
		if (is_array($var)) :
			print_r($var);
		elseif (is_object($var)) :
			var_dump($var);
		else :
			print($var);
		endif;
		
		echo "</PRE>";
		
	endif;
	return;
}
