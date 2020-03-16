<?php
/*--Blog Category Page--*/

get_header();
?>
<?php
// get the current taxonomy term
$term = get_queried_object();
// vars
$b_image = get_field('ban_image', $term);
?>

<div class="inner-ban2">
    <img src="<?= esc_url($b_image['url']); ?>" alt="">
    <div class="ban-tx">
        <div class="container">
            <div class="row">
                <?php 
                $group_c = get_field('section1', $term); 
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
<section class="podcast-page">
    <div class="container">
        <div class="row">
            <?php 
                $group_d = get_field('section2', $term); 
                if( $group_d ): ?>
            <div class="col-lg-4 decp">
                <h2><?php echo $group_d['title']; ?></h2>
                <?php echo $group_d['description']; ?>
            </div>
            <?php endif; ?>
            <div class="col-lg-8">
                <div class="shows owl-carousel">
                  <?php   $categories = get_categories(
                                array( 'parent' => $term->cat_ID )
                            ); 
                       foreach ( $categories as $cat_key => $cat_value ) {
                            $args_p = array(
                                'cat' => $cat_value->term_id,
                                'post_type' => 'post',
                                'posts_per_page' => 6,
                                'post_status'   => 'publish',
                                'orderby' => 'date', 
                                'order' => 'DESC', 
                            );
                      
                        $query_child_p  = new WP_Query($args_p); ?>
                             
                    <div class="item">
                        <div class="wrap">
                        <?php
                            $pod_ban_image = get_field('ban_image', 'category_'.$cat_value->term_id);
                            if($pod_ban_image) : ?>
                            <img src="<?= $pod_ban_image['url']; ?>" alt="">
                        <?php endif?>
                            <div class="title">
                               <!--  <a href="<?php echo esc_url( get_category_link($cat_value->term_id) ); ?>"> <h3><?php echo $cat_value->name; ?></h3></a> -->
                                <h3><?php echo $cat_value->name; ?></h3>
                                <p><?php echo $cat_value->category_count; ?> episodes</p>
                            </div>
                        </div>
                        <ul>
                        <?php  if ($query_child_p->have_posts()) : 
                                 while ($query_child_p->have_posts()) : $query_child_p->the_post(); ?> 
                            <li>
                                <i class="fa fa-play" aria-hidden="true"></i>
                                <a href="<?php the_permalink(); ?>">
                                    <h4><?php the_title(); ?></h4>
                                    <p><?php echo substr(strip_tags(get_the_content()),0,10); ?></p>
                                </a>
                            </li>
                            <?php endwhile;
                                endif; 
                             wp_reset_postdata(); ?>
                        </ul>
                        <a href="<?= esc_url(home_url('/"'.$cat_value->slug.'"/')); ?>" class="more">View all Episodes <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                <?php  } ?>

                   <!--  <div class="item">
                        <div class="wrap">
                            <img src="images/podcast-img2.jpg" alt="">
                            <div class="title">
                                <h3>fasting</h3>
                                <p>9 episodes</p>
                            </div>
                        </div>
                        <ul>
                            <li>
                                <i class="fa fa-play" aria-hidden="true"></i>
                                <a href="#">
                                    <h4>Episode 3</h4>
                                    <p>Have you picked the right Polaroid camera?</p>
                                </a>
                            </li>
                            <li>
                                <i class="fa fa-play" aria-hidden="true"></i>
                                <a href="#">
                                    <h4>Episode 3</h4>
                                    <p>Have you picked the right Polaroid camera?</p>
                                </a>
                            </li>
                            <li>
                                <i class="fa fa-play" aria-hidden="true"></i>
                                <a href="#">
                                    <h4>Episode 3</h4>
                                    <p>Have you picked the right Polaroid camera?</p>
                                </a>
                            </li>
                        </ul>
                        <a href="#" class="more">View all Episodes <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                    <div class="item">
                        <div class="wrap">
                            <img src="images/podcast-img1.jpg" alt="">
                            <div class="title">
                                <h3>fasting</h3>
                                <p>9 episodes</p>
                            </div>
                        </div>
                        <ul>
                            <li>
                                <i class="fa fa-play" aria-hidden="true"></i>
                                <a href="#">
                                    <h4>Episode 3</h4>
                                    <p>Have you picked the right Polaroid camera?</p>
                                </a>
                            </li>
                            <li>
                                <i class="fa fa-play" aria-hidden="true"></i>
                                <a href="#">
                                    <h4>Episode 3</h4>
                                    <p>Have you picked the right Polaroid camera?</p>
                                </a>
                            </li>
                            <li>
                                <i class="fa fa-play" aria-hidden="true"></i>
                                <a href="#">
                                    <h4>Episode 3</h4>
                                    <p>Have you picked the right Polaroid camera?</p>
                                </a>
                            </li>
                        </ul>
                        <a href="#" class="more">View all Episodes <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                    <div class="item">
                        <div class="wrap">
                            <img src="images/podcast-img2.jpg" alt="">
                            <div class="title">
                                <h3>fasting</h3>
                                <p>9 episodes</p>
                            </div>
                        </div>
                        <ul>
                            <li>
                                <i class="fa fa-play" aria-hidden="true"></i>
                                <a href="#">
                                    <h4>Episode 3</h4>
                                    <p>Have you picked the right Polaroid camera?</p>
                                </a>
                            </li>
                            <li>
                                <i class="fa fa-play" aria-hidden="true"></i>
                                <a href="#">
                                    <h4>Episode 3</h4>
                                    <p>Have you picked the right Polaroid camera?</p>
                                </a>
                            </li>
                            <li>
                                <i class="fa fa-play" aria-hidden="true"></i>
                                <a href="#">
                                    <h4>Episode 3</h4>
                                    <p>Have you picked the right Polaroid camera?</p>
                                </a>
                            </li>
                        </ul>
                        <a href="#" class="more">View all Episodes <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<section class="podcast-page2">
    <div class="container">
           <div class="loader_svj" style="display:none;">
                <img src="<?= get_template_directory_uri();?>/assets/images/loader.svg">
           </div>
        <div class="row">
            <div class="col-lg-12">
                <h2>LATEST PODCAST</h2>
            </div> 
           <!--  <div class="unique row">  -->
                 
            <?php 
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                                'category_name'  => 'podcast',
                                'posts_per_page' => 6,
                                'post_status'=>'publish',
                                'orderby' => 'date',
                                'order'=> 'DESC',
                                'paged'=>$paged
                            );
                $query_pods = new WP_Query($args);
               if ($query_pods->have_posts()) : while ($query_pods->have_posts()) : $query_pods->the_post();
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
                        <?php 
                          $post_tags = get_the_tags();
                       
                            if (!empty($post_tags)) {
                                foreach ($post_tags as $tag) {
                                   echo '<h5><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></h5>';
                                }
                            }
                        ?>
                       <!--  <h5><?php the_author(); ?></h5> -->
                        <p><?php echo substr(strip_tags(get_the_content()),0,100); ?></p>
                        <a href="<?php the_permalink(); ?>" class="more">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
      
            <?php
                endwhile;
            ?>
        <!-- </div> -->
      <!--     
            <div class="col-lg-6">
                <div class="sec">
                    <div class="wrap">
                        <img src="images/podcast-img3.jpg" alt="">
                         <div class="date">
                            14 <span>dec 2019</span>
                        </div>
                    </div>
                    <div class="decp">
                        <h3>Don’t Increase Work Hours</h3>
                        <h5>Wellness</h5>
                        <p>Mauris pharetra elit nisi, vel accumsan dolor faucibus non. In congue sollicitudin...</p>
                        <a href="#" class="more">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="sec">
                    <div class="wrap">
                        <img src="images/podcast-img4.jpg" alt="">
                         <div class="date">
                            14 <span>dec 2019</span>
                        </div>
                    </div>
                    <div class="decp">
                        <h3>Don’t Increase Work Hours</h3>
                        <h5>Wellness</h5>
                        <p>Mauris pharetra elit nisi, vel accumsan dolor faucibus non. In congue sollicitudin...</p>
                        <a href="#" class="more">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="sec">
                    <div class="wrap">
                        <img src="images/podcast-img5.jpg" alt="">
                         <div class="date">
                            14 <span>dec 2019</span>
                        </div>
                    </div>
                    <div class="decp">
                        <h3>Don’t Increase Work Hours</h3>
                        <h5>Wellness</h5>
                        <p>Mauris pharetra elit nisi, vel accumsan dolor faucibus non. In congue sollicitudin...</p>
                        <a href="#" class="more">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="sec">
                    <div class="wrap">
                        <img src="images/podcast-img6.jpg" alt="">
                         <div class="date">
                            14 <span>dec 2019</span>
                        </div>
                    </div>
                    <div class="decp">
                        <h3>Don’t Increase Work Hours</h3>
                        <h5>Wellness</h5>
                        <p>Mauris pharetra elit nisi, vel accumsan dolor faucibus non. In congue sollicitudin...</p>
                        <a href="#" class="more">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="sec">
                    <div class="wrap">
                        <img src="images/podcast-img7.jpg" alt="">
                         <div class="date">
                            14 <span>dec 2019</span>
                        </div>
                    </div>
                    <div class="decp">
                        <h3>Don’t Increase Work Hours</h3>
                        <h5>Wellness</h5>
                        <p>Mauris pharetra elit nisi, vel accumsan dolor faucibus non. In congue sollicitudin...</p>
                        <a href="#" class="more">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="sec">
                    <div class="wrap">
                        <img src="images/podcast-img8.jpg" alt="">
                         <div class="date">
                            14 <span>dec 2019</span>
                        </div>
                    </div>
                    <div class="decp">
                        <h3>Don’t Increase Work Hours</h3>
                        <h5>Wellness</h5>
                        <p>Mauris pharetra elit nisi, vel accumsan dolor faucibus non. In congue sollicitudin...</p>
                        <a href="#" class="more">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div> -->
           <!--   <div class="col-lg-12 text-center">
                <ul class="page-nav" id="pod-nav">
                     <?php 
                         // $total_pages =  $query_pods->max_num_pages;
                         // if($total_pages > 1) {
                         //  echo ' <li><a href="'.get_pagenum_link(1).'"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></li>';
                         //  for ($i=1; $i <= $total_pages; $i++){
                            
                         //         echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
                          
                         //       }
                         //       echo ' <li><a href="'.get_pagenum_link($total_pages).'"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>';
                         //   }
                       
                    ?> 
                    <li><a href="#"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li> 
                    </ul>
                </div> -->

                <?php 

                    $total_pages =  $query_pods->max_num_pages;
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
                  
                            echo '<div class="col-lg-12 text-center"><ul class="page-nav" id="pod-nav">';
                            foreach ( $pages as $page ) {
                                    echo "<li>$page</li>";
                            }
                           echo '</ul></div>';
                            }
                            
                ?>
              
            <?php endif; 
         wp_reset_query(); ?>  
        </div>
    </div>
</section>

<?php get_footer(); ?>