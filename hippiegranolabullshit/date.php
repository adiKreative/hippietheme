<?php 
/*-- Archive Sidebar Pge --*/
get_header(); ?>
<?php
// get the current taxonomy term
$category = get_term_by('name', 'blog', 'category');// vars
$image = get_field('ban_image', 'category_' .$category->term_id );

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
                <h2>Archive Posts </h2>	
                <div class="loader_svj" style="display:none;">
                  <img src="<?= get_template_directory_uri();?>/assets/images/loader.svg">
                </div>
                <div class="row">
                <?php       
                    $year     = get_query_var('year');
                    $monthnum = get_query_var('monthnum');
                    $day      = get_query_var('day');

                      $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;  
                        $args = array(
                                'category_name'  => 'blog',
                                'posts_per_page' => 6,
                                'post_status'=>'publish',
                                'orderby' => 'date',
                                'order'=> 'DESC',
                                'paged'=> $paged,                                  
                                'date_query' => array(
                                                        array(
                                                        'year'     => $year,
                                                        'monthnum' => $monthnum,  
                                                        'day'  => $day,  
                                                            ),
                                                        ),
                                                      
                            );
                        $query_su = new WP_Query($args);
				
					if ($query_su->have_posts()) : while ($query_su->have_posts()) : $query_su->the_post();
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
                          <!--   <div class="author">
                                <i class="fa fa-user-o" aria-hidden="true"></i> By <?php the_author(); ?> | <?php echo get_comments_number(); ?> Comments
                            </div> -->
                            <p><?php echo substr(strip_tags(get_the_content()),0,100); ?></p>
                            <a href="<?php the_permalink(); ?>" class="more">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                <?php
					endwhile;
				?>
                       <!-- <div class="col-lg-12 text-center">
                          <ul class="page-nav">    
                            <?php 
                      
                           $total_pages =  $query_su->max_num_pages;
                           if($total_pages > 1) {
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
                             }
                         
                
                                ?> 
                          </ul>
                      </div>  --> 

                       <?php 
                            $total_pages =  $query_su->max_num_pages;
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
                          
                                    echo '<div class="col-lg-12 text-center"><ul class="page-nav" id="blog-nav-arc">';
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
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>