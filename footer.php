<?php
/**
 * The footer template for our theme
 *
 * @package ZelligCare
 */
?>
    <style>
        /* Footer Bottom Styles - Matching zelligcare.com/styles/overrides.css */
        .footer-bottom {
            padding: 30px 0;
            background: #fff;
        }
        .footer-top .ry-container, .footer-bottom .ry-container {
            max-width: 1280px;
            width: 90%;
        }
        .footer-bottom .content {
            display: flex;
            gap: 10px;
            justify-content: space-between;
        }
        .footer-bottom .content .ry-left, .footer-bottom .content .ry-right {
            max-width: max-content;
            width: auto;
        }
        .footer-bottom .content * {
            font-size: 16px;
            color: #666;
            text-transform: uppercase;
        }
        .footer-bottom .content .powered {
            display: flex;
            gap: 10px;
        }
        .footer-bottom .content .powered img {
            max-width: max-content;
            object-fit: contain;
        }
        @media (max-width: 575px) {
            .footer-bottom {
                padding: 20px 0;
            }
            .footer-bottom .ry-container {
                width: 95%;
            }
            .footer-bottom .content {
                flex-direction: column;
                align-items: center;
                text-align: center;
                gap: 15px;
            }
            .footer-bottom .content .ry-left,
            .footer-bottom .content .ry-right {
                width: 100%;
                text-align: center;
            }
            .footer-bottom .content .ry-left p {
                font-size: 14px;
                line-height: 1.6;
            }
            .footer-bottom .content .ry-left .span-2 {
                display: block;
                margin-bottom: 8px;
                margin-right: 0;
            }
            .footer-bottom .content .ry-left a {
                display: inline-block;
                margin: 0 3px;
                font-size: 14px;
                word-break: break-word;
                line-height: 1.8;
            }
            .footer-bottom .content .ry-right {
                margin-top: 5px;
            }
            .footer-bottom .content .powered {
                justify-content: center;
                flex-direction: column;
                align-items: center;
                gap: 8px;
            }
            .footer-bottom .content .powered p {
                font-size: 14px;
                margin-bottom: 5px;
            }
            .footer-bottom .content .powered img {
                max-width: 100px;
            }
        }
    </style>
    <div id="ry-footer">
        <div class="col-xs-12">
            <div class="col-xs-12 module-footer custom">
                <div class="col-xs-12 section-background">
                    <img
                        src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/footer_bg.jpg"
                        loading="lazy"
                        alt
                        class="img-responsive"
                    />
                </div>
                <div class="col-xs-12 footer-top">
                    <div class="col-xs-12 ry-container">
                        <div class="col-xs-12 content">
                            <div class="col-xs-12 ry-flex">
                                <!-- Logo and Social Media -->
                                <div
                                    class="col-xs-12 col-lg-4 each each-1"
                                    data-aos-duration="1500"
                                    data-aos="fade-right"
                                >
                                    <div class="col-xs-12 wrapper">
                                        <div class="col-xs-12 photo">
                                            <img
                                                src="https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/zellig_new_logo.png"
                                                loading="lazy"
                                                alt
                                                class="img-responsive"
                                            />
                                        </div>
                                        <div class="custom-socmed">
                                            <li data-href="#">
                                                <a href="#" target="_blank">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 320 512" height="20">
                                                        <path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"></path>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li data-href="#">
                                                <a href="#" target="_blank">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-instagram" viewbox="0 0 16 16" width="16" fill="#fff">
                                                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"></path>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li data-href="#">
                                                <a href="#" target="_blank">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-google" viewbox="0 0 16 16">
                                                        <path d="M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z"></path>
                                                    </svg>
                                                </a>
                                            </li>
                                        </div>
                                    </div>
                                </div>

                                <!-- Contact Info -->
                                <div
                                    class="col-xs-12 col-lg-4 each each-2"
                                    data-aos-duration="1500"
                                    data-aos="fade-up"
                                    data-aos-delay="500"
                                >
                                    <div class="col-xs-12 wrapper">
                                        <div class="title">contact info</div>
                                        <div class="col-xs-12 details">
                                            <div class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewbox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"></path>
                                                </svg>
                                            </div>
                                            <div class="text phone">
                                                <a
                                                    data-cke-saved-href="tel:"
                                                    href="tel:0123456789"
                                                    data-toggle-value
                                                    data-toggle-default-visible="false"
                                                    data-toggle-show-animation
                                                    data-toggle-hide-animation
                                                    data-toggle-show-animation-options="{}"
                                                    data-toggle-hide-animation-options="{}"
                                                    target="_self"
                                                    id
                                                    class
                                                >(012) 345-6789</a>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 details">
                                            <div class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 640">
                                                    <path d="M224 128L224 208L288 208L288 128L434.7 128L480 173.3L480 208L544 208L544 173.3C544 156.3 537.3 140 525.3 128L480 82.7C468 70.7 451.7 64 434.7 64L288 64C252.7 64 224 92.7 224 128zM96 192C78.3 192 64 206.3 64 224L64 512C64 529.7 78.3 544 96 544L144 544C161.7 544 176 529.7 176 512L176 224C176 206.3 161.7 192 144 192L96 192zM544 256L224 256L224 512C224 529.7 238.3 544 256 544L544 544C561.7 544 576 529.7 576 512L576 288C576 270.3 561.7 256 544 256zM288 352C288 338.7 298.7 328 312 328C325.3 328 336 338.7 336 352C336 365.3 325.3 376 312 376C298.7 376 288 365.3 288 352zM288 448C288 434.7 298.7 424 312 424C325.3 424 336 434.7 336 448C336 461.3 325.3 472 312 472C298.7 472 288 461.3 288 448zM400 328C413.3 328 424 338.7 424 352C424 365.3 413.3 376 400 376C386.7 376 376 365.3 376 352C376 338.7 386.7 328 400 328zM376 448C376 434.7 386.7 424 400 424C413.3 424 424 434.7 424 448C424 461.3 413.3 472 400 472C386.7 472 376 461.3 376 448zM488 328C501.3 328 512 338.7 512 352C512 365.3 501.3 376 488 376C474.7 376 464 365.3 464 352C464 338.7 474.7 328 488 328zM464 448C464 434.7 474.7 424 488 424C501.3 424 512 434.7 512 448C512 461.3 501.3 472 488 472C474.7 472 464 461.3 464 448z"></path>
                                                </svg>
                                            </div>
                                            <div class="text phone">(123) 456-7890</div>
                                        </div>
                                        <div class="col-xs-12 details">
                                            <div class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewbox="0 0 16 16">
                                                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"></path>
                                                </svg>
                                            </div>
                                            <div class="text mail">
                                                <a
                                                    data-cke-saved-href="#"
                                                    href="mailto:support@zelligcare.com"
                                                    data-toggle-value
                                                    data-toggle-default-visible="false"
                                                    data-toggle-show-animation
                                                    data-toggle-hide-animation
                                                    data-toggle-show-animation-options="{}"
                                                    data-toggle-hide-animation-options="{}"
                                                    id
                                                    class
                                                    target="_self"
                                                >Send Us A Message</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Sitemap -->
                                <div
                                    class="col-xs-12 col-lg-4 each each-2"
                                    data-aos-duration="1500"
                                    data-aos="fade-left"
                                >
                                    <div class="col-xs-12 wrapper">
                                        <div class="title">Sitemap</div>
                                        <div class="col-xs-12 details">
                                            <div class="list-link">
                                                <ul>
                                                    <li class=" " data-active>
                                                        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                                                    </li>
                                                    <li class=" " data-active>
                                                        <a href="<?php echo esc_url(home_url('/about/')); ?>">Who We Are</a>
                                                    </li>
                                                    <li class=" " data-active>
                                                        <a href="<?php echo esc_url(home_url('/services/')); ?>">What We Offer</a>
                                                    </li>
                                                    <li class=" " data-active>
                                                        <a href="<?php echo esc_url(home_url('/services/')); ?>">Our Specialties</a>
                                                    </li>
                                                    <li class=" " data-active>
                                                        <a href="<?php echo esc_url(home_url('/meet-our-team/')); ?>">Our Team</a>
                                                    </li>
                                                    <li class=" " data-active>
                                                        <a href="<?php echo esc_url(home_url('/payment-options/')); ?>">Payment Options</a>
                                                    </li>
                                                    <li class=" " data-active>
                                                        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>">Contact Us</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Bottom -->
                <div class="col-xs-12 footer-bottom">
                    <div class="col-xs-12 ry-container">
                        <div class="col-xs-12 content">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ry-left">
                                <div class="theme_special_text_color">
                                    <p>
                                        <span class="span-2">&copy; <?php echo date('Y'); ?> Zellig. All rights Reserved. </span>
                                        <a
                                            data-cke-saved-href="<?php echo esc_url(home_url('/accessibility-statement/')); ?>"
                                            href="<?php echo esc_url(home_url('/accessibility-statement/')); ?>"
                                            data-toggle-value
                                            data-toggle-default-visible="false"
                                            data-toggle-show-animation
                                            data-toggle-hide-animation
                                            data-toggle-show-animation-options="{}"
                                            data-toggle-hide-animation-options="{}"
                                            id
                                            class
                                            target="_self"
                                        >Accessibility Statement</a>
                                        -
                                        <a
                                            data-cke-saved-href="#"
                                            href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"
                                            data-toggle-value
                                            data-toggle-default-visible="false"
                                            data-toggle-show-animation
                                            data-toggle-hide-animation
                                            data-toggle-show-animation-options="{}"
                                            data-toggle-hide-animation-options="{}"
                                            id
                                            class
                                            target="_self"
                                        >Privacy Policy</a>
                                        -
                                        <a
                                            data-cke-saved-href="<?php echo esc_url(home_url('/sitemap/')); ?>"
                                            href="<?php echo esc_url(home_url('/sitemap/')); ?>"
                                            data-toggle-value
                                            data-toggle-default-visible="false"
                                            data-toggle-show-animation
                                            data-toggle-hide-animation
                                            data-toggle-show-animation-options="{}"
                                            data-toggle-hide-animation-options="{}"
                                            id
                                            class
                                            target="_self"
                                        >Sitemap</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ry-right">
                                <div class="col-xs-12 nopadding powered">
                                    <div>
                                        <p>Powered by:</p>
                                    </div>
                                    <img
                                        src="https://static.royacdn.com/Site-2ee61591-bd3f-4b94-8583-7fc4d52f01b0/index_img/roya_logo_2017_small.png"
                                        loading="lazy"
                                        title="Roya"
                                        alt
                                        class="img-responsive"
                                        data-url="http://www.roya.com/?utm_source=zelligcare.com&utm_campaign=poweredby"
                                        data-target="_blank"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>
