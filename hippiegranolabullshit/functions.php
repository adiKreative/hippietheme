<?php
/**
 * Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

/**
 * Twenty Seventeen only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function twentyseventeen_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'twentyseventeen' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'twentyseventeen' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'twentyseventeen-featured-image', 2000, 1200, true );

	add_image_size( 'twentyseventeen-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus(
		array(
			'top'    => __( 'Top Menu', 'twentyseventeen' ),
			'social' => __( 'Social Links Menu', 'twentyseventeen' ),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support(
		'post-formats',
		array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		)
	);

	// Add theme support for Custom Logo.
	add_theme_support(
		'custom-logo',
		array(
			'width'      => 250,
			'height'     => 250,
			'flex-width' => true,
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
	  */
	add_editor_style( array( 'assets/css/editor-style.css', twentyseventeen_fonts_url() ) );

	// Load regular editor styles into the new block-based editor.
	add_theme_support( 'editor-styles' );

	// Load default block styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets'     => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts'       => array(
			'home',
			'about'            => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact'          => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog'             => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'twentyseventeen' ),
				'file'       => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'twentyseventeen' ),
				'file'       => 'assets/images/sandwich.jpg',
			),
			'image-coffee'   => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'twentyseventeen' ),
				'file'       => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options'     => array(
			'show_on_front'  => 'page',
			'page_on_front'  => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods'  => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus'   => array(
			// Assign a menu to the "top" location.
			'top'    => array(
				'name'  => __( 'Top Menu', 'twentyseventeen' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name'  => __( 'Social Links Menu', 'twentyseventeen' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);

	/**
	 * Filters Twenty Seventeen array of starter content.
	 *
	 * @since Twenty Seventeen 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'twentyseventeen_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'twentyseventeen_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function twentyseventeen_content_width() {

	$content_width = $GLOBALS['content_width'];

	// Get layout.
	$page_layout = get_theme_mod( 'page_layout' );

	// Check if layout is one column.
	if ( 'one-column' === $page_layout ) {
		if ( twentyseventeen_is_frontpage() ) {
			$content_width = 644;
		} elseif ( is_page() ) {
			$content_width = 740;
		}
	}

	// Check if is single post and there is no sidebar.
	if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 740;
	}

	/**
	 * Filter Twenty Seventeen content width of the theme.
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'twentyseventeen_content_width', $content_width );
}
add_action( 'template_redirect', 'twentyseventeen_content_width', 0 );

/**
 * Register custom fonts.
 */
function twentyseventeen_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'twentyseventeen' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function twentyseventeen_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'twentyseventeen-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'twentyseventeen_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentyseventeen_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Blog Sidebar', 'twentyseventeen' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'twentyseventeen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'twentyseventeen' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
			'before_widget' => '<div class="row align-items-center">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 2', 'twentyseventeen' ),
			'id'            => 'sidebar-3',
			'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'twentyseventeen_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function twentyseventeen_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf(
		'<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'twentyseventeen_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Seventeen 1.0
 */
function twentyseventeen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentyseventeen_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function twentyseventeen_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'twentyseventeen_pingback_header' );

/**
 * Display custom color CSS.
 */
function twentyseventeen_colors_css_wrap() {
	if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
		return;
	}

	require_once( get_parent_theme_file_path( '/inc/color-patterns.php' ) );
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );

	$customize_preview_data_hue = '';
	if ( is_customize_preview() ) {
		$customize_preview_data_hue = 'data-hue="' . $hue . '"';
	}
	?>
	<style type="text/css" id="custom-theme-colors" <?php echo $customize_preview_data_hue; ?>>
		<?php echo twentyseventeen_custom_colors_css(); ?>
	</style>
	<?php
}
add_action( 'wp_head', 'twentyseventeen_colors_css_wrap' );

/**
 * Enqueues scripts and styles.
 */
