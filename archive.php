<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

<div id="main">
			<?php if (have_posts()) : ?>

			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			<?php /* If this is a category archive */ if (is_category('advantage')) { ?>
				<h2 class="pagetitle advantage"><?php single_cat_title(); ?></h2>
			<?php /* If this is a category archive */ } elseif (is_category('farmstead')) { ?>
				<h2 class="pagetitle farmstead"><?php single_cat_title(); ?></h2>
			<?php /* If this is a category archive */ } elseif (is_category('features')) { ?>
				<h2 class="pagetitle features"><?php single_cat_title(); ?></h2>
			<?php /* If this is a category archive */ } elseif (is_category('first-gear')) { ?>
					<h2 class="pagetitle first-gear"><?php single_cat_title(); ?></h2>
			<?php /* If this is a category archive */ } elseif (is_category()) { ?>
						<h2 class="pagetitle"><?php single_cat_title(); ?></h2>
			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h2 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>
			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h2 class="pagetitle">Author Archive</h2>
			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h2 class="pagetitle">Blog Archives</h2>
			<?php } ?>

		<?php while (have_posts()) : the_post(); ?>
		<div id="post-box" <?php post_class() ?>>
					<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<div class="entry">
					<?php the_excerpt(); ?>
					<p class="more"><a href="<?php the_permalink() ?>" rel="bookmark" >read more</a></p>
				</div>
			</div>
		</div>
		<?php endwhile; ?>

	<?php else :

		if ( is_category() ) { // If this is a category archive
			printf("<h2 class='center'>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
		} else {
			echo("<h2 class='center'>No posts found.</h2>");
		}
		get_search_form();

	endif;
?>

</div>


<?php get_footer(); ?>
