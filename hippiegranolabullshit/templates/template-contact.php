<?php 
/* Template Name: Contact*/
get_header();

global $post;
?>

<div class="inner-ban">
   <!--  <img src="images/inner-ban2.jpg" alt=""> -->
     <?php if (has_post_thumbnail( $post->ID ) ): 
       $ban_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
          <img src="<?php echo $ban_image[0]; ?>" alt="">
    <?php endif; ?> 
    <div class="ban-tx">
        <h2><?php wp_title(''); ?></h2>
        <ul>
            <li><a href="<?php echo esc_url(home_url('/'));?>">Home</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i></li>
            <li><?php wp_title(''); ?></li>
        </ul>
    </div>
</div>

<section class="contact-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="wrap">
                  <?php if( have_rows('section_1') ):
                   		 while( have_rows('section_1') ): the_row(); 
                        // Get sub field values.
                        $header = get_sub_field('header', $post->ID);
                        $content = get_sub_field('content', $post->ID);              
          		  	?>
                    <h2><?php echo $header; ?></h2>
                    <p><?php echo $content; ?></p>
                   <?php endwhile; 
               		endif;?>
                    <?php echo do_shortcode('[contact-form-7 id="9821" title="Contact Form"]'); ?> 
                   <!--  <form action=""> 
                          <div class="row">
                                <div class="col-lg-4">
                                    <input type="text" placeholder="Full name">
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" placeholder="Email">
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" placeholder="Subject">
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="" placeholder="Message"></textarea>
                                    <input type="submit" value="submit">
                                </div>
                            </div> -->
                       <!--  </form> -->
                </div>
            </div>
            <div class="col-lg-4 side-bar">
                 <div class="sec1 text-center">
                     <?php if( have_rows('section_2') ):
                   			 while( have_rows('section_2') ): the_row(); 
                   		 	 // Get sub field values.
                        $image = get_sub_field('image', $post->ID);
                        $description = get_sub_field('description', $post->ID);
                     ?>
                     <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr( $image['alt'] ); ?>">
                    <p><?php echo $description; ?></p>
					<?php endwhile; 
               		endif;?>
                    <ul class="social">
                    	 <?php wp_nav_menu( array('menu' => 'Social-Menu' , 'container' => '' , 'items_wrap' => '%3$s' )); ?>
              <!--           <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>