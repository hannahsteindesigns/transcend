<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

    <?php if (have_posts()) : ?>
    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
    <?php if( is_tag() ) { ?>
        <div class="title pattern center-x">
            <div class="global-width">
                <h2 class="pagetitle t-grey">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
            </div>
        </div>
    <?php } ?>
    <div class="blog global-width entry">
        <?php while (have_posts()) : the_post(); ?>
        <article id="post-box" <?php post_class("post") ?>>
            <h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
            <span class="small"><?php the_date('l, F j, Y'); ?></span>
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>">read more <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
        </article>
        <?php endwhile; ?> 
        </div>    
    <?php endif; ?>

<?php get_footer(); ?>
