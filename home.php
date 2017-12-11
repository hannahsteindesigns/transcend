<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 * Template Name: Blog
 */

get_header(); ?>

<div class="title pattern center-x">
    <div class="global-width">
        <h2 class="t-grey">Latest Posts</h2>
    </div>
</div>

<?php $args = array(
	'post_type'         => 'post',
	'nopaging'          => false,
	'posts_per_page'    => '5',
);

$query = new WP_Query( $args ); ?>
<div class="blog global-width entry">
    <div>
    <? if ( $query->have_posts() ): ?>    
        <section class="posts left">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <article class="post" id="post-<?php the_ID(); ?>">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <span class="small"><?php the_date('l, F j, Y'); ?></span>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>">read more <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </article>
            <? endwhile; else: ?>
        </section>
    <? endif; wp_reset_postdata(); ?>
    </div>
    <section class="sidebar left bg-light-grey shadow">
        <h4>Categories</h4>
        <div class="tags">
            <?php $args = array(
                "smallest"  => 16,
                "largest"   => 16,
                "unit"      => "px",
                "number"    => 30
            ); wp_tag_cloud($args); ?>
        </div>
    </section>
</div>
<?php get_footer(); ?>
