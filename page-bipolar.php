<?php
/**
 * Template Name: Bipolar
 * 
 * Custom page template for the Bipolar specialty page
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
                                    <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Condition_Template/bipolar_002.jpg" loading="lazy" alt class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <h3>Understanding Bipolar Disorder</h3>
                                    <p>Bipolar disorder is more than mood swings. It involves cycles of depression and elevated mood states that can disrupt relationships, work, and overall stability. Living with bipolar disorder can feel unpredictable, but with the right treatment, balance is possible.<br><br>​​​​​​​</p>
                                    <h3>What Bipolar Disorder Feels Like</h3>
                                    <p>People with bipolar disorder often describe:</p>
                                    <ul>
                                        <li><p>Depressive episodes: sadness, loss of interest, low energy, feelings of hopelessness</p></li>
                                        <li><p>Manic or hypomanic episodes: racing thoughts, reduced need for sleep, increased energy, impulsive decisions, or feeling unusually confident</p></li>
                                        <li><p>Difficulty maintaining consistency at work or in relationships</p></li>
                                        <li><p>Stress from not knowing when mood changes may happen next</p></li>
                                    </ul>
                                    <p>The condition can feel overwhelming, but effective, long-term management is within reach.</p>
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
                                    <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Condition_Template/bipolar_003.jpg" loading="lazy" alt class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <h3>Why Treatment Matters</h3>
                                    <p>Without treatment, bipolar disorder can cause repeated disruptions to daily life, health, and stability. But with careful management, many people achieve steady mood, strong relationships, and greater confidence in their future.<br><br><br></p>
                                    <h3>How Zellig Helps</h3>
                                    <p>At Zellig, we provide comprehensive psychiatric care for bipolar disorder, including:</p>
                                    <ul>
                                        <li><p><strong>Medication management</strong> — mood stabilizers, antipsychotics, or other options tailored to each phase of illness</p></li>
                                        <li><p><strong>Collaborative care planning</strong> — ongoing adjustments to find what works best for you</p></li>
                                        <li><p><strong>Supportive guidance</strong> — helping you recognize patterns, prevent relapses, and maintain balance over time</p></li>
                                    </ul>
                                    <p><br>Our care is thoughtful, personalized, and designed to support long-term stability.</p>
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
                                    <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Condition_Template/bipolar_001.jpg" loading="lazy" alt class="img-responsive">
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
                                    <p>If you're looking for effective bipolar disorder treatment with a psychiatrist who understands the condition, Zellig is here for you. Reach out today to schedule a consultation and begin building stability.</p>
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
