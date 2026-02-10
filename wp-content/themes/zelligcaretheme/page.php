<?php
/**
 * Default page template
 * Used for pages without a specific template assigned
 */

get_header();

get_template_part('template-parts/page-banner');
?>

<div id="ry-pg-content">
    <div id="ry-pg-body" class="col-xs-12 ry-section" data-interior-layout="Sidebar">
        <div class="col-xs-12 ry-container">
            <div class="col-xs-12 ry-content">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="col-xs-12 ry-pg-el-wrp">
                        <?php
                        if (have_posts()) :
                            while (have_posts()) : the_post();
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12'); ?>>
                            <div class="col-xs-12 ry-text" data-aos-duration="1500" data-aos="fade-up">
                                <?php the_content(); ?>
                            </div>
                        </article>
                        <?php
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
