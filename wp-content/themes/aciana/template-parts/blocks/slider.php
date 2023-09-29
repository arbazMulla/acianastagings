<?php
$slidersContent = get_field('slider_items');
if ($slidersContent) :
    foreach ($slidersContent as $slider) {
        $subimage = $slider['sub-image'];
        $bannertitle = $slider['banner_title'];
        $bannerdescription = $slider['banner_description'];
        $ctabutton = $slider['cta_button'];
        $ctalink = $slider['cta_link'];
        $bannerimage = $slider['banner_image'];
?>
        <div class="container">
            <div class="row">
                <div class="slider-container">
                    <div class="slider slick-slider">
                        <div class="slider-item slick-slide d-flex">
                            <div class="col-lg-7 ">
                                <img class="img-auto" src="<?php echo $subimage; ?>" alt="">
                                <h1> <?php echo $bannertitle; ?></h1>
                                <p class="pb-5"> <?php echo $bannerdescription; ?></p>
                                <a href="#" class=""><?php echo $ctabutton; ?></a>
                                <a href="#" class=""><?php echo $ctalink; ?></a>
                            </div>
                            <!-- <div class="col-lg-7 bannercolumn1">
                                <img class="banner_subimage" src="<?php #echo $subimage; 
                                                                    ?>" alt="">
                                <h1 class="banner_title"> <?php #echo $bannertitle; 
                                                            ?></h1>
                                <p class="banner_description"> <?php #echo $bannerdescription; 
                                                                ?></p>
                                <a href="#" class="btn_cta"><?php #echo $ctabutton; 
                                                            ?></a>
                                <a href="#" class="btn_cta"><?php #echo $ctalink; 
                                                            ?></a>
                            </div>
                            <div class="col-lg-7 ">
                                <img width="500" height="auto" src="<?php echo $bannerimage; ?>" alt="">
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
endif;
?>

<script>
    jQuery(document).ready(function($) {
        $('.slider').slick({
            autoplay: false,
            // dots: true,
            // arrows: true,
            // prevArrow: '<button type="button" class="slick-prev">Previous</button>',
            // nextArrow: '<button type="button" class="slick-next">Next</button>'
        });
    });
</script>