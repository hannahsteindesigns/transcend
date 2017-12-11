<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?> <?php bloginfo('description'); ?></title>
<link rel="Shortcut Icon" href="<?php bloginfo('stylesheet_directory'); ?>/style/images/favicon.png" />
<!-- Call stylesheets -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style/css/print.css" type="text/css" media="print" />
<link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,700|Open+Sans:300,600" rel="stylesheet">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/style/scripts/backstretch.min.js"></script>

<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">

<?php if (is_front_page()) { ?>
	<meta name="google-site-verification" content="VlkA_uDc6FTmXjDjIeh6lVoLfN_0doXxmSa7SEyFQek" />
<?php } ?>
<!-- DO NOT DELETE! The wp_head tag must remain for many plugins to work properly. -->
<?php wp_head(); ?>

</head>
<?php if (is_front_page()): ?>
	<body class="home push">
<?php else: ?>
	<body class="push">
<?php endif; ?>
<header class="header">
	<div class="navbar bg-teal-transparent shadow">
		<div class="global-width">
		<a href="<?php echo get_home_url(); ?>" class="logo left"><img src="<?php bloginfo('stylesheet_directory'); ?>/style/images/logo.png" width="250" height="70"/></a>
	    <a class="mobile-nav right" title="toggle menu"><span></span></a>
		<div class="nav-wrap right">
			<div class="clear"></div>
		    <nav class="nav">
		    	<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
		    </nav>
	    </div>
		</div>
	</div>
	<?php if (is_front_page()): ?>
		<article class="global-width center-x">
			<!-- start hero -->
			<h1 class="t-white text-shadow"><?php the_field("main_text"); ?></h1>
			<a class="btn bg-teal t-white shadow" href="<?php the_field('main_link'); ?>" target="_blank" title="<?php the_field('link_text'); ?>"><?php the_field("link_text"); ?></a>
			<!-- end hero -->
		</article>
		<div class="hero pattern">
			<?php
				if ( get_field("header_background") === "slideshow" ) {
				$images = get_field("slideshow_bg");
				if ($images) { ?>
				<div id="slideshow-bg">
				<?php
					foreach ($images as $image) {
						$slideshow .= '"' . $image["url"] . '",';
					}
					$slideshow = rtrim($slideshow, ",");
				?>
				</div>
				<script type="text/javascript">
					$("#slideshow-bg").backstretch([<?php echo $slideshow; ?>], {duration: 4000,fade: 500,fadeFirstImage:true});
				</script>
				<? }} else {
					$image = get_field("image_bg");
				?>
					<div id="image-bg"></div>
					<script type="text/javascript">
						$("#image-bg").backstretch("<?php echo $image ?>");
					</script>
				<?php } ?>
		</div>
	<?php endif; ?>
</header>
