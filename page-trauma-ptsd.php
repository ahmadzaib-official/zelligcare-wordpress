<?php
/**
 * Template Name: Trauma & PTSD
 * 
 * Custom page template for the Trauma & PTSD specialty page
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
                                    <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Condition_Template/trauma_002.png" loading="lazy" alt class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <h3>Understanding PTSD</h3>
                                    <p>Post-Traumatic Stress Disorder (PTSD) can develop after experiencing or witnessing trauma. It's not a sign of weakness—it's a medical condition that affects the way the brain processes memory and stress. If you're struggling with PTSD, healing is possible.<br><br><br></p>
                                    <h3>What PTSD Feels Like</h3>
                                    <p>People with PTSD often describe:</p>
                                    <ul>
                                        <li><p>Intrusive memories, flashbacks, or nightmares</p></li>
                                        <li><p>Avoiding reminders of the trauma</p></li>
                                        <li><p>Feeling on edge, jumpy, or easily startled</p></li>
                                        <li><p>Difficulty trusting or connecting with others</p></li>
                                        <li><p>Numbness, guilt, or shame</p></li>
                                    </ul>
                                    <p><br>PTSD symptoms can be overwhelming, but effective treatment exists.</p>
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
                                    <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Condition_Template/trauma_001.png" loading="lazy" alt class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <h3>Why Treatment Matters</h3>
                                    <p>Left untreated, PTSD can interfere with relationships, work, and overall quality of life. With care, many people find relief, build resilience, and reclaim peace of mind.<br><br><br></p>
                                    <h3>How Zellig Helps</h3>
                                    <p>We provide psychiatric care for PTSD that combines compassion with expertise:</p>
                                    <ul>
                                        <li><p><strong>Medication management </strong>— to reduce intrusive thoughts, anxiety, or sleep issues</p></li>
                                        <li><p><strong>Therapy collaboration</strong> — working alongside trauma-informed therapists when needed</p></li>
                                        <li><p><strong>Long-term support</strong> — helping you build stability and resilience over time</p></li>
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
                                    <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Condition_Template/trauma_003.png" loading="lazy" alt class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <h3>What to Expect at Zellig</h3>
                                    <ol>
                                        <li><p><strong>Thorough evaluation</strong> — understanding your experiences and current symptoms</p></li>
                                        <li><p><strong>Tailored treatment plan</strong> — medication and therapy referrals as appropriate</p></li>
                                        <li><p><strong>Ongoing monitoring</strong> — regular support and adjustments as healing progresses<br><br>​​​​​​​</p></li>
                                    </ol>
                                    <h3>Take the Next Step</h3>
                                    <p>If you're looking for professional PTSD treatment or a psychiatrist for trauma-related conditions, Zellig is here for you. Reach out today to begin your path toward healing.</p>
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
