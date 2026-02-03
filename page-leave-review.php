<?php
/**
 * Template Name: Leave a Review
 *
 * Custom page template for the Leave a Review page.
 * Heading and instructions editable via meta box. Sidebar via partial.
 */

get_header();

get_template_part('template-parts/page-banner');

$review_heading = get_post_meta(get_the_ID(), 'review_form_heading', true);
if (empty($review_heading)) {
    $review_heading = 'Write a Review';
}
$review_instructions = get_post_meta(get_the_ID(), 'review_form_instructions', true);
if (empty($review_instructions)) {
    $review_instructions = 'We value your opinion!<br><br><span style="letter-spacing: initial;">Please use the form below to submit a review of our practice. Helpful reviews are factually correct, detailed and give a good understanding of what your experience was like from start to finish.</span>';
}
?>

<div id="ry-pg-content">
    <div id="ry-pg-body" class="col-xs-12 ry-section" data-interior-layout="Sidebar">
        <div class="col-xs-12 ry-container">
            <div class="col-xs-12 ry-content ry-flex">
                <div class="col-xs-12 col-md-8 col-lg-8 ry-left">
                    <div class="col-xs-12 ry-form ry-form-box">
                        <div>
                            <h3><?php echo esc_html($review_heading); ?></h3>
                            <p><?php echo wp_kses_post($review_instructions); ?></p>
                        </div>
                        <div class="col-xs-12 ">
                            <?php
                            // Check if Contact Form 7 is available
                            if (function_exists('wpcf7_contact_form')) {
                                echo do_shortcode('[contact-form-7 id="review"]');
                            } else {
                                // Custom review form
                                ?>
                                <form id="review-form" class="cmsForm" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                                    <input type="hidden" name="action" value="submit_review_form">
                                    <input type="hidden" name="form_type" value="review">

                                    <div class="fieldset">
                                        <div class="col-xs-12 ry-flex col2">
                                            <div class="col-xs-12 col-lg-12 ry-each">
                                                <div class="form-group required" data-type="text" data-required="true">
                                                    <input name="Name" id="Name" type="text" placeholder="Enter name *" class="form-control ry-margin-btm-30" required>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-12 ry-each">
                                                <div class="form-group required" data-validation="^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" data-errormsg="Invalid Email Address" data-type="text" data-required="true">
                                                    <input name="email" id="email" type="email" placeholder="Enter email*" class="form-control ry-margin-btm-30" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 rate-box ry-flex col2 ry-margin-btm-30">
                                            <div>
                                                <p>How would you rate our service?</p>
                                            </div>
                                            <div class="star-box">
                                                <span class="blank-star" data-rating="1"><i class="fa fa-star"></i></span>
                                                <span class="blank-star" data-rating="2"><i class="fa fa-star"></i></span>
                                                <span class="blank-star" data-rating="3"><i class="fa fa-star"></i></span>
                                                <span class="blank-star" data-rating="4"><i class="fa fa-star"></i></span>
                                                <span class="blank-star" data-rating="5"><i class="fa fa-star"></i></span>
                                            </div>
                                            <input name="Review_rating" id="rating" type="hidden" value="">
                                        </div>
                                        <div class="col-xs-12 ">
                                            <div class="form-group" data-type="text" data-required="true">
                                                <textarea name="message" id="message" placeholder="Enter message" class="form-control ry-margin-btm-30" rows="5" required></textarea>
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
                                <script>
                                jQuery(document).ready(function($) {
                                    $('.blank-star').on('click', function() {
                                        var rating = $(this).data('rating');
                                        $('#rating').val(rating);
                                        $('.blank-star').removeClass('star-active star-rated');
                                        $('.blank-star').each(function(index) {
                                            if (index < rating) {
                                                $(this).addClass('star-active star-rated');
                                            }
                                        });
                                    });
                                });
                                </script>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php get_template_part('template-parts/sidebar-cta'); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
