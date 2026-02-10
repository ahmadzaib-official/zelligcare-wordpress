<?php
/**
 * Template Name: Search Results
 *
 * Custom page template for the Search Results page.
 */

get_header();

get_template_part('template-parts/page-banner');
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
                        // Get search query
                        $search_query = get_search_query();
                        
                        if (!empty($search_query)) {
                            // Perform WordPress search
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
                                
                                // Pagination
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
                                        <p>Need assistance? Give us a call at <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9]/', '', zelligcare_get_phone())); ?>"><?php echo esc_html(zelligcare_get_phone()); ?></a></p>
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
                            <div class="col-xs-12 ry-cta-wrp ry-el-bg ry-el-link">
                                <div class="col-xs-12 ry-cta">
                                    <div class="col-xs-12 ry-cta-contain">
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/homepage/sb2.jpg" loading="lazy" alt="Contact Us" class="img-responsive">
                                        <div>
                                            <p>Keep In Touch</p>
                                            <a href="<?php echo esc_url(home_url('/contact-us/')); ?>" class="ry-btn ry-btn-primary">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
