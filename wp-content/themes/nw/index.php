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



get_header(); ?>
 <section class="page-container">
  <div class="container">
    <div class="row">
    <?php if(have_posts()) :?>
      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">The Blog</h1>
        
        <?php 
            while(have_posts()) : 
                the_post();

                get_template_part('layout/post'); 
            endwhile;
            
          endif;
        ?> 

        <!-- Pagination -->
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-end">
            <?php nw_page_navi_alternate(); ?>
          </ul>
        </nav>

      </div>

      <!-- Sidebar Widgets Column -->
      <?php get_sidebar(); ?>
    </div>
  </div>
</section>

  <?php get_footer();


// <!-- Blog Post -->