<?php
function ahs_acf_block_categories($categories, $post)
{
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'ahs-acf-blocks',
                'title' => 'Aciana | ACF Blocks',
            )
        )
    );
}
add_filter('block_categories', 'ahs_acf_block_categories', 10, 2);

add_action('acf/init', 'ahs_acf_init');

function ahs_acf_init()
{
    if (function_exists('acf_register_block_type')) {

        acf_register_block(
            array(
                'name'              => 'ahs-acf-slider',
                'category'          => 'ahs-acf-blocks',
                'title'             => 'Slider',
                'description'       => 'Create a dynamic slider block to showcase images or content in a sliding carousel format.',
                'render_callback'   => 'ahs_acf_block_template',
                'icon'              => 'layout',
                'mode'              => 'preview',
                'post_types'        => array('page'),
                'enqueue_assets'    => function () {
                    wp_enqueue_style('slick-theme', get_template_directory_uri() . '/slick/slick-theme.css', array(), true);
                    wp_enqueue_style('slick-css', get_template_directory_uri() . '/slick/slick.css', array(), true);
                    wp_enqueue_script('slick-js', get_template_directory_uri() . '/slick/slick.min.js', array('jquery'), true);
                },
            )
        );

        acf_register_block_type([
            'name'              => 'ahs-acf-cards',
            'category'          => 'ahs-acf-blocks',
            'title'             => 'Cards',
            'description'       => 'Cards/Tiles with icons and title',
            'render_callback'   => 'ahs_acf_block_template',
            'icon'              => 'layout',
            'mode'              => 'preview',
            'post_types'        => array('page'),
        ]);

        acf_register_block_type([
            'name'              => 'ahs-acf-buttons',
            'category'          => 'ahs-acf-blocks',
            'title'             => 'Button',
            'description'       => 'A customizable button with options for text, link, and style',
            'render_callback'   => 'ahs_acf_block_template',
            'icon'              => 'layout',
            'mode'              => 'edit',
            'post_types'        => array('page'),

        ]);

        acf_register_block_type(array(
            'name'              => 'ahs-acf-container-block',
            'category'          => 'ahs-acf-blocks',
            'title'             => 'Container',
            'description'       => 'A block that allows you to add an inner block to a container block.',
            'render_callback'   => 'ahs_acf_block_template',
            'icon'              => 'layout',
            'mode'              => 'preview',
            'supports'          => array(
                'align' => false,
                "jsx"   => true
            ),
        ));

        acf_register_block_type([
            'name'              => 'ahs-acf-item-list',
            'category'          => 'ahs-acf-blocks',
            'title'             => 'Item list',
            'description'       => 'Create a list of items',
            'render_callback'   => 'ahs_acf_block_template',
            'icon'              => 'layout',
            'mode'              => 'preview',
            'post_types'        => array('page'),
        ]);

        acf_register_block_type([
            'name'              => 'ahs-acf-icon-box',
            'category'          => 'ahs-acf-blocks',
            'title'             => 'Icon Box',
            'description'       => 'Display content with an icon in a stylish box',
            'render_callback'   => 'ahs_acf_block_template',
            'icon'              => 'layout',
            'mode'              => 'preview',
            'post_types'        => array('page'),
        ]);

        acf_register_block_type([
            'name'              => 'ahs-acf-counter',
            'category'          => 'ahs-acf-blocks',
            'title'             => 'Counter/Statistics',
            'description'       => 'Display a dynamic counter',
            'render_callback'   => 'ahs_acf_block_template',
            'icon'              => 'layout',
            'mode'              => 'preview',
            'post_types'        => array('page'),
            'enqueue_assets'    => function () {

                wp_enqueue_script('waypoint', 'https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js', array('jquery'), true);
                wp_enqueue_script('counter', 'https://cdn.jsdelivr.net/jquery.counterup/1.0/jquery.counterup.min.js', array('jquery'), true);
            },
        ]);

        acf_register_block_type([
            'name'              => 'ahs-acf-accordians',
            'category'          => 'ahs-acf-blocks',
            'title'             => 'Accordians',
            'description'       => 'Organize and display content with an accordion-style interface',
            'render_callback'   => 'ahs_acf_block_template',
            'icon'              => 'layout',
            'mode'              => 'preview',
            'post_types'        => array('page'),
        ]);
    }
}
function ahs_acf_block_template($block)
{

    // convert slug name ("acf/ahs-acf-testimonial") into path friendly slug ("testimonial")
    $slug = str_replace('acf/ahs-acf-', '', $block['name']);

    // template parts from within the "template-parts/blocks" folder
    $block_template = get_theme_file_path("/template-parts/blocks/{$slug}.php");

    // fallback to default block template
    $default_template = get_theme_file_path("/template-parts/blocks/default.php");

    // checking if block template exists
    if (!file_exists($block_template)) {
        $block_template = $default_template;
    }

    // Including template for custom block
    include($block_template);
}
