<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <?php
	if (locate_template('templates/pre-header.php') != '') get_template_part('templates/pre-header');
    do_action('get_header');
    get_template_part('templates/header');
  ?>

  <div class="wrap container" role="document">
    <div class="content row">
      <main class="main" role="main">
<?php 
if (SIDE_MENU) : 
	echo '<div class="container-fluid"><div class="row">';
	// medium and larger screens, hidden otherwise
	echo '<div class="col-md-3 hidden-xs hidden-sm left-vertical-nav">';
	if (has_nav_menu('primary_navigation')) :
	  wp_nav_menu(array('theme_location' => 'primary_navigation', 'walker' => new Roots_Nav_Walker(), 'menu_class' => 'nav navbar-nav'));
	endif;
	echo '</div>';
	// Extra Small and Small screens - collapsed
	echo '<div class="col-md-3 left-vertical-nav collapse" id="collapseNav"">';
	if (has_nav_menu('primary_navigation')) :
	  wp_nav_menu(array('theme_location' => 'primary_navigation', 'walker' => new Roots_Nav_Walker(), 'menu_class' => 'nav navbar-nav'));
	endif;
	echo '</div>';
	echo '<div class="col-xs-12 col-md-9">';
	include roots_template_path(); 
	echo '</div>';
	echo '</div></div>';
else : 
	include roots_template_path(); 
endif ; 
?>
      </main><!-- /.main -->
      <?php if (roots_display_sidebar()) : ?>
        <aside class="sidebar" role="complementary">
          <?php include roots_sidebar_path(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>
    </div><!-- /.content -->
  </div><!-- /.wrap -->

  <?php get_template_part('templates/footer'); ?>

  <?php wp_footer(); ?>

</body>
</html>
