<?php
/**
 * Pet Animal Store functions and definitions
 *
 * @package Pet Animal Store
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

/* Theme Setup */
if ( ! function_exists( 'pet_animal_store_setup' ) ) :

function pet_animal_store_setup() {

	$GLOBALS['content_width'] = apply_filters( 'pet_animal_store_content_width', 640 );

	load_theme_textdomain( 'pet-animal-store', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('pet-animal-store-homepage-thumb',240,145,true);
	
       register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'pet-animal-store' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	/* Selective refresh for widgets */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/* Starter Content */
	add_theme_support( 'starter-content', array(
		'widgets' => array(
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),
			'sidebar-2' => array(
				'text_business_info',
			),
			'sidebar-3' => array(
				'text_about',
				'search',
			),
			'footer-1' => array(
				'text_about',
			),
			'footer-2' => array(
				'archives',
			),
			'footer-3' => array(
				'text_business_info',
			),
			'footer-4' => array(
				'search',
			),
		),

		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
		),

		'theme_mods' => array(
			'pet_animal_store_mail' => __('example@gmail.com', 'pet-animal-store' ),
			'pet_animal_store_call' => __('+91 9874561230', 'pet-animal-store' ),
			'pet_animal_store_facebook_url' => 'www.facebook.com',
			'pet_animal_store_twitter_url' => 'www.twitter.com',
			'pet_animal_store_instagram_url' => 'www.instagram.com',
			'pet_animal_store_linkedin_url' => 'www.linkedin.com',
			'pet_animal_store_footer_copy' => __('By ThemesCaliber', 'pet-animal-store' )
		),

		'nav_menus' => array(
			'primary' => array(
				'name' => __( 'Primary Menu', 'pet-animal-store' ),
				'items' => array(
					'page_home',
					'page_about',
					'page_blog',
					'page_contact',
				),
			),
		),
    ));

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', pet_animal_store_font_url() ) );

	// Dashboard Theme Notification
	global $pagenow;
	
	if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'pet_animal_store_activation_notice' );
	}
}
endif;
add_action( 'after_setup_theme', 'pet_animal_store_setup' );

// Dashboard Theme Notification
function pet_animal_store_activation_notice() {
	echo '<div class="welcome-notice notice notice-success is-dismissible">';
		echo '<h2>'. esc_html__( 'Thank You!!!!!', 'pet-animal-store' ) .'</h2>';
		echo '<p>'. esc_html__( 'Much grateful to you for choosing our pets theme from themescaliber. we praise you for opting our services over others. we are obliged to invite you on our welcome page to render you with our outstanding services.', 'pet-animal-store' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=pet_animal_store_guide' ) ) .'" class="button button-primary">'. esc_html__( 'Click Here...', 'pet-animal-store' ) .'</a></p>';
	echo '</div>';
}

/* Theme Widgets Setup */
function pet_animal_store_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'pet-animal-store' ),
		'description'   => __( 'Appears on blog page sidebar', 'pet-animal-store' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s mb-4 p-2">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title mb-3 p-3">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'pet-animal-store' ),
		'description'   => __( 'Appears on page sidebar', 'pet-animal-store' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s mb-4 p-2">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title mb-3 p-3">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Thid Column Sidebar', 'pet-animal-store' ),
		'description'   => __( 'Appears on page sidebar', 'pet-animal-store' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s mb-4 p-2">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title mb-3 p-3">',
		'after_title'   => '</h3>',
	) );

	//Footer widget areas
	$pet_animal_store_widget_areas = get_theme_mod('pet_animal_store_footer_widget_layout', '4');
	for ($i=1; $i<=$pet_animal_store_widget_areas; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer Nav ', 'pet-animal-store' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s py-2">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title mb-2">',
			'after_title'   => '</h3>',
		) );
	}
}

add_action( 'widgets_init', 'pet_animal_store_widgets_init' );

