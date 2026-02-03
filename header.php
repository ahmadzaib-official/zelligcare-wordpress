<?php
/**
 * The header for our theme
 *
 * @package ZelligCare
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="site-content">
    <div id="ry-pg-header">
        <div class="col-xs-12 ">
            <!-- Desktop Header -->
            <div id="ry-section-header" class="col-xs-12 hidden-xs hidden-sm module-43 ry-section ry-sticky-menu">
                <div class="col-xs-12 ry-container">
                    <div class="col-xs-12 ry-content ry-flex">
                        <div class="col-xs-12 col-md-2 col-lg-2 ry-left ry-logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <img
                                    src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/zellig_new_logo.png"
                                    loading="lazy"
                                    alt="<?php bloginfo('name'); ?> Logo"
                                    class="img-responsive"
                                />
                            </a>
                        </div>
                        <div class="col-xs-12 col-md-10 col-lg-10 ry-right ry-flex">
                            <div class="col-xs-12 ry-leads">
                                <div class="col-xs-12 btn-wrapper">
                                    <div class="btn-wrap tel">
                                        <a
                                            href="tel:0123456789"
                                            class="ry-btn ry-btn-primary"
                                            aria-label="Call us at (012) 345-6789"
                                        >(012) 345-6789</a>
                                    </div>
                                </div>
                            </div>
                            <div class="ry-menu">
                                <div id="litlleLogo" style="display:none;">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php bloginfo('name'); ?> Home">
                                        <img
                                            src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/zellig_new_logo.png"
                                            class="img-responsive"
                                            style="max-width: 80px; height: auto;"
                                            alt="<?php bloginfo('name'); ?> Logo"
                                        />
                                    </a>
                                </div>
                                <?php
                                if (has_nav_menu('primary')) {
                                    wp_nav_menu(array(
                                        'theme_location' => 'primary',
                                        'container' => false,
                                        'menu_class' => 'nav-menu ry-nav',
                                        'walker' => new ZelligCare_Bootstrap_Nav_Walker(),
                                    ));
                                } else {
                                    zelligcare_fallback_menu();
                                }
                                ?>
                                <?php /* Logo visibility is handled by jQuery in main.js (initScrollFixed function) */ ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Header -->
            <div id="theme2-smHeader" class="col-xs-12 hidden-md hidden-lg">
                <div class="mobile-container">
                    <div class="menu-wrap">
                        <div class="flex-wrap">
                            <div class="flex-item left-nav">
                                <div class="mobile-nav">
                                    <button class="hamburger hamburger--collapse" type="button">
                                        <div class="flex-btn">
                                            <span class="hamburger-box"><span class="hamburger-inner"></span></span>
                                        </div>
                                    </button>
                                </div>
                                <div class="mobile_logo">
                                    <a style="display: block;" href="<?php echo esc_url(home_url('/')); ?>">
                                        <img
                                            src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/zellig_new_logo.png"
                                            class="img-responsive"
                                            alt="<?php bloginfo('name'); ?>"
                                        />
                                    </a>
                                </div>
                            </div>
                            <div class="flex-item right-nav">
                                <div class="mobile-button">
                                    <a href="tel:0123456789">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="flex-item mobile_menu">
                                <nav id="mobile_menu">
                                    <ul id="menu_container"></ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