function twentyseventeen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentyseventeen-fonts', twentyseventeen_fonts_url(), array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'twentyseventeen-style', get_stylesheet_uri() );

	// Theme block stylesheet.
	wp_enqueue_style( 'twentyseventeen-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'twentyseventeen-style' ), '1.1' );

	// Load the dark colorscheme.
	if ( 'dark' === get_theme_mod( 'colorscheme', 'light' ) || is_customize_preview() ) {
		wp_enqueue_style( 'twentyseventeen-colors-dark', get_theme_file_uri( '/assets/css/colors-dark.css' ), array( 'twentyseventeen-style' ), '1.0' );
	}

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'twentyseventeen-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'twentyseventeen-style' ), '1.0' );
		wp_style_add_data( 'twentyseventeen-ie9', 'conditional', 'IE 9' );
	}

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'twentyseventeen-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'twentyseventeen-style' ), '1.0' );
	wp_style_add_data( 'twentyseventeen-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'twentyseventeen-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$twentyseventeen_l10n = array(
		'quote' => twentyseventeen_get_svg( array( 'icon' => 'quote-right' ) ),
	);

	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'twentyseventeen-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );
		$twentyseventeen_l10n['expand']   = __( 'Expand child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['collapse'] = __( 'Collapse child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['icon']     = twentyseventeen_get_svg(
			array(
				'icon'     => 'angle-down',
				'fallback' => true,
			)
		);
	}

	wp_enqueue_script( 'twentyseventeen-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );

	wp_localize_script( 'twentyseventeen-skip-link-focus-fix', 'twentyseventeenScreenReaderText', $twentyseventeen_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'twentyseventeen_scripts' );

/**
 * Enqueues styles for the block-based editor.
 *
 * @since Twenty Seventeen 1.8
 */
function twentyseventeen_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'twentyseventeen-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks.css' ), array(), '1.1' );
	// Add custom fonts.
	wp_enqueue_style( 'twentyseventeen-fonts', twentyseventeen_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'twentyseventeen_block_editor_styles' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentyseventeen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			$sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentyseventeen_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function twentyseventeen_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'twentyseventeen_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function twentyseventeen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentyseventeen_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function twentyseventeen_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'twentyseventeen_front_page_template' );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Twenty Seventeen 1.4
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function twentyseventeen_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'twentyseventeen_widget_tag_cloud_args' );

/**
 * Get unique ID.
 *
 * This is a PHP implementation of Underscore's uniqueId method. A static variable
 * contains an integer that is incremented with each call. This number is returned
 * with the optional prefix. As such the returned value is not universally unique,
 * but it is unique across the life of the PHP process.
 *
 * @since Twenty Seventeen 2.0
 * @see wp_unique_id() Themes requiring WordPress 5.0.3 and greater should use this instead.
 *
 * @staticvar int $id_counter
 *
 * @param string $prefix Prefix for the returned ID.
 * @return string Unique ID.
 */
function twentyseventeen_unique_id( $prefix = '' ) {
	static $id_counter = 0;
	if ( function_exists( 'wp_unique_id' ) ) {
		return wp_unique_id( $prefix );
	}
	return $prefix . (string) ++$id_counter;
}

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );


/*----my functions---*/

//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_topics_hierarchical_taxonomy', 0 );
 
//create a custom taxonomy name it topics for your posts
 
function create_topics_hierarchical_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'Topics', 'taxonomy general name' ),
    'singular_name' => _x( 'Topic', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Topics' ),
    'all_items' => __( 'All Topics' ),
    'parent_item' => __( 'Parent Topic' ),
    'parent_item_colon' => __( 'Parent Topic:' ),
    'edit_item' => __( 'Edit Topic' ), 
    'update_item' => __( 'Update Topic' ),
    'add_new_item' => __( 'Add New Topic' ),
    'new_item_name' => __( 'New Topic Name' ),
    'menu_name' => __( 'Topics' ),
  );    
 
// Now register the taxonomy
 
  register_taxonomy('topics',array('post'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'topic' ),
  ));

  // Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels_2 = array(
    'name' => _x( 'Side Banners', 'taxonomy general name' ),
    'singular_name' => _x( 'Side Banner', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Side Banners' ),
    'all_items' => __( 'All Side Banners' ),
    'parent_item' => __( 'Parent Side Banner' ),
    'parent_item_colon' => __( 'Parent Side Banner:' ),
    'edit_item' => __( 'Edit Side Banner' ), 
    'update_item' => __( 'Update Side Banner' ),
    'add_new_item' => __( 'Add New Side Banner' ),
    'new_item_name' => __( 'New Side Banner Name' ),
    'menu_name' => __( 'Side Banners' ),
  );    
 
