<?php 
global $post;

//Not showing h1 heading on front-page.
//	get_template_part('templates/page', 'header'); 

// If front-page has a special template, show it.
if (locate_template('templates/content-front-page.php') != '') {

	get_template_part('templates/content', 'front-page'); 
	
// Otherwise, just use regular page content template.
} else {

	get_template_part('templates/content', 'page'); 
}

//get_template_part('templates/content', 'page'); 
?>
