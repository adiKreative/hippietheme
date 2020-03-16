<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="banner-part">
    <img src="<?php the_post_thumbnail_url(); ?>" alt="">
    <div class="banner_text">
        <div class="container">
            <div class="row">
			<?php if( have_rows('home_page') ):
                    while( have_rows('home_page') ): the_row(); 
                        // Get sub field values.
                        $title = get_sub_field('title');
						$content = get_sub_field('content');  
						$page_link = get_sub_field('link');         
            ?>
                <div class="col-lg-6">
                    <h2><?php echo $title; ?></h2>
                    <!-- <h2>Barrel Saunas and Cold Tubs</h2> -->
                    <p><?php echo $content; ?></p>
                    <a href="<?php echo $page_link; ?>"><span>Contact us</span></a>
				</div>
				<?php endwhile;
            	endif; ?>
            </div>
        </div>
    </div>
    <!-- <img class="shape-1" src="images/shape-2.png" alt=""> -->
    <div class="shape-2">
        <?php if( have_rows('home_section2') ):
                while( have_rows('home_section2') ): the_row(); 
                    $image1 = get_sub_field('image1');
                    $image2 = get_sub_field('image2');
        ?>                      
        <img src="<?= esc_url($image1['url']); ?>" alt="<?= esc_attr( $image1['alt'] ); ?>">
        <img class="img2" src="<?= esc_url($image2['url']); ?>" alt="<?= esc_attr( $image2['alt'] ); ?>">
        <?php endwhile;
        endif; ?>
    </div>
    <svg width="100%" height="200px" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wave"><defs></defs><path id="feel-the-wave" d=""/></svg>
<svg width="100%" height="150px" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wave"><defs></defs><path id="feel-the-wave-two" d=""/></svg>
</div>
<section class="body-cont1">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cold owl-carousel">
                    <?php
                    // get all terms in the taxonomy
                    $terms = get_terms( 'topics' );
                foreach ($terms as $t_key => $t_value) {
                  
                    $term_post_id = 'topics_'.$t_value->term_id;
                    $ban_image = get_field('image_ban', $term_post_id);
                    $backg_image = get_field('background_img', $term_post_id);
                     ?>
                    <div class="item">
                        <img src="<?= esc_url($backg_image['url']); ?>" alt="">
                        <div class="decp">
                     <a href="<?= esc_url(get_term_link($t_value)); ?>"> <h3> <?php echo $t_value->name; ?> </h3></a>  
                          <!--  <h3> <?php echo $t_value->name; ?> </h3>  -->
                            <h2><?php echo $t_value->description; ?></h2>
                        <a href="<?= esc_url(get_term_link($t_value)); ?>"><img src="<?= esc_url($ban_image['url']); ?>" alt=""></a>
                        </div>
                    </div>
                <?php } ?>
                 <!--    <div class="item">
                        <img src="<?= get_template_directory_uri();?>/assets/images/home-img2.jpg" alt="">
                        <div class="decp">
                            <h3>Cold  </h3>
                            <h2>tubs</h2>
                            <img src="<?= get_template_directory_uri();?>/assets/images/home-img5.jpg" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <img src="<?= get_template_directory_uri();?>/assets/images/home-img2.jpg" alt="">
                        <div class="decp">
                            <h3>Cold  </h3>
                            <h2>tubs</h2>
                            <img src="<?= get_template_directory_uri();?>/assets/images/home-img5.jpg" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <img src="<?= get_template_directory_uri();?>/assets/images/home-img3.jpg" alt="">
                        <div class="decp">
                            <h3>Ice </h3>
                            <h2>BATH</h2>
                            <img src="<?= get_template_directory_uri();?>/assets/images/home-img6.jpg" alt="">
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<section class="body-cont2">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h2>Popular Posts </h2>
                <div class="loader_svj" style="display:none;">
                  <img src="<?= get_template_directory_uri();?>/assets/images/loader.svg">
                </div>
                <div class="row">
                        <?php
                          // query_posts(array( 'category_name'  => 'blog', 'posts_per_page' => 6, 'meta_key' => 'post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
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
                                $query_fb = new WP_Query($args);
          
                    if ($query_fb->have_posts()) : while ($query_fb->have_posts()) : $query_fb->the_post();
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
                          <!--   <div class="author">
                                <i class="fa fa-user-o" aria-hidden="true"></i> By <?php the_author(); ?> | <?php echo get_comments_number(); ?> Comments
                            </div> -->
                            <p><?php echo substr(strip_tags(get_the_content()),0,100); ?></p>
                            <a href="<?php the_permalink(); ?>" class="more">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                <?php
                    endwhile;  ?>
                   <!--  
                   <div class="col-lg-6">
                       <div class="wrap">
                           <a href="#">
                               <img src="<?= get_template_directory_uri();?>/assets/images/home-blog-img2.jpg" alt="">
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
                               <img src="<?= get_template_directory_uri();?>/assets/images/home-blog-img3.jpg" alt="">
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
                               <img src="<?= get_template_directory_uri();?>/assets/images/home-blog-img4.jpg" alt="">
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
                               <img src="<?= get_template_directory_uri();?>/assets/images/home-blog-img5.jpg" alt="">
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
                               <img src="<?= get_template_directory_uri();?>/assets/images/home-blog-img6.jpg" alt="">
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
                  <!--  <div class="col-lg-12 text-center">
                       <ul class="page-nav" id="blog-nav-f">    -->
                    <?php
                         // $current_page = max( 1, get_query_var('paged') );
                         // if($total_pages > 1) {
                         //    echo ' <li><a href="'.get_pagenum_link(1).'"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></li>';
                         //    for ($i=1; $i <= $total_pages; $i++){
                         //          echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';

                         //       }
                         //       echo ' <li><a href="'.get_pagenum_link($total_pages).'"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>';
                         //   } ?>
                           <!--    </ul>
                       </div> -->
                        <?php 
                            $total_pages =  $query_fb->max_num_pages;
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
                   
                    <!--     <ul class="page-nav">
                            <li><a href="#"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                        </ul> -->
                   
                   <?php  endif;
                    wp_reset_query();
                    ?>
                </div> 
                
            </div>
            <?php get_sidebar(); ?>
      
        </div>
    </div>
</section>

<?php
get_footer();
