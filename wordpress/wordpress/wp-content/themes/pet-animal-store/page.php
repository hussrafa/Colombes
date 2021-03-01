<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Pet Animal Store
 */
get_header(); ?>

<?php do_action( 'pet_animal_store_header_page' ); ?>

<div class="container">
    <main id="main" role="main" class="middle-align py-4">
        <div class="content-aa" >
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="feature-box">
                    <?php the_post_thumbnail(); ?>
                </div>
                <h1><?php esc_html(the_title()); ?></h1>   
                <div class="entry-content"><?php the_content();?></div>
                <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'pet-animal-store' ),
                    'after'  => '</div>',
                ) );
                
                //If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                        comments_template();
                ?>
                <div class="clearfix"></div>
            <?php endwhile; // end of the loop. ?>             
        </div>            
    </main>
</div>

<?php do_action( 'pet_animal_store_footer_page' ); ?>

<?php get_footer(); ?>