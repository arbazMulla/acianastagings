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
                <div class="row d-flex slider-item">
                    <div class="col-lg-6 py-md-5">
                        <img class="img-auto mb-2" src="<?php echo $subimage; ?>" alt="">
                        <h1 class="mb-3"> <?php echo $bannertitle; ?></h1>
                        <p class="h5"> <?php echo $bannerdescription; ?></p>
                        <div>
                            <a href="#" class="btn btn-primary btn-icon icon-arrow p-2 mb-2"><?php echo $ctabutton; ?></a>
                        </div>
                        <div>
                            <a href="#" class="btn btn-link "><?php echo $ctalink; ?></a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-lg-end justify-content-md-start">
                        <img class="img-fluid" src="<?php echo $bannerimage; ?>" alt="">
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <script>
            jQuery(document).ready(function() {

                $('#carousel-<?= $block['anchor'] ?? $block['id']; ?>').slick({
                    dots: true,
                    autoplay: true,
                    autoplaySpeed: 6000,
                    infinite: true,
                    // fade: true,
                    transition: '5s ease-in-out'
                });
            });
        </script>
    <?php
    endif;
    ?>
</div>