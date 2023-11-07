<?php

/**
 * Block Name: Item List
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
$button_color = get_field('button_color');
$button_style = get_field('button_style');
$button_name = get_field('button_name');
$button_url = get_field('button_url');
$button_icon = get_field('button_icon');
?>

<div class="<?= $uid; ?> <?= esc_attr($className); ?> mt-lg-4">
    <?php
    if ($content_block) :
    ?>
        <div class="container">
            <?php
            foreach ($content_block as $content) {
                $icon = $content['icon'];
                $description = $content['description'];
            ?>
                <div class="row gap-4 gap-sm-0">

                    <div class="col-lg-2 col-1 p-0 m-0 pt-2">
                        <img class="img-fluid mb-4 img-responsive" src="<?php echo $icon; ?>" alt="">
                    </div>
                    <div class="col-lg-10 col-10 p-0 m-0">
                        <?php echo $description; ?>
                    </div>

                </div>
            <?php } ?>
            <div class="row gap-4 gap-sm-0">
                <div class="col-lg-2 col-1 p-0 m-0 pt-2">
                </div>
                <div class="col-lg-10 col-10 p-0 m-0">
                    <?php

                    if ($button_icon === 'arrow' && $button_style === 'link') {
                    ?>
                        <a href="<?php echo esc_html($button_url); ?>" class="d-flex align-items-center fw-bold btn-width  btn <?php echo esc_attr('btn-' . $button_color . ' ' . 'btn-' . $button_style . ' ' . 'btn-icon icon-' . $button_icon); ?>">
                            <?php echo esc_html($button_name); ?>
                        </a>
                    <?php
                    } elseif ($button_icon === 'arrow'  && $button_style === 'none') {
                    ?>
                        <a href="<?php echo esc_html($button_url); ?>" class=" arrowYlinkN d-flex align-items-center fw-bold btn-width  btn <?php echo esc_attr('btn-' . $button_color  . ' ' . 'btn-icon icon-' . $button_icon); ?>">
                            <?php echo esc_html($button_name); ?>
                        </a>
                    <?php
                    } elseif ($button_style === 'link' && $button_icon === 'none') {
                    ?>
                        <a href="<?php echo esc_html($button_url); ?>" class="linkYarrowN d-flex align-items-center fw-bold btn-width  btn <?php echo esc_attr('btn-' . $button_color . ' ' . 'btn-' . $button_style . ' ' . 'icon-' . $button_icon); ?>">
                            <?php echo esc_html($button_name); ?>
                        </a>
                    <?php
                    } else {
                    ?>
                        <a href="<?php echo esc_html($button_url); ?>" class=" else d-flex align-items-center fw-bold btn-width  btn <?php echo esc_attr('btn-' . $button_color); ?>">
                            <?php echo esc_html($button_name); ?>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

    <?php
    endif;
    ?>
</div>