/* Theme Font URL */
function pet_animal_store_font_url() {
	$font_url = '';
	$font_family = array();
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Roboto:400,700';
	$font_family[] = 'Roboto Condensed:400,700';
	$font_family[] = 'Open Sans';
	$font_family[] = 'Overpass';
	$font_family[] = 'Montserrat:300,400,600,700,800,900';
	$font_family[] = 'Playball:300,400,600,700,800,900';
	$font_family[] = 'Alegreya:300,400,600,700,800,900';
	$font_family[] = 'Julius Sans One';
	$font_family[] = 'Arsenal';
	$font_family[] = 'Slabo';
	$font_family[] = 'Lato';
	$font_family[] = 'Overpass Mono';
	$font_family[] = 'Source Sans Pro';
	$font_family[] = 'Raleway';
	$font_family[] = 'Merriweather';
	$font_family[] = 'Droid Sans';
	$font_family[] = 'Rubik';
	$font_family[] = 'Lora';
	$font_family[] = 'Ubuntu';
	$font_family[] = 'Cabin';
	$font_family[] = 'Arimo';
	$font_family[] = 'Playfair Display';
	$font_family[] = 'Quicksand';
	$font_family[] = 'Padauk';
	$font_family[] = 'Muli';
	$font_family[] = 'Inconsolata';
	$font_family[] = 'Bitter';
	$font_family[] = 'Pacifico';
	$font_family[] = 'Indie Flower';
	$font_family[] = 'VT323';
	$font_family[] = 'Dosis';
	$font_family[] = 'Frank Ruhl Libre';
	$font_family[] = 'Fjalla One';
	$font_family[] = 'Oxygen';
	$font_family[] = 'Arvo';
	$font_family[] = 'Noto Serif';
	$font_family[] = 'Lobster';
	$font_family[] = 'Crimson Text';
	$font_family[] = 'Yanone Kaffeesatz';
	$font_family[] = 'Anton';
	$font_family[] = 'Libre Baskerville';
	$font_family[] = 'Bree Serif';
	$font_family[] = 'Gloria Hallelujah';
	$font_family[] = 'Josefin Sans';
	$font_family[] = 'Abril Fatface';
	$font_family[] = 'Varela Round';
	$font_family[] = 'Vampiro One';
	$font_family[] = 'Shadows Into Light';
	$font_family[] = 'Cuprum';
	$font_family[] = 'Rokkitt';
	$font_family[] = 'Vollkorn';
	$font_family[] = 'Francois One';
	$font_family[] = 'Orbitron';
	$font_family[] = 'Patua One';
	$font_family[] = 'Acme';
	$font_family[] = 'Satisfy';
	$font_family[] = 'Josefin Slab';
	$font_family[] = 'Quattrocento Sans';
	$font_family[] = 'Architects Daughter';
	$font_family[] = 'Russo One';
	$font_family[] = 'Monda';
	$font_family[] = 'Righteous';
	$font_family[] = 'Lobster Two';
	$font_family[] = 'Hammersmith One';
	$font_family[] = 'Courgette';
	$font_family[] = 'Permanent Marker';
	$font_family[] = 'Cherry Swash';
	$font_family[] = 'Cormorant Garamond';
	$font_family[] = 'Poiret One';
	$font_family[] = 'BenchNine';
	$font_family[] = 'Economica';
	$font_family[] = 'Handlee';
	$font_family[] = 'Cardo';
	$font_family[] = 'Alfa Slab One';
	$font_family[] = 'Averia Serif Libre';
	$font_family[] = 'Cookie';
	$font_family[] = 'Chewy';
	$font_family[] = 'Great Vibes';
	$font_family[] = 'Coming Soon';
	$font_family[] = 'Philosopher';
	$font_family[] = 'Days One';
	$font_family[] = 'Kanit';
	$font_family[] = 'Shrikhand';
	$font_family[] = 'Tangerine';
	$font_family[] = 'IM Fell English SC';
	$font_family[] = 'Boogaloo';
	$font_family[] = 'Bangers';
	$font_family[] = 'Fredoka One';
	$font_family[] = 'Bad Script';
	$font_family[] = 'Volkhov';
	$font_family[] = 'Shadows Into Light Two';
	$font_family[] = 'Marck Script';
	$font_family[] = 'Sacramento';
	$font_family[] = 'Unica One';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}
	
