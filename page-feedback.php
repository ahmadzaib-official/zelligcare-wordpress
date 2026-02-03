<?php
/**
 * Template Name: Feedback
 *
 * Custom page template for the Feedback page.
 * Heading and description editable via meta box. Sidebar via partial.
 */

get_header();

get_template_part('template-parts/page-banner');

$feedback_heading = get_post_meta(get_the_ID(), 'feedback_heading', true);
if (empty($feedback_heading)) {
    $feedback_heading = 'Thank you for your honesty.';
}
$feedback_description = get_post_meta(get_the_ID(), 'feedback_description', true);
if (empty($feedback_description)) {
    $feedback_description = 'We&rsquo;re truly sorry we missed the mark. Tell us about your experience so we can make it right.';
}
?>

<div id="ry-pg-content">
    <div id="ry-pg-body" class="col-xs-12 ry-section" data-interior-layout="Sidebar">
        <div class="col-xs-12 ry-container">
            <div class="col-xs-12 ry-content ry-flex">
                <div class="col-xs-12 col-md-8 col-lg-8 ry-left">
                    <div class="col-xs-12 ry-form ry-form-box">
                        <div>
                            <h3><?php echo esc_html($feedback_heading); ?></h3>
                            <p><?php echo wp_kses_post($feedback_description); ?></p>
                        </div>
                        <div class="col-xs-12 ">
                            <?php
                            if (function_exists('wpcf7_contact_form')) {
                                echo do_shortcode('[contact-form-7 id="feedback"]');
                            } else {
                            ?>
                            <form id="FeedbackIntake" class="cmsForm" method="post" action="<?php echo admin_url('admin-post.php'); ?>">
                                <input type="hidden" name="action" value="submit_feedback_form">
                                <input type="hidden" name="form_type" value="feedback">

                                <div class="fieldset">
                                    <div class="col-xs-12 ry-flex col2">
                                        <div class="col-xs-12 col-lg-12 ry-each">
                                            <div class="form-group required" data-type="text" data-required="true">
                                                <input name="Name" value="" id="Name" type="text" placeholder="Enter name *" class="form-control ry-margin-btm-30" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 ry-each">
                                            <div class="form-group required" data-validation="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" data-errormsg="Invalid Email Address" data-type="text" data-required="true">
                                                <input name="email" value="" id="email" type="email" placeholder="Enter email*" class="form-control ry-margin-btm-30" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 ">
                                        <div class="form-group " data-type="text" data-required="true">
                                            <textarea name="message" id="message" placeholder="Enter message" class="form-control ry-margin-btm-30"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 ">
                                        <div class="form-group" data-type="submit">
                                            <input id="BtnReviewcaptcha" type="submit" class="ry-btn ry-btn-primary recaptcha" value="Submit">
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
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php get_template_part('template-parts/sidebar-cta'); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
