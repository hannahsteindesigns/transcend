<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

$content_width = 450;

automatic_feed_links();

/* HTML5 */
$args = array(
  'search-form',
  'comment-form',
  'comment-list',
  'gallery',
  'caption'
);
add_theme_support( 'html5', $args );

/* Image Sizing */
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 100, 100, true );

function make_thumbnail_name( $name ) {
  $name = strtolower($name);
    $name = str_replace(" ", "_", $name);
    preg_match("/(.*)\.(.*)/", $name, $matches);
    $stem = $matches[1];
    $extension = $matches[2];
  
  return $stem . "_th" . "." . $extension;
}


/* Menus */
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Menu' ),
      'footer-menu' => __( 'Footer Menu' ),
      'sidebar-menu' => __( 'Sidebar Menu' )
      )
    );
}
add_action( 'init', 'register_my_menus' );


/* TinyMCE Stuff */
// add custom colors 
function change_mce_options($init) {
  $default_colors = ' "000000", "Black",
                      "FFFFFF", "White",
                      "4D4D4D", "Grey",
                      "58CDCA", "Teal",
                      "369F9C", "Dark Teal"';
  $init['textcolor_map'] = '['.$default_colors.']';
  return $init;
}
add_filter('tiny_mce_before_init', 'change_mce_options');

/* Featured Blog Posts */
function featuredposts() {
  // the query
  $the_query = new WP_Query( array( 'category_name' => 'featured', 'posts_per_page' => 2 ) ); 
  // the loop
  if ( $the_query->have_posts() ) {
	  while ( $the_query->have_posts() ) {
		  $the_query->the_post();
          $date_format = 'l, F j, Y';
          $post_number = $the_query->current_post +1;
			    $string .= '<article class="featured-post post-' . $post_number . ' bg-white center-x shadow">
                        <section class="featured-title">
                          <h3><a href="' . get_the_permalink() .'" rel="bookmark" class="serif">' . get_the_title() .'</a></h3>
                          <span class="small">' . get_the_date($date_format) . '</span>                     
                        </section>
                        <section class="featured-content"><span>' . get_the_excerpt() . '</span> <a href="' . get_the_permalink() .'" rel="bookmark" class="more-link">read post <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                        </section>
                      </article>';
		}
  } else {
	  // no posts found
  }
  return $string;
  wp_reset_postdata();
}

/* Custom Login Stuff */
function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/style/images/login-logo.png) !important; width:310px !important; height: 175px !important; background-size: 232px !important;}
    </style>';
}
add_action('login_head', 'my_custom_login_logo');

// Change where the logo on the login page links to
function custom_login_headerurl($url) {
  return get_home_url() . '/';
}
add_filter('login_headerurl', 'custom_login_headerurl');

// customize admin footer text
function custom_admin_footer() {
    echo '';
}
add_filter('admin_footer_text', 'custom_admin_footer');

function my_custom_logo() {
echo '<style type="text/css">#header-logo { background-image:url('.get_bloginfo('template_directory').'/style/images/admin-logo.pnggif)!important; }</style>';
}
//hook the administrative header output
add_action('admin_head', 'my_custom_logo');

/* admin header fix styling issues */
add_action('get_header', 'my_filter_head');

function my_filter_head() {
  remove_action('wp_head', '_admin_bar_bump_cb');
}