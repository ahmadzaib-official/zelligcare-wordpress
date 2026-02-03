<?php
/**
 * Template Name: Depression
 * 
 * Custom page template for the Depression specialty page
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
            <img src="<?php echo esc_url($banner_image); ?>" loading="lazy" alt class="img-responsive">
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
                                    <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Condition_Template/Depression_001.png" loading="lazy" alt class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <h3>Understanding Depression</h3>
                                    <p>Depression is more than feeling sad. It can touch every part of life—energy, focus, relationships, and even your sense of self. If you're struggling, you're not alone. Millions of people experience depression, and the right care can make a real difference.<br><br><br></p>
                                    <h3>What Depression Feels Like</h3>
                                    <p>People with depression often describe:</p>
                                    <ul>
                                        <li><p>Persistent sadness or emptiness</p></li>
                                        <li><p>Loss of interest or pleasure in activities</p></li>
                                        <li><p>Trouble sleeping or oversleeping</p></li>
                                        <li><p>Changes in appetite or energy</p></li>
                                        <li><p>Difficulty concentrating or making decisions</p></li>
                                        <li><p>Feelings of guilt, worthlessness, or hopelessness</p></li>
                                    </ul>
                                    <p><br>These symptoms are real, and they deserve thoughtful, professional treatment.</p>
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
                                    <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Condition_Template/Depression_002.png" loading="lazy" alt class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <h3>Why Treatment Matters</h3>
                                    <p>Untreated depression can affect your work, your health, and your relationships. But depression is highly treatable. With the right approach, it's possible to restore balance, regain motivation, and feel like yourself again.<br><br><br></p>
                                    <h3>How Zellig Helps</h3>
                                    <p>At Zellig, we take depression seriously. Our approach combines:</p>
                                    <ul>
                                        <li><p><strong>Evidence-based psychiatric care</strong> — personalized medication management when appropriate</p></li>
                                        <li><p><strong>Collaborative treatment planning</strong> — we listen, adapt, and adjust as your needs change</p></li>
                                        <li><p><strong>Whole-person support</strong> — addressing not only symptoms, but the life context that shapes them</p></li>
                                    </ul>
                                    <p><br>We're not a quick-fix clinic. We're here to provide care that's both compassionate and clinically rigorous.</p>
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
                                    <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Condition_Template/Depression_003.png" loading="lazy" alt class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <h3>What to Expect at Zellig</h3>
                                    <ol>
                                        <li><p>Personalized intake — a thorough evaluation of your history, current symptoms, and goals</p></li>
                                        <li><p>Tailored treatment plan — options may include medication management, psychotherapy referrals, or a combination of both</p></li>
                                        <li><p>Ongoing support — regular check-ins, thoughtful adjustments, and open communication to track progress and sustain results<br>​​​​​​​</p></li>
                                    </ol>
                                    <p><br></p>
                                    <h3>Take the Next Step</h3>
                                    <p>If you've been searching for effective, professional depression treatment with a psychiatrist who listens, Zellig is here for you. Reach out today to schedule your first appointment and start your path forward.</p>
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
