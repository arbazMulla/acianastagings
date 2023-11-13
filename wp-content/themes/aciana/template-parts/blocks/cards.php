<?php

/**
 * Block Name: Cards
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

?>
<div class="<?= $uid; ?> <?= esc_attr($className); ?>">
    <div class="py-5 pb-5 mb-4">
        <div class="container pb-lg-5">
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
                        <div class=" card_content col-sm-6 col-lg-3 py-sm-3 py-lg-0 my-2 my-sm-0 mb-lg-4">
                            <div class="content p-4 p-md-5 text-center h-100">
                                <img class="img-fluid mb-5" src=" <?php echo $healthcare_image; ?>" alt="">
                                <a href="<?php echo $title_links ?>">
                                    <h5 class="text-black fw-bold m-0 p-0"><?php echo $healthcare_title; ?></h5>
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