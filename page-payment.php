<?php
/**
 * Template Name: Payment Options
 *
 * Custom page template for the Payment Options page.
 * Insurance heading and logos editable via meta box.
 * Private pay section uses WordPress content editor.
 */

get_header();

get_template_part('template-parts/page-banner');

$insurance_heading = get_post_meta(get_the_ID(), 'insurance_heading', true);
if (empty($insurance_heading)) {
    $insurance_heading = 'Insurance We Accept:';
}

$logos = get_post_meta(get_the_ID(), 'insurance_logos', true);
if (!is_array($logos) || empty($logos)) {
    $logos = array(
        array('name' => 'Cigna', 'image' => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/cigna.png'),
        array('name' => 'Aetna', 'image' => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/aetna_logo.png'),
        array('name' => 'Blue Cross Blue Shield', 'image' => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/bcbs_logo.png'),
        array('name' => 'United Healthcare', 'image' => 'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/united.png'),
    );
}
?>

<div id="ry-pg-content">
    <div id="ry-pg-body" class="col-xs-12 ry-section" data-interior-layout="Sidebar">
        <div class="col-xs-12 ry-container">
            <div class="col-xs-12 ry-content ry-flex">
                <div class="col-xs-12 col-md-12 col-lg-12 ">
                    <div class="col-xs-12 module-grid-basic">
                        <div data-aos-duration="1500" data-aos="fade-up" class="ry-headline" style="text-align: center; margin-bottom: 40px;">
                            <h2><?php echo esc_html($insurance_heading); ?></h2>
                        </div>
                        <div class="col-xs-12 ry-flex ry-payment-options-logos" data-aos-duration="1500" data-aos="fade-up">
                            <?php foreach ($logos as $logo) :
                                $logo_name = isset($logo['name']) ? $logo['name'] : '';
                                $logo_image = isset($logo['image']) ? $logo['image'] : '';
                                if (empty($logo_image)) continue;
                            ?>
                            <div class="col-xs-12 ry-each">
                                <img src="<?php echo esc_url($logo_image); ?>" loading="lazy" alt="<?php echo esc_attr($logo_name); ?>" class="img-responsive">
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="clearfix "></div>
                    <div class="ry-text" data-aos-duration="1500" data-aos="fade-up">
                        <?php
                        if (have_posts()) :
                            while (have_posts()) : the_post();
                                $content = get_the_content();
                                if (!empty($content)) {
                                    the_content();
                                } else {
                                    ?>
                                    <section>
                                        <h3 style="text-align: center;">Private Pay</h3>
                                        <p style="text-align: center;">We understand that not all services are covered by insurance. That&rsquo;s why we proudly offer <strong>flexible private pay options</strong> to make your care accessible and affordable.</p>
                                    </section>
                                    <?php
                                }
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
