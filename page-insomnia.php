<?php
/**
 * Template Name: Insomnia
 * 
 * Custom page template for the Insomnia specialty page
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
                                    <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Condition_Template/insomnia_001.jpg" loading="lazy" alt class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <h3>Understanding Insomnia</h3>
                                    <p>Insomnia is more than the occasional sleepless night. When falling asleep or staying asleep becomes a persistent struggle, it can drain energy, cloud focus, and affect mood. If you're dealing with insomnia, you don't have to push through it alone—effective treatment is available.<br><br><br></p>
                                    <h3>What Insomnia Feels Like</h3>
                                    <p>People with insomnia often describe:</p>
                                    <ul>
                                        <li><p>Difficulty falling asleep at night</p></li>
                                        <li><p>Waking up frequently or too early</p></li>
                                        <li><p>Feeling unrefreshed despite time in bed</p></li>
                                        <li><p>Daytime fatigue, irritability, or poor concentration</p></li>
                                        <li><p>Anxiety around bedtime or fear of another sleepless night</p></li>
                                    </ul>
                                    <p><br>These patterns can quickly take a toll on both mind and body.</p>
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
                                    <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Condition_Template/insomnia_003.jpg" loading="lazy" alt class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <h3>Why Treatment Matters</h3>
                                    <p>Chronic insomnia doesn't just affect sleep—it impacts mood, memory, productivity, and health. The good news: with the right approach, better rest and improved well-being are achievable.<br><br><br></p>
                                    <h3>How Zellig Helps</h3>
                                    <p>We provide thoughtful, evidence-based psychiatric care for insomnia, including:</p>
                                    <ol>
                                        <li><p><strong>Medication management</strong> when appropriate, tailored for short- or long-term use</p></li>
                                        <li><p><strong>Collaborative strategies</strong> that may include behavioral and lifestyle recommendations</p></li>
                                        <li><p><strong>Ongoing support </strong>to monitor progress and adjust treatment as needed</p></li>
                                    </ol>
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
                                    <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Condition_Template/insomnia_002.jpg" loading="lazy" alt class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <h3>What to Expect at Zellig</h3>
                                    <ol>
                                        <li><p><strong>Comprehensive assessment</strong> — understanding your sleep patterns, history, and contributing factors</p></li>
                                        <li><p><strong>Personalized treatment plan</strong> — designed to restore healthy sleep and reduce distress</p></li>
                                        <li><p><strong>Regular follow-up</strong> — adjustments and support as your sleep improves</p></li>
                                    </ol>
                                    <p><br><br></p>
                                    <h3>Take the Next Step</h3>
                                    <p>If you're searching for effective insomnia treatment with a psychiatrist who listens, Zellig can help. Schedule your consultation today and take the first step toward restful nights.</p>
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
