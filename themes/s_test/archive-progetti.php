<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>



<?php
$args=array(
  'post_type' => 'progetti',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'caller_get_posts'=> 1
);

 $the_query = new WP_Query( $args ); //Check the WP_Query docs to see how you can limit which posts to display ?>
<?php if ( $the_query->have_posts() ) : ?>
    <div id="isotope-list">
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
	$termsArray = get_the_terms( $post->ID, "category" );  //Get the terms for this particular item
	//echo var_dump($termsArray)."<h2>ecco</h2>";
	$termsString = ""; //initialize the string that will contain the terms
		if( count ($termsArray)>0){
			//foreach ( $termsArray as $term ) { // for each term 
			//	$termsString .= $term->slug.' '; //create a string that has all the slugs 
			//}
		}
	?> 
	<div class="<?php echo $termsString; ?> isotope-item item progetto"> <?php // 'item' is used as an identifier (see Setp 5, line 6) ?>
	<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
	
	<svg width="100%" height="100%" class="frameProgettiThumb">
		<line class="top_pt" x1="0" y1="0" x2="900" y2="0"></line>
		<line class="left_pt" x1="0" y1="210" x2="0" y2="-420"></line>
		<line class="bottom_pt" x1="0" y1="210" x2="900" y2="210" ></line>
		<line class="right_pt" x1="300" y1="210" x2="300" y2="-420"></line>
		
	</svg>
		<h3><?php the_title(); ?></h3>
	        <?php if ( has_post_thumbnail() ) { 
                      the_post_thumbnail('original-portfolio');
                } ?>
	</a>
	</div> <!-- end item -->
	
    <?php endwhile;  ?>
    </div> <!-- end isotope-list -->
<?php endif; ?>
