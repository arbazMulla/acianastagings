<?php

/**
 * Block Name: Accordians
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

$main_heading = get_field('main_heading');
$accordian = get_field('accordian_items');

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
<div class="<?= $uid; ?> <?= esc_attr($className); ?>">
    <div class="background-fluid background-Secondary py-lg-5">
        <div class="container">
            <h2 class="text-center main-title pb-2 mx-3 mx-md-0 pb-sm-4"><?php echo $main_heading;  ?></h2>
            <div class="row bg-white p-2 p-md-3 p-lg-5 mx-3 mx-md-0 accordian_section">
                <?php
                if ($accordian) :
                    foreach ($accordian as $acc) :
                        $accordian_title = $acc['accordian_title'];
                        $accordian_content = $acc['accordian_content'];
                ?>
                        <div class="col-12">
                            <button class="accordion fw-normal d-flex gap-4 align-items-start align-items-sm-center"><?php echo $accordian_title; ?></button>
                            <div class="panel">
                                <?php echo $accordian_content; ?>
                            </div>
                        </div>
                <?php endforeach;
                endif; ?>
            </div>
        </div>

    </div>
</div>

<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }
</script>