<?php
/**
 * Template Name: Refer a Patient
 *
 * Custom page template for the Refer a Patient page.
 */

get_header(); ?>

<div id="ry-pg-banner">
    <div class="col-xs-12 ry-bnr-wrp ry-el-bg" style="background-image: url('<?php
        if (function_exists('get_field')) {
            $banner_image = get_field('banner_image');
        }
        if (empty($banner_image)) {
            $banner_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
        }
        if (empty($banner_image)) {
            $banner_image = 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/ib.jpg';
        }
        echo esc_url($banner_image);
    ?>');">
        <div class="col-xs-12 ">
            <img src="<?php echo esc_url($banner_image); ?>" loading="lazy" alt="<?php the_title_attribute(); ?>" class="img-responsive">
        </div>
    </div>
    <div class="col-xs-12 ry-pg-title">
        <div class="col-xs-12 ry-container">
            <div>
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</div>

<div id="ry-pg-content">
    <div id="ry-pg-body" class="col-xs-12 ry-section" data-interior-layout="Sidebar">
        <div class="col-xs-12 ry-container">
            <div class="col-xs-12 ry-content">
                <div class="col-xs-12 col-md-12 col-lg-12 ">
                    <div class="col-xs-12 custom-form-v2">
                        <div class="col-xs-12 photo">
                            <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/contact_form_photos.jpg" loading="lazy" alt="" class="img-responsive">
                        </div>
                        <div class="col-xs-12 form-wrapper">
                            <div>
                                <h3>Referral Form</h3>
                                <p>We accept referrals for individuals seeking thoughtful, accessible mental health care. <br>&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;</p>
                            </div>
                            <div class="clearfix "></div>
                            <?php
                            // Check if Contact Form 7 is available
                            if (function_exists('wpcf7_contact_form')) {
                                // Use Contact Form 7 shortcode if available
                                echo do_shortcode('[contact-form-7 id="referral"]');
                            } else {
                                // Custom referral form
                                ?>
                                <form id="ReferralLead" class="cmsForm" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" enctype="multipart/form-data">
                                    <input type="hidden" name="action" value="submit_referral_form">
                                    <input type="hidden" name="form_type" value="referral">

                                    <div class="fieldset">
                                        <div class="col-xs-12 ">
                                            <div class="form-group required" data-type="text" data-required="true">
                                                <input name="Referring_Provider_Name" id="Referring_Provider_Name" type="text" placeholder="Referring Provider Name*" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 ">
                                            <div class="form-group" data-type="text" data-required="true">
                                                <input name="Referring_Provider_Practice" id="Referring_Provider_Practice" type="text" placeholder="Referring Provider Practice" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 ">
                                            <div class="form-group required" data-validation="^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" data-errormsg="Invalid Email Address" data-type="text" data-required="true">
                                                <input name="Referring_Provider_Email_Address" id="Referring_Provider_Email_Address" type="email" placeholder="Referring Provider Email Address*" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 ">
                                            <div class="form-group required" data-validation="^(([0-9]{1})*[- .(]*([0-9]{3})[- .)]*[0-9]{3}[- .]*[0-9]{4})+$" data-errormsg="Invalid Phone Number" data-type="text" data-required="true">
                                                <input name="Referring_Provider_Phone_Number" id="Referring_Provider_Phone_Number" type="tel" placeholder="Referring Provider Phone Number*" class="form-control pg-fields" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 ">
                                            <div class="form-group required" data-type="text" data-required="true">
                                                <input name="Patient_Name" id="Patient_Name" type="text" placeholder="Patient Name*" class="form-control pg-fields" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 ">
                                            <div class="form-group required" data-validation="^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" data-errormsg="Invalid Email Address" data-type="text" data-required="true">
                                                <input name="Patient_Email_Address" id="Patient_Email_Address" type="email" placeholder="Patient Email Address" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 ">
                                            <div class="form-group required" data-validation="^(([0-9]{1})*[- .(]*([0-9]{3})[- .)]*[0-9]{3}[- .]*[0-9]{4})+$" data-errormsg="Invalid Phone Number" data-type="text" data-required="true">
                                                <input name="Patient_Phone_Number" id="Patient_Phone_Number" type="tel" placeholder="Patient Phone Number" class="form-control pg-fields">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 ">
                                            <div class="form-group required" data-type="text" data-required="true">
                                                <input name="Patient_Insurance" id="Patient_Insurance" type="text" placeholder="Patient Insurance" class="form-control pg-fields">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 ">
                                            <div class="form-group" data-type="submit">
                                                <input id="recaptcha_contact_form" type="submit" class="ry-btn ry-btn-primary recaptcha" value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container-fluid" style="padding: 0;">
                                        <div class="alert alert-success hidden">Thank you! We will connect with you shortly.</div>
                                        <div class="alert alert-danger alert-missing-fields hidden">You are missing required fields.</div>
                                        <div class="alert alert-danger alert-custom-errors hidden">Dynamic Error Description</div>
                                        <div class="alert alert-danger alert-processing-error hidden">There was an error processing this form.</div>
                                    </div>
                                </form>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
