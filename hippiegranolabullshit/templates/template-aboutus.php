<?php 
/* Template Name: About Us*/
get_header();

//$pag_path = get_page_by_path('about-us');
global $post;

?>
<div class="inner-ban">
    <!-- <img src="<?= get_template_directory_uri();?>/assets/images/inner-ban.jpg" alt=""> -->
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
<section class="ab-sec1">
    <div class="container">
        <div class="row">
            <?php if( have_rows('about_section1') ):
                    while( have_rows('about_section1') ): the_row(); 
                        // Get sub field values.
                        $title = get_sub_field('title', $post->ID);
                        $content = get_sub_field('content', $post->ID);
                        $image = get_sub_field('image', $post->ID);          
            ?>
            <div class="col-lg-7">      
                <h2><?php echo $title; ?></h2>  
                <p><?php echo $content; ?></p> 
                <ul class="social">
                <?php wp_nav_menu( array('menu' => 'Social-Menu' , 'container' => '' , 'items_wrap' => '%3$s' )); ?>
                    <!-- <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li> -->
                </ul>
            </div>
            <div class="col-lg-5">
                <img src="<?= esc_url( $image['url'] ); ?>" alt="<?= esc_attr( $image['alt'] ); ?>">
            </div>
            <?php endwhile;
            endif; ?>
        </div>
    </div>
</section>
<section class="ab-sec1">
    <div class="container">
        <div class="row">
        <?php if( have_rows('about_section_2') ):
                    while( have_rows('about_section_2') ): the_row(); 
                        // Get sub field values.
                        $title_1 = get_sub_field('title1', $post->ID);
                        $content_1 = get_sub_field('description', $post->ID);
                        $image_1 = get_sub_field('image1', $post->ID);          
            ?>
            <div class="col-lg-6">
                <img src="<?= esc_url($image_1['url']); ?>" alt="<?= esc_attr( $image_1['alt'] ); ?>">
            </div>
            <div class="col-lg-6">
                <h3><?php echo $title_1; ?></h3>
                <p><?php echo $content_1; ?></p>
            </div>
            <?php endwhile;
            endif; ?>
        </div>
    </div>
</section>
<section class="ab-sec2">
    <div class="container">
        <div class="row">
        <?php if( have_rows('about_section3') ):
                    while( have_rows('about_section3') ): the_row(); 
                        // Get sub field values.
                        $header = get_sub_field('header', $post->ID);
                        $content_2 = get_sub_field('content', $post->ID);         
            ?>
            <div class="offset-lg-2 col-lg-8 text-center">
                <h2><?php echo $header; ?></h2>
                <p><?php echo $content_2; ?></p>
            </div>
            <?php endwhile;
            endif; ?> 
        </div>
    </div>
</section>
<?php get_footer(); ?>