// Now register the taxonomy
 
  register_taxonomy('sidebanner',array('post'), array(
    'hierarchical' => true,
    'labels' => $labels_2,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'sidebanner' ),
  ));
 
}

/*--- modify gallery widget---*/
add_filter( 'post_gallery', 'gallery_custom', 10, 2 );
function gallery_custom( $output, $attr ) {

    if ( isset($attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( ! $attr['orderby'] ) {
            unset( $attr['orderby'] );
        }
    }
    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 3,
        'size' => 'thumbnail',
        'include' => '',
        'exclude' => ''
    ), $attr ));

    $id = intval( $id );
    if ('RAND' == $order ) $orderby = 'none';

    if ( ! empty( $include ) ) {
        $include = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    }
    elseif ( !empty($exclude) ) {
            $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
            $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
            $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
        }

    if ( empty( $attachments ) ) return '';


 //    // Here's your actual output, you may customize it to your need
 //    $output .= "<div class='gallery galleryid-$columns gallery-columns-$columns gallery-size-$size'>";

    // Now you loop through each attachment
    foreach ( $attachments as $id => $attachment ) {
        // Fetch the thumbnail (or full image, it's up to you)

        $img = wp_get_attachment_image_src( $id, $size );

        $output .= '<div class="col">';
        $output .= '<img src="' . $img[0] . '" alt="" />';
        $output .= '</div>';
        // if ( $captiontag && trim($attachment->post_excerpt) ) {
        //     $output .= "
        //         <{$captiontag} class='gallery-caption'>
        //         " . wptexturize($attachment->post_excerpt) . "
        //         </{$captiontag}>";
        // }
        // $output .= '</figure>';
    }

   // $output .= '</div>';

    return $output;
}

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }
    else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

