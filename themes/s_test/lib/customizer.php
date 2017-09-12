<?php

namespace Roots\Sage\Customizer;

use Roots\Sage\Assets;

/**
 * Add postMessage support
 */
function customize_register($wp_customize) {
  $wp_customize->get_setting('blogname')->transport = 'postMessage';

 
	
}
add_action('customize_register', __NAMESPACE__ . '\\customize_register');


function sitepoint_customize_register($wp_customize) 
{
  
  /*
 
$wp_customize->add_control('narga_options[use_custom_text]', array(
    'settings' => 'narga_options[use_custom_text]',
    'label'    => __('Display Custom Text', 'narga'),
    'section'  => 'layout_section', # Layout Section
    'type'     => 'checkbox', # Type of control: checkbox
));
 
# Add text input form to change custom text
$wp_customize->add_setting('narga_options[custom_text]', array(
    'capability' => 'edit_theme_options',
    'type'       => 'option',
    'default'       => 'Custom text', # Default custom text
));
 
$wp_customize->add_control('narga_options[custom_text]', array(
        'label' => 'Custom text', # Label of text form
        'section' => 'layout_section', # Layout Section
        'type' => 'text', # Type of control: text input
));

*/

$wp_customize->add_section('menu_style_choice' , array(
    'title' => __('Scelta stile menu','Sage'),
));


// Select control
$wp_customize->add_setting( 'select_setting', array(
    'default'        => 'Split Menu',
    "transport" => "refresh",
) );
$wp_customize->add_control( 'select_setting', array(
    'label'   => 'Scelta stile menu',
    'section' => 'menu_style_choice',
    'type'    => 'select',
    'choices' => array("Split Menu", "Full Width Menu", "Slide Menu"),
    'priority' => 4
) );

}

add_action("customize_register", __NAMESPACE__ . "\\sitepoint_customize_register");

//add_action( 'customize_register' , __NAMESPACE__ . '\\my_theme_options' );



/* TOD BACKGROUND IMAGE*/
add_theme_support('custom-background');
$args = array(
  'width'         => 560,
  'height'        => 120,
  'default-image' => get_template_directory_uri() . '/images/custom-header.jpg',
  'uploads'       => true,
);
add_theme_support( 'custom-header', $args );


/**
 * Customizer JS
 */
function customize_preview_js() {
  wp_enqueue_script('sage/customizer', Assets\asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
}
add_action('customize_preview_init', __NAMESPACE__ . '\\customize_preview_js');

