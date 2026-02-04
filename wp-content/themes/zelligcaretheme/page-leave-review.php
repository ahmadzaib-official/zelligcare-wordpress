<?php
/**
 * Template Name: Leave a Review
 *
 * Custom page template for the Leave a Review page.
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
            <div class="col-xs-12 ry-content ry-flex">
                <div class="col-xs-12 col-md-8 col-lg-8 ry-left">
                    <div class="col-xs-12 ry-form ry-form-box">
                        <div>
                            <h3>Write a Review</h3>
                            <p>We value your opinion!<br><br><span style="letter-spacing: initial;">Please use the form below to submit a review of our practice. &#8203;&#8203;&#8203;&#8203;&#8203; Helpful reviews are factually correct, detailed and give a good understanding of what your experience was like from start to finish.&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;</span></p>
                        </div>
                        <div class="col-xs-12 ">
                            <?php
                            // Check if Contact Form 7 is available
                            if (function_exists('wpcf7_contact_form')) {
                                // Use Contact Form 7 shortcode if available
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
                <div class="col-xs-12 col-md-4 col-lg-4 ry-right">
                    <div id="ry-sidebar" class="col-xs-12 ">
                        <div class="col-xs-12 ry-sb-main">
                            <div class="input-group search-bar-widget " id="searchfield" data-url="<?php echo esc_url(home_url('/search-result/')); ?>" data-variables="search">
                                <input type="text" class="form-control" placeholder="Enter search keyword" value>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary search-btn" type="button"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                        <div class="col-xs-12 ry-sb-cta">
                            <div class="col-xs-12 ry-cta-wrp ry-el-bg ry-el-link">
                                <div class="col-xs-12 ry-cta">
                                    <div class="col-xs-12 ry-cta-contain">
                                        <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/sb1.jpg" loading="lazy" alt="Services" class="img-responsive">
                                        <div>
                                            <p>Services</p>
                                            <a href="<?php echo esc_url(home_url('/services/')); ?>" class="ry-btn ry-btn-primary">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 ry-cta-wrp ry-el-bg ry-el-link">
                                <div class="col-xs-12 ry-cta">
                                    <div class="col-xs-12 ry-cta-contain">
                                        <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/sb2.jpg" loading="lazy" alt="Contact Us" class="img-responsive">
                                        <div>
                                            <p>Keep In Touch</p>
                                            <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="ry-btn ry-btn-primary">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
