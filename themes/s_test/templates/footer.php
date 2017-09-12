
<footer class="content-info">
  <div class="container">

  	<?php dynamic_sidebar('sidebar-footer'); ?>
  	<?php
   


    /* The footer widget area is triggered if any of the areas
     * have widgets. So let's check that first.
     *
     * If none of the sidebars have widgets, then let's bail early.
     */
    if (! is_active_sidebar( 'first-footer-widget-area'  )
        && ! is_active_sidebar( 'second-footer-widget-area' )
        && ! is_active_sidebar( 'third-footer-widget-area'  )
        && ! is_active_sidebar( 'fourth-footer-widget-area' )
    ):
        return;
 
    //end of all sidebar checks.
    endif;

    ?>

   
  </div>
</footer>

