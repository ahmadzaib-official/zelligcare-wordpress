<?php
/**
 * Template Name: Search Results
 *
 * Custom page template for the Search Results page.
 * Phone number pulled from Theme Customizer.
 */

get_header();

get_template_part('template-parts/page-banner');

$search_query = get_search_query();
$phone = get_theme_mod('zelligcare_phone', '(555) 123-4567');
$phone_digits = preg_replace('/[^0-9]/', '', $phone);
?>

<div id="ry-pg-content">
    <div id="ry-pg-body" class="col-xs-12 ry-section" data-interior-layout="Sidebar">
        <div class="col-xs-12 ry-container">
            <div class="col-xs-12 ry-content ry-flex">
                <div class="col-xs-12 col-md-8 col-lg-8 ry-left">
                    <div class="col-xs-12 result-box">
                        <div>
                            <div class="clearfix"></div>
                            <nav>
                                <ul class="pagination"></ul>
                            </nav>
                        </div>
                        <?php
                        if (!empty($search_query)) {
                            $search_args = array(
                                's' => $search_query,
                                'post_type' => array('post', 'page'),
                                'posts_per_page' => 10,
                                'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                            );

                            $search_results = new WP_Query($search_args);

                            if ($search_results->have_posts()) :
                                while ($search_results->have_posts()) : $search_results->the_post();
                                    ?>
                                    <div class="col-xs-12 search-result">
                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        <p><?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?></p>
                                        <a href="<?php the_permalink(); ?>" class="ry-btn ry-btn-primary">Read More</a>
                                    </div>
                                    <?php
                                endwhile;

                                echo '<nav><ul class="pagination">';
                                echo paginate_links(array(
                                    'total' => $search_results->max_num_pages,
                                    'current' => max(1, get_query_var('paged')),
                                    'prev_text' => __('&laquo; Previous'),
                                    'next_text' => __('Next &raquo;'),
                                ));
                                echo '</ul></nav>';

                                wp_reset_postdata();
                            else :
                                ?>
                                <div class="col-xs-12 no-result">
                                    <div class="matches-title">
                                        <p><strong>Sorry, we couldn't find what you are looking for.</strong></p>
                                        <p>Need assistance? Give us a call at <a href="tel:<?php echo esc_attr($phone_digits); ?>"><?php echo esc_html($phone); ?></a></p>
                                    </div>
                                </div>
                                <?php
                            endif;
                        } else {
                            ?>
                            <div class="col-xs-12 no-result">
                                <div class="matches-title">
                                    <p><strong>Please enter a search term.</strong></p>
                                    <p>Use the search box in the sidebar to search our site.</p>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <?php get_template_part('template-parts/sidebar-cta'); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
