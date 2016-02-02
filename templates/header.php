<header class="banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container-fluid splash">  
  <div class="container-fluid logo"> <img class="alignright" src="<?php echo get_template_directory_uri() . "/assets/img/escience_logo_2106_hdr.png"; ?>" />
  </div>
  </div>
  <div class="container">
    <div class="navbar-header">
	<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
	<div class="bookmark navmenu"><a href="#navmenu"><i class="fa fa-bars fa-2x"></i></a></div>
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'walker' => new Roots_Nav_Walker(), 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
    </nav>
  </div>
</header>
