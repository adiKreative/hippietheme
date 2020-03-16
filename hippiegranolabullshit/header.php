<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php wp_title(''); ?></title>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link href="<?= get_template_directory_uri();?>/assets/css/style.css" rel="stylesheet" type="text/css">
		<link href="<?= get_template_directory_uri();?>/assets/css/responsive.css" rel="stylesheet" type="text/css">
		<link href="<?= get_template_directory_uri();?>/assets/css/slimNav_sk78.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>	
	<div class="search-box search-elem">
	  <button class="close">x</button>
	  <div class="inner row">
	    <div class="col-lg-12">
	   <!--    <label class="placeholder" for="search-field">Search</label>
	      <input type="text" id="search-field">
	      <button class="submit" type="submit">Search</button> -->
	      <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" role="search">	          
					<label class="placeholder" for="search-field">Search</label>
		            <input type="search" name="s" id="search-field" value="<?php echo get_search_query(); ?>">
		            <!--<input type="hidden" name="post_type" value="" />-->
		           <button type="submit" class="submit" disabled>Search</button>    	        
		   </form> 
	    </div>
	  </div>
	 </div>	
		<header>
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-4 logo">
						<a href="<?php echo home_url('/'); ?>">
							<?php
								$custom_logo_id = get_theme_mod( 'custom_logo' );
								$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
								if ( has_custom_logo() ) {
								        echo '<img src="'. esc_url( $logo[0] ) .'">';
								} else {
								        echo '<img src="'. get_template_directory_uri().'/assets/images/logo.png' .'">';
								}
									?>						
							</a>
					</div>
					<div class="col-md-8 menu-sec text-right">
							<div id="navigation">
								<nav>
									<ul>
									<?php wp_nav_menu( array('menu' => 'Main-Menu' , 'container' => '' , 'items_wrap' => '%3$s' )); ?>	
										<!-- <li class="current-menu-item"><a href="index.php">Home</a></li>
										<li><a href="about.php">About us </a></li>
										<li><a href="blog.php">blog</a></li>
										<li><a href="contact.php">contact us</a></li>
										<li><a href="podcast.php">podcast</a></li> -->
									</ul>
								</nav>
							</div>
							<div class="ser-icon search-btn">
								<a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
							</div>
						</div>
				</div>
			</div>		
		</header>