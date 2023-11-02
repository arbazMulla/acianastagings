<?php

/**
 * Block Name: Content Block
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

$content_block = get_field('content_block');
?>

<div class="<?= $uid; ?> <?= esc_attr($className); ?> mt-lg-4">
    <?php
    if ($content_block) :
        foreach ($content_block as $content) {
            $icon = $content['icon'];
            $description = $content['description'];
    ?>

            <div class="container">
                <div class="row">
                    <div class="col-lg-2 p-0 m-0 pt-2">
                        <img class="img-fluid mb-4 img-responsive" src="<?php echo $icon; ?>" alt="">
                    </div>
                    <div class="col-lg-10 p-0 m-0">
                        <?php echo $description; ?>
                    </div>
                </div>
            </div>
    <?php
        }
    endif;
    ?>
</div>