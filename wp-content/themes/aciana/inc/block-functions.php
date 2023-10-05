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
        // register a Related News block
        // acf_register_block(
        //     array(
        //         'name' => 'ahs-acf-banner-slider',
        //         'category' => 'ahs-acf-blocks',
        //         'title' => 'Banner Slider1',
        //         'description' => 'A custom banner slider.',
        //         'render_callback' => 'ahs_acf_block_template',
        //         'render_template'    => '/template-parts/blocks/banner-slider.php',
        //         'icon' => 'layout',
        //         'mode' => 'edit',

        //     )
        // );
        acf_register_block_type([
            'name'                => 'acf/Interested in our products',
            'title'                => __('Interested in our products'),
            'description'        => __('A custom cta section'),
            'style'                =>  ['custom-acf-block-styles', 'custom-acf-block-scripts'],
            'render_template'    => 'template-parts/blocks/interestedinproducts.php',
            'mode'                => 'edit',
            'category'            => 'formatting'
        ]);

        acf_register_block(
            array(
                'name' => 'ahs-acf-banner-slider',
                'category' => 'ahs-acf-blocks',
                'title' => 'Banner Slider1',
                'description' => 'A custom banner slider.',
                'render_callback' => 'ahs_acf_block_template',
                'render_template'    => '/template-parts/blocks/banner-slider.php',
                'icon' => 'layout',
                'mode' => 'edit',
                'post_types' => array('page'),
                'enqueue_assets' => function () {
                    wp_enqueue_style('slick-theme', get_template_directory_uri() . '/slick/slick-theme.css', array(), true);
                    wp_enqueue_style('slick-css', get_template_directory_uri() . '/slick/slick.css', array(), true);
                    wp_enqueue_script('slick-js', get_template_directory_uri() . '/slick/slick.min.js', array('jquery'), true);
                    wp_enqueue_script('block-js', get_template_directory_uri() . '/template-parts/blocks/block.js', array(), filemtime(get_template_directory() . '/template-parts/blocks/block.js'), true);
                },

            )
        );

        // acf_register_block_type([
        //     'name'                => 'acf/Slider',
        //     'title'                => __('Banner Slider'),
        //     'description'        => __('A custom banner slider'),
        //     'style'                => 'custom-acf-block-styles',
        //     'render_template'    => 'template-parts/blocks/slider.php',
        //     'mode'                => 'preview',
        //     'category'            => 'formatting',
        //     'post_types' => array('page'),
        //     'enqueue_assets' => function () {
        //         wp_enqueue_style('slick-theme', get_template_directory_uri() . '/slick/slick-theme.css', array(), true);
        //         wp_enqueue_style('slick-css', get_template_directory_uri() . '/slick/slick.css', array(), true);
        //         wp_enqueue_script('slick-js', get_template_directory_uri() . '/slick/slick.min.js', array('jquery'), true);
        //         wp_enqueue_script('block-js', get_template_directory_uri() . '/template-parts/blocks/block.js', array(), filemtime(get_template_directory() . '/template-parts/blocks/block.js'), true);
        //     },
        // ]);
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
