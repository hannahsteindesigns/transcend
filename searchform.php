<?php
/**
 * The template for displaying the search form.
 *
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
        <input type="search" class="search-field bg-light-grey t-grey"
            placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    </label>
    <button type="submit" class="search-submit"><span class="fa fa-search"></span></button>
</form>