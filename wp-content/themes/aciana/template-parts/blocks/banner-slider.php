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



$slidersContent = get_field('slider_items');
?>
<div class="<?= $uid; ?> <?= esc_attr($className); ?>">
    <?php
    if ($slidersContent) :
    ?>
        <div id="carousel-<?= $block['anchor'] ?? $block['id']; ?>" class="slick-slider">
            <?php
            foreach ($slidersContent as $slider) {
                $subimage = $slider['sub-image'];
                $bannertitle = $slider['banner_title'];
                $bannerdescription = $slider['banner_description'];
                $ctabutton = $slider['cta_button'];
                $ctalink = $slider['cta_link'];
                $bannerimage = $slider['banner_image'];
            ?>
                <div class="container">
                    <div class="row d-flex slider-item">
                        <div class="col-lg-7 banner-content-column">
                            <img class="img-fluid mb-3" src="<?php echo $subimage; ?>" alt="">
                            <h1 class="mb-3 lh-1 w-75 w-sm-100"> <?php echo $bannertitle; ?></h1>
                            <p class="h5 mb-4 w-75 w-sm-100"> <?php echo $bannerdescription; ?></p>
                            <div>
                                <a href="#" class="btn btn-primary btn-icon btn-iconColor text-white text-uppercase fw-bold icon-arrow p-3 mb-3"><?php echo $ctabutton; ?></a>
                            </div>
                            <div>
                                <a href="#" class="text-blue fw-bold"><?php echo $ctalink; ?></a>
                            </div>
                        </div>
                        <div class="col-lg-5 d-flex justify-content-lg-end justify-content-md-start">
                            <img class="img-fluid img-responsive" src="<?php echo $bannerimage; ?>" alt="">
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <script>
            jQuery(document).ready(function() {

                jQuery('#carousel-<?= $block['anchor'] ?? $block['id']; ?>').slick({
                    dots: true,
                    autoplay: true,
                    autoplaySpeed: 6000,
                    infinite: true,
                    fade: true,
                    arrows: false,
                });
            });
        </script>
    <?php
    endif;
    ?>
</div>