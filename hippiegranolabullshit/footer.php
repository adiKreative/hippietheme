<section class="body-cont3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="sec">
                    <h2>OUR Partners</h2>         
                  <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
                                <?php dynamic_sidebar( 'sidebar-2' ); ?>
                    <?php endif; ?>
                <!--  <div class="row align-items-center"> 
                      <div class="col">
                        <img src="<?= get_template_directory_uri();?>/assets/images/pat-logo1.png" alt="">
                    </div>
                    <div class="col">
                        <img src="<?= get_template_directory_uri();?>/assets/images/pat-logo2.png" alt="">
                    </div>
                    <div class="col">
                        <img src="<?= get_template_directory_uri();?>/assets/images/pat-logo3.png" alt="">
                    </div>
                    <div class="col">
                        <img src="<?= get_template_directory_uri();?>/assets/images/pat-logo4.png" alt="">
                    </div>
                    <div class="col">
                        <img src="<?= get_template_directory_uri();?>/assets/images/pat-logo5.png" alt="">
                    </div>
                    <div class="col">
                        <img src="<?= get_template_directory_uri();?>/assets/images/pat-logo6.png" alt="">
                    </div>
                    <div class="col">
                        <img src="<?= get_template_directory_uri();?>/assets/images/pat-logo7.png" alt="">
                    </div>  
                   </div> -->                 
                    
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="footer-bottom">	
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
                <a href="<?php echo home_url('/'); ?>" class="logo">
                <?php if(is_active_sidebar('sidebar-3')) {
                        dynamic_sidebar( 'sidebar-3' ); 
                    }
                ?>
                </a>
			<!-- 	<a href="<?php echo home_url('/'); ?>" class="logo">
					<img src="<?= get_template_directory_uri();?>/assets/images/side-bar-img1.png" alt="">
				</a> -->
				<p><?php echo get_the_date('Y'); ?> © Hippie. Granola. Bullshit.. All Rights Reserved.</p>
				<ul class="social">
				<?php wp_nav_menu( array('menu' => 'Social-Menu' , 'container' => '' , 'items_wrap' => '%3$s' )); ?>
                    <!-- <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li> -->
                </ul>
			</div>
		</div>
	</div>
</footer>

<!--  <a href="#0" class="cd-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>     -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
<script src="<?= get_template_directory_uri();?>/assets/js/jquery.slimNav_sk78.min.js"></script>
<script src="https://rawgit.com/peacepostman/wavify/master/wavify.js"></script>
<script src="https://rawgit.com/peacepostman/wavify/master/jquery.wavify.js"></script>
<script type="text/javascript">
$(document).ready(function() {	
	$('#navigation nav').slimNav_sk78();
	// add-class-on-scroll
	$('#nav-icon0').click(function(){
        $(this).toggleClass('open');
    });

	var owl = $('.cold');
	owl.owlCarousel({
	autoPlay: 3000, //Set AutoPlay to 3 seconds
	items:3,	
	nav:true,
	dots:false,	
	autoplay:true,
	autoplayTimeout:3000,
	autoplayHoverPause:true,
	responsive:{
        0:{
            items:1,
        },
        600:{
            items:2,
        },
        1000:{
            items:3,
        }
    }
	});

	var owl = $('.shows');
	owl.owlCarousel({
	autoPlay: 3000, //Set AutoPlay to 3 seconds
	items:2,	
	nav:true,
	dots:false,	
	loop:true,
	autoplay:true,
	autoplayTimeout:3000,
	autoplayHoverPause:true,
	// responsive:{
 //        0:{
 //            items:2,
 //        },
 //        600:{
 //            items:3,
 //        },
 //        1000:{
 //            items:5,
 //        }
 //    }
	});
    var owl = $('.cuntry');
    owl.owlCarousel({
    autoPlay: 3000, //Set AutoPlay to 3 seconds
    items:1,    
    nav:false,
    dots:true, 
    loop:true,
    autoHeight:true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    // responsive:{
 //        0:{
 //            items:2,
 //        },
 //        600:{
 //            items:3,
 //        },
 //        1000:{
 //            items:5,
 //        }
 //    }
    });


	// Search
	(function ($) {	

	$.fn.searchBox = function(ev) {

		var $searchEl = $('.search-elem');
		var $placeHolder = $('.placeholder');
		var $sField = $('#search-field');

		if ( ev === "open") {
			$searchEl.addClass('search-open')
		};

		if ( ev === 'close') {
			$searchEl.removeClass('search-open'),
			$placeHolder.removeClass('move-up'),
			$sField.val(''); 
		};

		var moveText = function() {
			$placeHolder.addClass('move-up');
		}

		$sField.focus(moveText);
		$placeHolder.on('click', moveText);
		
		$('.submit').prop('disabled', true);
		$('#search-field').keyup(function() {
	        if($(this).val() != '') {
	           $('.submit').prop('disabled', false);
	        }
	    });
	}	

}(jQuery));

$('.search-btn').on('click', function(e) {
	$(this).searchBox('open');
	e.preventDefault();
});

$('.close').on('click', function() {
	$(this).searchBox('close');
});

var wave1 = $('#feel-the-wave').wavify({
  height: 80,
  bones: 4,
  amplitude: 60,
  color: '#B289EF',
  speed: .15
});

var wave2 = $('#feel-the-wave-two').wavify({
  height: 60,
  bones: 3,
  amplitude: 40,
  color: 'rgba(150, 97, 255, .8)',
  speed: .25
});


// Type-js
var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
        }

        setTimeout(function() {
        that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
              new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
       
    };
	
});

//$('header').toggleClass('is_index', /\/index.php$/.test(location.pathname));

</script>
<?php wp_footer(); ?>
</body>
</html>