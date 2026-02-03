<?php
/**
 * Template Name: Anxiety
 * 
 * Custom page template for the Anxiety specialty page
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
                                    <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Condition_Template/anxiety_003.jpg" loading="lazy" alt class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <h3>Understanding Anxiety</h3>
                                    <p>Anxiety is more than occasional worry. When it becomes constant, overwhelming, or disruptive, it can feel impossible to find peace of mind. If you're living with anxiety, you're not alone—and with the right care, relief is possible.<br><br></p>
                                    <h3>What Anxiety Feels Like</h3>
                                    <p>People experiencing anxiety often describe:</p>
                                    <ul>
                                        <li><p>Restlessness or feeling "on edge"</p></li>
                                        <li><p>Racing thoughts or difficulty controlling worry</p></li>
                                        <li><p>Physical symptoms like rapid heartbeat, sweating, or stomach upset</p></li>
                                        <li><p>Difficulty sleeping or relaxing</p></li>
                                        <li><p>Trouble focusing at work or in daily life</p></li>
                                    </ul>
                                    <p><br>Anxiety shows up differently for everyone, but its impact is always real.</p>
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
                                    <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Condition_Template/anxiety_001.jpg" loading="lazy" alt class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <h3>Why Treatment Matters</h3>
                                    <p>Unchecked anxiety can affect your health, your relationships, and your ability to enjoy life. The good news: anxiety is treatable. With the right support, you can learn to calm your mind, manage stress, and move through life with greater confidence.<br><br></p>
                                    <h3>How Zellig Helps</h3>
                                    <p>At Zellig, we offer thoughtful, evidence-based psychiatric care for anxiety, including:</p>
                                    <ul>
                                        <li><p><strong>Medication management</strong> when appropriate, tailored to your unique needs</p></li>
                                        <li><p><strong>Collaborative treatment</strong> <strong>planning</strong> that respects your goals and lifestyle</p></li>
                                        <li><p><strong>Supportive resources and referrals </strong>to strengthen coping skills and long-term resilience</p></li>
                                    </ul>
                                    <p><br>Our focus is on helping you feel in control again, with care that is both compassionate and clinically precise.</p>
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
                                    <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Condition_Template/anxiety_004.jpg" loading="lazy" alt class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <h3>What to Expect at Zellig</h3>
                                    <ol>
                                        <li><p>Comprehensive evaluation — understanding your symptoms, triggers, and history</p></li>
                                        <li><p>Personalized treatment plan — designed to reduce anxiety and restore balance</p></li>
                                        <li><p>Ongoing follow-up — regular check-ins, adjustments as needed, and an open line of communication<br>​​​​​​​</p></li>
                                    </ol>
                                    <p><br></p>
                                    <h3>Take the Next Step</h3>
                                    <p>If you've been searching for professional anxiety treatment or a psychiatrist for anxiety, Zellig is here to help. Schedule your consultation today and take the first step toward lasting relief.</p>
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
