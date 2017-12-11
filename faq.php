<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 * Template Name: FAQ
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
            <?php if( have_rows("faq") ): while( have_rows("faq") ) : the_row(); ?>
                <div class="faq">
                    <h3 class="underline"><?php the_sub_field("question"); ?></h3>
                    <?php the_sub_field("answer"); ?>
                </div>
            <?php endwhile; endif; ?>
		</div>
	</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
