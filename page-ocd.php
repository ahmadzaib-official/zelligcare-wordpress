<?php
/**
 * Template Name: OCD
 * 
 * Custom page template for the OCD specialty page
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
    <div class="col-xs-12 module-offer inner-condition-template">
        <div class="col-xs-12 group-block">
            <div class="col-xs-12 block" data-aos-duration="1500" data-aos="fade-left">
                <div class="col-xs-12 ry-container">
                    <div class="col-xs-12 content">
                        <div class="col-xs-12 col-lg-6 each each-photo">
                            <div class="col-xs-12 wrapper">
                                <div class="col-xs-12 photo">
                                    <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Condition_Template/ocd_003.jpg" loading="lazy" alt class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <h3>Understanding OCD</h3>
                                    <p>Obsessive-Compulsive Disorder (OCD) is more than habits or quirks. It involves persistent, distressing thoughts (obsessions) and repetitive behaviors or mental rituals (compulsions) that can take over daily life. OCD is challenging, but it is treatable.<br><br><br></p>
                                    <h3>What OCD Feels Like</h3>
                                    <p>People with OCD often describe:</p>
                                    <ul>
                                        <li><p>Repetitive, intrusive thoughts that feel uncontrollable</p></li>
                                        <li><p>Compulsions such as checking, counting, or cleaning</p></li>
                                        <li><p>Anxiety or distress if rituals aren't performed</p></li>
                                        <li><p>Time lost to routines that interfere with work, school, or relationships</p></li>
                                        <li><p>Feeling trapped in a cycle of obsessions and compulsions</p></li>
                                    </ul>
                                    <p><br>OCD is not a personality trait—it's a medical condition that deserves care.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 block" data-aos-duration="1500" data-aos="fade-right">
                <div class="col-xs-12 ry-container">
                    <div class="col-xs-12 content">
                        <div class="col-xs-12 col-lg-6 each each-photo">
                            <div class="col-xs-12 wrapper">
                                <div class="col-xs-12 photo">
                                    <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Condition_Template/ocd_001.jpg" loading="lazy" alt class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <h3>Why Treatment Matters</h3>
                                    <p>Untreated OCD can grow more severe and consume more of your time and energy. With treatment, many people reduce symptoms, regain control, and live more freely.<br><br>​​​​​​​<br></p>
                                    <h3>How Zellig Helps</h3>
                                    <p>We offer psychiatric treatment for OCD grounded in evidence-based care:</p>
                                    <ul>
                                        <li><p><strong>Medication management</strong> — SSRIs and other options tailored to your needs</p></li>
                                        <li><p><strong>Collaboration with therapists</strong> — for exposure-based or cognitive-behavioral therapy when appropriate</p></li>
                                        <li><p><strong>Ongoing monitoring</strong> — adjusting treatment as symptoms improve</p></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 block" data-aos-duration="1500" data-aos="fade-left">
                <div class="col-xs-12 ry-container">
                    <div class="col-xs-12 content">
                        <div class="col-xs-12 col-lg-6 each each-photo">
                            <div class="col-xs-12 wrapper">
                                <div class="col-xs-12 photo">
                                    <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Condition_Template/ocd_002.jpg" loading="lazy" alt class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <h3>What to Expect at Zellig</h3>
                                    <ol>
                                        <li><p><strong>In-depth evaluation</strong> — to understand your symptoms, history, and daily challenges</p></li>
                                        <li><p><strong>Individualized treatment plan</strong> — combining medication management with therapy referrals when helpful</p></li>
                                        <li><p><strong>Consistent follow-up</strong> — ongoing support and adjustments for sustainable progress<br><br><br></p></li>
                                    </ol>
                                    <p></p>
                                    <h3>Take the Next Step</h3>
                                    <p>If you've been searching for OCD treatment or a psychiatrist for OCD, Zellig is here to support you. Reach out today to begin your path toward relief and control.</p>
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
