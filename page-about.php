<?php
/**
 * Template Name: Our Practice (About)
 * Description: About page matching reference structure - fully editable via WordPress
 */

get_header();

get_template_part('template-parts/page-banner');
?>

<div id="ry-pg-content">
    <div id="ry-pg-body" class="col-xs-12 ry-section" data-interior-layout="Sidebar">
        <div class="col-xs-12 ry-container">
            <div class="col-xs-12 ry-content ry-flex">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div style="display: block !important; visibility: visible !important; opacity: 1 !important;" data-aos-duration="1500" data-aos="fade-up">
                        <div class="ry-text">
                            <?php
                            if (have_posts()) :
                                while (have_posts()) : the_post();
                                    the_content();
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
