<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  if(is_front_page()){
     $classes[] = 'tod-homepage';
  }

  // Add class if sidebar is active
 // if (Setup\display_sidebar()) {
 //   $classes[] = 'sidebar-primary';
 // }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('More', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');



// SE SIDEBAR AFC SELEZIONATA MOSTRO LA SIDEBAR

function sage_sidebar_on_afc($sidebar) {
  
 // echo("<h1>".get_field( "sidebar" )."dada</h1>");
  if (get_field( "sidebar")) {
    return true;
  }
  return $sidebar;
}
add_filter('sage/display_sidebar', __NAMESPACE__ . '\\sage_sidebar_on_afc');






function load_fonts() {
            wp_register_style('et-googleFonts', 'https://fonts.googleapis.com/css?family=Roboto:400,300,900');
            wp_enqueue_style( 'et-googleFonts');

            wp_register_style('et-googleFonts2', 'https://fonts.googleapis.com/css?family=Comfortaa:400,300,700');
              wp_enqueue_style( 'et-googleFonts2');

             wp_register_style('et-googleFonts3', 'https://fonts.googleapis.com/css?family=Varela+Round');
              wp_enqueue_style( 'et-googleFonts3');


              wp_register_style('et-googleFonts4', 'https://fonts.googleapis.com/css?family=Nunito:400,300,700');
              wp_enqueue_style( 'et-googleFonts4'); 
              

              wp_register_style('et-googleFonts5', 'https://fonts.googleapis.com/css?family=Nunito:400,300,700');
              wp_enqueue_style( 'et-googleFonts5'); 

             
            
        }
add_action('wp_print_styles',__NAMESPACE__ . '\\load_fonts');


// GET AND TRIM EXCEPERT
function the_excerpt_max_charlength($charlength) {
  $excerpt = get_the_excerpt();
  $charlength++;

  if ( mb_strlen( $excerpt ) > $charlength ) {
    $subex = mb_substr( $excerpt, 0, $charlength - 5 );
    $exwords = explode( ' ', $subex );
    $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
    if ( $excut < 0 ) {
      echo mb_substr( $subex, 0, $excut );
    } else {
      echo $subex;
    }
    echo '[...]';
  } else {
    echo $excerpt;
  }
}



// Registro custom taxonomy Progetti
add_action( 'init', __NAMESPACE__ . '\\create_pitch_video_taxonmies' );
function create_pitch_video_taxonmies() {
register_taxonomy(
        'genere',
        'progetti',
        array(
            'label' => __( 'Genere' ),
            'rewrite' => array( 'slug' => 'genere' ),
            'hierarchical' => true,
        )
    );
}

// Registro custom post Progetti
add_action('init', __NAMESPACE__ . '\\progetti_register');  
function progetti_register() {  
    $args = array(  
        'label' => __('Progetti'),  
        'singular_label' => __('progetto'),  
        'public' => true,  
        'show_ui' => true,  
        'capability_type' => 'post',  
        'hierarchical' => true,  
        'has_archive' => true,
        'rewrite' => array('slug' => 'progetti'),
        'supports' => array('title', 'editor', 'thumbnail')  
       );  
   
    register_post_type( 'progetti' , $args );  
}


// AGGIUNGO AI MENU ITEM LA CLASSA CURRENT-MENU-ITEM SE VISUALIZZO UN SINGLE CUSTOM POST COLLEGATO ALLA VOCE DI MENU (es: cosa facciamo->progetti )
// RIF: http://wordpress.stackexchange.com/questions/56305/show-current-item-in-custom-menu-when-inside-a-custom-post-type

add_filter( 'nav_menu_css_class',__NAMESPACE__ . '\\additional_active_item_classes', 10, 2 );

function additional_active_item_classes($classes = array(), $menu_item = false){
    global $wp_query;

    if(in_array('current-menu-item', $menu_item->classes)){
        $classes[] = 'current-menu-item';

    }

    if ( $menu_item->post_name == 'cosa-facciamo' && is_post_type_archive('progetti') ) {
        $classes[] = 'current-menu-item';

    }

    if ( $menu_item->post_name == 'cosa-facciamo' && is_singular('progetti') ) {
        $classes[] = 'current-menu-item';
       

    }
    
    return $classes;
}




//[wpml_lang_selector]
function wpml_shortcode_func(){
    //do_action('icl_language_selector');
      
    if( function_exists('icl_get_languages') ):
        $languages = icl_get_languages('skip_missing=0');
        
        $link = '<ul>';
        foreach($languages as $language) {
        
            if(!$language['active']) {
                $link .= '<li><a href="' . $language['url'] . '"><img src="' . $language['country_flag_url'] . '" alt="' . $language['native_name'] . '" /> ' . $language['native_name'] . '</a></li>';
            }
        }
        $link .= '</ul>';
        
        return $link;
          
    endif;
}

add_shortcode( 'wpml_lang_selector',  __NAMESPACE__ . '\\wpml_shortcode_func' );
