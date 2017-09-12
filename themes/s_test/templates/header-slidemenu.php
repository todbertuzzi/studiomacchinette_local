

<header class="banner navbar navbar-default navbar-static-top nav-slide" role="banner">
  
  

  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle  js-menu-trigger sliding-panel-button"" data-toggle="collapse" data-target=".navbar-collapse">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </button>
      <div class="labelHamburger">MENU</div>
      <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>" /></a>
    </div>

  </div>
  <div class="holderSlideNav js-menu sliding-panel-content">
    <?php
      if (has_nav_menu('primary_navigation')) :
         echo do_shortcode( "[csst_nav which_menu='menu-sx']" ) ;
       // wp_nav_menu(['theme_location' => 'primary_navigation','depth' => 3, 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'realSlideMenu']);
      endif;
      ?>
  </div>    
  <div class="js-menu-screen sliding-panel-fade-screen"></div>
</header>