/* Theme enqueue scripts */
function pet_animal_store_scripts() {
	wp_enqueue_style( 'pet-animal-store-font', pet_animal_store_font_url(), array() );	
	wp_enqueue_style( 'bootstrap', esc_url(get_template_directory_uri()).'/css/bootstrap.css' );
	wp_enqueue_style( 'pet-animal-store-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'pet-animal-store-style', 'rtl', 'replace' );
	wp_enqueue_style( 'font-awesome', esc_url(get_template_directory_uri()).'/css/fontawesome-all.css' );
	wp_enqueue_style( 'pet-animal-store-block-style', esc_url(get_template_directory_uri()).'/css/block-style.css' );	

	// Paragraph
	    $pet_animal_store_paragraph_color = get_theme_mod('pet_animal_store_paragraph_color', '');
	    $pet_animal_store_paragraph_font_family = get_theme_mod('pet_animal_store_paragraph_font_family', '');
	    $pet_animal_store_paragraph_font_size = get_theme_mod('pet_animal_store_paragraph_font_size', '');
	// "a" tag
		$pet_animal_store_atag_color = get_theme_mod('pet_animal_store_atag_color', '');
	    $pet_animal_store_atag_font_family = get_theme_mod('pet_animal_store_atag_font_family', '');
	// "li" tag
		$pet_animal_store_li_color = get_theme_mod('pet_animal_store_li_color', '');
	    $pet_animal_store_li_font_family = get_theme_mod('pet_animal_store_li_font_family', '');
	// H1
		$pet_animal_store_h1_color = get_theme_mod('pet_animal_store_h1_color', '');
	    $pet_animal_store_h1_font_family = get_theme_mod('pet_animal_store_h1_font_family', '');
	    $pet_animal_store_h1_font_size = get_theme_mod('pet_animal_store_h1_font_size', '');
	// H2
		$pet_animal_store_h2_color = get_theme_mod('pet_animal_store_h2_color', '');
	    $pet_animal_store_h2_font_family = get_theme_mod('pet_animal_store_h2_font_family', '');
	    $pet_animal_store_h2_font_size = get_theme_mod('pet_animal_store_h2_font_size', '');
	// H3
		$pet_animal_store_h3_color = get_theme_mod('pet_animal_store_h3_color', '');
	    $pet_animal_store_h3_font_family = get_theme_mod('pet_animal_store_h3_font_family', '');
	    $pet_animal_store_h3_font_size = get_theme_mod('pet_animal_store_h3_font_size', '');
	// H4
		$pet_animal_store_h4_color = get_theme_mod('pet_animal_store_h4_color', '');
	    $pet_animal_store_h4_font_family = get_theme_mod('pet_animal_store_h4_font_family', '');
	    $pet_animal_store_h4_font_size = get_theme_mod('pet_animal_store_h4_font_size', '');
	// H5
		$pet_animal_store_h5_color = get_theme_mod('pet_animal_store_h5_color', '');
	    $pet_animal_store_h5_font_family = get_theme_mod('pet_animal_store_h5_font_family', '');
	    $pet_animal_store_h5_font_size = get_theme_mod('pet_animal_store_h5_font_size', '');
	// H6
		$pet_animal_store_h6_color = get_theme_mod('pet_animal_store_h6_color', '');
	    $pet_animal_store_h6_font_family = get_theme_mod('pet_animal_store_h6_font_family', '');
	    $pet_animal_store_h6_font_size = get_theme_mod('pet_animal_store_h6_font_size', '');
	    $pet_animal_store_theme_color_first = get_theme_mod('pet_animal_store_theme_color_first', '');
	    $pet_animal_store_theme_color_second = get_theme_mod('pet_animal_store_theme_color_second', '');

		$pet_animal_store_custom_css ='
			p,span{
			    color:'.esc_attr($pet_animal_store_paragraph_color).'!important;
			    font-family: '.esc_attr($pet_animal_store_paragraph_font_family).';
			    font-size: '.esc_attr($pet_animal_store_paragraph_font_size).';
			}
			a{
			    color:'.esc_attr($pet_animal_store_atag_color).'!important;
			    font-family: '.esc_attr($pet_animal_store_atag_font_family).';
			}
			li{
			    color:'.esc_attr($pet_animal_store_li_color).'!important;
			    font-family: '.esc_attr($pet_animal_store_li_font_family).';
			}
			h1{
			    color:'.esc_attr($pet_animal_store_h1_color).'!important;
			    font-family: '.esc_attr($pet_animal_store_h1_font_family).'!important;
			    font-size: '.esc_attr($pet_animal_store_h1_font_size).'!important;
			}
			h2{
			    color:'.esc_attr($pet_animal_store_h2_color).'!important;
			    font-family: '.esc_attr($pet_animal_store_h2_font_family).'!important;
			    font-size: '.esc_attr($pet_animal_store_h2_font_size).'!important;
			}
			h3{
			    color:'.esc_attr($pet_animal_store_h3_color).'!important;
			    font-family: '.esc_attr($pet_animal_store_h3_font_family).'!important;
			    font-size: '.esc_attr($pet_animal_store_h3_font_size).'!important;
			}
			h4{
			    color:'.esc_attr($pet_animal_store_h4_color).'!important;
			    font-family: '.esc_attr($pet_animal_store_h4_font_family).'!important;
			    font-size: '.esc_attr($pet_animal_store_h4_font_size).'!important;
			}
			h5{
			    color:'.esc_attr($pet_animal_store_h5_color).'!important;
			    font-family: '.esc_attr($pet_animal_store_h5_font_family).'!important;
			    font-size: '.esc_attr($pet_animal_store_h5_font_size).'!important;
			}
			h6{
			    color:'.esc_attr($pet_animal_store_h6_color).'!important;
			    font-family: '.esc_attr($pet_animal_store_h6_font_family).'!important;
			    font-size: '.esc_attr($pet_animal_store_h6_font_size).'!important;
			}
			
			@media screen and (max-width: 1000px){
				.primary-navigation ul ul a:hover{
				 color:'.esc_attr($pet_animal_store_theme_color_first).'!important;
				}
				.toggle-menu i,.sidebar .closebtn,.primary-navigation ul li a{
					color:'.esc_attr($pet_animal_store_theme_color_second).';
				}

				.primary-navigation ul ul a:hover{
					background-color:'.esc_attr($pet_animal_store_theme_color_second).'!important;
				}
			}
			#header .menubg,.toggle-menu, #sidebar input[type="submit"], #sidebar h3, #our-products .woocommerce a.button:hover, .woocommerce ul.products li.product .button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover button.single_add_to_cart_button.button.alt:hover, nav.woocommerce-MyAccount-navigation ul li, .footertown input[type="submit"],#our-products .woocommerce ul.products li.product .price,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, #footer, #sidebar .tagcloud a:hover, .baricon i:hover,.primary-navigation ul ul a, .footertown .tagcloud a:hover,.service-btn a:hover,#comments a.comment-reply-link, #slider a.read-more,.tags a:hover,.metabox,input[type="submit"],a.button,.sidebar,.pagination a:hover, .page-links a:hover,.pagination .current, .page-links .current, .woocommerce-product-search button[type="submit"], .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle {
			    background-color:'.esc_attr($pet_animal_store_theme_color_first).';
			}
			 #header i.fa.fa-search,#comments input[type="submit"].submit,.primary-navigation ul ul a:hover, .footertown .widget h3, .footertown h3.widget-title a, .scrollup{
			    color:'.esc_attr($pet_animal_store_theme_color_first).';
			}
			@media screen and (max-width: 1000px){
				.primary-navigation ul ul a:hover, .primary-navigation ul li a:hover{
			    color:'.esc_attr($pet_animal_store_theme_color_first).' !important;
			} }
			.woocommerce span.onsale{
			    background-color:'.esc_attr($pet_animal_store_theme_color_first).' !important;
			}
			.services-box, #sidebar aside, #sidebar table, #sidebar th, #sidebar td,
			.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .service-btn a:hover, #our-products .woocommerce a.button:hover, .woocommerce ul.products li.product .button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover button.single_add_to_cart_button.button.alt:hover{
			    border-color:'.esc_attr($pet_animal_store_theme_color_first).';
			}
            #our-products .woocommerce a.button:hover, .woocommerce ul.products li.product .button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover button.single_add_to_cart_button.button.alt:hover,.service-btn a:hover, #our-products .woocommerce a.button:hover, .woocommerce ul.products li.product .button:hover, .baricon i:hover, .tags a:hover{
				border-color:'.esc_attr($pet_animal_store_theme_color_first).';
			}
			.hvr-sweep-to-right:before, .topbar, #comments input[type="submit"].submit, .pagination span,.pagination a, #slider .carousel-control-next-icon,#slider .carousel-control-prev-icon{
			    background-color:'.esc_attr($pet_animal_store_theme_color_second).';
			}
    		#comments a.comment-reply-link:hover,.primary-navigation ul ul a:hover,#slider a.read-more:hover{
    			background-color:'.esc_attr($pet_animal_store_theme_color_second).';
			}
			@media screen and (max-width: 1000px){
				.primary-navigation ul ul a:hover, .primary-navigation ul li a:hover{
    			background-color:'.esc_attr($pet_animal_store_theme_color_second).' !important;
				}
			}
			#our-products strong,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.baricon i:hover,.service-btn a:hover,#comments a.comment-reply-link,.metabox a,.tags a:hover,span.meta-nav,.middle-align h1,.metabox,.service-btn a,#sidebar h3,#sidebar input[type="submit"], #sidebar td#prev a ,#sidebar caption, #sidebar th,.footertown input[type="submit"], #sidebar td, input[type="submit"],.woocommerce span.onsale, #slider a.read-more,.footertown .tagcloud a:hover,.service-btn a,a,span.post-title,.services-box h2 a,code, .entry-content a, #our-products .woocommerce a.button,.woocommerce ul.products li.product .button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, h2.woocommerce-loop-product__title, .woocommerce-product-details__short-description p,#reviews p, .footertown select, .primary-navigation a:hover, .tags a, .product_meta a{
			    color:'.esc_attr($pet_animal_store_theme_color_second).';
			}
			#our-products .woocommerce a.button:hover, .woocommerce ul.products li.product .button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover button.single_add_to_cart_button.button.alt:hover,#our-products .woocommerce a.button, .woocommerce ul.products li.product .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .middle-align div.content-aa a,.pagination .current, .page-links .current, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce-product-search button[type="submit"], .footertown .widget_shopping_cart .buttons a:hover, .footertown .widget_price_filter .price_slider_amount .button:hover{
				color:'.esc_attr($pet_animal_store_theme_color_second).';
			}
			#our-products .woocommerce a.button, .woocommerce ul.products li.product .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #our-products .woocommerce a.button:hover, .woocommerce ul.products li.product .button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover button.single_add_to_cart_button.button.alt:hover{
    			color:'.esc_attr($pet_animal_store_theme_color_second).' !important;
			}
			#our-products .woocommerce a.button,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.service-btn a, .woocommerce ul.products li.product .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .tags a, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button{
				border-color:'.esc_attr($pet_animal_store_theme_color_second).';
			}
		';	

	wp_add_inline_style( 'pet-animal-store-basic-style',$pet_animal_store_custom_css );

	require get_parent_theme_file_path( '/tc-style.php' );
	wp_add_inline_style( 'pet-animal-store-basic-style',$pet_animal_store_custom_css );

	wp_enqueue_script( 'bootstrap', esc_url(get_template_directory_uri()) . '/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'pet-animal-store-customscripts', esc_url(get_template_directory_uri()) . '/js/custom.js', array('jquery') );
	wp_enqueue_script( 'jquery-superfish', esc_url(get_template_directory_uri()) . '/js/jquery.superfish.js', array('jquery') ,'',true);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pet_animal_store_scripts' );

/*radio button sanitization*/

function pet_animal_store_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/* Excerpt Limit Begin */
function pet_animal_store_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

// URL DEFINES
define('PET_ANIMAL_STORE_FREE_THEME_DOC',__('https://themescaliber.com/demo/doc/free-tc-pet-shop/', 'pet-animal-store'));
define('PET_ANIMAL_STORE_SUPPORT',__('https://wordpress.org/support/theme/pet-animal-store', 'pet-animal-store'));
define('PET_ANIMAL_STORE_REVIEW',__('https://wordpress.org/support/theme/pet-animal-store/reviews/', 'pet-animal-store'));
define('PET_ANIMAL_STORE_BUY_NOW',__('https://www.themescaliber.com/themes/premium-animal-pet-wordpress-theme', 'pet-animal-store'));
define('PET_ANIMAL_STORE_LIVE_DEMO',__('https://www.themescaliber.com/pet-animal-store', 'pet-animal-store'));
define('PET_ANIMAL_STORE_PRO_DOC',__('https://themescaliber.com/demo/doc/tc-pet-shop-pro/', 'pet-animal-store'));
define('PET_ANIMAL_STORE_CHILD_THEME',__('https://developer.wordpress.org/themes/advanced-topics/child-themes/', 'pet-animal-store'));
define('PET_ANIMAL_STORE_SITE_URL',__('https://www.themescaliber.com/themes/free-animal-pet-wordpress-theme/', 'pet-animal-store'));

function pet_animal_store_credit_link() {
    echo "<a href=".esc_url(PET_ANIMAL_STORE_SITE_URL)." target='_blank'>".esc_html__('Pet Store WordPress Theme','pet-animal-store')."</a>";
}

function pet_animal_store_sanitize_dropdown_pages( $page_id, $setting ) {
	// Ensure $input is an absolute integer.
	$page_id = absint( $page_id );
	// If $page_id is an ID of a published page, return it; otherwise, return the default.
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'pet_animal_store_loop_columns');
if (!function_exists('pet_animal_store_loop_columns')) {
	function pet_animal_store_loop_columns() {
		$columns = get_theme_mod( 'pet_animal_store_products_per_row', 3 );
		return $columns; // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'pet_animal_store_shop_per_page', 9 );
function pet_animal_store_shop_per_page( $cols ) {
  	$cols = get_theme_mod( 'pet_animal_store_product_per_page', 9 );
	return $cols;
}

function pet_animal_store_sanitize_email( $email, $setting ) {
	// Strips out all characters that are not allowable in an email address.
	$email = sanitize_email( $email );

	// If $email is a valid email, return it; otherwise, return the default.
	return ( ! is_null( $email ) ? $email : $setting->default );
}

function pet_animal_store_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function pet_animal_store_sanitize_checkbox( $input ) {
	// Boolean check 
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function pet_animal_store_sanitize_float( $input ) {
    return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

/** Posts navigation. */
if ( ! function_exists( 'pet_animal_store_post_navigation' ) ) {
	function pet_animal_store_post_navigation() {
		$pet_animal_store_pagination_type = get_theme_mod( 'pet_animal_store_post_navigation_type', 'numbers' );
		if ( $pet_animal_store_pagination_type == 'numbers' ) {
			the_posts_pagination();
		} else {
			the_posts_navigation( array(
	            'prev_text'          => __( 'Previous page', 'pet-animal-store' ),
	            'next_text'          => __( 'Next page', 'pet-animal-store' ),
	            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'pet-animal-store' ) . ' </span>',
	        ) );
		}
	}
}

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';

/* Implement the get started page */
require get_template_directory() . '/inc/dashboard/getstart.php';