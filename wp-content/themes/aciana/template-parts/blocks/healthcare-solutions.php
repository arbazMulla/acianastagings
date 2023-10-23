<?php

/**
 * Block Name: Healthcare Solutions
 *
 * This is the template for a custom block created with Advanced Custom Fields (ACF).
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$uid = $block['anchor'] ?? 'ahs-block-' . str_replace('block_', '', $block['id']);

$className = 'ahs-block-' . str_replace('acf/ahs-acf-', '', $block['name']);
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
    $className .= ' ' . $block['align'];
}
$contents = get_field('healthcare_solution_content');
$main_heading = get_field('main_heading');
?>
<div class="container-fluid">
    <div class="text-banner background-fluid background-Secondary py-sm-3 py-md-4 py-lg-5">

        <div class="container background-Secondary">
            <h2 class="text-center pb-4 pb-sm-3"><?php echo $main_heading; ?></h2>
            <div class="row px-3 px-sm-0">
                <?php
                if ($contents) :
                ?>
                    <?php
                    foreach ($contents as $content) {
                        $healthcare_image = $content['healthcare_image'];
                        $healthcare_title = $content['healthcare_title'];
                        $title_links = $content['title_links'];
                    ?>
                        <div class="col-sm-6 col-lg-3 healthcare_content py-sm-3 py-lg-0 my-2 my-sm-0">
                            <div class="content p-4  text-center h-100">
                                <img class="img-fluid mb-4" src=" <?php echo $healthcare_image; ?>" alt="">
                                <a href="<?php echo $title_links ?>">
                                    <h5 class="text-blue m-0 p-0"><?php echo $healthcare_title; ?></h5>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
            </div>
        </div>
    <?php

                endif;
    ?>
    </div>
</div>