<?php
/**
 * Template Name: Payment Options
 *
 * Custom page template for the Payment Options page.
 */

get_header();

get_template_part('template-parts/page-banner');
?>

<div id="ry-pg-content">
    <div id="ry-pg-body" class="col-xs-12 ry-section" data-interior-layout="Sidebar">
        <div class="col-xs-12 ry-container">
            <div class="col-xs-12 ry-content ry-flex">
                <div class="col-xs-12 col-md-12 col-lg-12 ">
                    <div class="col-xs-12 module-grid-basic">
                        <div data-aos-duration="1500" data-aos="fade-up" class="ry-headline" style="text-align: center; margin-bottom: 40px;">
                            <h2 class="insurance-title" style="text-align: center;">Insurance We Accept:</h2>
                        </div>
                        
                        <div class="col-xs-12 ry-flex ry-payment-options-logos" data-aos-duration="1500" data-aos="fade-up">
                            <?php
                            // Use insurance logos from theme options
                            $insurance_logos = zelligcare_get_insurance_logos();
                            if (!empty($insurance_logos)) {
                                foreach ($insurance_logos as $logo_url) {
                                    if (empty($logo_url)) continue;
                                    ?>
                                    <div class="col-xs-12 ry-each">
                                        <img src="<?php echo esc_url($logo_url); ?>" loading="lazy" alt="Insurance" class="img-responsive">
                                    </div>
                                    <?php
                                }
                            } else {
                                // Fallback to default logos
                                $default_logos = array(
                                    get_template_directory_uri() . '/images/insurance/cigna.png',
                                    get_template_directory_uri() . '/images/insurance/aetna_logo.png',
                                    get_template_directory_uri() . '/images/insurance/bcbs_logo.png',
                                    get_template_directory_uri() . '/images/insurance/united.png',
                                );
                                foreach ($default_logos as $logo_url) {
                                    ?>
                                    <div class="col-xs-12 ry-each">
                                        <img src="<?php echo esc_url($logo_url); ?>" loading="lazy" alt="Insurance" class="img-responsive">
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="clearfix "></div>
                    <div class="ry-text" data-aos-duration="1500" data-aos="fade-up">
                        <section>
                            <h3 style="text-align: center;">Private Pay</h3>
                            <p style="text-align: center;">We understand that not all services are covered by insurance. That&rsquo;s why we proudly offer <strong>flexible private pay options</strong> to make your care accessible and affordable.</p>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
