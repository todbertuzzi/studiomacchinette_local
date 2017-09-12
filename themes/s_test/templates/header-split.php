<?php
  // This file assumes that you have included the nav walker from https://github.com/twittem/wp-bootstrap-navwalker
  // somewhere in your theme.
?>

<header class="banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container-fluid">
   <div class="selettore-lingua">
       <?php echo do_shortcode( '[wpml_lang_selector]' ) ?>
   </div>    
    <div class="navbar-header">
      
       <div class="logo-mobile">
          <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"> 
<?php  get_template_part('templates/inline', "logo_sm_header.svg"); ?> <?php // echo file_get_contents(get_bloginfo('template_directory')."/dist/images/logo_sm_header.svg"); ?></a>
       </div>


      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only"><?= __('Toggle navigation', 'sage'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      


    </div>

    <nav class="collapse navbar-collapse" role="navigation">
        <div class="menu-container">
            <?php
            if (has_nav_menu('menu_sx')) :
              wp_nav_menu(['theme_location' => 'menu_sx', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav nav-sx']);
            endif;
             ?>
             <div class="menu menu-center">
               <div class="logo">
                <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"> <?php get_template_part('templates/inline', "logo_sm_header.svg");//echo file_get_contents(get_bloginfo('template_directory')."/dist/images/logo_sm_header.svg"); ?></a>
               </div>
             </div>  
             <?php
            if (has_nav_menu('menu_dx')) :
              wp_nav_menu(['theme_location' => 'menu_dx', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav nav-dx']);
            endif;
            ?>
        </div>
    </nav>
</header>