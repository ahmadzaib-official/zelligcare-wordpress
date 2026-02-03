<?php
/**
 * Template Name: Careers
 * 
 * Custom page template for the Careers page
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
                <h1 class="ry-responsive-title">Practice With Purpose</h1>
            </div>
        </div>
    </div>
</div>

<div id="ry-pg-content" style="display: block !important; visibility: visible !important;">
    <div id="ry-pg-body" class="col-xs-12 inner-careers" style="display: block !important; visibility: visible !important;">
        <!-- Why Zellig Section -->
        <div class="col-xs-12 module-cta custom" style="display: block !important; visibility: visible !important;">
            <div class="col-xs-12 ry-container">
                <div class="col-xs-12 content">
                    <div class="col-xs-12 ry-flex">
                        <!-- Why Zellig Intro -->
                        <div class="col-xs-12 col-lg-3 each each-1" data-aos-duration="1500" data-aos="fade-right">
                            <div class="col-xs-12 wrapper">
                                <div class="title">
                                    <h3>Why Zellig?</h3>
                                </div>
                                <div class="ry-text">
                                    <p>Join us in making mental health care more personal, equitable, and impactful. At Zellig, we're building a practice that is as much for clinicians as it is for patients.<br><br>We believe exceptional care starts with supporting the people who provide it.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Benefit Cards -->
                        <div class="col-xs-12 col-lg-3 each each-2" data-aos-duration="1500" data-aos="fade-right">
                            <div class="col-xs-12 icon">
                                <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Careers_Page/icon1.png" loading="lazy" alt="" class="img-responsive">
                            </div>
                            <div class="col-xs-12 wrapper">
                                <div class="title">
                                    <h4>Transparent, Market-Leading Pay</h4>
                                </div>
                                <div class="ry-text">
                                    <p>We believe in paying clinicians fairly and transparently. Our compensation is among the best in the field, with options for 1099 contracts or W2 roles with a comprehensive benefits package.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-lg-3 each each-2" data-aos-duration="1500" data-aos="fade-right">
                            <div class="col-xs-12 icon">
                                <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Careers_Page/icon2.png" loading="lazy" alt="" class="img-responsive">
                            </div>
                            <div class="col-xs-12 wrapper">
                                <div class="title">
                                    <h4>A Supportive, Tech-Forward Practice</h4>
                                </div>
                                <div class="ry-text">
                                    <p>Administrative burdens are kept off your plate. Our systems—from an award-winning EMR with AI scribe to thoughtfully designed workflows—are built to make your work smoother.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-lg-3 each each-2" data-aos-duration="1500" data-aos="fade-right">
                            <div class="col-xs-12 icon">
                                <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Careers_Page/icon3.png" loading="lazy" alt="Collaboration At Zellig" class="img-responsive">
                            </div>
                            <div class="col-xs-12 wrapper">
                                <div class="title">
                                    <h4>Unmatched Career Development</h4>
                                </div>
                                <div class="ry-text">
                                    <p>At Zellig, professional growth isn't an afterthought. Newer providers are paired with experienced mentors. Teaching, writing, and leadership opportunities are encouraged and supported at every stage.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-lg-3 each each-2" data-aos-duration="1500" data-aos="fade-right">
                            <div class="col-xs-12 icon">
                                <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Careers_Page/icon4.png" loading="lazy" alt="" class="img-responsive">
                            </div>
                            <div class="col-xs-12 wrapper">
                                <div class="title">
                                    <h4>Mission-Driven Work</h4>
                                </div>
                                <div class="ry-text">
                                    <p>We are deeply committed to making mental health care more equitable. Through our pro bono program, clinicians are paid while providing low-cost or free care to patients who need it most. Advocacy for causes that matter isn't just allowed—it's part of who we are.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-lg-3 each each-2" data-aos-duration="1500" data-aos="fade-right">
                            <div class="col-xs-12 icon">
                                <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Careers_Page/icon_5_new.png" loading="lazy" alt="" class="img-responsive">
                            </div>
                            <div class="col-xs-12 wrapper">
                                <div class="title">
                                    <h4>A Connected Team, Even From Afar</h4>
                                </div>
                                <div class="ry-text">
                                    <p>Because we spend so much of our lives at work, we believe that genuine connection matters. At Zellig, community isn't mandatory—but it's thoughtfully supported. From group chats and case discussions to optional meetups and shared projects, we make it easy to build meaningful relationships with your peers.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-lg-3 each each-2" data-aos-duration="1500" data-aos="fade-right">
                            <div class="col-xs-12 icon">
                                <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Careers_Page/icon6.png" loading="lazy" alt="" class="img-responsive">
                            </div>
                            <div class="col-xs-12 wrapper">
                                <div class="title">
                                    <h4>Autonomy with Support</h4>
                                </div>
                                <div class="ry-text">
                                    <p>You bring the expertise—we trust you to use it. At Zellig, clinicians have the freedom to craft individualized care plans while still having access to collaborative support when they need it.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Apply Section -->
        <div class="col-xs-12 module-apply" style="display: block !important; visibility: visible !important;">
            <div class="col-xs-12 ry-container">
                <div class="col-xs-12 content">
                    <div class="col-xs-12 col-lg-12 ry-flex">
                        <div class="col-xs-12 col-lg-5 each each-left">
                            <div class="col-xs-12 wrapper">
                                <div class="col-xs-12 top-block">
                                    <div class="ry-headline">
                                        <h2>join us</h2>
                                    </div>
                                    <div class="ry-text">
                                        <p>We accept applications on a rolling basis. If our mission resonates with you and you're looking for a place to grow and contribute meaningfully, we'd love to hear from you. Please submit your resume and a cover letter.</p>
                                    </div>
                                </div>
                                <div class="col-xs-12 top-block">
                                    <div class="ry-text">
                                        <h5>Please include in your cover letter:</h5>
                                        <ul>
                                            <li><p>Why you're interested in joining Zellig</p></li>
                                            <li><p>What draws you to our mission and approach to care</p></li>
                                            <li><p>How your experience and goals align with our work</p></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-lg-7 each each-right">
                            <div class="col-xs-12 wrapper">
                                <div class="headline">
                                    <h3 style="text-align: center;">APPLY TO JOIN</h3>
                                </div>
                                
                                <!-- Application Form -->
                                <div style="display: block !important; visibility: visible !important;">
                                    <?php 
                                    // Check if Contact Form 7 is available
                                    if (function_exists('wpcf7_contact_form')) {
                                        // Use Contact Form 7 shortcode if available
                                        echo do_shortcode('[contact-form-7 id="careers"]');
                                    } else {
                                        // Custom careers application form
                                        ?>
                                        <form id="careers-application-form" class="cmsForm" method="post" action="<?php echo admin_url('admin-post.php'); ?>" enctype="multipart/form-data">
                                            <input type="hidden" name="action" value="submit_careers_application">
                                            <input type="hidden" name="form_type" value="careers">
                                            
                                            <div class="fieldset">
                                                <div class="col-xs-12 wrapper">
                                                    <!-- Name Field -->
                                                    <div class="col-xs-12 each-field">
                                                        <div class="form-group required" data-validation="^[a-zA-Z0-9 ]+$" data-errormsg="Invalid Input" data-type="text" data-required="true">
                                                            <input name="applicant_name" id="applicant_name" type="text" placeholder="Name*" class="form-control" required />
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Email Field -->
                                                    <div class="col-xs-12 each-field">
                                                        <div class="form-group required" data-validation="^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" data-errormsg="Invalid Email Format" data-type="text" data-required="true">
                                                            <input name="applicant_email" id="applicant_email" type="email" placeholder="Email*" class="form-control" required />
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Phone Field -->
                                                    <div class="col-xs-12 each-field">
                                                        <div class="form-group" data-validation="^(([0-9]{1})*[- .(]*([0-9]{3})[- .)]*[0-9]{3}[- .]*[0-9]{4})+$" data-errormsg="Invalid Phone Format" data-type="text">
                                                            <input name="applicant_phone" id="applicant_phone" type="text" placeholder="Phone" class="form-control" />
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Cover Letter Textarea -->
                                                    <div class="col-xs-12 each-field">
                                                        <div class="form-group" data-type="textarea">
                                                            <textarea name="cover_letter" id="cover_letter" placeholder="Cover Letter*" class="form-control" rows="5" required></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- File Upload Section -->
                                                    <div class="col-xs-12 each-field upload">
                                                        <div class="form-group">
                                                            <div class="col-xs-12 container-1">
                                                                <label for="resume_upload" class="contact_Upload_custom">
                                                                    <input type="file" name="resume" id="resume_upload" class="file-upload" accept=".pdf,.doc,.docx" />
                                                                    <span class="file_names"></span>
                                                                </label>
                                                            </div>
                                                            <div class="col-xs-12 container-2">
                                                                <label for="cover_letter_upload" class="contact_Upload_custom">
                                                                    <input type="file" name="cover_letter_file" id="cover_letter_upload" class="file-upload" accept=".pdf,.doc,.docx" />
                                                                    <span class="file_names"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Submit Button -->
                                                    <div class="col-xs-12 input-wrap">
                                                        <div class="form-group" data-type="submit">
                                                            <input type="submit" id="careers_form" class="ry-btn ry-btn-primary" value="Submit Application" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Form Messages -->
                                            <div class="container-fluid" style="padding: 0">
                                                <div class="alert alert-success hidden">
                                                    Thank you for your application. We'll review it and get back to you shortly.
                                                </div>
                                                <div class="alert alert-danger alert-missing-fields hidden">
                                                    You are missing required fields.
                                                </div>
                                                <div class="alert alert-danger alert-custom-errors hidden">
                                                    Dynamic Error Description
                                                </div>
                                                <div class="alert alert-danger alert-processing-error hidden">
                                                    There was an error processing your application. Please try again.
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
</div>

<?php get_footer(); ?>
