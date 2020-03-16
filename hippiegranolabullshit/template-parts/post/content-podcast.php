<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>


<div class="col-lg-12 pod-paly">
    <iframe width="100%" height="300" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/118106846&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
</div>
<div class="col-lg-12">
    <div class="auth">
        <div class="row">
            <div class="col-lg-2">
                <?php
                $user = wp_get_current_user();            
                if ( $user ) :
                    ?>
                    <img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" />
                <?php endif; ?>
             <!--    <img src="images/podcast-img9.jpg" alt=""> -->
            </div>
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-6">
                        <h5>Hosted by</h5>
                        <h4><?php the_author(); ?></h4>
                    </div>
                    <div class="col-lg-6 text-right">
                        <ul class="social">
                            <?php wp_nav_menu( array('menu' => 'Social-Menu' , 'container' => '' , 'items_wrap' => '%3$s' )); ?>  
                           <!--  <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li> -->
                        </ul>
                    </div>
                    <div class="col-lg-12">
                       <p><?php echo $user->user_description; ?> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php the_content(); ?>
   <!--  <p>Seamlessly strategize turnkey alignments vis-a-vis ubiquitous models. Competently disseminate out-of-the-box sources without competitive supply chains. Distinctively iterate front-end quality vectors with superior manufactured products. Progressively morph maintainable process improvements vis-a-vis leading-edge materials. Objectively myocardinate team.</p>
    <p>Holisticly disintermediate cross-unit models with proactive platforms. Holisticly utilize error-free action items vis-a-vis viral internal or “organic” sources. Interactively impact interdependent e-services through premier ROI. Proactively e-enable compelling e-commerce via turnkey initiatives. Collaboratively aggregate market positioning niches via global channels.</p>
    <h2>Unleash your creativity </h2>
    <p>Seamlessly strategize turnkey alignments vis-a-vis ubiquitous models. Competently disseminate out-of-the-box sources without competitive supply chains. Distinctively iterate front-end quality vectors with superior manufactured products. Progressively morph maintainable process improvements vis-a-vis leading-edge materials. Objectively myocardinate team.</p>
    <p>Holisticly disintermediate cross-unit models with proactive platforms. Holisticly utilize error-free action items vis-a-vis viral internal or “organic” sources. Interactively impact interdependent e-services through premier ROI. Proactively e-enable compelling e-commerce via turnkey initiatives. Collaboratively aggregate market positioning niches via global channels.</p> -->
</div>
<div class="col-lg-6 Download">
  <?php  $pod_image = get_field('image_podcast', get_the_id() );
     if($pod_image) { ?>
      <img src="<?= $pod_image['url']; ?>" alt="">
    <?php } ?>
    <ul>
        <li><a href="#"><i class="fa fa-play-circle" aria-hidden="true"></i> LISTEN NOW</a></li>
        <li><a href="#"><i class="fa fa-download" aria-hidden="true"></i> Download</a></li>
    </ul>
</div>
<div class="col-lg-6">
    <div class="Download-sec">
        <?php 
         $term_det = get_field('content_podcast', get_the_id() );
         if( $term_det ): 
            echo $term_det;    
         endif; ?>

        <!-- <h5>18 – Don’t Increase Work Hours, Optimize Them ft. Karl Marx</h5>
        <p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Aenean lacinia bibendum nulla sed consectetur. Nullam quis risus eget urna mollis ornare vel eu leo. Donec sed odio dui.</p>
        <h5>Good Friend always cover</h5>
        <p>Aenean lacinia bibendum nulla sed consectetur. Curabitur blandit tempus porttitor. Aenean lacinia bibendum nulla sed consectetur. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p> -->
         
    </div>
</div>