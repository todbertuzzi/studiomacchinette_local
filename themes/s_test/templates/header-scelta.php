 <?php
     $idMenuLayout = get_theme_mod("select_setting");

      if($idMenuLayout == 0){
         get_template_part('templates/header-split');
      }
      if($idMenuLayout == 1){
         get_template_part('templates/header-fullwidth');
      }

      if($idMenuLayout == 2){
         get_template_part('templates/header-slidemenu');
      }
?>