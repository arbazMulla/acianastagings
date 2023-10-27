<?php

/**
 * Block Name: Main Content
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

$tb_main_text = get_field('tb_main_text');
$tb_content = get_field('tb_content');
if ($tb_main_text || $tb_content) {
?>

    <div class="background-fluid background-Secondary mt-5 mb-lg-5 mb-md-4 mb-3 py-lg-5 py-md-4 ">
        <div class="container px-4 px-sm-0 pt-2 pt-sm-3 pt-md-4">
            <div class="row pt-5 pt-lg-0 px-3 px-sm-4 main-content">
                <div class="col-xs-12 col-lg-6 p-0 pe-lg-4 pb-3 px-1 px-sm-0">
                    <h3 class="fw-bolder"><?php echo $tb_main_text; ?></h3>
                </div>
                <div class="col-xs-12 col-lg-6 p-0 ps-lg-4 px-1 px-sm-0">
                    <?php echo $tb_content; ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>