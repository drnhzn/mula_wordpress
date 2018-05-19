<?php 
/**
 * The template for footer part of the site's theme.
 *
 * @package WordPress
 * @subpackage NWTheme
 * @since NW 1.0
 */ 
 ?>


 <footer>
    <div class="container">
      <div class="row justify-content-between">
          <div class="col-2">
            <div class="logo">
              <a href="#">
                <img src="<?php echo THEME_DIR; ?>/assets/dist/img/ft_logo.png" alt="">
              </a>
            </div>
          </div>
          <div class="col-10">
            <nav class="footer-nav">
              <ul>
                <li><a href="#" class="active">Home</a></li>
                <li><a href="#">Beauty</a></li>
                <li><a href="#">Fashion</a></li>
                <li><a href="#">Food</a></li>
                <li><a href="#">Technology</a></li>
                <li><a href="#">Videos</a></li>
                <li><a href="#">Archives</a></li>
                <li><a href="#">About us</a></li>
              </ul>
            </nav>
          </div>
        </div>
    </div>
  </footer>

  <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
  <script>

  </script>

  <?php 
    wp_footer(); 
  ?>
</body>
