<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<?php if (have_posts()) : ?>
    <div class="global-width search-results">
		<h2 class="t-green">Search Results</h2>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('<span class="fa fa-arrow-left"></span>&nbsp;&nbsp;Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries&nbsp;&nbsp;<span class="fa fa-arrow-right"></span>') ?></div>
		</div>
       <div class="clear"></div>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post">
				<h5 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
				    <?php the_excerpt(); ?>
				    <a class="more" href="<?php the_permalink(); ?>" rel="bookmark">View details</a>
				    <small><?php the_time('l, F jS, Y') ?></small>
			</div>

		<?php endwhile; ?>
        <div class="clear"></div>
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('<span class="fa fa-arrow-left"></span>&nbsp;&nbsp;Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries&nbsp;&nbsp;<span class="fa fa-arrow-right"></span>') ?></div>
		</div>

	<?php else : ?>
        <div class="global-width search-results">
			<h4 class="t-green center-x">Nothing found. Try a different search?</h4>
			<div class="search center-x">
			    <?php get_search_form(); ?>
			</div>
		</div>
	<?php endif; ?>
    </div>
<?php get_footer(); ?>
