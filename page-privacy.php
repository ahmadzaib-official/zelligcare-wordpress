<?php
/**
 * Template Name: Privacy Policy
 *
 * Custom page template for the Privacy Policy page.
 * Content is fully editable via the WordPress editor.
 */

get_header();

get_template_part('template-parts/page-banner');
?>

<div id="ry-pg-content">
    <div id="ry-pg-body" class="col-xs-12 ry-section" data-interior-layout="Sidebar">
        <div class="col-xs-12 ry-container">
            <div class="col-xs-12 ry-content ry-flex">
                <div class="col-xs-12 col-md-8 col-lg-8 ry-left">
                    <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                            the_content();
                        endwhile;
                    endif;
                    ?>
                </div>
                <?php get_template_part('template-parts/sidebar-cta'); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
