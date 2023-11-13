<?php

/**
 * Block Name: Icon Box
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

$image = get_field('image');
$content = get_field('content');
$bg = get_field('background');
$color = get_field('text_color');
?>

<div class="<?= $uid; ?> <?= esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <?php
            if ($bg === 'primary' || $bg === 'secondary' || $bg === 'white') :
            ?>
                <div class="icon_content  d-flex align-items-center gap-4 my-2 p-3  <?php echo esc_attr('bg-' . $bg); ?>">
                    <img class="img-fluid img-responsive" src="<?php echo $image; ?>" alt="">
                    <h6 class="fw-600 mb-0 <?php echo esc_attr('text-' . $color) ?>"><?php echo $content; ?></h6>
                </div>
            <?php
            else :
            ?>
                <div class="icon_content d-flex align-items-center gap-4 my-2 p-3">
                    <img class="img-fluid img-responsive" src="<?php echo $image; ?>" alt="">
                    <h6 class="fw-600 mb-0"><?php echo $content; ?></h6>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>