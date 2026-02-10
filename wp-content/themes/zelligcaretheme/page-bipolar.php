<?php
/**
 * Template Name: Bipolar
 *
 * Custom page template for the Bipolar specialty page.
 * Content is editable via the WordPress editor.
 */

get_header();

get_template_part('template-parts/page-banner');
?>

<div id="ry-pg-content">
    <div class="col-xs-12 module-offer inner-condition-template">
        <div class="col-xs-12 group-block">
            <?php get_template_part('template-parts/specialty-sections'); ?>
        </div>
    </div>

</div>

<?php get_footer(); ?>
