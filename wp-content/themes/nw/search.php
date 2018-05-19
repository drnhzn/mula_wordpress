<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage NWTheme
 * @since 1.0
 * @version 1.0
 */

 $search_query = $wp_query->query_vars['s'];

//  var_dump($wp_query); die();

get_header(); ?>
<section class="page-container">
  <div class="container">
    <div class="row">
      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Showing search results for "<?php echo $search_query; ?>"</h5>
          <div class="card-body">
            <?php  get_search_form( true ); ?>
          </div>
        </div>

        <?php 
        
            if(have_posts()) :

              while(have_posts()) : 
                  the_post();

                  get_template_part('layout/post'); 
              endwhile;
            
            else :

        ?> 

          <h3>Your search for "<?php echo $search_query; ?>" returned 0 results.</h3>

        <?php 
          endif;
        ?>

        <!-- Pagination -->
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-end">
            <?php nw_page_navi_alternate(); ?>
          </ul>
        </nav>

      </div>

    </div>
  </div>
</section>

<?php get_footer();
