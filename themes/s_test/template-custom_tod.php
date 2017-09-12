<?php
/**
 * Template Name: Custom Template Tod
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
  <h2> Custom Template Tod Test </h2>
<?php endwhile; ?>
<?php get_template_part('templates/test', 'partial'); ?>

