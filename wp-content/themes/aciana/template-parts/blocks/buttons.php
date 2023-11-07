<?php

/**
 * Block Name: Button
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

$button_color = get_field('button_color');
$button_style = get_field('button_style');
$button_name = get_field('button_name');
$button_url = get_field('button_url');
$button_icon = get_field('button_icon');
$button_radius = get_field('button_radius');
?>
<div class="<?= $uid; ?> <?= esc_attr($className); ?>">
    <div class="button-block">
        <?php

        if ($button_style === 'link' && $button_icon === 'arrow' && $button_radius === 'yes') {
        ?>
            <a href="<?php echo esc_html($button_url); ?>" class="d-flex align-items-center fw-bold btn-width  btn <?php echo esc_attr('btn-' . $button_color . ' ' . 'btn-' . $button_style . ' ' . 'btn-icon icon-' . $button_icon . ' btn-' . $button_radius); ?>">
                <?php echo esc_html($button_name); ?>
            </a>
        <?php
        } elseif (!$button_style === 'link' || !$button_icon === 'arrow' || $button_radius == 'no') {
        ?>
            <a href="<?php echo esc_html($button_url); ?>" class="d-flex align-items-center fw-bold btn-width btn <?php echo esc_attr('btn-' . $button_color . ' icon-' . $button_icon . ' btn-' . $button_radius); ?>">
                <?php echo esc_html($button_name); ?>
            </a>
        <?php
        } elseif (!$button_style === 'link' || $button_icon === 'arrow' || $button_radius === 'no') {
        ?>
            <a href="<?php echo esc_html($button_url); ?>" class="d-flex align-items-center fw-bold btn-width  btn <?php echo esc_attr('btn-' . $button_color . ' btn-icon icon-' . $button_icon . ' btn-' . $button_radius); ?>">
                <?php echo esc_html($button_name); ?>
            </a>
        <?php
        } else {
        ?>
            <a href="<?php echo esc_html($button_url); ?>" class="d-flex align-items-center fw-bold btn-width  btn <?php echo esc_attr('btn-' . $button_color . ' btn-' . $button_radius); ?>">
                <?php echo esc_html($button_name); ?>
            </a>
        <?php
        }
        ?>
    </div>
</div>

<script src="<?php get_template_directory_uri() . '/template-parts/blocks/js/button.js' ?>"></script>