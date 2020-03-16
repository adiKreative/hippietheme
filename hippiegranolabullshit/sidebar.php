<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
  <div class="col-lg-3 side-bar">
        <?php if(is_active_sidebar('sidebar-4')){
                dynamic_sidebar('sidebar-4');
        }?>
     <!--    <div class="sec1">
            <img src="<?= get_template_directory_uri();?>/assets/images/side-bar-img1.png" alt="">
            <p>Donec sed placerat felis. Mauris convallis ac tortor vitae tempus. Suspendisse tristique, tortor sit amet dictum posuere, diam enim pretium ligula...</p>
            <a href="#" class="more">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
        </div> -->
        <div class="sec1 text-center">
            <h3>FOLLOW US</h3>
            <ul class="social">
                <?php wp_nav_menu( array('menu' => 'Social-Menu' , 'container' => '' , 'items_wrap' => '%3$s' )); ?>
             <!--    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li> -->
            </ul>
            <?php if(is_active_sidebar('sidebar-5')){
                dynamic_sidebar('sidebar-5');
             }?>
            <!-- <h3>Don't miss another post!</h3>
            <form action="">
                <label for="">Subscribe to get our latest content by email.</label>
                <input type="text" placeholder="Your email address">
                <input type="submit" value="Subscribe">
            </form> -->
        </div>
        <div class="sec1">
            <h4>RECENT POSTS <span></span></h4>
            <ul class="post">
            	  <?php
                   // $term = get_queried_object();
                     $recent_posts = wp_get_recent_posts(array(
                        'category_name' => 'blog',
                        'numberposts' => 4, // Number of recent posts thumbnails to display
                        'post_status' => 'publish',
                        'orderby'          => 'post_date',
                        'order'            => 'DESC', // Show only the published posts
                    )); 
                    
					foreach ($recent_posts as $post_val) {
				    ?>
                <li>
                    <a href="<?php echo get_permalink($post_val['ID']); ?>">
                    	  <?php if(has_post_thumbnail()){ 
					    	$image_url = wp_get_attachment_url( get_post_thumbnail_id( $post_val['ID'] ), 'full' ); 	?>
					        <img src="<?php echo $image_url; ?>" alt="">
					 	   <?php  } ?>
                         <?php if(is_front_page()) {?>
                         <p><?php echo substr(strip_tags($post_val['post_title']),0,50); ?></p>
                        <?php } else {?>
                        <p><?php echo substr(strip_tags($post_val['post_content']),0,50); ?></p>
                        <?php } ?>
                         <h5><?php echo get_the_date("d M Y", $post_val['ID']);?></h5>
                         <!-- <time datetime=”<?php the_modified_time('Y-m-d'); ?>”><?php the_modified_time('F jS, Y'); ?></time> -->
                    </a>
                </li>
               <?php }
               wp_reset_query(); ?>
           <!--      <li>
                    <a href="#">
                         <img src="<?= get_template_directory_uri();?>/assets/images/side-bar-img3.jpg" alt="">
                         <p>Donec sed placerat felis mauris convall</p>
                         <h5>13 Dec 2019</h5>
                    </a>
                </li>
                <li>
                    <a href="#">
                         <img src="<?= get_template_directory_uri();?>/assets/images/side-bar-img4.jpg" alt="">
                         <p>Donec sed placerat felis mauris convall</p>
                         <h5>13 Dec 2019</h5>
                    </a>
                </li>
                <li>
                    <a href="#">
                         <img src="<?= get_template_directory_uri();?>/assets/images/side-bar-img5.jpg" alt="">
                         <p>Donec sed placerat felis mauris convall</p>
                         <h5>13 Dec 2019</h5>
                    </a>
                </li> -->
            </ul>
        </div>
        <div class="sec1">
           <h4>ARCHIVES <span></span></h4>
         <?php 
          // $args = array(
          //               'type'            => 'monthly',
          //               'format'          => 'html', 
          //               'before'          => '',
          //               'after'           => '',
          //               'show_post_count' => true,
          //               'order'           => 'DESC',
                      
          //           );
            ?>  
        <?php // wp_get_archives( $args ); ?>          
           <ul class="archive">
            <?php 
                add_filter( 'getarchives_where', 'custom_archive_by_category_where' );
                add_filter( 'getarchives_join', 'custom_archive_by_category_join' );
                 
                $args = array();

                wp_get_archives(
                  array(
                    'type'            => 'monthly',
                    'format'          => 'html',
                    'post_type'       => 'post',
                    'show_post_count' => true,
                    'order'           => 'DESC'
                  )
                );
                 
                remove_filter( 'getarchives_where', 'custom_archive_by_category_where' );
                remove_filter( 'getarchives_join', 'custom_archive_by_category_join' );
            ?>
        
          <!-- 
               <li><a href="#">January - 2109 <span>(54)</span></a></li>
               <li><a href="#">February - 2109 <span>(85)</span></a></li>
               <li><a href="#">March - 2018 <span>(54)</span></a></li>
                <li><a href="#">January - 2109 <span>(54)</span></a></li>
               <li><a href="#">February - 2109 <span>(85)</span></a></li>
               <li><a href="#">March - 2018 <span>(54)</span></a></li>
                <li><a href="#">January - 2109 <span>(54)</span></a></li>
               <li><a href="#">February - 2109 <span>(85)</span></a></li>
               <li><a href="#">March - 2018 <span>(54)</span></a></li> -->
           </ul>
         </div>
         <div class="sec2">
            <div class="cuntry owl-carousel">
                <?php    // get all terms in the taxonomy
                    $terms = get_terms( array(
                        'taxonomy' => 'sidebanner',
                        'hide_empty' => true,
                    ) );
                foreach ($terms as $t_key => $t_value) {      
                    $term_post_id = 'sidebanner_'.$t_value->term_id;
                    $backg_image = get_field('sidebar_image', $term_post_id);
                ?>
                <div class="item">
                     <a href="<?= esc_url(get_term_link($t_value)); ?>"> <img src="<?= esc_url($backg_image['url']); ?>" alt=""></a>
                    
                </div>
            <?php } ?>
           <!--      <div class="item">
                    <img src="<?= get_template_directory_uri();?>/assets/images/side-bar-img6.jpg" alt="">
                </div>
                <div class="item">
                    <img src="<?= get_template_directory_uri();?>/assets/images/side-bar-img6.jpg" alt="">
                </div>
                <div class="item">
                    <img src="<?= get_template_directory_uri();?>/assets/images/side-bar-img6.jpg" alt="">
                </div> -->
            </div>
         </div>
  </div>
<!-- <aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'twentyseventeen' ); ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside> -->
<!-- #secondary -->
