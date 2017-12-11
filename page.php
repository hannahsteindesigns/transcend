<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 * Template Name: Full-Width
 */

get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="post" id="post-<?php the_ID(); ?>">
		<div class="title pattern center-x">
			<div class="global-width">
				<h2 class="t-grey"><?php the_title(); ?></h2>
			</div>
		</div>
		<div class="entry global-width">
			<?php if( have_rows("content") ): while( have_rows("content") ) : the_row(); ?>
			<div class="article">
				<h3 class="underline"><?php the_sub_field("section_title"); ?></h3>
				<?php the_sub_field("section_content"); ?>
			</div>
			<?php endwhile; else: the_content(); endif; ?>
		</div>
	</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
