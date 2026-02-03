<?php
/**
 * Template Name: Request an Appointment
 *
 * Custom page template for the Request an Appointment page.
 * Introduction text editable via meta box. Sidebar via partial.
 */

get_header();

get_template_part('template-parts/page-banner');

$appointment_intro = get_post_meta(get_the_ID(), 'appointment_intro', true);
if (empty($appointment_intro)) {
    $appointment_intro = 'At Zellig, we provide the highest quality service to all our patients. Use the form below to request your appointment. Please indicate your preferred date and time. Please note that we will reach out to you first to confirm your appointment or to provide you with an alternative date. You may also call us to request an appointment. Thank you!';
}
?>

<div id="ry-pg-content">
    <div id="ry-pg-body" class="col-xs-12 ry-section" data-interior-layout="Sidebar">
        <div class="col-xs-12 ry-container">
            <div class="col-xs-12 ry-content ry-flex">
                <div class="col-xs-12 col-md-8 col-lg-8 ry-left">
                    <div class="col-xs-12 ry-form">
                        <div class="col-xs-12 ry-content">
                            <div class="ry-text">
                                <p><?php echo wp_kses_post($appointment_intro); ?></p>
                            </div>
                        </div>
                        <?php
                        // Check if Contact Form 7 is available
                        if (function_exists('wpcf7_contact_form')) {
                            echo do_shortcode('[contact-form-7 id="appointment"]');
                        } else {
                            // Custom appointment form
                            ?>
                            <form id="form-appointment" class="cmsForm" method="post" action="<?php echo admin_url('admin-post.php'); ?>">
                                <input type="hidden" name="action" value="submit_appointment_form">
                                <input type="hidden" name="form_type" value="appointment">

                                <div class="fieldset">
                                    <div class="col-xs-12 ">
                                        <div class="form-group required" data-type="text" data-required="true">
                                            <input name="Name" value="" id="Name" type="text" placeholder="Name*" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 ">
                                        <div class="form-group required" data-validation="^(([0-9]{1})*[- .(]*([0-9]{3})[- .)]*[0-9]{3}[- .]*[0-9]{4})+$" data-errormsg="Invalid Phone Number" data-type="text" data-required="true">
                                            <input name="Phone_Number" value="" id="Phone_Number" type="text" placeholder="Phone Number*" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 ">
                                        <div class="form-group required" data-validation="^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" data-errormsg="Invalid Email Address" data-type="text" data-required="true">
                                            <input name="Email" value="" id="Email" type="email" placeholder="Email*" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 input-field-wrap">
                                        <div class="form-group " data-type="text" data-required="true">
                                            <input data-datepicker name="Preferred_Date" value="" id="Preferred_Date" type="text" placeholder="Preferred Date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 ">
                                        <div class="form-group " data-type="text" data-required="false">
                                            <select name="Preferred_Time" id="Preferred_Time" class="form-control" title>
                                                <option value="">Preferred Time</option>
                                                <option value="Morning">Morning</option>
                                                <option value="Afternoon">Afternoon</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 ">
                                        <div class="form-group " data-type="text" data-required="true">
                                            <textarea name="Message" id="Message" placeholder="Message" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group" data-type="submit">
                                        <input id="aptform" type="submit" class="ry-btn ry-btn-primary recaptcha" value="Submit">
                                    </div>
                                </div>
                                <div class="container-fluid" style="padding: 0;">
                                    <div class="alert alert-success hidden">
                                        Thank you. We will connect with you shortly to confirm your appointment.
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
                <?php get_template_part('template-parts/sidebar-cta'); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
