<?php
//Template Name: News
get_header();
$args = array(  
    "post_type" => "news",
    "posts_per_page" => 2, 
    "orderby" => "title", 
    "order" => "ASC", 
    "paged" => get_query_var("paged") ? get_query_var("paged") : 1)
 ?>
<div class="jumbotron jumbotron-fluid align-items-center">
  <div class="container-fluid ">
    <h1 id = "h1title" class="text-center text-light">Test Blog</h1>
    <p id = "subtitle" class="lead text-center text-light">News on Modern Video Streaming</p>
  </div>
</div>
<?php $i = 1;
$j = 1;
?>
<?php

$loop = new WP_Query( $args ); 
    
while ( $loop->have_posts() ) : $loop->the_post(); ?>

<div class="container mt-5 pt-5">
<div class="row">
    <div class="col-sm">
  <h3 id="h3title"><?php the_title(); ?></h3>
  <div class="d-flex"><?php  echo get_avatar( get_the_author_email(), "32" ); ?><p id="author" class="ml-2"><?php the_author(); ?></p></div>
<p id="article" class="text-left"><?php the_excerpt(); ?></p><a id = "readmore" class ="text-body font-weight-bold" href="<?php the_permalink(); ?>">Read More</a></div> <div class="col-sm images"><?php echo get_the_post_thumbnail( $post_id, "thumbnail", array("class" => "img-fluid image" ) );?></div>
<div class="col-sm mt-0">
<?php

if ( is_active_sidebar( "sidebar" ) && $i == 1) : ?>
<div id="widget-area" class="widget-area">
<?php dynamic_sidebar( "sidebar" ); ?>
</div>

<?php endif; ?>
</div>
<div class="container">
<div class="row">
    <div class="col-sm empty">
      </div>
      </div>
      </div>


   <?php 
   if($i == 1) { 
    $i++;
  }
  
endwhile;
   
   




  


get_footer();?>
<div class="container"><div class="row"><div class="col">
<?php $big = 999999999; // we need an unlikely integer
 echo paginate_links( array(
    "base" => str_replace( $big, "%#%", get_pagenum_link( $big ) ),
    "format" => "?paged=%#%",
    "current" => max( 1, get_query_var("paged") ),
    "total" => $loop->max_num_pages,
    "id" => "paginate",
    "prev_text" => "PREVIOUS",
    "next_text" => "NEXT",
    "type"=>"list"
    
) );?>
</div>
</div>
</div>
<?php wp_reset_postdata(); 
?>
