<?php
/**
 * Template Name: Home
 *
 * @package WordPress
 * @subpackage NWTheme
 * @since NW 1.0
 */
// get_header('home');


    if(have_posts()) :
        while(have_posts()) :
            the_post();
            // Content here if something has to be generated from the CMS

    $home_slider = get_field('home_slider');
?>
<section id="home-cont">
  <div class="container">
    <div class="row">
      <?php if( have_rows('home_slider') ): ?>
      <div class="home-slider">
        <?php while ( have_rows('home_slider') ) : the_row(); ?>
        <div class="slide" style="background: url(<?php the_sub_field('slider_image'); ?>) no-repeat center;"></div>
        <?php endwhile; ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <div class="container no-padding">
    <div class="row justify-content-between no-gutters article-links">
      <div class="col-md-auto">
        <a href="#">
          <div class="img-cont">
            <img src="<?php echo THEME_DIR; ?>/assets/dist/img/articles/1.jpeg" alt="">
          </div>
        </a>
      </div>
      <div class="col-md-auto">
        <a href="#">
          <div class="img-cont">
            <img src="<?php echo THEME_DIR; ?>/assets/dist/img/articles/2.png" alt="">
          </div>
        </a>
      </div>
      <div class="col-md-auto">
        <a href="#">
          <div class="img-cont">
            <img src="<?php echo THEME_DIR; ?>/assets/dist/img/articles/3.jpeg" alt="">
          </div>
        </a>
      </div>
    </div>
  </div>
  <div class="container no-padding">
    <div class="row no-gutters">
      <div class="col">
        <img class="full-width" src="<?php echo THEME_DIR; ?>/assets/dist/img/megan.jpeg" alt="">
      </div>
    </div>
  </div>
  <section class="clothes-cont">
    <div class="container no-padding">
      <div class="clothes-title">
        <h1>GET THE LOOK</h1>
      </div>
      <?php if( have_rows('look_slider') ): ?>
      <div class="clothes-slider">
        <?php while ( have_rows('look_slider') ) : the_row(); ?>
        <div class="box" style="background: url(<?php the_sub_field('look_image'); ?>) no-repeat center;"></div>
        <?php endwhile; ?>
      </div>
      <?php endif; ?>
    </div>
  </section>
  <section class="clothes-cont">
    <div class="container no-padding">
      <div class="clothes-title">
        <h1>LATEST VIDEOS</h1>
        <?php 
          $latest_videos = new WP_Query( array(
            'post_type' => 'videos',
            'posts_per_archive_page' => 3
          ) );


          if($latest_videos->have_posts()) :
        ?>

        <div class="row">
          <?php
            while($latest_videos->have_posts()) :
              $latest_videos->the_post();

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
                  <h5 class="card-title" style="margin-bottom: 0">
                    <?php the_title(); ?>
                  </h5>
                  <p>
                    <?php 
                      foreach($video_categories as $video_category): 
                      // Get the specific link to the video category archive page
                      $category_link = get_term_link( $video_category->term_id, 'video_categories' )
                      ?>
                    <a href="<?php echo $category_link; ?>">
                      <?php echo $video_category->name; ?>
                    </a>
                    <?php 
                      endforeach; 
                    ?>
                  </p>
                  <p class="card-text">
                    <?php the_excerpt(); ?>
                  </p>
                  <a href="<?php the_permalink(); ?>" class="btn btn-primary">View Video Page</a>
                </div>
              </div>
            </div>

            <?php
              endwhile;
            ?>
        </div>
        <?php 
          endif; 
        ?>
      </div>

    </div>
  </section>
</section>


<?php
        endwhile;
    endif;
    get_footer();
?>
