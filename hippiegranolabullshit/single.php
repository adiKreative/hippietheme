<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<?php

// get the current taxonomy term
$blog_cat = get_term_by('name', 'blog', 'category');// vars
$image = get_field('ban_image', 'category_' .$blog_cat->term_id );

$pod_cat = get_term_by('name', 'podcast', 'category');// vars
$p_image = get_field('ban_image', 'category_' .$pod_cat->term_id );

$category_detail = get_the_category( get_the_ID());

if($category_detail[0]->term_id == 64){
?>
<div class="inner-ban">
    <img src="<?= esc_url($image['url']); ?>" alt="">
	<div class="ban-tx">
        <?php $text = get_the_title(); ?>
       <h2><?php echo substr(strip_tags($text),0,30); ?></h2>
        <ul>
            <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i></li>
            <li><?php echo substr(strip_tags($text),0,30); ?></li>
        </ul>
    </div>
</div>
<section class="body-cont2">
    <div class="container">
        <div class="row">
          		<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/post/content', get_post_format() );

				setPostViews(get_the_ID());
				// If comments are open or we have at least one comment, load up the comment template.
				// if ( comments_open() || get_comments_number() ) :
				// 	comments_template();
				// endif;

				// the_post_navigation(
				// 	array(
				// 		'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
				// 		'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
				// 	)
				// );

			endwhile; // End of the loop.
			?>
           <?php get_sidebar(); ?>
       
        </div>
    </div>
</section>
<?php } 
else if($category_detail[0]->term_id == 65 || $category_detail[0]->parent == 65){ ?>

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
                  <!--   <a href="podcast-details.php"><span><i class="fa fa-play" aria-hidden="true"></i> Play Latest Episode</span></a>
 -->                </div>
            <?php endif; ?>
            </div>
        </div>   
    </div>
</div>
<section class="podcast-page3">
    <div class="container">
        <div class="row">
        	<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/post/content-podcast', get_post_format() );

				// If comments are open or we have at least one comment, load up the comment template.
				// if ( comments_open() || get_comments_number() ) :
				// 	comments_template();
				// endif;

				// the_post_navigation(
				// 	array(
				// 		'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
				// 		'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
				// 	)
				// );

			endwhile; // End of the loop.
			?>
            
        </div>
    </div>
</section>
<?php
} ?>
<?php
get_footer();

