<?php
/**
 * Template for displaying single blog posts
 */

get_header();

get_template_part('template-parts/page-banner');
?>

<div id="ry-pg-content">
    <div id="ry-pg-body" class="col-xs-12 ry-section blog-custom-template" data-interior-layout="Sidebar">
        <div class="col-xs-12 ry-container">
            <div class="col-xs-12 ry-content">
                <div class="col-xs-12 col-lg-12 blog-inner-template">
                    <?php
                    while (have_posts()) :
                        the_post();
                    ?>
                    <div class="col-xs-12 col-md-12 col-lg-12 wrapper">
                        <?php if (has_post_thumbnail()) : ?>
                        <div class="col-xs-12 photo">
                            <?php the_post_thumbnail('large', array('class' => 'img-responsive', 'loading' => 'lazy')); ?>
                        </div>
                        <?php endif; ?>

                        <div>
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
