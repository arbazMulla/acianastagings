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
$main_heading = get_field('main_heading');
$image = get_field('image');
?>
<div class="<?= $uid; ?> <?= esc_attr($className); ?>">
    <?php if ($counter_numbers) : ?>
        <div class="container my-5">
            <div class="row py-3 py-md-5 flex-wrap factsheet">
                <h2 class="text-center main-title pb-2 pb-sm-4"><?php echo $main_heading; ?></h2>
                <div class="col-12 col-lg-6 d-flex flex-wrap justify-content-lg-around justify-content-md-start gap-md-3 gap-lg-0 mb-md-4 mb-lg-0">
                    <?php foreach ($counter_numbers as $counter) :
                        $number = $counter['number'];
                        $title = $counter['title'];
                        $description = $counter['description'];
                        $prefix = $counter['prefix'];
                        $postfix = $counter['postfix'];
                    ?>
                        <div class="col-12 col-md-5 p-3 m-1 facesheet-counter">
                            <div class="parent-counterup mb-3 text-center">
                                <span class="h2 child-counterup" placehoder=""><?php echo $prefix; ?></span>
                                <span class="mb-4 h2 child-counterup counter fw-medium"><?php echo $number; ?></span>
                                <span class="h2 child-counterup" placholder="+"><?php echo $postfix;  ?></span>
                            </div>
                            <div class="content">
                                <h5 class="factsheet_title mb-3 text-center"><?php echo $title; ?></h5>
                                <span class="factsheet_description text-center"><?php echo $description;  ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
                <div class="col-12 col-lg-6 d-flex align-items-center">
                    <img class="img-fluid mb-5" src=" <?php echo $image;
                                                        ?>" alt="" />
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<script>
    jQuery(document).ready(function() {
        jQuery('.counter').counterUp({
            delay: 10,
            time: 5000
        });
    });
</script>