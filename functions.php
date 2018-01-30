<?php

include 'create-metabox.php';

add_action( 'init', 'home_meta_boxes' );
add_action( 'wp_enqueue_scripts', 'seeta_styles' );

// Enqueue styles
function seeta_styles() {
    wp_register_style( 'seeta-styles', get_stylesheet_directory_uri() . '/seeta.css', array(), '', 'all' );
    wp_enqueue_style( 'seeta-styles' );
}

function home_meta_boxes() {

    if (isset($_GET['post'])) {
        $post_id = $_GET['post'];
    } else {
        if (isset($_POST['post_ID'])) {
            $post_id = $_POST['post_ID'];
        } else {
            $post_id = '';
        }
    }
    if( !isset( $post_id ) ) return;

    $home_meta_boxes = array(
        array(
            'id' => 'page_options',
            'title' => 'Page options',
            'pages' => 'page',
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'name' => 'Header video embed code',
                    'desc' => '',
                    'id'   => 'si_home_main_embed_code',
                    'type' => 'textarea',
                    'std'  => ''
                )
            )
        )
    );

    for ( $i = 1; $i <= 6; $i ++ ) {

        $home_meta_boxes[] =
            array(
                'id'       => 'si_home_'.$i,
                'title'    => 'Homepage section '.$i,
                'pages'    => 'page',
                'context'  => 'normal',
                'priority' => 'high',
                'fields'   => array(
                    array(
                        'name' => 'Title',
                        'desc' => '',
                        'id'   => 'si_home_title_'.$i,
                        'type' => 'text',
                        'std'  => ''
                    ),
                    array(
                        'name' => 'Embed code',
                        'desc' => '',
                        'id'   => 'si_home_embed_code_'.$i,
                        'type' => 'textarea',
                        'std'  => ''
                    ),
                    array(
                        'name' => 'Image',
                        'desc' => '',
                        'id'   => 'si_home_img_'.$i,
                        'type' => 'text',
                        'std'  => ''
                    ),
                    array(
                        'name' => 'Excerpt',
                        'desc' => '',
                        'id'   => 'si_home_excerpt_'.$i,
                        'type' => 'text',
                        'std'  => ''
                    ),
                    array(
                        'name' => 'Link',
                        'desc' => '',
                        'id'   => 'si_home_link_'.$i,
                        'type' => 'text',
                        'std'  => ''
                    )
                )
            );
    }

    $template_file = get_post_meta($post_id, '_wp_page_template', true);

    if( $template_file == 'page-home.php' ) {
        foreach ( $home_meta_boxes as $meta_box ) {
            $box = new CreateMetaBox( $meta_box );
        }
    }
}

function home_section( $i, $title, $code, $excerpt ) {

    if ($i % 2) {
        // Odd
        $html = '<section class="section-'.$i.' home-item">
                <div class="si-row">
                    <div class="si-col">
                        <div class="si-content">
                            <div class="videoWrapper">
                                '.$code.'
                            </div>
                        </div>
                    </div>
                    <div class="si-col">
                        <div class="si-content">
                            <article>
                                <div class="entry-header">
                                    <h2>'.$title.'</h2>
                                </div>
                                <div class="entry-content subheader">
                                    '.$excerpt.'
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </section>';
    } else {
        // Even
        $html = '<section class="section-'.$i.' home-item home-grey">
                <div class="si-row">
                    <div class="si-col">
                        <div class="si-content">
                            <article>
                                <div class="entry-header">
                                    <h2>'.$title.'</h2>
                                </div>
                                <div class="entry-content subheader">
                                    '.$excerpt.'
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="si-col">
                        <div class="si-content">
                            <div class="videoWrapper">
                                '.$code.'
                            </div>
                        </div>
                    </div>
                </div>
            </section>';
    }

    if ($title) {
        return $html;
    }
}