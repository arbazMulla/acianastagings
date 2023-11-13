<?php

/**
 * Block Name: Counter
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
$counter_numbers = get_field('counter_numbers');
// $image = get_field('image');
?>
<div class="<?= $uid; ?> <?= esc_attr($className); ?>">
    <?php if ($counter_numbers) : ?>
        <div class="container">
            <div class="row py-3 factsheet">
                <div class="d-flex flex-wrap   mb-md-4 mb-lg-0">
                    <?php foreach ($counter_numbers as $counter) :
                        $number = $counter['number'];
                        $title = $counter['title'];
                        $description = $counter['description'];
                        $prefix = $counter['prefix'];
                        $postfix = $counter['postfix'];
                    ?>
                        <div class="col-12 col-sm-6 p-3 facesheet-counter">
                            <div class="parent-counterup mb-3 text-center">
                                <span class="h2 child-counterup" placehoder=""><?php echo $prefix; ?></span>
                                <span class="mb-4 h2 child-counterup counter fw-medium"><?php echo $number; ?></span>
                                <span class="h2 child-counterup"><?php echo $postfix;  ?></span>
                            </div>
                            <div class="content">
                                <h5 class="factsheet_title mb-3 text-center"><?php echo $title; ?></h5>
                                <span class="factsheet_description text-center"><?php echo $description;  ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<script>
    jQuery(document).ready(function() {
        jQuery('.counter').counterUp({
            delay: 10,
            time: 5000,
        });
    });
</script>