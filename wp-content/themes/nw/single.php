<?php 
/**
 * single.php 
 * This is the page where the blog post will be displayed.
 * 
 * @package WordPress
 * @subpackage NWTheme
 * @since NW 1.0
 */ 
get_header(); 
$next_post = get_next_post();
$prev_post = get_previous_post();

?>

<section class="page-container">
  <div class="container">
    <div class="row">
    <?php if(have_posts()) :?>
      <!-- Blog Entries Column -->
      <div class="col-md-8">

        
        <?php 
            while(have_posts()) : 
                the_post();

                get_template_part('layout/post'); 
            endwhile; 
        ?>

      <div>

        <?php
          if (!empty( $prev_post )): 
        ?>
          <a class="btn btn-primary float-left" href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">Previous: <?php echo esc_attr( $prev_post->post_title ); ?></a>
        <?php 
          endif; 
        ?>

        <?php
          if (!empty( $next_post )): 
        ?>
          <a class="btn btn-primary float-right" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">Next: <?php echo esc_attr( $next_post->post_title ); ?></a>
        <?php 
          endif; 
        ?>
      </div>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Web Design</a>
                  </li>
                  <li>
                    <a href="#">HTML</a>
                  </li>
                  <li>
                    <a href="#">Freebies</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">JavaScript</a>
                  </li>
                  <li>
                    <a href="#">CSS</a>
                  </li>
                  <li>
                    <a href="#">Tutorials</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>
    <?php endif; ?>
    </div>
  </div>
</section>
<?php 
    get_footer(); 
?>