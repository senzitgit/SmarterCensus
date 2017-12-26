<?php 
/*
Template Name: All Page
*/ 
?>
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php the_content(__('(more...)')); ?>
 <?php endwhile; else: ?>
<?php _e('Sorry, no posts matched your criteria.'); ?><?php endif; ?>



<?php get_footer(); ?>
