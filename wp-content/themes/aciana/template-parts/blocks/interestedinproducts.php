<?php
/*
* Interested in Our Products Template
*
*/

// Get the ACF field values
$primary_title = get_field('primary_title');
$secondary_title = get_field('secondary_title');
$cta_button = get_field('call_to_action');

?>
<div class="interestedinctasection">
    <div class="container">
        <div class="row align-items-center mainDiv">
            <div class="col-lg-9 col-md-9 col-12 ctaContent">
                <div class="getintouch_content">
                    <h3><?php echo $primary_title; ?></h3>
                    <p> <?php echo $secondary_title; ?></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-12 d-flex justify-content-center ctaBtn">
                <div class="interestedinctabtn">
                    <a class="d-flex align-items-center" href="#">Get in Touch
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.2929 4.29289C12.6834 3.90237 13.3166 3.90237 13.7071 4.29289L20.7071 11.2929C21.0976 11.6834 21.0976 12.3166 20.7071 12.7071L13.7071 19.7071C13.3166 20.0976 12.6834 20.0976 12.2929 19.7071C11.9024 19.3166 11.9024 18.6834 12.2929 18.2929L17.5858 13H4C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11H17.5858L12.2929 5.70711C11.9024 5.31658 11.9024 4.68342 12.2929 4.29289Z" fill="#000000" />
                        </svg></a>
                </div>
            </div>
        </div>
    </div>
</div>

</div>