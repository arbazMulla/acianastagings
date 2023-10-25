<?php
/*
* Get in Touch Template
*
*/

// Get the ACF field values
$primary_title = get_field('primary_title');
$secondary_title = get_field('secondary_title');
$cta_button = get_field('call_to_action');

?>
<div class="background-fluid background-primarylight py-5 py-lg-5 py-md-5 text-white">
    <div class="container">
        <div class="row align-items-center mainDiv">
            <div class="col-lg-9 col-12 ctaContent">
                <div class="getintouch_content py-lg-5 py-md-4 py-4">
                    <h3 class="text-primary-300 fw-bold pb-2 pb-sm-3 m-0 p-0"><?php echo $primary_title; ?></h3>
                    <p class="text-primary-300 fw-medium m-0 p-0"> <?php echo $secondary_title; ?></p>
                </div>
            </div>
            <div class="col-lg-3 col-12 d-flex justify-content-lg-end justify-content-start ctaBtn">
                <div class="interestedinctabtn">
                    <!-- btn-iconColor btn-icon icon-arrow  -->
                    <a class="d-flex align-items-center btn btn-primarylight py-3 px-4 fw-medium" href="#">Get in Touch
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

</div>