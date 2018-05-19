<?php
/**
 * The video archive template file
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

                <div class="col-md-12">


                    <div class="row align-items-center justify-content-between">
                        <h1 class="col-8">Video Category - <?php echo $wp_query->get_queried_object()->name; ?>
                        </h1>

                        <form action="" class="col-3">
                            <select class="form-control" onchange="location.assign(window.location.href.split('?')[0] + this.value)">
                                <option value="">Sort by...</option>
                                <option value="?order=ASC">Date Ascending</option>
                                <option value="?order=DESC">Date Descending</option>
                                <option value="?orderby=title&order=ASC">Title Ascending</option>
                                <option value="?orderby=title&order=DESC">Title Descending</option>
                            </select>
                        </form>
                    </div>
                
                    <?php
                        if(have_posts()) :
                    ?>

                    <div class="row">
                        <?php 
                            while(have_posts()) :
                                the_post();

                                $video_url = get_field('video_url');
                                // Get post ID for future purposes
                                $postID = get_the_ID();
                                // ACF - Video URL
                                $video_url = get_field('video_url');
                                // Get the video categories tagged in WP Admin to the specific post
                                $video_categories = get_the_terms($postID, 'video_categories');
                        ?>
                        <div class="col-4">
                            <div class="card">
                                <?php if($video_url) : ?>
                                <div class="video-container">
                                    <iframe width="640" height="360" src="<?php echo $video_url; ?>" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title" style="margin-bottom: 0"><?php the_title(); ?></h5>
                                    <p>
                                        <?php 
                                            foreach($video_categories as $video_category): 
                                            // Get the specific link to the video category archive page
                                            $category_link = get_term_link( $video_category->term_id, 'video_categories' )
                                        ?>
                                        <a href="<?php echo $category_link; ?>"><?php echo $video_category->name; ?></a>
                                        <?php endforeach; ?>
                                    </p>
                                    <p class="card-text"><?php the_excerpt(); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">View Video Page</a>
                                </div>
                            </div>
                        </div>
                        <?php 
                            endwhile;
                        ?>
                    </div>
                    

                    <br>

                    <!-- Pagination -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            <?php nw_page_navi_alternate(); ?>
                        </ul>
                    </nav>
                    
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_footer();


// <!-- Blog Post -->