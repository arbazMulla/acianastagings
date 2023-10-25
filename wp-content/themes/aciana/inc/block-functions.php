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
        //Home- Banner Slider Block
        acf_register_block(
            array(
                'name'              => 'ahs-acf-banner-slider',
                'category'          => 'ahs-acf-blocks',
                'title'             => 'Banner Slider',
                'description'       => 'A custom banner slider block',
                'render_callback'   => 'ahs_acf_block_template',
                'render_template'   => '/template-parts/blocks/banner-slider.php',
                'icon'              => 'layout',
                'mode'              => 'edit',
                'post_types'        => array('page'),
                'enqueue_assets'    => function () {
                    wp_enqueue_style('slick-theme', get_template_directory_uri() . '/slick/slick-theme.css', array(), true);
                    wp_enqueue_style('slick-css', get_template_directory_uri() . '/slick/slick.css', array(), true);
                    wp_enqueue_script('slick-js', get_template_directory_uri() . '/slick/slick.min.js', array('jquery'), true);
                },
            )
        );

        //Home- CTA Block
        acf_register_block_type([
            'name'              => 'ahs-acf-get-in-touch',
            'category'          => 'ahs-acf-blocks',
            'title'             => 'Get In Touch',
            'description'       => 'A custom get in touch block',
            'render_callback'   => 'ahs_acf_block_template',
            'render_template'   => '/template-parts/blocks/get-in-touch.php',
            'icon'              => 'layout',
            'mode'              => 'edit',
            'post_types'        => array('page'),
        ]);
        //Home- Main Content Block
        acf_register_block_type([
            'name'              => 'ahs-acf-main-content',
            'category'          => 'ahs-acf-blocks',
            'title'             => 'Main Content',
            'description'       => 'A custom main content block',
            'render_callback'   => 'ahs_acf_block_template',
            'render_template'   => '/template-parts/blocks/main-content.php',
            'icon'              => 'layout',
            'mode'              => 'edit',
            'post_types'        => array('page'),
        ]);
        //Home- Healthcare Solution Block
        acf_register_block_type([
            'name'              => 'ahs-acf-healthcare-solutions',
            'category'          => 'ahs-acf-blocks',
            'title'             => 'Healthcare Solutions',
            'description'       => 'A custom healthcare solution block',
            'render_callback'   => 'ahs_acf_block_template',
            'render_template'   => '/template-parts/blocks/healthcare-solutions.php',
            'icon'              => 'layout',
            'mode'              => 'edit',
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