add_action( 'widgets_init', 'extra_widget', 10 );
function extra_widget(){
	register_sidebar(
		array(
			'name'          => __( 'Sidebar 4', 'twentyseventeen' ),
			'id'            => 'sidebar-4',
			'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
			'before_widget' => '<div class="sec1">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Sidebar 5', 'twentyseventeen' ),
			'id'            => 'sidebar-5',
			'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('wp_enqueue_scripts', 'my_enqueue_assets');
function my_enqueue_assets() {
global $wp_query;
  if(is_category('blog') || is_category('podcast') || is_date() || is_front_page() || is_archive() || is_single() || is_search()){
    wp_enqueue_script( 'ajax-pagination',  get_template_directory_uri() . '/assets/js/ajax-pagination.js', array( 'jquery' ), '1.0', true );
    wp_localize_script( 'ajax-pagination', 'ajaxpagination', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'query_vars' => json_encode( $wp_query->query )
		));
	}
}


add_action( 'wp_ajax_nopriv_ajax_pagination', 'my_ajax_pagination' );
add_action( 'wp_ajax_ajax_pagination', 'my_ajax_pagination' );

function my_ajax_pagination() {

	$query_vars = json_decode( stripslashes( $_POST['query_vars'] ), true );
	
	$query_vars['post_type'] = 'post';
    $query_vars['category_name'] = 'blog';
    $query_vars['paged'] = $_POST['page'];
    $query_vars['post_status'] = 'publish';
    $query_vars['posts_per_page'] = 6;
    $query_vars['meta_key'] = 'post_views_count';
    $query_vars['orderby'] = 'date meta_value_num';
    $query_vars['order'] = 'DESC';
	 
    $posts = new WP_Query( $query_vars );    
    $GLOBALS['wp_query'] = $posts;

      if( ! $posts->have_posts() ) { 
        get_template_part( 'template-parts/post/content', 'none' );
    }
    else {
        while ( $posts->have_posts() ) { 
            $posts->the_post(); ?>
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
            <!--     <div class="author">
                    <i class="fa fa-user-o" aria-hidden="true"></i> By <?php the_author(); ?> | <?php echo get_comments_number(); ?> Comments
                </div> -->
                <p><?php echo substr(strip_tags(get_the_content()),0,100); ?></p>
                <a href="<?php the_permalink(); ?>" class="more">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>
      <?php  } ?>
<!-- 
       <div class="col-lg-12 text-center">
            <ul class="page-nav">  -->
            	<?php 
            		/*	$total_pages =  $posts->max_num_pages;
                         if($total_pages > 1) {
            	  		 echo ' <li><a href="'.get_pagenum_link(1).'"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></li>';
                          for ($i=1; $i <= $total_pages; $i++){           
                         
                         		echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';

                               }
                            echo ' <li><a href="'.get_pagenum_link($total_pages).'"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>';
                            } */
                        // echo paginate_links(array(
                          //             'total' => $posts->max_num_pages,
                          //             'prev_text'    => __('<li><i class="fa fa-long-arrow-left" aria-hidden="true"></i></li>'),
                          //             'next_text'    => __('<li><i class="fa fa-long-arrow-right" aria-hidden="true"></i></li>'),
                          //           )); 
                    ?>
                  <!-- 	
             </ul>
         </div> -->   
         		<?php    
                    $total_pages =  $posts->max_num_pages;
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
                  
                            echo '<div class="col-lg-12 text-center"><ul class="page-nav blog-nav">';
                            foreach ( $pages as $page ) {
                                    echo "<li>$page</li>";
                            }
                           echo '</ul></div>';
                            }

                         /*       if ($total_pages > 1){
                                    $current_page = max(1, get_query_var('paged'));

                                    echo paginate_links(array(
                                        'base' => get_pagenum_link(1) . '%_%',
                                        'format' => '/page/%#%',
                                        'current' => $current_page,
                                        'total' => $total_pages,
                                        'prev_text'    => __('<i class="fa fa-long-arrow-left" aria-hidden="true"></i>'),
                                        'next_text'    => __('<i class="fa fa-long-arrow-right" aria-hidden="true"></i>'),
                                    ));
                                }*/
                     ?>
       	
 <?php   }

    die();
}

/*--- Search Page ---*/
/*add_action( 'wp_ajax_nopriv_ajax_pagination_se', 'my_ajax_pagination_se' );
add_action( 'wp_ajax_ajax_pagination_se', 'my_ajax_pagination_se' );

function my_ajax_pagination_se() {

	$query_vars = json_decode( stripslashes( $_POST['query_vars'] ), true );
	
	$query_vars['post_type'] = 'post';
	$query_vars['paged'] = $_POST['page'];
	$query_vars['posts_per_page'] = 6;
	$query_vars['orderby'] = 'date';
	$query_vars['order'] = 'DESC';
	 
    $posts = new WP_Query( $query_vars );    
  
    $GLOBALS['wp_query'] = $posts;

      if( ! $posts->have_posts() ) { 
        get_template_part( 'template-parts/post/content', 'none' );
    }
    else {
        while ( $posts->have_posts() ) { 
            $posts->the_post(); ?>
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
                <div class="author">
                    <i class="fa fa-user-o" aria-hidden="true"></i> By <?php the_author(); ?> | <?php echo get_comments_number(); ?> Comments
                </div>
                <p><?php echo substr(strip_tags(get_the_content()),0,100); ?></p>
                <a href="<?php the_permalink(); ?>" class="more">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>
      <?php  } ?>
  
         		<?php    
                    $total_pages =  $posts->max_num_pages;
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
                  
                            echo '<div class="col-lg-12 text-center"><ul class="page-nav" id="blog-nav-se">';
                            foreach ( $pages as $page ) {
                                    echo "<li>$page</li>";
                            }
                           echo '</ul></div>';
                            }
                     ?>
       	
 <?php   }

    die();
}*/

/*----- date page ----*/
add_action( 'wp_ajax_nopriv_ajax_pagination_date', 'my_ajax_pagination_date' );
add_action( 'wp_ajax_ajax_pagination_date', 'my_ajax_pagination_date' );

