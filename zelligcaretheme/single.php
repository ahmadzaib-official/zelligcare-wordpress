<?php
/**
 * Template for displaying single blog posts
 */

get_header();

get_template_part('template-parts/page-banner');
?>

<div id="ry-pg-content">
    <div id="ry-pg-body" class="col-xs-12 ry-section" data-interior-layout="Sidebar">
        <div class="col-xs-12 ry-container">
            <div class="col-xs-12 ry-content">
                <div class="col-xs-12 col-md-8 col-lg-8 ry-left">
                    <div class="col-xs-12 ry-pg-el-wrp">
                        <?php
                        while (have_posts()) :
                            the_post();
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12'); ?>>
                            <div class="col-xs-12 ry-text">
                                <?php if (has_post_thumbnail()) : ?>
                                <div class="post-featured-image" style="margin-bottom: 30px;">
                                    <?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>
                                </div>
                                <?php endif; ?>

                                <div class="post-meta" style="margin-bottom: 20px; color: #888; font-size: 14px;">
                                    <span><?php echo get_the_date(); ?></span>
                                    <?php if (has_category()) : ?>
                                    <span> | </span>
                                    <span><?php the_category(', '); ?></span>
                                    <?php endif; ?>
                                </div>

                                <?php the_content(); ?>
                            </div>
                        </article>
                        <?php endwhile; ?>
                    </div>
                </div>

                <?php get_template_part('template-parts/sidebar-cta'); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
