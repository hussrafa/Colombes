<?php 
	$pet_animal_store_custom_css ='';

	/*----------------Width Layout -------------------*/
	$pet_animal_store_theme_lay = get_theme_mod( 'pet_animal_store_width_options','Full Layout');
    if($pet_animal_store_theme_lay == 'Full Layout'){
		$pet_animal_store_custom_css .='body{';
			$pet_animal_store_custom_css .='max-width: 100%;';
		$pet_animal_store_custom_css .='}';
	}else if($pet_animal_store_theme_lay == 'Contained Layout'){
		$pet_animal_store_custom_css .='body{';
			$pet_animal_store_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$pet_animal_store_custom_css .='}';
		$pet_animal_store_custom_css .='.page-template-custom-frontpage #header{';
			$pet_animal_store_custom_css .='right:0;';
		$pet_animal_store_custom_css .='}';
	}else if($pet_animal_store_theme_lay == 'Boxed Layout'){
		$pet_animal_store_custom_css .='body{';
			$pet_animal_store_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$pet_animal_store_custom_css .='}';
		$pet_animal_store_custom_css .='.page-template-custom-frontpage #header{';
			$pet_animal_store_custom_css .='left:0; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$pet_animal_store_custom_css .='}';
		$pet_animal_store_custom_css .='.page-template-custom-frontpage .header-slider{';
			$pet_animal_store_custom_css .='width:98%; margin: 0 auto;';
		$pet_animal_store_custom_css .='}';
		$pet_animal_store_custom_css .='
		@media screen and (max-width: 1024px) and (min-width: 320px){
		.page-template-custom-frontpage #header{';
		$pet_animal_store_custom_css .='width: 100%; padding:0;';
		$pet_animal_store_custom_css .='} }';
	}

	/*------------- Slider Opacity -------------------*/
	$pet_animal_store_slider_layout = get_theme_mod( 'pet_animal_store_slider_opacity','0.7');
	if($pet_animal_store_slider_layout == '0'){
		$pet_animal_store_custom_css .='#slider img{';
			$pet_animal_store_custom_css .='opacity:0';
		$pet_animal_store_custom_css .='}';
	}else if($pet_animal_store_slider_layout == '0.1'){
		$pet_animal_store_custom_css .='#slider img{';
			$pet_animal_store_custom_css .='opacity:0.1';
		$pet_animal_store_custom_css .='}';
	}else if($pet_animal_store_slider_layout == '0.2'){
		$pet_animal_store_custom_css .='#slider img{';
			$pet_animal_store_custom_css .='opacity:0.2';
		$pet_animal_store_custom_css .='}';
	}else if($pet_animal_store_slider_layout == '0.3'){
		$pet_animal_store_custom_css .='#slider img{';
			$pet_animal_store_custom_css .='opacity:0.3';
		$pet_animal_store_custom_css .='}';
	}else if($pet_animal_store_slider_layout == '0.4'){
		$pet_animal_store_custom_css .='#slider img{';
			$pet_animal_store_custom_css .='opacity:0.4';
		$pet_animal_store_custom_css .='}';
	}else if($pet_animal_store_slider_layout == '0.5'){
		$pet_animal_store_custom_css .='#slider img{';
			$pet_animal_store_custom_css .='opacity:0.5';
		$pet_animal_store_custom_css .='}';
	}else if($pet_animal_store_slider_layout == '0.6'){
		$pet_animal_store_custom_css .='#slider img{';
			$pet_animal_store_custom_css .='opacity:0.6';
		$pet_animal_store_custom_css .='}';
	}else if($pet_animal_store_slider_layout == '0.7'){
		$pet_animal_store_custom_css .='#slider img{';
			$pet_animal_store_custom_css .='opacity:0.7';
		$pet_animal_store_custom_css .='}';
	}else if($pet_animal_store_slider_layout == '0.8'){
		$pet_animal_store_custom_css .='#slider img{';
			$pet_animal_store_custom_css .='opacity:0.8';
		$pet_animal_store_custom_css .='}';
	}else if($pet_animal_store_slider_layout == '0.9'){
		$pet_animal_store_custom_css .='#slider img{';
			$pet_animal_store_custom_css .='opacity:0.9';
		$pet_animal_store_custom_css .='}';
	}

	/*-------------Slider Content Layout ------------*/
	$pet_animal_store_slider_layout = get_theme_mod( 'pet_animal_store_slider_content_option','Left');
    if($pet_animal_store_slider_layout == 'Left'){
		$pet_animal_store_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .read-btn{';
			$pet_animal_store_custom_css .='text-align:left;';
		$pet_animal_store_custom_css .='}';
		$pet_animal_store_custom_css .='#slider .carousel-caption{';
		$pet_animal_store_custom_css .='left:15%; right:40%;';
		$pet_animal_store_custom_css .='}';
	}else if($pet_animal_store_slider_layout == 'Center'){
		$pet_animal_store_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .read-btn{';
			$pet_animal_store_custom_css .='text-align:center;';
		$pet_animal_store_custom_css .='}';
		$pet_animal_store_custom_css .='#slider .carousel-caption{';
		$pet_animal_store_custom_css .='left:25%; right:25%;';
		$pet_animal_store_custom_css .='}';
	}else if($pet_animal_store_slider_layout == 'Right'){
		$pet_animal_store_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .read-btn{';
			$pet_animal_store_custom_css .='text-align:right;';
		$pet_animal_store_custom_css .='}';
		$pet_animal_store_custom_css .='#slider .carousel-caption{';
			$pet_animal_store_custom_css .='left:40%; right:15%;';
		$pet_animal_store_custom_css .='}';
	}

	/* Slider content spacing */
	$pet_animal_store_top_spacing = get_theme_mod('pet_animal_store_slider_top_spacing');
	$pet_animal_store_bottom_spacing = get_theme_mod('pet_animal_store_slider_bottom_spacing');
	$pet_animal_store_left_spacing = get_theme_mod('pet_animal_store_slider_left_spacing');
	$pet_animal_store_right_spacing = get_theme_mod('pet_animal_store_slider_right_spacing');
	if($pet_animal_store_top_spacing != false || $pet_animal_store_bottom_spacing != false || $pet_animal_store_left_spacing != false || $pet_animal_store_right_spacing != false){
		$pet_animal_store_custom_css .='#slider .carousel-caption{';
			$pet_animal_store_custom_css .='top: '.esc_attr($pet_animal_store_top_spacing).'%; bottom: '.esc_attr($pet_animal_store_bottom_spacing).'%; left: '.esc_attr($pet_animal_store_left_spacing).'%; right: '.esc_attr($pet_animal_store_right_spacing).'%;';
		$pet_animal_store_custom_css .='}';
	}

	/*------ Button Style -------*/
	$pet_animal_store_top_buttom_padding = get_theme_mod('pet_animal_store_top_button_padding');
	$pet_animal_store_left_right_padding = get_theme_mod('pet_animal_store_left_button_padding');
	if($pet_animal_store_top_buttom_padding != false || $pet_animal_store_left_right_padding != false ){
		$pet_animal_store_custom_css .='.service-btn a, #slider a.read-more, #our-products .woocommerce a.button, .woocommerce ul.products li.product .button, #comments input[type="submit"].submit{';
			$pet_animal_store_custom_css .='padding-top: '.esc_attr($pet_animal_store_top_buttom_padding).'px; padding-bottom: '.esc_attr($pet_animal_store_top_buttom_padding).'px; padding-left: '.esc_attr($pet_animal_store_left_right_padding).'px; padding-right: '.esc_attr($pet_animal_store_left_right_padding).'px;';
		$pet_animal_store_custom_css .='}';
	}

	$pet_animal_store_button_border_radius = get_theme_mod('pet_animal_store_button_border_radius');
	$pet_animal_store_custom_css .='.service-btn a, #slider a.read-more, #our-products .woocommerce a.button, .woocommerce ul.products li.product .button, #comments input[type="submit"].submit{';
		$pet_animal_store_custom_css .='border-radius: '.esc_attr($pet_animal_store_button_border_radius).'px;';
	$pet_animal_store_custom_css .='}';

	/*-------------- Woocommerce Button  -------------------*/
	$pet_animal_store_woocommerce_button_padding_top = get_theme_mod('pet_animal_store_woocommerce_button_padding_top');
	if($pet_animal_store_woocommerce_button_padding_top != false){
		$pet_animal_store_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce ul.products li.product .button{';
			$pet_animal_store_custom_css .='padding-top: '.esc_attr($pet_animal_store_woocommerce_button_padding_top).'px; padding-bottom: '.esc_attr($pet_animal_store_woocommerce_button_padding_top).'px;';
		$pet_animal_store_custom_css .='}';
	}

	$pet_animal_store_woocommerce_button_padding_right = get_theme_mod('pet_animal_store_woocommerce_button_padding_right');
	if($pet_animal_store_woocommerce_button_padding_right != false){
		$pet_animal_store_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce ul.products li.product .button{';
			$pet_animal_store_custom_css .='padding-left: '.esc_attr($pet_animal_store_woocommerce_button_padding_right).'px; padding-right: '.esc_attr($pet_animal_store_woocommerce_button_padding_right).'px;';
		$pet_animal_store_custom_css .='}';
	}

	$pet_animal_store_woocommerce_button_border_radius = get_theme_mod('pet_animal_store_woocommerce_button_border_radius');
	if($pet_animal_store_woocommerce_button_border_radius != false){
		$pet_animal_store_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce ul.products li.product .button{';
			$pet_animal_store_custom_css .='border-radius: '.esc_attr($pet_animal_store_woocommerce_button_border_radius).'px;';
		$pet_animal_store_custom_css .='}';
	}

	$pet_animal_store_related_product = get_theme_mod('pet_animal_store_related_product',true);

	if($pet_animal_store_related_product == false){
		$pet_animal_store_custom_css .='.related.products{';
			$pet_animal_store_custom_css .='display: none;';
		$pet_animal_store_custom_css .='}';
	}

	$pet_animal_store_woocommerce_product_border = get_theme_mod('pet_animal_store_woocommerce_product_border');

	if($pet_animal_store_woocommerce_product_border == true){
		$pet_animal_store_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$pet_animal_store_custom_css .='border: 1px solid #aaa;';
		$pet_animal_store_custom_css .='}';
	}

	$pet_animal_store_woocommerce_product_padding_top = get_theme_mod('pet_animal_store_woocommerce_product_padding_top',10);
	if($pet_animal_store_woocommerce_product_padding_top != false){
		$pet_animal_store_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$pet_animal_store_custom_css .='padding-top: '.esc_attr($pet_animal_store_woocommerce_product_padding_top).'px !important; padding-bottom: '.esc_attr($pet_animal_store_woocommerce_product_padding_top).'px !important;';
		$pet_animal_store_custom_css .='}';
	}

	$pet_animal_store_woocommerce_product_padding_right = get_theme_mod('pet_animal_store_woocommerce_product_padding_right',10);
	if($pet_animal_store_woocommerce_product_padding_right != false){
		$pet_animal_store_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$pet_animal_store_custom_css .='padding-left: '.esc_attr($pet_animal_store_woocommerce_product_padding_right).'px !important; padding-right: '.esc_attr($pet_animal_store_woocommerce_product_padding_right).'px !important;';
		$pet_animal_store_custom_css .='}';
	}

	$pet_animal_store_woocommerce_product_border_radius = get_theme_mod('pet_animal_store_woocommerce_product_border_radius');
	if($pet_animal_store_woocommerce_product_border_radius != false){
		$pet_animal_store_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$pet_animal_store_custom_css .='border-radius: '.esc_attr($pet_animal_store_woocommerce_product_border_radius).'px;';
		$pet_animal_store_custom_css .='}';
	}

	$pet_animal_store_woocommerce_product_box_shadow = get_theme_mod('pet_animal_store_woocommerce_product_box_shadow');
	if($pet_animal_store_woocommerce_product_box_shadow != false){
		$pet_animal_store_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$pet_animal_store_custom_css .='box-shadow: '.esc_attr($pet_animal_store_woocommerce_product_box_shadow).'px '.esc_attr($pet_animal_store_woocommerce_product_box_shadow).'px '.esc_attr($pet_animal_store_woocommerce_product_box_shadow).'px #aaa;';
		$pet_animal_store_custom_css .='}';
	}

	/*------ Slider show/hide -------*/
	if(get_theme_mod('pet_animal_store_slider_arrows') == false){
		$pet_animal_store_custom_css .=' .page-template-custom-frontpage #header{';
			$pet_animal_store_custom_css .='position: static; margin: 0;';
		$pet_animal_store_custom_css .='}';
		$pet_animal_store_custom_css .=' #services .service-box{';
			$pet_animal_store_custom_css .='margin: 0;';
		$pet_animal_store_custom_css .='}';
		$pet_animal_store_custom_css .=' .site_header{';
			$pet_animal_store_custom_css .=' background: '.esc_attr($pet_animal_store_theme_color_first).';';
		$pet_animal_store_custom_css .='}';
		$pet_animal_store_custom_css .=' .page-template-custom-frontpage .request-btn a.blogbutton-small{';
			$pet_animal_store_custom_css .=' background:'.esc_attr($pet_animal_store_theme_color_second).'; color: '.esc_attr($pet_animal_store_theme_color_first).';';
		$pet_animal_store_custom_css .='}';
	}

	/*---- Preloader Color ----*/
	$pet_animal_store_preloader_color = get_theme_mod('pet_animal_store_preloader_color');
	$pet_animal_store_preloader_bg_color = get_theme_mod('pet_animal_store_preloader_bg_color');

	if($pet_animal_store_preloader_color != false){
		$pet_animal_store_custom_css .='.preloader-squares .square, .preloader-chasing-squares .square{';
			$pet_animal_store_custom_css .='background-color: '.esc_attr($pet_animal_store_preloader_color).';';
		$pet_animal_store_custom_css .='}';
	}
	if($pet_animal_store_preloader_bg_color != false){
		$pet_animal_store_custom_css .='.preloader{';
			$pet_animal_store_custom_css .='background-color: '.esc_attr($pet_animal_store_preloader_bg_color).';';
		$pet_animal_store_custom_css .='}';
	}

	/*---- Copyright css ----*/
	$pet_animal_store_copyright_fontsize = get_theme_mod('pet_animal_store_copyright_fontsize',16);
	if($pet_animal_store_copyright_fontsize != false){
		$pet_animal_store_custom_css .='#footer p{';
			$pet_animal_store_custom_css .='font-size: '.esc_attr($pet_animal_store_copyright_fontsize).'px; ';
		$pet_animal_store_custom_css .='}';
	}

	$pet_animal_store_copyright_top_bottom_padding = get_theme_mod('pet_animal_store_copyright_top_bottom_padding',15);
	if($pet_animal_store_copyright_top_bottom_padding != false){
		$pet_animal_store_custom_css .='#footer {';
			$pet_animal_store_custom_css .='padding-top:'.esc_attr($pet_animal_store_copyright_top_bottom_padding).'px; padding-bottom: '.esc_attr($pet_animal_store_copyright_top_bottom_padding).'px; ';
		$pet_animal_store_custom_css .='}';
	}

	$pet_animal_store_copyright_alignment = get_theme_mod( 'pet_animal_store_copyright_alignment','Center');
    if($pet_animal_store_copyright_alignment == 'Left'){
		$pet_animal_store_custom_css .='#footer p{';
			$pet_animal_store_custom_css .='text-align:left;';
		$pet_animal_store_custom_css .='}';
	}else if($pet_animal_store_copyright_alignment == 'Center'){
		$pet_animal_store_custom_css .='#footer p{';
			$pet_animal_store_custom_css .='text-align:center;';
		$pet_animal_store_custom_css .='}';
	}else if($pet_animal_store_copyright_alignment == 'Right'){
		$pet_animal_store_custom_css .='#footer p{';
			$pet_animal_store_custom_css .='text-align:right;';
		$pet_animal_store_custom_css .='}';
	}

	/*------- Wocommerce sale css -----*/
	$pet_animal_store_woocommerce_sale_top_padding = get_theme_mod('pet_animal_store_woocommerce_sale_top_padding');
	$pet_animal_store_woocommerce_sale_left_padding = get_theme_mod('pet_animal_store_woocommerce_sale_left_padding');
	$pet_animal_store_custom_css .=' .woocommerce span.onsale{';
		$pet_animal_store_custom_css .='padding-top: '.esc_attr($pet_animal_store_woocommerce_sale_top_padding).'px; padding-bottom: '.esc_attr($pet_animal_store_woocommerce_sale_top_padding).'px; padding-left: '.esc_attr($pet_animal_store_woocommerce_sale_left_padding).'px; padding-right: '.esc_attr($pet_animal_store_woocommerce_sale_left_padding).'px;';
	$pet_animal_store_custom_css .='}';

	$pet_animal_store_woocommerce_sale_border_radius = get_theme_mod('pet_animal_store_woocommerce_sale_border_radius', 50);
	$pet_animal_store_custom_css .='.woocommerce span.onsale{';
		$pet_animal_store_custom_css .='border-radius: '.esc_attr($pet_animal_store_woocommerce_sale_border_radius).'px;';
	$pet_animal_store_custom_css .='}';

	$pet_animal_store_sale_position = get_theme_mod( 'pet_animal_store_sale_position','right');
    if($pet_animal_store_sale_position == 'left'){
		$pet_animal_store_custom_css .='.woocommerce ul.products li.product .onsale{';
			$pet_animal_store_custom_css .='left: -10px; right: auto;';
		$pet_animal_store_custom_css .='}';
	}else if($pet_animal_store_sale_position == 'right'){
		$pet_animal_store_custom_css .='.woocommerce ul.products li.product .onsale{';
			$pet_animal_store_custom_css .='left: auto; right: 0;';
		$pet_animal_store_custom_css .='}';
	}

	// footer background css
	$pet_animal_store_footer_background_color = get_theme_mod('pet_animal_store_footer_background_color');
	$pet_animal_store_custom_css .='.footertown{';
		$pet_animal_store_custom_css .='background-color: '.esc_attr($pet_animal_store_footer_background_color).';';
	$pet_animal_store_custom_css .='}';

	$pet_animal_store_footer_background_img = get_theme_mod('pet_animal_store_footer_background_img');
	if($pet_animal_store_footer_background_img != false){
		$pet_animal_store_custom_css .='.footertown{';
			$pet_animal_store_custom_css .='background: url('.esc_attr($pet_animal_store_footer_background_img).') no-repeat; background-size: cover; background-attachment: fixed;';
		$pet_animal_store_custom_css .='}';
	}

	/*---- Comment form ----*/
	$pet_animal_store_comment_width = get_theme_mod('pet_animal_store_comment_width', '100');
	$pet_animal_store_custom_css .='#comments textarea{';
		$pet_animal_store_custom_css .=' width:'.esc_attr($pet_animal_store_comment_width).'%;';
	$pet_animal_store_custom_css .='}';

	$pet_animal_store_comment_submit_text = get_theme_mod('pet_animal_store_comment_submit_text', 'Post Comment');
	if($pet_animal_store_comment_submit_text == ''){
		$pet_animal_store_custom_css .='#comments p.form-submit {';
			$pet_animal_store_custom_css .='display: none;';
		$pet_animal_store_custom_css .='}';
	}

	$pet_animal_store_comment_title = get_theme_mod('pet_animal_store_comment_title', 'Leave a Reply');
	if($pet_animal_store_comment_title == ''){
		$pet_animal_store_custom_css .='#comments h2#reply-title {';
			$pet_animal_store_custom_css .='display: none;';
		$pet_animal_store_custom_css .='}';
	}

	// Sticky Header padding
	$pet_animal_store_sticky_header_padding = get_theme_mod('pet_animal_store_sticky_header_padding');
	$pet_animal_store_custom_css .='.fixed-header{';
		$pet_animal_store_custom_css .=' padding-top:'.esc_attr($pet_animal_store_sticky_header_padding).'px; padding-bottom:'.esc_attr($pet_animal_store_sticky_header_padding).'px;';
	$pet_animal_store_custom_css .='}';

	// Navigation Font Size 
	$pet_animal_store_nav_font_size = get_theme_mod('pet_animal_store_nav_font_size');
	if($pet_animal_store_nav_font_size != false){
		$pet_animal_store_custom_css .='.primary-navigation ul li a{';
			$pet_animal_store_custom_css .='font-size: '.esc_attr($pet_animal_store_nav_font_size).'px;';
		$pet_animal_store_custom_css .='}';
	}

	$pet_animal_store_navigation_case = get_theme_mod('pet_animal_store_navigation_case', 'capitalize');
	if($pet_animal_store_navigation_case == 'uppercase' ){
		$pet_animal_store_custom_css .='.primary-navigation ul li a{';
			$pet_animal_store_custom_css .=' text-transform: uppercase;';
		$pet_animal_store_custom_css .='}';
	}elseif($pet_animal_store_navigation_case == 'capitalize' ){
		$pet_animal_store_custom_css .='.primary-navigation ul li a{';
			$pet_animal_store_custom_css .=' text-transform: capitalize;';
		$pet_animal_store_custom_css .='}';
	}