function my_ajax_pagination_date() {

	$query_vars = json_decode( stripslashes( $_POST['query_vars'] ), true );

	$query_vars['post_type'] = 'post';
    $query_vars['category_name'] = 'blog';
    $query_vars['paged'] = $_POST['page'];
    $query_vars['post_status'] = 'publish';
    $query_vars['posts_per_page'] = 6;
    $query_vars['orderby'] = 'date';
    $query_vars['order'] = 'DESC';
     
    $posts = new WP_Query( $query_vars );  

    $GLOBALS['wp_query'] = $posts;

      if( ! $posts->have_posts() ) { 
        get_template_part( 'template-parts/post/content', 'none' );
    }
    else {
        while ( $posts->have_posts() ) { 
            $posts->the_post(); ?>
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
               <!--  <div class="author">
                    <i class="fa fa-user-o" aria-hidden="true"></i> By <?php the_author(); ?> | <?php echo get_comments_number(); ?> Comments
                </div> -->
                <p><?php echo substr(strip_tags(get_the_content()),0,100); ?></p>
                <a href="<?php the_permalink(); ?>" class="more">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>
      <?php  }
   
                    $total_pages =  $posts->max_num_pages;
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
       	
 <?php   }

    die();
}

/*----- topic taxonomy page ----*/
add_action( 'wp_ajax_nopriv_ajax_pagination_topic', 'my_ajax_pagination_topic' );
add_action( 'wp_ajax_ajax_pagination_topic', 'my_ajax_pagination_topic' );

function my_ajax_pagination_topic() {

	$query_vars = json_decode( stripslashes( $_POST['query_vars'] ), true );
	$query_vars['post_type'] = 'post';
    $query_vars['paged'] = $_POST['page'];
    $query_vars['post_status'] = 'publish';
    $query_vars['posts_per_page'] = 6;
    $query_vars['orderby'] = 'date';
    $query_vars['order'] = 'DESC';
 
    $posts = new WP_Query( $query_vars );  
    $GLOBALS['wp_query'] = $posts;

      if( ! $posts->have_posts() ) { 
        get_template_part( 'template-parts/post/content', 'none' );
    }
    else {
        while ( $posts->have_posts() ) { 
            $posts->the_post(); ?>
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
               <!--  <div class="author">
                    <i class="fa fa-user-o" aria-hidden="true"></i> By <?php the_author(); ?> | <?php echo get_comments_number(); ?> Comments
                </div> -->
                <p><?php echo substr(strip_tags(get_the_content()),0,100); ?></p>
                <a href="<?php the_permalink(); ?>" class="more">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>
      <?php  }
   
                    $total_pages =  $posts->max_num_pages;
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
                  
                            echo '<div class="col-lg-12 text-center"><ul class="page-nav" id="topic-nav">';
                            foreach ( $pages as $page ) {
                                    echo "<li>$page</li>";
                            }
                           echo '</ul></div>';
                            }
                     ?>
       	
 <?php   }

    die();
}


/*----- sidebanner taxonomy page ----*/
add_action( 'wp_ajax_nopriv_ajax_pagination_sideban', 'my_ajax_pagination_sideban' );
add_action( 'wp_ajax_ajax_pagination_sideban', 'my_ajax_pagination_sideban' );

