<?php
/**
 * Template for displaying single team member
 * Photo + details layout with bio from editor content
 */

get_header();

$position = get_post_meta(get_the_ID(), 'team_position', true);
$credentials = get_post_meta(get_the_ID(), 'team_credentials', true);
$headshot = get_post_meta(get_the_ID(), 'team_headshot', true);

// Use page-banner partial for consistent banner
get_template_part('template-parts/page-banner');
?>

<div id="ry-pg-content">
    <div id="ry-pg-body" class="col-xs-12 ry-section" data-interior-layout="Sidebar">
        <div class="col-xs-12 team-custom-v2">
            <div class="col-xs-12 ry-container">
                <div class="col-xs-12 col-md-12 col-lg-12 wrapper">
                    <div class="col-xs-12 photo">
                        <?php if ($headshot) : ?>
                            <img src="<?php echo esc_url($headshot); ?>" loading="lazy" alt="<?php the_title_attribute(); ?>" class="img-responsive">
                        <?php elseif (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large', array('class' => 'img-responsive', 'loading' => 'lazy')); ?>
                        <?php endif; ?>
                    </div>
                    <div class="ry-text">
                        <h3><?php the_title(); ?></h3>
                        <?php if ($position) : ?>
                        <h5><?php echo esc_html($position); ?></h5>
                        <?php endif; ?>
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php get_footer(); ?>
