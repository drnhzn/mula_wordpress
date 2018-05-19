<?php
// Custom Pagination function to replace paginate_links();
function nw_page_navi_alternate($pages = '', $range = 1)
{  
     // $showitems = ($range * 2)+1;  
     $showitems = ($range * 2); 

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li class=\"page-item\"><a href='".get_pagenum_link(1)."' class=\"page-link\">&laquo;</a></li>";
         if($paged > 1 && $showitems < $pages) echo "<li class=\"page-item\"><a href='".get_pagenum_link($paged - 1)."' class=\"page-link\">&lsaquo;</a></li>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<li class=\"page-item disabled\"><span class='page-link'>".$i."</span></li>":"<li class=\"page-item\"><a href='".get_pagenum_link($i)."' class='page-link' >".$i."</a></li>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<li class=\"page-item\"><a href='".get_pagenum_link($paged + 1)."' class=\"page-link\">&rsaquo;</a></li>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li class=\"page-item\"><a href='".get_pagenum_link($pages)."' class=\"page-link\">&raquo;</a></li>";
     }
}




// <li class="page-item disabled">
// <a class="page-link" href="#" tabindex="-1">Previous</a>
// </li>
// <li class="page-item"><a class="page-link" href="#">1</a></li>
// <li class="page-item"><a class="page-link" href="#">2</a></li>
// <li class="page-item"><a class="page-link" href="#">3</a></li>
// <li class="page-item">
// <a class="page-link" href="#">Next</a>
// </li>


// Numeric Page Navi (built into the theme by default)
function nw_page_navi() {
    global $wp_query;
    $bignum = 999999999;
    if ( $wp_query->max_num_pages <= 1 )
    return;
    
    echo '<nav class="pagination">';
    
        echo paginate_links( array(
            'base'          => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
            'format'        => '',
            'current'       => max(1, get_query_var('paged') ),
            'total'         => $wp_query->max_num_pages,
            'prev_text'     => '&larr;',
            'next_text'     => '&rarr;',
            'type'          => 'list',
            'end_size'      => 3,
            'mid_size'      => 3
        ) );
    
    echo '</nav>';
} /* end page navi */