function my_ajax_pagination_sideban() {

	$query_vars = json_decode( stripslashes( $_POST['query_vars'] ), true );
	$query_vars['post_type'] = 'post';
    $query_vars['paged'] = $_POST['page'];
    $query_vars['post_status'] = 'publish';
    $query_vars['posts_per_page'] = 6;
    $query_vars['orderby'] = 'date';
    $query_vars['order'] = 'DESC';
 
    $posts = new WP_Query( $query_vars );  
    $GLOBALS['wp_query'] = $posts;

      if( ! $posts->have_posts() ) { 
        get_template_part( 'template-parts/post/content', 'none' );
    }
    else {
        while ( $posts->have_posts() ) { 
            $posts->the_post(); ?>
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
               <!--  <div class="author">
                    <i class="fa fa-user-o" aria-hidden="true"></i> By <?php the_author(); ?> | <?php echo get_comments_number(); ?> Comments
                </div> -->
                <p><?php echo substr(strip_tags(get_the_content()),0,100); ?></p>
                <a href="<?php the_permalink(); ?>" class="more">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>
      <?php  }
   
                    $total_pages =  $posts->max_num_pages;
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
                  
                            echo '<div class="col-lg-12 text-center"><ul class="page-nav" id="sideban-nav">';
                            foreach ( $pages as $page ) {
                                    echo "<li>$page</li>";
                            }
                           echo '</ul></div>';
                            }
                     ?>
       	
 <?php   }

    die();
}

/*----- single page testing purpose not needed for now ----*/
// add_action( 'wp_ajax_nopriv_ajax_pagination_singlepage', 'my_ajax_pagination_singlepage' );
// add_action( 'wp_ajax_ajax_pagination_singlepage', 'my_ajax_pagination_singlepage' );

function my_ajax_pagination_singlepage() {

	$post_id =  $_POST['postId'];
    if( isset( $post_id ) ){
		$post = get_post( $post_id );
	}
      if( ! $post ) { 
        get_template_part( 'template-parts/post/content', 'none' );
    }
    else { 
    	$author_id = $post->post_author;
    	?>
        <h3><?php echo $post->post_title; ?> </h3>
        <div class="date">
            <?php echo get_the_date("d"); ?> <span><?php echo get_the_date("M Y");?></span>
        </div>
        <div class="author">
            <i class="fa fa-user-o" aria-hidden="true"></i> By <?php the_author_meta( 'user_nicename' , $author_id );  ?> | <?php echo get_comments_number(); ?> Comments
        </div>
        <?php if(has_post_thumbnail()){ 
    	$image_url = wp_get_attachment_url( get_post_thumbnail_id($post_id), 'full' ); 	?>
        <img src="<?php echo $image_url; ?>" alt="">
 	   <?php  } ?>
		<?php echo $post->post_content; ?>
      <?php  
   
                  
            $next_post = get_next_post();         
            $prev_post = get_previous_post();
            // Check if the post exists
        ?>
        <div class="row">
           <?php if ( $prev_post ) { ?>
                <div class="col-lg-6 ajax-link">
                    <a href="#" class="pre" data-id="<?php echo $prev_post->ID; ?>"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></div><?php
            }
            if ( $next_post ) { ?>
                <div class="col-lg-6 text-right ajax-link">
                    <a href="#" class="next" data-id="<?php echo $next_post->ID; ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div><?php
            }

            ?>        
        </div>
	<?php
	  }
    die();
}

/*--- podcast page ---*/
add_action( 'wp_ajax_nopriv_ajax_pagination_podcast', 'my_ajax_pagination_podcast' );
add_action( 'wp_ajax_ajax_pagination_podcast', 'my_ajax_pagination_podcast' );

function my_ajax_pagination_podcast() {

	$query_vars = json_decode( stripslashes( $_POST['query_vars'] ), true );

	$query_vars['post_type'] = 'post';
    $query_vars['category_name'] = 'podcast';
    $query_vars['paged'] = $_POST['page'];
    $query_vars['post_status'] = 'publish';
    $query_vars['posts_per_page'] = 6;
    $query_vars['orderby'] = 'date';
    $query_vars['order'] = 'DESC';
     
    $posts = new WP_Query( $query_vars );    
 
    $GLOBALS['wp_query'] = $posts;

      if( ! $posts->have_posts() ) { 
        get_template_part( 'template-parts/post/content', 'none' );
    }
    else {?>
    	 <div class="col-lg-12">
            <h2>LATEST PODCAST</h2>
         </div> 
    	 
        <?php
        while ( $posts->have_posts() ) { 
            $posts->the_post(); ?>
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
                        <p><?php echo substr(strip_tags(get_the_content()),0,100); ?></p>
                        <a href="<?php the_permalink(); ?>" class="more">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
      <?php  } ?>

   
            	<?php 
                    $total_pages =  $posts->max_num_pages;
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
 <?php   }

    die();
}

