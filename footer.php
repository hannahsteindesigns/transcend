<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>

<div class="clear"></div>
<!-- start footer -->
<footer class="footer bg-teal t-white">
    <div class="global-width center-x">
        <!-- start contact info -->
        <a href="tel:2052008237">205-200-8237</a>
        <span>&#124;</span>
        <a href="mailto:robyn@transcendcounseling.org">robyn@transcendcounseling.org</a>
        <span>&#124;</span>
        <a>312 Hargrove Road East, Tuscaloosa, AL 35401</a>
        <!-- end contact info -->
        <p class="copyright small">&copy; <?php echo date('Y'); ?> Transcend Individual &amp; Family Counseling</p>
    </div>
</footer>
<!-- end footer -->

<!-- scripts -->
<script src="https://use.fontawesome.com/ac4a5641e6.js"></script>
<script>
//test for touch events support and if not supported, attach .no-touch class to the HTML tag
if (!("ontouchstart" in document.documentElement)) {
    document.documentElement.className += " no-touch";
}
</script>
<script>
$(document).ready(function(){
    $('.mobile-nav').on('click', function(){
        $(this).toggleClass('active');
        $('.nav-wrap').toggleClass('open');
        $('body').toggleClass('open');
    });
});
</script>
<?php if ( is_user_logged_in() ): ?>
  <script>
    $('body').addClass('logged-in');
  </script>
<?php else: ?>
  <script>
      $('body').addClass('not-logged-in');
  </script>
<?php endif;?>
<!-- The wp_footer tag must remain for some plugins to work properly -->
    <?php wp_footer(); ?>
</body>
</html>
