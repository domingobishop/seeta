<?php
/**
 * Template Name: Homepage
 *
 */
get_header(); ?>

	<div id="primary" class="full-width">
		<main id="content" role="main">
            <?php
            while ( have_posts() ) : the_post();
            global $post;
            $main_code     = get_post_meta( $post->ID, 'si_home_main_embed_code', true );
            ?>
            <section class="section-0 intro">
                <div class="si-row">
                    <div class="si-col">
                        <div class="si-content">
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="entry-header">
                                    <h1><?php the_title(); ?></h1>
                                </div>
                                <div class="entry-content subheader">
                                    <?php the_content(); ?>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="si-col">
                        <div class="si-content">
                            <div class="videoWrapper">
                                <?php echo $main_code ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php

            for ( $i=1 ; $i<=6 ; $i++ ) {
                $title    = get_post_meta( $post->ID, 'title_'.$i, true );
                $code     = get_post_meta( $post->ID, 'embed_code_'.$i, true );
                $image    = get_post_meta( $post->ID, 'img_'.$i, true );
                $excerpt  = get_post_meta( $post->ID, 'excerpt_'.$i, true );
                $link     = get_post_meta( $post->ID, 'link_'.$i, true );

                if ($i % 2) {
                    // Odd

                } else {
                    // Even

                }
            }

            endwhile; ?>
		</main><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>