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

  <div class="col-lg-9 single-post">
        <h3><?php the_title(); ?> </h3>
        <div class="date">
            <?php echo get_the_date("d"); ?> <span><?php echo get_the_date("M Y");?></span>
        </div>
      <!--   <div class="author">
            <i class="fa fa-user-o" aria-hidden="true"></i> By <?php the_author(); ?> | <?php echo get_comments_number(); ?> Comments
        </div> -->
        <?php if(has_post_thumbnail()){ 
    	$image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' ); 	?>
        <img src="<?php echo $image_url; ?>" alt="">
 	   <?php  } ?>
		<?php the_content(); ?>
        <!-- <p>One of the things I found most fascinating about the idea of a water fast is the idea that there are physical experiences you can undertake that seem to alleviate the hunger pangs.   My neighbors who had introduced me to “not eating as a way to maintain health” also had a barrel sauna on their back porch. Come January 2nd with nothing to occupy my time in the afternoons, I trundled off over to their house to see what this sauna business was all about.  I was promised that the heat would relieve the symptoms of hunger. They were absolutely correct. It’s almost as if you find another way to make yourself miserable you can forget about the thing making you the most miserable. I guess that’s called Greek pain relief? </p>
        <p>Saunas are pretty easy to describe I suppose.  I think most people have either been in one, seen one or live in an Amish community. Hell, maybe even the Amish use them?  You could look it up but I’m not your google monkey. It wouldn’t shock me to learn that the Amish use sweat lodges. The medical literature that I’ve actually read (e.g. again, Google) says that the Mayans built and used sweat lodges some 3000 years ago.  And I have no reason to doubt that even one little bit. Cause when I’m thinking about day to day life in a remote, humid jungle, the whole world is a sauna. Why wouldn’t you want to build a little thatch roofed hut, superheat the son of a bitch and step inside for a while to really amp up the lifestyle.  Hell, maybe lick a toad first to get the full on crazy moving around the body first too while you’re at it. It’s certainly translated to our day and age with little or no regression from the mean.</p>
        <p>We have it so much easier here at home in present day Florida where it’s never hot and humid.  We shove our fat, hungover asses into a wooden box, super heat some rocks and then splash water all over them to make steam.  And then sit for what feels like an indeterminable period while misery circles your body. It’s not a difficult concept; it’s just incredibly stupid.  Oh, and if you’re really looking to make things worse, the Finnish people, who are undoubtedly the masters at the art of the sauna, will hand you what amounts to a Birch tree limb and ask you to smack yourself all over to make sure you really get the physical manifestation of self loathing.  And if you just don’t feel like whipping yourself to death with a birch branch, they have a special add on where an angry Finn will do it for a nominal extra fee. </p> 
        <div class="row">
            <div class="col-lg-6">
                <img src="images/single-img2.jpg" alt="">
            </div>
            <div class="col-lg-6">
                <img src="images/single-img3.jpg" alt="">
            </div>
        </div>
        <p>But there really are some reasons that saunas make sense.  The science seems to suggest some heart related benefits, mostly related to normalizing blood pressure and reducing events of congestive heart failure.   Using a sauna is also known as an exercise mimetic, e.g. that it’s similar to exercise in that it raises heart rate, body temperature and cardiac output.   The studies show that the more often and the longer you use a sauna, the more your life expectancy grows.  Nothing fancy about that idea – just a straight up set of facts. And if you’re particularly lazy – like me – being in the sauna is kinda like working out because the cardiovascular system has to work hard to cool the body down after you’re done.  And when you look like a walking potato (e.g. me), your heart needs all the help it can get.  </p>
        <p>But there really are some reasons that saunas make sense.  The science seems to suggest some heart related benefits, mostly related to normalizing blood pressure and reducing events of congestive heart failure.   Using a sauna is also known as an exercise mimetic, e.g. that it’s similar to exercise in that it raises heart rate, body temperature and cardiac output.   The studies show that the more often and the longer you use a sauna, the more your life expectancy grows.  Nothing fancy about that idea – just a straight up set of facts. And if you’re particularly lazy – like me – being in the sauna is kinda like working out because the cardiovascular system has to work hard to cool the body down after you’re done.  And when you look like a walking potato (e.g. me), your heart needs all the help it can get.  </p>
        <p>Anything else you might reasonably ask?  Sort of. When the blood moves around the body and you get a real good sweat on, it tends to help you get rid of bad stuff inside your rig.  The sauna is a really handy disposal unit for some of your bad adult life choices. Like drinking too much or eating potted meat. Or both. At the same time.  And with God as my witness you haven’t really lived until you’ve sweated out Miller High Life and Vienna Sausages.  </p>
        <div class="com">
            <p>Like drinking too much or eating potted meat. Or both. At the same time.  And with God as my witness you haven’t really lived until you’ve sweated out Miller High Life and Vienna Sausages.</p>
        </div>
        <p>When my neighbor mentioned to me that he was having a barrel sauna installed at his house, I enthusiastically told him I didn’t care and did he have anymore beer in his outside fridge?  I wasn’t trying to be an asshole, I’m just really good at it. It’s like muscle memory. But as I stood gazing at the thing the next day, another part of me wondering just how long it would take to get him to invite me into it? The answer is not very long.  It’s probably because he’s friendly and trusting and knows I’d keep pestering him until he lets me do whatever I want in the first place. He certainly doesn’t have any reason to be friendly or trusting with me. I’ve done nothing but let him down the entire time we’ve known each other.</p> -->
        <?php
    //      if ( comments_open() || get_comments_number() ) :
				// 	comments_template();
				// endif;
        ?>
      

            <?php 
                    // $next_post = get_next_post();         
                    // $prev_post = get_previous_post();
                    // Check if the post exists    
               // the_post_navigation(
               //   array(
               //       'prev_text' => '<i class="fa fa-long-arrow-left" aria-hidden="true"></i>',
               //       'next_text' => '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>',
               //       'screen_reader_text' => __( 'Posts navigation' )
               //   )
               //  );
            ?>
            <div class="row">
                <div class="col-lg-6">
                    <?php
                        previous_post_link( '%link', '<i class="fa fa-long-arrow-left" aria-hidden="true"></i>', true, '', 'category' );
                    ?>
                </div>
                <div class="col-lg-6 text-right">
                 <?php  next_post_link( '%link', ' <i class="fa fa-long-arrow-right" aria-hidden="true"></i>', true, '', 'category' );
                 ?>
               </div>
            </div> 
            
       <!--  <div class="row">
           <?php if ( $prev_post ) { ?>
             <div class="col-lg-6 ">
                 <a href="#" class="pre" data-id="<?php echo $prev_post->ID; ?>"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
             </div><?php
         }
         if ( $next_post ) { ?>
             <div class="col-lg-6 text-right ">
                 <a href="#" class="next" data-id="<?php echo $next_post->ID; ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
             </div><?php
         }
        
         ?>        
        </div>  -->
	</div>


