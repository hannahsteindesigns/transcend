<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="blog entry post global-width" id="post-<?php the_ID(); ?>">                    
	<h2 class="underline"><?php the_title(); ?></h2>
	<span class="small"><?php the_date('l, F j, Y'); ?></span>
	<div class="entry">
		<div class="content">
			<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
		</div>
		<div class="tags-list left">
			<?php the_tags("<span class='bold'>Categories:</span> ", ", "); ?>
		</div>
		<div class="post-nav right">
			 <?php previous_post_link("<i class='fa fa-chevron-left t-grey' aria-hidden='true'></i> %link"); next_post_link("%link <i class='fa fa-chevron-right t-grey' aria-hidden='true'></i>"); ?>
		</div>
	</div>
</div>

<?php endwhile; else: ?>
	<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

<?php get_footer(); ?>
