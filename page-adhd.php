<?php
/**
 * Template Name: ADHD
 * 
 * Custom page template for the ADHD specialty page
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
                                    <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Condition_Template/ADHD_003.png" loading="lazy" alt class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <h3>Understanding ADHD</h3>
                                    <p>Attention-Deficit/Hyperactivity Disorder (ADHD) isn't just about being distracted. It can affect focus, organization, relationships, and self-esteem at any age. Whether diagnosed in childhood or adulthood, ADHD is real—and with the right support, it can be managed effectively.<br><br></p>
                                    <h3>What ADHD Feels Like</h3>
                                    <p>People with ADHD often describe:</p>
                                    <ul>
                                        <li><p>Trouble focusing or completing tasks</p></li>
                                        <li><p>Forgetfulness, disorganization, or losing track of time</p></li>
                                        <li><p>Restlessness, fidgeting, or difficulty sitting still</p></li>
                                        <li><p>Impulsivity or acting without thinking</p></li>
                                        <li><p>Feeling frustrated or overwhelmed in work, school, or relationships</p></li>
                                    </ul>
                                    <p><br>ADHD looks different in every person, but its impact is always significant.</p>
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
                                    <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Condition_Template/ADHD_002.png" loading="lazy" alt class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <h3>Why Treatment Matters</h3>
                                    <p>Without treatment, ADHD can cause stress, underachievement, and strain on daily life. With proper care, people often discover new levels of focus, productivity, and confidence.<br><br><br></p>
                                    <h3>How Zellig Helps</h3>
                                    <p>We provide psychiatric treatment for ADHD, including:</p>
                                    <ul>
                                        <li><p><strong>Medication management</strong> — stimulants and non-stimulant options tailored to you</p></li>
                                        <li><p><strong>Collaborative care</strong> — addressing coexisting conditions like anxiety or depression</p></li>
                                        <li><p><strong>Practical support</strong> — helping you build strategies for focus and balance</p></li>
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
                                    <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Condition_Template/ADHD_001.png" loading="lazy" alt class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <h3>What to Expect at Zellig</h3>
                                    <ul>
                                        <li><p><strong>Comprehensive evaluation</strong> — reviewing your history, symptoms, and goals</p></li>
                                        <li><p><strong>Personalized treatment plan</strong> — medication and strategies to fit your lifestyle</p></li>
                                        <li><p><strong>Ongoing support</strong> — regular check-ins to fine-tune your care<br><br></p></li>
                                    </ul>
                                    <h3>Take the Next Step</h3>
                                    <p>If you're searching for professional ADHD treatment or a psychiatrist for ADHD, Zellig can help. Schedule a consultation today and take the first step toward greater focus and balance.<br></p>
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
