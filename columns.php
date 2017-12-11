<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 * Template Name: Two Column Page
 */

get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="post" id="post-<?php the_ID(); ?>">
		<div class="title pattern center-x">
			<div class="global-width">
				<h2 class="t-grey"><?php the_title(); ?></h2>
			</div>
		</div>
		<div class="entry global-width contact">
			<h4 class="center-x"><?php the_field("intro"); ?></h4>
			<div class="column-wrap">
            	<div class="left column-left">
                	<?php the_field("left_column"); ?>
            	</div>
            	<div class="left column-right">
                	<?php the_field("right_column"); ?>
            	</div>
			</div>
		</div>
	</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
