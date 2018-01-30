<?php
/**
 * Template Name: Homepage
 *
 */
get_header(); ?>

	<div id="primary" class="full-width">
		<main id="content" role="main">
            <?php
            global $post;
            for ( $i=1 ; $i<=6 ; $i++ ) {
                $title    = get_post_meta( $post->ID, 'title_'.$i, true );
                $code     = get_post_meta( $post->ID, 'embed_code_'.$i, true );
                $image    = get_post_meta( $post->ID, 'img_'.$i, true );
                $excerpt  = get_post_meta( $post->ID, 'excerpt_'.$i, true );
                $link     = get_post_meta( $post->ID, 'link_'.$i, true );


            }
            ?>
		</main><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>