<!-- Sidebar Widgets Column -->
<div class="col-md-4">

    <?php 
        if ( is_active_sidebar( 'sidebar-posts' ) ) : 
            dynamic_sidebar( 'sidebar-posts' );
        endif; 
    ?>

</div>