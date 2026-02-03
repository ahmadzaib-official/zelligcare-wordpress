<?php
/**
 * Template Name: Contact Us
 *
 * Custom page template for the Contact Us page
 */

get_header(); ?>

<div id="ry-pg-banner">
    <div class="col-xs-12 ry-bnr-wrp ry-el-bg" style="background-image: url('<?php
        // Check if ACF is available, otherwise use featured image or default
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
    <div class="col-xs-12 ">
        <div class="col-xs-12 ">
            <div id="ry-pg-body" class="col-xs-12 ry-section">
                <div class="col-xs-12 ry-container module-314">
                    <div class="col-xs-12 ry-content ry-flex">
                        <div class="col-xs-12 col-md-12 col-lg-12 ry-left">
                            <div data-aos-duration="1500" data-aos="fade-up" class="ry-headline" style="margin-bottom: 40px;">
                                <h2>Get In Touch</h2>
                            </div>
                            <div class="col-xs-12 ry-form ry-form-box" data-aos-duration="1500" data-aos="fade-up" data-aos-delay="300">
                                <?php
                                // Check if Contact Form 7 is available
                                if (function_exists('wpcf7_contact_form')) {
                                    // Use Contact Form 7 shortcode if available
                                    echo do_shortcode('[contact-form-7 id="contact"]');
                                } else {
                                    // Custom contact form
                                    ?>
                                    <form id="contactLead" class="cmsForm" method="post" action="<?php echo admin_url('admin-post.php'); ?>">
                                        <input type="hidden" name="action" value="submit_contact_form">
                                        <input type="hidden" name="form_type" value="contact">

                                        <div class="fieldset">
                                            <div class="col-xs-12 ">
                                                <div class="form-group required" data-type="text" data-required="true">
                                                    <input name="Name" value="" id="Name" type="text" placeholder="Enter Name" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="form-group required" data-validation="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" data-errormsg="Invalid Email Address" data-type="text" data-required="true">
                                                    <input name="Email" value="" id="Email" type="email" placeholder="Enter Email*" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="form-group required" data-validation="^(([0-9]{1})*[- .(]*([0-9]{3})[- .)]*[0-9]{3}[- .]*[0-9]{4})+$" data-errormsg="Invalid Phone Number" data-type="text" data-required="true">
                                                    <input name="Phone" value="" id="Phone" type="text" placeholder="Enter Number*" class="form-control pg-fields" required>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="form-group " data-type="text" data-required="true">
                                                    <textarea name="Message" id="Message" placeholder="Enter message" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="form-group" data-type="submit">
                                                    <input id="recaptcha_contact_form" type="submit" class="ry-btn ry-btn-primary recaptcha" value="Submit">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container-fluid" style="padding: 0;">
                                            <div class="alert alert-success hidden">
                                                Thank you! We will connect with you shortly.
                                            </div>
                                            <div class="alert alert-danger alert-missing-fields hidden">
                                                You are missing required fields.
                                            </div>
                                            <div class="alert alert-danger alert-custom-errors hidden">
                                                Dynamic Error Description
                                            </div>
                                            <div class="alert alert-danger alert-processing-error hidden">
                                                There was an error processing this form.
                                            </div>
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
</div>

<?php get_footer(); ?>
