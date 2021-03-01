<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="content-aa">
 *
 * @package Pet Animal Store
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
	<?php if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}?>
	<?php if(get_theme_mod('pet_animal_store_preloader_hide',true)){ ?>
	    <?php if(get_theme_mod( 'pet_animal_store_preloader_type','center-square') == 'center-square'){ ?>
		    <div class='preloader'>
			    <div class='preloader-squares'>
					<div class='square'></div>
					<div class='square'></div>
					<div class='square'></div>
					<div class='square'></div>
			    </div>
			</div>
	    <?php }else if(get_theme_mod( 'pet_animal_store_preloader_type') == 'chasing-square') {?>    
	        <div class='preloader'>
				<div class='preloader-chasing-squares'>
					<div class='square'></div>
					<div class='square'></div>
					<div class='square'></div>
					<div class='square'></div>
				</div>
			</div>
	    <?php }?>
	<?php }?>
	<header role="banner">
		<a class="screen-reader-text skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'pet-animal-store' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Skip to content', 'pet-animal-store' );?></span></a>
 		<div class="topbar py-3">
		  	<div class="container">
			  	<div class="site_header pb-3">
				  	<div class="row">
					    <div class="col-lg-3 col-md-3">
					    	<div class="logo">
						      	<?php if ( has_custom_logo() ) : ?>
					     	    	<div class="site-logo"><?php the_custom_logo(); ?></div>
					            <?php endif; ?>
					            <?php if( get_theme_mod( 'pet_animal_store_site_title',true) != '') { ?>
						            <?php $blog_info = get_bloginfo( 'name' ); ?>
						            <?php if ( ! empty( $blog_info ) ) : ?>
							            <?php if ( is_front_page() && is_home() ) : ?>
							              <h1 class="site-title p-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							            <?php else : ?>
							              <p class="site-title p-0 m-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							            <?php endif; ?>
						            <?php endif; ?>
						        <?php }?>
						        <?php if( get_theme_mod( 'pet_animal_store_site_tagline',true) != '') { ?>
						            <?php
						            $description = get_bloginfo( 'description', 'display' );
						            if ( $description || is_customize_preview() ) :
						            ?>
						            <p class="site-description m-0">
						              <?php echo esc_html($description); ?>
						            </p>
						            <?php endif; ?>
						        <?php }?>
						    </div>
					    </div>
					    <div class="col-lg-9 col-md-9">
						    <div class="baricon row p-2">
						      	<div class="col-lg-4 col-md-4">
							      	<?php if( get_theme_mod( 'pet_animal_store_mail','' ) != '') { ?>
							      	<div class="mail row">
							      		<?php if(get_theme_mod('pet_animal_store_mail_icon') != 'None') {?>
								      		<div class="col-lg-2 col-md-2 p-0">
								      			<i class="<?php echo esc_html(get_theme_mod('pet_animal_store_mail_icon','fas fa-at')); ?> p-0"></i>
								      		</div>
								      	<?php }?>
									    <div class="<?php if(get_theme_mod('pet_animal_store_mail_icon') != 'None') {?>col-lg-10 col-md-10 <?php } else {?> col-lg-12 col-md-12 <?php }?>">
									        <p class="email mb-md-0 mb-2"><a href="mailto:<?php echo esc_attr( get_theme_mod('pet_animal_store_mail','')); ?>"><?php echo esc_html( get_theme_mod('pet_animal_store_mail','') ); ?><span class="screen-reader-text"><?php esc_html_e( 'Email','pet-animal-store' );?></span></a></p>
									    </div>
							    	</div>
							      	<?php } ?>
						    	</div>
						        <div class="col-lg-4 col-md-4">
						      		<?php if( get_theme_mod( 'pet_animal_store_call','' ) != '') { ?>
						        	<div class="phone row">
						        		<?php if(get_theme_mod('pet_animal_store_phone_icon') != 'None') {?>
							        		<div class="col-lg-2 col-md-2 p-0">
							        			<i class="<?php echo esc_html(get_theme_mod('pet_animal_store_phone_icon','fas fa-phone-volume')); ?> p-0"></i>
							        		</div>
							        	<?php }?>
						        		<div class="<?php if(get_theme_mod('pet_animal_store_phone_icon') != 'None') {?>col-lg-10 col-md-10 <?php } else {?> col-lg-12 col-md-12 <?php }?>">
								        	<p class="call mb-md-0 mb-2"><a href="tel:<?php echo esc_attr( get_theme_mod('pet_animal_store_call','')); ?>"><?php echo esc_html( get_theme_mod('pet_animal_store_call','')); ?><span class="screen-reader-text"><?php esc_html_e( 'Phone Number','pet-animal-store' );?></span></a></p>
								        </div>
							        </div>
						      		<?php } ?>
						        </div>
							    <div class="col-lg-4 col-md-4 p-0">
							    	<div class="social-icon">
									    <?php if( get_theme_mod( 'pet_animal_store_facebook_url') != '' && get_theme_mod('pet_animal_store_facebook_icon') != 'None') { ?>
									        <a href="<?php echo esc_url( get_theme_mod( 'pet_animal_store_facebook_url','' ) ); ?>"><i class="<?php echo esc_html(get_theme_mod('pet_animal_store_facebook_icon','fab fa-facebook-f')); ?> ml-2"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','pet-animal-store' );?></span></a>
									    <?php } ?>
									    <?php if( get_theme_mod( 'pet_animal_store_twitter_url') != '' && get_theme_mod('pet_animal_store_twitter_icon') != 'None') { ?>
									        <a href="<?php echo esc_url( get_theme_mod( 'pet_animal_store_twitter_url','' ) ); ?>"><i class="<?php echo esc_html(get_theme_mod('pet_animal_store_twitter_icon','fab fa-twitter')); ?> ml-2"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','pet-animal-store' );?></span></a>
									    <?php } ?>
									    <?php if( get_theme_mod( 'pet_animal_store_instagram_url') != '' && get_theme_mod('pet_animal_store_instagram_icon') != 'None') { ?>
									        <a href="<?php echo esc_url( get_theme_mod( 'pet_animal_store_instagram_url','' ) ); ?>"><i class="<?php echo esc_html(get_theme_mod('pet_animal_store_instagram_icon','fab fa-instagram')); ?> ml-2"></i><span class="screen-reader-text"><?php esc_html_e( 'Instagram','pet-animal-store' );?></span></a>
									    <?php } ?>
									    <?php if( get_theme_mod( 'pet_animal_store_linkedin_url') != '' && get_theme_mod('pet_animal_store_linkedin_icon') != 'None') { ?>
									        <a href="<?php echo esc_url( get_theme_mod( 'pet_animal_store_linkedin_url','' ) ); ?>"><i class="<?php echo esc_html(get_theme_mod('pet_animal_store_linkedin_icon','fab fa-linkedin-in')); ?> ml-2"></i><span class="screen-reader-text"><?php esc_html_e( 'Linkedin','pet-animal-store' );?></span></a>
									    <?php } ?>
									</div>
							    </div>
						    </div>
					    </div>
				    </div>
				</div>
		  	</div>
			<div id="header">
				<div class="container"> 
					<div class="header-slider <?php if( get_theme_mod( 'pet_animal_store_sticky_header') != '') { ?> sticky-header"<?php } else { ?>close-sticky <?php } ?>">
						<div class="row m-0">     
							<div class="col-lg-9 col-md-9 col-6 menubg">
								<div class="menubox nav">
									<?php if(has_nav_menu('primary')){ ?>
									    <div class="toggle-menu responsive-menu py-3">
							                <button role="tab" onclick="pet_animal_store_menu_open()"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','pet-animal-store'); ?></span></button>
							            </div>
							        <?php }?>
					                <div id="menu-sidebar" class="nav side-menu">
					               		<nav id="primary-site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'pet-animal-store' ); ?>">
					                   		<?php if(has_nav_menu('primary')){
						                        wp_nav_menu( array( 
							                        'theme_location' => 'primary',
							                        'container_class' => 'main-menu-navigation clearfix' ,
							                        'menu_class' => 'clearfix',
							                        'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav m-0">%3$s</ul>',
							                        'fallback_cb' => 'wp_page_menu',
						                        ) ); 
					                        } ?>
					                    	<a href="javascript:void(0)" class="closebtn responsive-menu" onclick="pet_animal_store_menu_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','pet-animal-store'); ?></span></a>
					                    </nav>
					                </div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="col-lg-3 col-md-3 col-6 searchbg p-1">
								<div class="search_form">
								  <?php get_search_form(); ?>
								</div>
							</div> 
						</div> 
					</div>
				</div>
			</div>
		</div>
	</header>