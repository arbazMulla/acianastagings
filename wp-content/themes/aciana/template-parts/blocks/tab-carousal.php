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
    .contents {
        width: 100%;
    }

    .slick-slide {
        /* opacity: 0; */
        transition: all 0.5s ease;
        height: auto !important;
        /* Adjust the transition duration and easing function as needed */
    }

    /* Set initial opacity for all slides and images */
    .slick-slide img {
        opacity: 0;
        transition: opacity 0.5s ease;
        /* Adjust the transition duration and easing function as needed */
    }

    /* Set opacity for the active slide's image */
    .slick-slide.slick-current img {
        opacity: 1;
    }

    /* Set opacity for the active slide */
    .slick-slide.slick-current {
        opacity: 1;
    }

    .slick-slide:not(.slick-current) .contents p {
        display: none;
    }

    .slick-slide.slick-current .contents p {
        display: block;
    }

    .slick-initialized .slick-slide {
        height: 200px !important;
        position: relative;
    }

    .slick-initialized .slick-slide::before {
        content: '';
        position: absolute;
        top: 20px;
        left: 0;
        height: 80%;
        width: 8px;
        background-color: #cccccc4a;
        border-radius: 10px;
    }

    .slick-initialized .slick-slide.slick-current::before {
        background-color: #3C678C;
        /* Color for the active slide */
    }

    .slick-slider>.slick-list .draggable {
        height: 600px !important;
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
                    <div class="content-box d-flex" id="">
                        <div class="col-6">
                            <div class="d-flex align-items-center p-4 m-2 bar">
                                <div class="contents d-flex gap-lg-5">
                                    <div class="col-2">
                                        <img class="img-responsive" src="<?php echo  $image; ?>" alt="">
                                    </div>
                                    <div class="col-8">
                                        <h2 class="p-0 mb-2 text-secondary "><?php echo $title; ?></h2>
                                        <p class="mb-2 text-600"><?php echo $description; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6  d-flex align-items-center">
                            <div class="image-column">
                                <img class="img-responsive img-fluid" src="<?php echo $main_image; ?>" alt="">
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
        var draggableList = $('.slick--slider > .slick-list.draggable');
        draggableList.css('height', '800px');
        jQuery('.slick-slider').on('afterChange', function(event, slick, currentSlide) {
            // Reset the display property for all .contents elements
            jQuery('.slick-slide .contents').css('display', 'none');

            // Show .contents in the active slide
            jQuery('.slick-slide.slick-current .contents').css('display', 'flex'); // or any other display property

            // Show additional .contents in the other two slides when slidesToShow is set to 3
            if (currentSlide === 0) {
                jQuery('.slick-slide[data-slick-index="0"] .contents').css('display', 'flex');
                jQuery('.slick-slide[data-slick-index="2"] .contents').css('display', 'flex');
            } else if (currentSlide === 1) {

                jQuery('.slick-slide[data-slick-index="0"] .contents').css('display', 'flex');
                jQuery('.slick-slide[data-slick-index="2"] .contents').css('display', 'flex');


            } else if (currentSlide === 2) {
                jQuery('.slick-slide[data-slick-index="1"] .contents').css('display', 'flex');
            }

            console.log('Current slide:', currentSlide);
        });

        jQuery('.slick-slider').slick({
            slidesToShow: 3,
            infinite: false,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            vertical: true,
            arrows: false,
            dots: false,
            pauseOnHover: false,

        });


    });
</script>