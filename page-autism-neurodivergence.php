<?php
/**
 * Template Name: Autism & Neurodivergence
 * 
 * Custom page template for the Autism & Neurodivergence specialty page
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
                                    <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Condition_Template/bipolar_001.jpg" loading="lazy" alt="Autism & Neurodivergence" class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <h3>Understanding Autism & Neurodivergence</h3>
                                    <p>Autism and neurodivergence represent unique ways of experiencing and interacting with the world. At Zellig, we recognize that neurodivergent individuals have distinct strengths, perspectives, and needs. Our approach is rooted in respect, understanding, and personalized care that honors your individual experience.<br><br></p>
                                    <h3>What Neurodivergence Means</h3>
                                    <p>Neurodivergence encompasses a range of neurological differences, including:</p>
                                    <ul>
                                        <li><p>Autism Spectrum Disorder (ASD)</p></li>
                                        <li><p>ADHD and attention differences</p></li>
                                        <li><p>Learning differences and processing variations</p></li>
                                        <li><p>Unique sensory experiences and communication styles</p></li>
                                    </ul>
                                    <p><br>These differences are not deficits—they are variations in how the brain processes information, experiences the world, and connects with others.</p>
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
                                    <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Condition_Template/bipolar_002.jpg" loading="lazy" alt="Autism & Neurodivergence" class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <h3>Why Support Matters</h3>
                                    <p>Living in a world designed for neurotypical individuals can present challenges. You may face difficulties with social expectations, sensory overload, executive functioning, or managing co-occurring conditions like anxiety or depression. The right support can help you navigate these challenges while celebrating your unique strengths.<br><br></p>
                                    <h3>How Zellig Helps</h3>
                                    <p>At Zellig, we provide affirming, neurodivergence-informed psychiatric care, including:</p>
                                    <ul>
                                        <li><p><strong>Comprehensive assessment</strong> that recognizes and respects neurodivergent experiences</p></li>
                                        <li><p><strong>Medication management</strong> when appropriate, with careful attention to sensory sensitivities and individual responses</p></li>
                                        <li><p><strong>Collaborative treatment planning</strong> that centers your goals, preferences, and communication style</p></li>
                                        <li><p><strong>Support for co-occurring conditions</strong> like anxiety, depression, or ADHD that may accompany neurodivergence</p></li>
                                    </ul>
                                    <p><br>We understand that neurodivergent individuals may have different communication styles, sensory needs, and ways of processing information. Our care is adapted to meet you where you are.</p>
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
                                    <img src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Condition_Template/bipolar_003.jpg" loading="lazy" alt="Autism & Neurodivergence" class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6 each each-text">
                            <div class="col-xs-12 wrapper">
                                <div class="ry-text">
                                    <h3>What to Expect at Zellig</h3>
                                    <ol>
                                        <li><p>Respectful evaluation — understanding your unique experiences, strengths, and challenges without pathologizing differences</p></li>
                                        <li><p>Personalized approach — treatment plans that honor your communication style, sensory needs, and individual goals</p></li>
                                        <li><p>Ongoing support — regular check-ins, adjustments as needed, and a collaborative relationship built on trust and respect<br>​​​​​​​</p></li>
                                    </ol>
                                    <p><br></p>
                                    <h3>Take the Next Step</h3>
                                    <p>If you're seeking neurodivergence-affirming psychiatric care, Zellig is here to support you. We welcome self-diagnosed and formally diagnosed individuals and are committed to providing care that respects and celebrates neurodivergent experiences. Schedule your consultation today.</p>
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
