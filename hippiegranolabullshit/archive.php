<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); 

$pod_cat = get_term_by('name', 'podcast', 'category');// vars
$p_image = get_field('ban_image', 'category_' .$pod_cat->term_id );

// get the current taxonomy term
$blog_cat = get_term_by('name', 'blog', 'category');// vars
$image = get_field('ban_image', 'category_' .$blog_cat->term_id );

$category_detail = get_the_category( get_the_ID());

$cat_quer = get_queried_object();
$taxname = $cat_quer->taxonomy;
 
if($category_detail[0]->parent == 65 || $category_detail[0]->term_id == 65 ){
?>
<div class="inner-ban2">
    <img src="<?= esc_url($p_image['url']); ?>" alt="">
    <div class="ban-tx">
        <div class="container">
            <div class="row">
                <?php 
                $group_c = get_field('section1', 'category_' .$pod_cat->term_id); 
                if( $group_c ): ?>
                <div class="offset-lg-2 col-lg-8 text-center">    
                    <h2><?php echo $group_c['header']; ?></h2>
                    <p><?php echo $group_c['content']; ?></p>
                   <a href="<?php the_permalink(); ?>"><span><i class="fa fa-play" aria-hidden="true"></i> Play Latest Episode</span></a>
                </div>
            <?php endif; ?>
            </div>
        </div>   
    </div>
</div>
<section class="podcast-page2">
    <div class="container">
          <div class="loader_svj" style="display:none;">
              <img src="<?= get_template_directory_uri();?>/assets/images/loader.svg">
          </div>
        <div class="row">
            <div class="col-lg-12">
              <h2>Subcategory Or Tag Posts </h2>
            </div>
            <?php 
            $get_term = get_queried_object();

            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                $args = array(        
                                'posts_per_page' => 2,
                                'post_status'=>'publish',
                                'orderby' => 'date',
                                'order'=> 'DESC',
                                'tax_query' => array(
                                     'relation' => 'OR',
                                       array(
                                          'taxonomy' => 'category',
                                          'field' => 'term_id',
                                          'terms' => $get_term->term_id
                                       ),
                                       array(
                                            'taxonomy' => 'post_tag',
                                            'field'    => 'term_id',
                                            'terms'    => $get_term->term_id
                                        ),
                                  ),
                              'post_type' => 'post',
                              'paged' => $paged
                            );
                 $query_sub = new WP_Query($args);

               if ($query_sub->have_posts()) : while ($query_sub->have_posts()) : $query_sub->the_post();
            ?>
            <div class="col-lg-6">
                <div class="sec">
                    <div class="wrap">
                   <?php if(has_post_thumbnail()){ 
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );  ?>
                        <img src="<?php echo $image[0]; ?>" alt="">
                    <?php  } ?>
                         <div class="date">
                          <?php echo get_the_date("d"); ?> <span><?php echo get_the_date("M Y");?></span>
                        </div>
                    </div>
                    <div class="decp">
                        <h3><?php the_title(); ?></h3>
                    <!--     <h5><?php the_author(); ?></h5> -->
                        <p><?php echo substr(strip_tags(get_the_content()),0,100); ?></p>
                        <a href="<?php the_permalink(); ?>" class="more">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
      
            <?php
                endwhile;
            ?>

              <?php 

                    $total_pages =  $query_sub->max_num_pages;
                    $big = 999999999; // need an unlikely integer
                    $pages = paginate_links( array(
                            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                            'format' => '/page/%#%',
                            'current' => max( 1, get_query_var('paged') ),
                            'total' =>  $total_pages,
                            'type'  => 'array',
                            'prev_text'    => __('<i class="fa fa-long-arrow-left" aria-hidden="true"></i>'),
                            'next_text'    => __('<i class="fa fa-long-arrow-right" aria-hidden="true"></i>'),
                        ) );
                        if( is_array( $pages ) ) {
                  
                            echo '<div class="col-lg-12 text-center"><ul class="page-nav" id="pod-nav-sub">';
                            foreach ( $pages as $page ) {
                                    echo "<li>$page</li>";
                            }
                           echo '</ul></div>';
                            }
                            
                ?>

              
         <!--     <div class="col-lg-12 text-center">
                <ul class="page-nav" id="pod-nav-sub">
                    <?php $total_pages =  $query_sub->max_num_pages;

                    if($total_pages > 1) {
                      echo ' <li><a href="'.get_pagenum_link(1).'"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></li>';
                      for ($i=1; $i <= $total_pages; $i++){
                        
                              echo '<li><a href="'.get_pagenum_link($i).'"
                              data-term ="'.$get_term->term_id.'">'.$i.'</a></li>';
                       
                           }
                           echo ' <li><a href="'.get_pagenum_link($total_pages).'"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>';
                       }
                     ?>
                    <li><a href="#"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li> 
                 </ul>
            </div> -->
                   
             
            <?php endif; 
         wp_reset_query(); ?>  
        </div>
    </div>
