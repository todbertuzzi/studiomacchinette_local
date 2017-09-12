<?php
//Thumbnail & Featured Image Support
if ( function_exists( 'add_theme_support' ) ) { 
   add_theme_support( 'post-thumbnails', array( 'portfolio' ) ); // Posts and Movies
    
 
    set_post_thumbnail_size( 300, 210, false ); // Normal post thumbnails
    add_image_size('original-portfolio', 300, 210, true); // Blog Latest Posts Thumb Only

  

    add_image_size('latest-blog-thumb', 578, 384, true); // Blog Latest Posts Thumb Only
    add_image_size('latest-masonry-blog-thumb', 578 ); // Blog Latest Posts Masonry Thumb Only

    add_image_size('listed-blog-thumb', 578, 384, true); // Blog Listed Thumb Only
    add_image_size('center-blog-thumb', 1000, 500, true); // Blog Center Thumb Only
    add_image_size('masonry-blog-thumb', 578 ); // Portfolio Thumb Masonry Only
    add_image_size('standard-blog-thumb', 800, 390, true ); // Portfolio Thumb Grid Only

    add_image_size('team-thumb', 478, 384, true); // Team Thumb Only

    add_image_size('portfolio-thumb', 578, 384, true); // Portfolio Thumb Grid Only
    add_image_size('portfolio-masonry-thumb', 578 ); // Portfolio Thumb Grid Only
    add_image_size('portfolio-wall-thumb', 578, 384, true); // Portfolio Thumb Wall Only

    add_image_size('gallery-thumb', 500, 500, true); // Gallery Thumb Grid Only
    add_image_size('gallery-masonry-thumb', 500 ); // Gallery Thumb Masonry Only
    add_image_size('gallery-wall-thumb', 500, 500, true); // Gallery Wall Thumb Grid Only

    add_image_size('masonry-block-normal-size', 500, 500, true); // Masonry Block Normal Size Only
    add_image_size('masonry-block-wide-size', 1000, 500, true); // Masonry Block Wide Size Only
    add_image_size('masonry-block-tall-size', 500, 1000, true); // Masonry Block Tall Size Only
    add_image_size('masonry-block-big-size', 1000, 1000, true); // Masonry Block Big Size Only
}
  

// Registro custom post
add_action('init', 'portfolio_register');  
function portfolio_register() {  
    $args = array(  
        'label' => __('Portfolio'),  
        'singular_label' => __('Project'),  
        'public' => true,  
        'show_ui' => true,  
        'capability_type' => 'post',  
        'hierarchical' => true,  
        'has_archive' => true,
        'rewrite' => array('slug' => 'portfolio'),
        'supports' => array('title', 'editor', 'thumbnail')  
       );  
   
    register_post_type( 'portfolio' , $args );  
}

// Registro custom taxonomy
add_action( 'init', 'create_portfolio_tax' );
function create_portfolio_tax() {
register_taxonomy(
        'genre',
        'portfolio',
        array(
            'label' => __( 'Genre' ),
            'rewrite' => array( 'slug' => 'genre' ),
            'hierarchical' => true,
        )
    );
}


// Registro custom post
add_action('init', 'pubblicazioni_register');  
function pubblicazioni_register() {  
    $args = array(  
        'label' => __('Pubblicazioni'),  
        'singular_label' => __('Pubblicazione'),  
        'public' => true,  
        'show_ui' => true,  
        'capability_type' => 'post',  
        'hierarchical' => true,  
        'has_archive' => true,
        'rewrite' => array('slug' => 'pubblicazioni'),
        'supports' => array('title', 'editor', 'thumbnail')  
       );  
   
    register_post_type( 'pubblicazioni' , $args );  
}

// Registro custom taxonomy
add_action( 'init', 'create_pubb_tax' );
function create_pubb_tax() {
register_taxonomy(
        'genere',
        'pubblicazioni',
        array(
            'label' => __( 'Genere' ),
            'rewrite' => array( 'slug' => 'genere' ),
            'hierarchical' => true,
        )
    );
}

 /*
// Custom Field Box
function portfolio_meta_box(){  
    add_meta_box("projInfo-meta", "Project Options", "portfolio_meta_options", "portfolio", "side", "low");  
}  
   
 
function portfolio_meta_options(){  
        global $post;  
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
        $custom = get_post_custom($post->ID);  
        $link = $custom["projLink"][0];  
?>  
    <label>Link:</label><input name="projLink" value="<?php echo $link; ?>" />  
<?php  
    }

    add_action('save_post', 'save_project_link'); 
   

// Salvo i Custom Data   
function save_project_link(){  
    global $post;  
     
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){ 
        return $post_id;
    }else{
        update_post_meta($post->ID, "projLink", $_POST["projLink"]); 
    } 
}


//Customizing Admin Columns
add_filter("manage_edit-portfolio_columns", "project_edit_columns");   
   
function project_edit_columns($columns){  
        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => "Project",  
            "description" => "Description",  
            "link" => "Link",  
            "type" => "Type of Project",  
        );  
   
        return $columns;  
}  


 
add_action("manage_posts_custom_column",  "project_custom_columns"); 
   
function project_custom_columns($column){  
        global $post;  
        switch ($column)  
        {  
            case "description":  
                the_excerpt();  
                break;  
            case "link":  
                $custom = get_post_custom();  
                echo $custom["projLink"][0];  
                break;  
            case "type":  
                echo get_the_term_list($post->ID, 'project-type', '', ', ','');  
                break;  
        }  
}
*/

?>