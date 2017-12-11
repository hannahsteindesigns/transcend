<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 * Template Name: Sidebar Page
 */

get_header(); ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="post global-width" id="post-<?php the_ID(); ?>">
    <h2 class="t-green"><?php the_title(); ?></h2>
      <div class="entry sidebar-entry left">
        <?php the_content(); 
        if ( has_post_thumbnail() ) { the_post_thumbnail('featured-image'); } ?>
      </div>
      <div class="sidebar right">
        <?php get_sidebar(); ?>
      </div>
    </div>
    <?php endwhile; endif; ?>

<?php get_footer(); ?>