</section>
<?php }
else if($category_detail[0]->term_id == 64) {?>
 <div class="inner-ban">
    <img src="<?= esc_url($image['url']); ?>" alt="">
    <div class="ban-tx">
        <h2><?php wp_title(''); ?></h2>
        <ul>
            <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i></li>
            <li><?php wp_title(''); ?></li>
        </ul>
    </div>
</div>
<section class="body-cont2">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h2>Latest post for <?php echo $taxname; ?></h2> 
                <div class="row">
                <?php
                      // $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;  
                      //   $args = array(
                      //           'category_name'  => 'blog',
                      //           'posts_per_page' => 6,
                      //           'post_status'=>'publish',
                      //           'meta_key' => 'post_views_count',
                      //           'orderby' => 'meta_value_num',
                      //           'order'=> 'DESC',
                      //           'paged'=> $paged
                      //       );
                      //   $query_p = new WP_Query($args);

                    if (have_posts()) : while (have_posts()) : the_post();
                ?>
                    <div class="col-lg-6">
                        <div class="wrap">
                            <a href="<?php the_permalink(); ?>">
                            <?php if(has_post_thumbnail()){ 
                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );  ?>
                                <img src="<?php echo $image[0]; ?>" alt="">
                            <?php  } ?>
                            </a>
                            <div class="date">
                                <?php echo get_the_date("d"); ?> <span><?php echo get_the_date("M Y");?></span>
                            </div>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                           <!--  <div class="author">
                                <i class="fa fa-user-o" aria-hidden="true"></i> By <?php the_author(); ?> | <?php echo get_comments_number(); ?> Comments
                            </div> -->
                            <p><?php echo substr(strip_tags(get_the_content()),0,100); ?></p>
                            <a href="<?php the_permalink(); ?>" class="more">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                <?php
                    endwhile;
                ?>
              <!--       <div class="col-lg-12 text-center">
                  <ul class="page-nav">    
                    <?php 
                 /*  if($total_pages > 1) {
                    echo ' <li><a href="'.get_pagenum_link(1).'"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></li>';
                    for ($i=1; $i <= $total_pages; $i++){
                      
                         // if($i == 1){
                          //   echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a><li>';
                          // }else {
                               echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
                           //  }
                       // echo ' <li><a href="'.get_pagenum_link($i).'"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>';   
                         }
                         echo ' <li><a href="'.get_pagenum_link($total_pages).'"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>';
                     }*/
              
                        ?> 
                  </ul>
              </div> -->
              
                       <!--     
                       <div class="col-lg-12 text-center">
                        <ul class="page-nav"> 
                            <li><a href="#"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li> 
                          </ul>
                        </div>  -->
                     
                <?php endif; 
                    wp_reset_query(); ?>
                </div>         
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>

<?php }

get_footer();
