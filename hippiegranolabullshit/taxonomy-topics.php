<?php 
get_header();

// get the current taxonomy term
$blog_cat = get_term_by('name', 'blog', 'category');// vars
$image = get_field('ban_image', 'category_' .$blog_cat->term_id );

$tax_obj = get_queried_object();
$top_term_id = $tax_obj->term_id;
// $topic_terms = get_terms('topics');
// $term_id_arr = array();
// foreach ($topic_terms as $t_key => $t_val) {
// 	$term_id_arr[] = $t_val->term_id;
// }
?>
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
                <h2>Latest post for <?php echo $tax_obj->taxonomy.' name '.$tax_obj->name; ?></h2> 
                 <div class="loader_svj" style="display:none;">
              		<img src="<?= get_template_directory_uri();?>/assets/images/loader.svg">
          		</div>
                <div class="row">
                <?php
                      $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;  
                        $args = array(           
                                'posts_per_page' => 6,
                                'post_status'=>'publish',
                                'orderby' => 'date',
                                'order'=> 'DESC',
                                'tax_query' => array(
							        array(
							            'taxonomy' => 'topics',
							            'field' => 'term_id',
							            'terms' => array($top_term_id)
							        ),
							    ),
                                'paged'=> $paged

                            );
                        $query_topic = new WP_Query($args);

                    if ($query_topic->have_posts()) : while ($query_topic->have_posts()) : $query_topic->the_post();
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

             <?php 

                    $total_pages =  $query_topic->max_num_pages;
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
                  
                            echo '<div class="col-lg-12 text-center"><ul class="page-nav" id="topic-nav">';
                            foreach ( $pages as $page ) {
                                    echo "<li>$page</li>";
                            }
                           echo '</ul></div>';
                            }
                            
                ?>
              
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

<?php get_footer(); ?>