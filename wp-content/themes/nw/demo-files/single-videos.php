<?php 
/**
 * single.php 
 * This is the page where the blog post will be displayed.
 * 
 * @package WordPress
 * @subpackage NWTheme
 * @since NW 1.0
 */ 
// var_dump(get_queried_object());
// die();
get_header(); 

// Getting post object
$queried_object = get_queried_object();
$next_post = get_next_post();
$prev_post = get_previous_post();

// To get the link back to videos archive
$archive_url = get_post_type_archive_link( $queried_object->post_type );
?>

<section class="page-container">
    <div class="container">
        <div class="row">
            <?php if(have_posts()): ?>
            <!-- Blog Entries Column -->
            <div class="col-md-12">
                
                <?php 
                    while(have_posts()) :
                        the_post();

                        // Get post ID for future purposes
                        $postID = get_the_ID();
                        // ACF - Video URL
                        $video_url = get_field('video_url');
                        // Get the video categories tagged in WP Admin to the specific post
                        $video_categories = get_the_terms($postID, 'video_categories');
                ?>

                <div class="row align-items-center justify-content-between">
                    <h1 class="col-6"><?php the_title(); ?></h1>
                    <div class="col-2 text-right">
                        <a href="<?php echo $archive_url; ?>">Back to Videos &raquo;</a>
                    </div>
                    <div class="col-12">
                        <p>
                            <?php 
                                foreach($video_categories as $video_category): 
                                // Get the specific link to the video category archive page
                                $category_link = get_term_link( $video_category->term_id, 'video_categories' )
                            ?>
                            <a href="<?php echo $category_link; ?>"><?php echo $video_category->name; ?></a>
                            <?php endforeach; ?>
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="video-container">
                            <iframe width="640" height="360" src="<?php echo $video_url; ?>" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <br>
                        <div class="content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>


                <div style="padding-top: 30px;">
                    <?php
                        if (!empty( $prev_post )): 
                    ?>
                        <a class="btn btn-primary float-left" href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">Previous:
                            <?php echo esc_attr( $prev_post->post_title ); ?>
                        </a>
                    <?php 
                        endif; 
                    ?>

                    <?php
                        if (!empty( $next_post )): 
                    ?>
                    <a class="btn btn-primary float-right" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">Next:
                        <?php echo esc_attr( $next_post->post_title ); ?>
                    </a>
                    <?php 
                        endif; 
                    ?>
                </div>
                
                <?php endwhile; ?>
            </div>
            
            <?php endif; ?>

        </div>
    </div>
</section>

<?php 
    get_footer(); 
?>