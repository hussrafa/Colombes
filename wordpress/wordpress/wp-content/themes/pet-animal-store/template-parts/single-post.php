<?php
/**
 * The template part for displaying single-post
 *
 * @package Pet Animal Store
 * @subpackage pet_animal_store
 * @since Pet Animal Store 1.0
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>
<article>
	<h1><?php esc_html(the_title()); ?></h1>
	<?php if( get_theme_mod( 'pet_animal_store_date_hide',true) != '' || get_theme_mod( 'pet_animal_store_comment_hide',true) != '' || get_theme_mod( 'pet_animal_store_author_hide',true) != '') { ?>
		<div class="metabox py-1 mb-2">
			<?php if( get_theme_mod( 'pet_animal_store_date_hide',true) != '') { ?>
				<span class="entry-date pl-2"><i class="far fa-calendar-alt mr-1"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
			<?php }?>
			<?php if( get_theme_mod( 'pet_animal_store_author_hide',true) != '') { ?>
				<span class="entry-author px-2"><i class="fa fa-user mr-1" aria-hidden="true"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php esc_html(the_author()); ?><span class="screen-reader-text"><?php esc_html(the_author()); ?></span></a></span>
			<?php }?>
			<?php if( get_theme_mod( 'pet_animal_store_comment_hide',true) != '') { ?>
				<span class="entry-comments"><i class="fa fa-comments mr-1" aria-hidden="true"></i><?php comments_number( __('0 Comments','pet-animal-store'), __('0 Comments','pet-animal-store'), __('% Comments','pet-animal-store') ); ?> </span>
			<?php }?>
		</div>
	<?php }?>
	<?php if( get_theme_mod( 'pet_animal_store_feature_image',true) != '') { ?>
		<?php if(has_post_thumbnail()) { ?>
			<hr>
			<div class="feature-box">
				<?php the_post_thumbnail(); ?>
			</div>
			<hr>
		<?php }?> 
	<?php }?>
	<div class="entry-content"><?php the_content();?></div>

	<?php if( get_theme_mod( 'pet_animal_store_tags',true) != '') { ?>
		<div class="tags my-3"><?php the_tags(); ?></div>
	<?php }?>

	<div class="clearfix"></div> 

	<?php
 	wp_link_pages( array(
	    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'pet-animal-store' ) . '</span>',
	    'after'       => '</div>',
	    'link_before' => '<span>',
	    'link_after'  => '</span>',
	    'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'pet-animal-store' ) . ' </span>%',
	    'separator'   => '<span class="screen-reader-text">, </span>',
	) );
	 
	if( get_theme_mod( 'pet_animal_store_comment',true) != '') {
		// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || '0' != get_comments_number() )
		comments_template();
	}

	if ( is_singular( 'attachment' ) ) {
		// Parent post navigation.
		the_post_navigation( array(
			'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'pet-animal-store' ),
		) );
	} elseif ( is_singular( 'post' ) ) {
		if( get_theme_mod( 'pet_animal_store_nav_links',true) != '') {
			// Previous/next post navigation.
			the_post_navigation( array(
				'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html(get_theme_mod('pet_animal_store_next_text',__( 'Next Post', 'pet-animal-store' ))) . '<i class="fas fa-chevron-right ml-1"></i></span> ' .
					'<span class="screen-reader-text">' . __( 'Next Post', 'pet-animal-store' ) . '</span> ' .
					'',
				'prev_text' => '<span class="meta-nav" aria-hidden="true"><i class="fas fa-chevron-left mr-1"></i>' . esc_html(get_theme_mod('pet_animal_store_prev_text',__( 'Previous Post', 'pet-animal-store' ))) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Previous Post', 'pet-animal-store' ) . '</span> ' .
					'',
			) );
		}
	}?>
</article>

<?php if (get_theme_mod('pet_animal_store_related_posts',true) != '') {
	get_template_part( 'template-parts/related-posts' );
}