/*--- podcast sub page ---*/
add_action( 'wp_ajax_nopriv_ajax_pagination_podcast_sub', 'my_ajax_pagination_podcast_sub' );
add_action( 'wp_ajax_ajax_pagination_podcast_sub', 'my_ajax_pagination_podcast_sub' );

function my_ajax_pagination_podcast_sub() {

	$query_vars = json_decode( stripslashes( $_POST['query_vars'] ), true );

	$query_vars['post_type'] = 'post';
    $query_vars['paged'] = $_POST['page'];
    $query_vars['post_status'] = 'publish';
    $query_vars['posts_per_page'] = 2;
    $query_vars['orderby'] = 'date';
    $query_vars['order'] = 'DESC';
    // $query_vars['tax_query'] = array(
    //                                  'relation' => 'OR',
    //                                    array(
    //                                       'taxonomy' => 'category',
    //                                       'field' => 'term_id',
    //                                       'terms' => $_POST['term_id']
    //                                    ),
    //                                    array(
    //                                         'taxonomy' => 'post_tag',
    //                                         'field'    => 'term_id',
    //                                         'terms'    => $_POST['term_id']
    //                                     ),
    //                                   );
     
    $posts = new WP_Query( $query_vars );   
 
    $GLOBALS['wp_query'] = $posts;

    if( ! $posts->have_posts() ) { 
        get_template_part( 'template-parts/post/content', 'none' );
    }
    else {?>
    	<div class="col-lg-12">
            <h2>Subcategory Or Tag Posts </h2>
        </div>
        <?php
        while ( $posts->have_posts() ) { 
            $posts->the_post(); ?>
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
                    <!--     <h5><?php the_author(); ?></h5> -->
                        <p><?php echo substr(strip_tags(get_the_content()),0,100); ?></p>
                        <a href="<?php the_permalink(); ?>" class="more">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
      <?php  } 


                    $total_pages =  $posts->max_num_pages;
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
                  
                            echo '<div class="col-lg-12 text-center"><ul class="page-nav" id="pod-nav-sub">';
                            foreach ( $pages as $page ) {
                                    echo "<li>$page</li>";
                            }
                           echo '</ul></div>';
                        }                                
		  }

    die();
}


function only_show_blog_posts( $query ) {
   // Only modify the main loop query
   // on the front end
   if ( $query->is_main_query() && ! is_admin() ) {
      // Only modify date-based archives
      if ( is_date() ) {
         $query->set( 'cat', '64' );
      }
   }
}
add_action( 'pre_get_posts', 'only_show_blog_posts' );



function custom_archive_by_category_join( $x ) {
    global $wpdb;
    return $x . " INNER JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id) INNER JOIN $wpdb->term_taxonomy ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)";
}
 
function custom_archive_by_category_where($x) {
    global $wpdb;

    $current_term = get_term_by('slug', 'blog', 'category');
	
    if (is_wp_error($current_term) ) {
        return $x;
    }

    $current_term_id = $current_term->term_id;
    return $x . " AND $wpdb->term_taxonomy.taxonomy = 'category' AND $wpdb->term_taxonomy.term_id IN ($current_term_id)";
}


/*// define the navigation_markup_template callback 
function filter_navigation_markup_template( $template, $class ) { 
    // make filter magic happen here... 
    $template = '
    <div class="row"> 
        %3$s
    </div>'; 
    return $template;
};         
add_filter( 'navigation_markup_template', 'filter_navigation_markup_template', 10, 2 );*/

// filter for next and previous post link
function posts_link_next_class($format){
     $format = str_replace('href=', 'class="next" href=', $format);
     return $format;
}
add_filter('next_post_link', 'posts_link_next_class');

function posts_link_prev_class($format) {
     $format = str_replace('href=', 'class="pre" href=', $format);
     return $format;
}
add_filter('previous_post_link', 'posts_link_prev_class');

//---------- Remove auto <p> Tag From Contact Form 7 ------------
add_filter('wpcf7_autop_or_not', '__return_false');