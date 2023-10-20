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
    <div class="container-fluid">
        <div class="text-banner background-Secondary">
            <div class="container">
                <div class="row py-sm-5  p-xsm-3">
                    <div class="col-xs-12 col-lg-6 p-3 p-lg-4 p-md-4  p-xs-0">
                        <h3><?php echo $tb_main_text; ?></h3>
                    </div><!-- .col -->
                    <div class="col-xs-12 col-lg-6 p-3 p-lg-4  p-md-4 p-xs-0">
                        <?php echo $tb_content; ?>
                    </div><!-- .col -->
                </div><!-- .row -->
            </div>
        </div><!-- text-banner. -->
    </div>
<?php } ?>