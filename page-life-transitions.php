<?php
/**
 * Template Name: Life Transitions
 * 
 * Custom page template for the Life Transitions specialty page
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
                                    <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Condition_Template/life_002.jpg" loading="lazy" alt class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <h3>Understanding Life Transitions</h3>
                                    <p>Big changes—whether joyful, difficult, or unexpected—can bring stress, uncertainty, and emotional strain. Life transitions like career shifts, relationship changes, moving, or becoming a parent can disrupt balance. Support during these times can make all the difference.<br><br>​​​​​​​<br></p>
                                    <h3>What Life Transitions Feel Like</h3>
                                    <p>People navigating life transitions often describe:</p>
                                    <ul>
                                        <li><p>Feeling overwhelmed or uncertain about the future</p></li>
                                        <li><p>Difficulty making decisions or adapting to change</p></li>
                                        <li><p>Stress, anxiety, or low mood tied to new circumstances</p></li>
                                        <li><p>Strain on relationships or daily routines</p></li>
                                        <li><p>Wanting guidance and stability while adjusting</p></li>
                                    </ul>
                                    <p><br>Even positive changes can feel destabilizing without the right support.</p>
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
                                    <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Condition_Template/life_001.jpg" loading="lazy" alt class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <h3>Why Support Matters</h3>
                                    <p>Unmanaged stress during life transitions can contribute to anxiety, depression, or burnout. With professional care, it's possible to find clarity, maintain stability, and grow through change.<br><br><br></p>
                                    <h3>How Zellig Helps</h3>
                                    <p>We provide psychiatric support for life transitions, including:</p>
                                    <ul>
                                        <li><p><strong>Medication management</strong> when symptoms interfere with daily functioning</p></li>
                                        <li><p><strong>Collaborative planning</strong> to address stress, anxiety, or mood changes</p></li>
                                        <li><p><strong>Ongoing support</strong> to help you adapt and thrive in your new chapter</p></li>
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
                                    <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Condition_Template/life_003.jpg" loading="lazy" alt class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <h3>What to Expect at Zellig</h3>
                                    <ol>
                                        <li><p>Thorough evaluation — reviewing your history, experiences, and goals</p></li>
                                        <li><p>Individualized treatment plan — focused on reducing symptoms and preventing future episodes</p></li>
                                        <li><p>Ongoing follow-up — regular check-ins, adjustments as needed, and proactive support for life's changes<br><br></p></li>
                                    </ol>
                                    <p><br></p>
                                    <h3>Take the Next Step</h3>
                                    <p>If you're navigating a significant life transition and need support, Zellig is here for you. Reach out today to schedule a consultation and begin your path toward stability and growth.</p>
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
