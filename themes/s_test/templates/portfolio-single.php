<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
   <!--
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
   --> 
    <div class="entry-content">
      <?php the_content(); ?>
     
    <!--
     <?php  echo "<h2>".basename( get_page_template() )."</h2>"; 
  $featuredImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
  echo "string".$featuredImage;
     ?>

     <h1><?php 
echo '<pre>';
var_dump(get_field('provatesto'));
echo '</pre>';
   ?></h1>
-->

    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>