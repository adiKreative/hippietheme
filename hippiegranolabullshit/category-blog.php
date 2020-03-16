<?php
/*--Blog Category Page--*/

get_header(); ?>

<?php
// get the current taxonomy term
$term = get_queried_object();
// vars
$image = get_field('ban_image', $term);
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
                <h2>Popular Posts </h2>	
                <div class="loader_svj" style="display:none;">
                  <img src="<?= get_template_directory_uri();?>/assets/images/loader.svg">
                </div>
                 <div class="row"> 
                <!-- <div class="unique row"> -->
                        <?php
                              $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;  
                                $args = array(
                                        'category_name'  => 'blog',
                                        'posts_per_page' => 6,
                                        'post_status'=>'publish',
                                        'meta_key' => 'post_views_count',
                                        'orderby' => 'date meta_value_num',
                                        'order'=> 'DESC',
                                        'paged'=> $paged
                                    );
                                $query_p = new WP_Query($args);
        				   // query_posts(array( 'category_name'  => 'blog', 'posts_per_page' => 6, 'meta_key' => 'post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
        					if ($query_p->have_posts()) : while ($query_p->have_posts()) : $query_p->the_post();
        				?>
                            <div class="col-lg-6">
                                <div class="wrap">
                                    <a href="<?php the_permalink(); ?>">
                                    <?php if(has_post_thumbnail()){ 
                                    	$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); 	?>
                                        <img src="<?php echo $image[0]; ?>" alt="">
                                    <?php  } ?>
                                    </a>
                                    <div class="date">
                                        <?php echo get_the_date("d"); ?> <span><?php echo get_the_date("M Y");?></span>
                                    </div>
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                               <!--      <div class="author">
                                        <i class="fa fa-user-o" aria-hidden="true"></i> By <?php the_author(); ?> | <?php echo get_comments_number(); ?> Comments
                                    </div> -->
                                    <p><?php echo substr(strip_tags(get_the_content()),0,100); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="more">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        <?php
        					endwhile;
        				?>
              <!--       </div> -->
             <!--        <div class="col-lg-6">
                        <div class="wrap">
                            <a href="single-blog.php">
                                <img src="images/home-blog-img2.jpg" alt="">
                            </a>
                            <div class="date">
                                14 <span>dec 2019</span>
                            </div>
                            <h3><a href="single-blog.php">Proin congue elit ac luctus ra Nullam consectetu Proinsuit</a></h3>
                            <div class="author">
                                <i class="fa fa-user-o" aria-hidden="true"></i> By john Deo | 0 Comments | Wellness
                            </div>
                            <p>Mauris pharetra elit nisi, vel accumsan dolor faucibus non. In congue sollicitudin odio id consequat. Cras tempor dui in sapien aliquam sodales. ipsum arcu, commodo et sem...</p>
                            <a href="#" class="more">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="wrap">
                            <a href="#">
                                <img src="images/home-blog-img3.jpg" alt="">
                            </a>
                            <div class="date">
                                14 <span>dec 2019</span>
                            </div>
                            <h3><a href="#">Aenean in leo ut felis rutrum dapibus Morbi sit amet tincidun</a></h3>
                            <div class="author">
                                <i class="fa fa-user-o" aria-hidden="true"></i> By john Deo | 0 Comments | Helth
                            </div>
                            <p>Mauris pharetra elit nisi, vel accumsan dolor faucibus non. In congue sollicitudin odio id consequat. Cras tempor dui in sapien aliquam sodales. ipsum arcu, commodo et sem...</p>
                            <a href="#" class="more">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="wrap">
                            <a href="#">
                                <img src="images/home-blog-img4.jpg" alt="">
                            </a>
                            <div class="date">
                                14 <span>dec 2019</span>
                            </div>
                            <h3><a href="#">Proin congue elit ac luctus ra Nullam consectetu Proinsuit</a></h3>
                            <div class="author">
                                <i class="fa fa-user-o" aria-hidden="true"></i> By john Deo | 0 Comments | Wellness
                            </div>
                            <p>Mauris pharetra elit nisi, vel accumsan dolor faucibus non. In congue sollicitudin odio id consequat. Cras tempor dui in sapien aliquam sodales. ipsum arcu, commodo et sem...</p>
                            <a href="#" class="more">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="wrap">
                            <a href="#">
                                <img src="images/home-blog-img5.jpg" alt="">
                            </a>
                            <div class="date">
                                14 <span>dec 2019</span>
                            </div>
                            <h3><a href="#">Aenean in leo ut felis rutrum dapibus Morbi sit amet tincidun</a></h3>
                            <div class="author">
                                <i class="fa fa-user-o" aria-hidden="true"></i> By john Deo | 0 Comments | Helth
                            </div>
                            <p>Mauris pharetra elit nisi, vel accumsan dolor faucibus non. In congue sollicitudin odio id consequat. Cras tempor dui in sapien aliquam sodales. ipsum arcu, commodo et sem...</p>
                            <a href="#" class="more">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="wrap">
                            <a href="#">
                                <img src="images/home-blog-img6.jpg" alt="">
                            </a>
                            <div class="date">
                                14 <span>dec 2019</span>
                            </div>
                            <h3><a href="#">Proin congue elit ac luctus ra Nullam consectetu Proinsuit</a></h3>
                            <div class="author">
                                <i class="fa fa-user-o" aria-hidden="true"></i> By john Deo | 0 Comments | Wellness
                            </div>
                            <p>Mauris pharetra elit nisi, vel accumsan dolor faucibus non. In congue sollicitudin odio id consequat. Cras tempor dui in sapien aliquam sodales. ipsum arcu, commodo et sem...</p>
                            <a href="#" class="more">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div> -->
                <!--     <div class="col-lg-12 text-center">
                        <ul class="page-nav" id="blog-nav">    
                          <?php 
                           // $current_page = max(1, get_query_var('page'));
                           //     echo paginate_links(array(
                           //            'total' => $query_p->max_num_pages,
                           //            'prev_text'    => __('<li><a href="'.get_pagenum_link($current_page).'"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></li>'),
                           //            'next_text'    => __('<li><a href="'.get_pagenum_link($current_page).'"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>'),
                           //          ));

                              ?> 
                        </ul>
                    </div> -->
                      <?php 
                            $total_pages =  $query_p->max_num_pages;
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
                          
                                    echo '<div class="col-lg-12 text-center"><ul class="page-nav blog-nav">';
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