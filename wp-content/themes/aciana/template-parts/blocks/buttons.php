<?php

/**
 * Block Name: Banner Slider
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

$button_color = get_field('button_color_text');
$button_text = get_field('button_text');
// $button_color_preview = get_field('button_color__preview');
?>
<div class="<?= $uid; ?> <?= esc_attr($className); ?> py-lg-5 py-md-4 py-4">
    <div class="button-block">
        <a href="#" class="btn <?php echo esc_attr('btn-' . $button_color); ?>">
            <?php echo esc_html($button_text); ?>
        </a>
    </div>
</div>

<script src="<?php get_template_directory_uri() . '/template-parts/blocks/js/button.js' ?>"></script>