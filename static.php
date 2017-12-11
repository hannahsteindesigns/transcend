<?php
/**
* @package WordPress
* @subpackage Default_Theme
*
* Template Name: Home
*/

get_header();
?>

<section class="body-wrap home">
	<!-- start content -->
	<article class="content bg-white global-width">
		<section class="left column-left">
			<?php the_field("left_column"); ?>
		</section>
		<section class="left column-right">
			<?php the_field("right_column"); ?>
		</section>
	</article>
	<!-- <article class="magnets global-width center-x">
		<?php if( have_rows("magnets") ): while( have_rows("magnets") ) : the_row();
			$title = get_sub_field("magnet_title");
			$text = get_sub_field("magnet_text");
			$link = get_sub_field("magnet_link");
		?>
			<div class="magnet t-grey">
				<h4 class="bold underline"><?php echo $title ?></h4>
				<?php echo $text ?>
				<a href="<?php echo $link ?>">more <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
			</div>
		<?php endwhile; endif; ?>
	</article> -->
	<article class="center-x bg-light-grey featured-posts">
		<div class="global-width">
			<?php echo featuredposts(); ?>
			<a href="/blog" class="btn bg-dark-grey t-white shadow">browse all posts</a>
		</div>
	</article>
	<!-- end content -->
</section>
<?php get_footer(); ?>
