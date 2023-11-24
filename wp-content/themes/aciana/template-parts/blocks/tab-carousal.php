<?php

/**
 * Block Name: Tab Carousal
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

$tabs_carousal = get_field('tabs_carousal');

?>

<style>
    .slick-slide:not(.slick-current) .image-column img {
        display: none;
    }

    .slick-slide.slick-current .image-column img {
        display: block;
    }
</style>

<div class="<?= $uid; ?> <?= esc_attr($className); ?> mt-lg-5 py-md-5 py-4">
    <div class="container slick">
        <div class="row slick-slider">
            <?php
            if ($tabs_carousal) :
                foreach ($tabs_carousal as $tabs) :
                    $image = $tabs['image'];
                    $title = $tabs['title'];
                    $description = $tabs['description'];
                    $main_image =  $tabs['main_image'];
            ?>
                    <div class="content-box d-flex flex-wrap mb-4" id="">
                        <div class="col-6">
                            <div class="d-flex align-items-center p-4">
                                <div class="contents d-flex gap-lg-5">
                                    <div class="col-2">
                                        <img class="img-responsive" src="<?php echo  $image; ?>" alt="">
                                    </div>
                                    <div class="col-8">
                                        <h2 class="p-0 mb-2 text-secondary "><?php echo $title; ?></h2>
                                        <p class="mb-3 text-600"><?php echo $description; ?></p>
                                        <div class="btnBlock">
                                            <InnerBlocks />
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="image-column h-100">
                                <img class="img-responsive img-fluid" src="<?php echo $main_image;
                                                                            ?>" alt="">
                            </div>
                        </div>
                    </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function($) {
        let sDraggable = $('.slick-list .draggable');
        sDraggable.css('height', '500px');
        jQuery('.slick-slider').slick({
            autoplay: true,
            dots: true,
            autoplaySpeed: 2000,
            vertical: true,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: false,
            pauseOnHover: false,
        });






    });
</script>