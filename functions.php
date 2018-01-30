<?php

include 'create-metabox.php';

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

    for ( $i = 1; $i <= 6; $i ++ ) {

        $home_meta_boxes =
            array(
                'id'       => 'home_'.$i,
                'title'    => 'Homepage section '.$i,
                'pages'    => 'page',
                'context'  => 'normal',
                'priority' => 'high',
                'fields'   => array(
                    array(
                        'name' => 'Title',
                        'desc' => '',
                        'id'   => 'title_'.$i,
                        'type' => 'text',
                        'std'  => ''
                    ),
                    array(
                        'name' => 'Embed code',
                        'desc' => '',
                        'id'   => 'embed_code_'.$i,
                        'type' => 'textarea',
                        'std'  => ''
                    ),
                    array(
                        'name' => 'Image',
                        'desc' => '',
                        'id'   => 'img_'.$i,
                        'type' => 'media',
                        'std'  => ''
                    ),
                    array(
                        'name' => 'Excerpt',
                        'desc' => '',
                        'id'   => 'excerpt_'.$i,
                        'type' => 'text',
                        'std'  => ''
                    ),
                    array(
                        'name' => 'Link',
                        'desc' => '',
                        'id'   => 'link_'.$i,
                        'type' => 'text',
                        'std'  => ''
                    )
                )
            );
    }

    $template_file = get_post_meta($post_id, '_wp_page_template', true);

    if( $template_file == 'page-home.php' ) {
        foreach ( $home_meta_boxes as $meta_box ) {
            $box = new Create_Meta_Box( $meta_box );
        }
    }
}