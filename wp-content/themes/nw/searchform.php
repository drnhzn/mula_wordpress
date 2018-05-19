<?php
/**
 * The default search form for wordpress themes.
 *
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package WordPress
 * @subpackage NWTheme
 * @since 1.0
 * @version 1.0
 */

 $search_query = get_query_var('s') ? get_query_var('s') : '';
 
 ?>

<form action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="input-group">
        <input type="text" class="form-control" value="<?php echo $search_query; ?>" placeholder="Search for..." name="s" id="s">
        <span class="input-group-btn">
        <button class="btn btn-secondary" type="submit">Go!</button>
        </span>
    </div>
</form>