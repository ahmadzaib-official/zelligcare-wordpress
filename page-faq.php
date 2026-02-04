<?php
/**
 * Template Name: FAQ
 *
 * Custom page template for the Frequently Asked Questions page.
 * Content is fully editable via the WordPress editor.
 * Uses accordion layout matching the live site pattern.
 */

get_header();

get_template_part('template-parts/page-banner');
?>

<div id="ry-pg-content">
    <div id="ry-pg-body" class="col-xs-12 ry-section" data-interior-layout="Sidebar">
        <div class="col-xs-12 ry-container">
            <div class="col-xs-12 ry-content">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="col-xs-12 ry-faq-page">
                        <div data-aos-duration="1500" data-aos="fade-up" class="ry-headline" style="text-align: center; margin-bottom: 40px;">
                            <h2><?php the_title(); ?></h2>
                            <p class="span-1">helpful answers at a glance</p>
                        </div>
                        <div class="col-xs-12 ry-accordion" data-aos-duration="1500" data-aos="fade-up">
                            <?php
                            if (have_posts()) :
                                while (have_posts()) : the_post();
                                    $content = get_the_content();
                                    if (!empty($content)) {
                                        the_content();
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
</div>

<?php get_footer(); ?>
