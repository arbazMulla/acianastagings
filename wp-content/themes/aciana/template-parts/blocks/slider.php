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
<div class="<?= $uid; ?> <?= esc_attr($className); ?> py-lg-5 py-md-4 py-4">
    <?php
    if ($slidersContent) :
    ?>
        <div id="carousel-<?= $block['anchor'] ?? $block['id']; ?>" class="slick-slider mb-0">
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
                    <div class="row d-flex slider-item align-items-center">
                        <div class="col-lg-5 banner-content-column p-0">
                            <img class="img-fluid mb-4 img-responsive" src="<?php echo $subimage; ?>" alt="">
                            <h1 class="mb-4 w-75"> <?php echo $bannertitle; ?></h1>
                            <p class="mb-4 w-75 h4 fw-normal"> <?php echo $bannerdescription; ?></p>
                            <div class="mb-4">
                                <!-- btn-icon btn-iconColor btn-width  -->
                                <a href="#" class="d-flex btn btn-icon btn-iconColor  btn-primary btn-width text-white text-uppercase fw-bold icon-arrow py-3 py-lg-3 px-4 px-lg-4 "><?php echo $ctabutton; ?></a>
                            </div>
                            <div>
                                <a href="#" class="btn btn-link fw-bold h6"><?php echo $ctalink; ?></a>
                            </div>
                        </div>
                        <div class="col-lg-7 d-flex justify-content-lg-end justify-content-md-start ps-0 pt-md-3 pt-lg-0 pe-0">
                            <img class="img-fluid img-responsive" src="<?php echo $bannerimage; ?>" alt="">
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    <?php
    endif;
    ?>
</div>
<script>
    jQuery(document).ready(function() {

        jQuery('#carousel-<?= $block['anchor'] ?? $block['id']; ?>').slick({
            dots: true,
            // autoplay: true,
            autoplaySpeed: 6000,
            infinite: true,
            fade: true,
            arrows: false,
        });
    });
</script>