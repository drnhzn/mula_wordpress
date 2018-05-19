<?php 
/**
 * @package WordPress
 * @subpackage NWTheme
 * @since NWTheme 1.0
 */ 
get_header();
    if(have_posts()) :
        while(have_posts()) :
            the_post();
?>
    <section  class="page-container">
        <div class="container">
            <div class="page-desc">
            <div class="page-title">
                <h1><?php the_title(); ?></h1>
            </div>
            <div class="page-para">
                <?php the_content(); ?>
            </div>
            </div>
        </div>
    </section>
<?php
        endwhile;
    endif;
    get_footer();
?>