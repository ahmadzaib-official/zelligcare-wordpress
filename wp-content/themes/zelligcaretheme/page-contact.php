<?php
/**
 * Template Name: Contact Us
 *
 * Custom page template for the Contact Us page
 */

get_header();

get_template_part('template-parts/page-banner');
?>

<div id="ry-pg-content">
    <div class="col-xs-12 ">
        <div class="col-xs-12 ">
            <div id="ry-pg-body" class="col-xs-12 ry-section">
                <div class="col-xs-12 ry-container module-314">
                    <div class="col-xs-12 ry-content ry-flex">
                        <div class="col-xs-12 col-md-12 col-lg-12 ry-left">
                            <?php
                            // Use WordPress page content for heading and intro
                            if (have_posts()) :
                                while (have_posts()) : the_post();
                                    $content = get_the_content();
                                    if (!empty(trim(strip_tags($content)))) {
                                        echo '<div data-aos-duration="1500" data-aos="fade-up" class="ry-headline" style="margin-bottom: 40px;">';
                                        echo apply_filters('the_content', $content);
                                        echo '</div>';
                                    } else {
                                        // Default heading
                                        echo '<div data-aos-duration="1500" data-aos="fade-up" class="ry-headline" style="margin-bottom: 40px;">';
                                        echo '<h2>Get In Touch</h2>';
                                        echo '</div>';
                                    }
                                endwhile;
                            endif;
                            ?>
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
