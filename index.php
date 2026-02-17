<?php get_header(); ?>

<div id="ry-main">
  <div class="col-xs-12">
    <div class="col-xs-12 sections ry-section-hero">
      <div></div>
      <div class="col-xs-12 module-hero custom">
        <div class="col-xs-12 hero-photo">
          <div
            id="slider-6908df8d3beb8"
            class="carousel slide"
            data-pause="true"
            data-wrap="true"
            data-interval="4000"
            data-width="100%"
            data-height="auto"
          >
            <div class="carousel-inner">
              <?php 
              $slider_images = zelligcare_get_hero_slider_images();
              $first = true;
              foreach ($slider_images as $image_url) :
                if (empty($image_url)) continue;
              ?>
              <div class="item <?php echo $first ? 'active' : ''; ?>">
                <div
                  class="col-xs-12 text-center"
                  style="padding-left: 0; padding-right: 0"
                >
                  <img
                    style="user-select: none; opacity: 1"
                    class="sliderImage center-block img-responsive"
                    data-hoverimage
                    src="<?php echo esc_url($image_url); ?>"
                    alt=""
                  />
                </div>
              </div>
              <?php 
              $first = false;
              endforeach; 
              ?>
            </div>
            <a
              class="carousel-control left"
              href="#slider-6908df8d3beb8"
              data-slide="prev"
              ><span class="icon-prev"></span
            ></a>
            <a
              class="carousel-control right"
              href="#slider-6908df8d3beb8"
              data-slide="next"
              ><span class="icon-next"></span
            ></a>
          </div>
        </div>
        <div class="col-xs-12 hero-text">
          <div class="col-xs-12 ry-container">
            <div
              class="col-xs-12 ry-content"
              data-aos-duration="1500"
              data-aos="fade-up"
              data-aos-offset="0"
            >
              <div class="ry-headline">
                <h1 style="text-align: center">
                  <?php echo esc_html(zelligcare_get_theme_option('hero_title', 'Zellig Psychiatry')); ?><br /><span
                    class="span-1"
                    ><?php echo esc_html(zelligcare_get_theme_option('hero_subtitle', 'Personalized care, thoughtfully delivered.')); ?></span
                  >
                </h1>
                <div class="hero-insurance-container">
                  <div class="hero-insurance-logos">
                    <?php 
                    $insurance_logos = zelligcare_get_insurance_logos();
                    foreach ($insurance_logos as $logo_url) :
                      if (empty($logo_url)) continue;
                    ?>
                    <div class="hero-logo-item"><img src="<?php echo esc_url($logo_url); ?>" alt="Insurance"></div>
                    <?php endforeach; ?>
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

<div id="section-cta" class="col-xs-12">
  <div class="col-xs-12 sections">
    <div class="col-xs-12 module-cta custom">
      <div class="col-xs-12 ry-container">
        <div class="col-xs-12 content">
          <div class="col-xs-12 ry-flex">
            <div class="col-xs-12 col-lg-3 each each-1" data-aos-duration="1500" data-aos="fade-up">
              <div class="col-xs-12 wrapper">
                <div class="title">
                  <h3 style="color: #b08d57;"><?php echo wp_kses_post(zelligcare_get_theme_option('cta_title', 'WHAT WE<br>OFFER')); ?></h3>
                </div>
                <div class="ry-text">
                  <p>
                    <?php 
                    $cta_desc = zelligcare_get_theme_option('cta_description', 'World-class psychiatric care delivered by highly trained psychiatric physician assistants. We accept most insurance plans and offer appointments within the week.');
                    echo wp_kses_post(str_replace('insurance plans', '<a href="' . esc_url(home_url('/payment-options/')) . '" style="color: #b08d57; text-decoration: underline;">insurance plans</a>', $cta_desc));
                    ?>
                  </p>
                </div>
                <div class="card-link">
                  <a href="<?php echo esc_url(zelligcare_get_theme_option('appointment_url', 'https://intakeq.com/new/x25dh0')); ?>" target="_blank" title="Intake Form">REQUEST AN
                    APPOINTMENT →</a>
                </div>
              </div>
            </div>
            <?php 
            $services = zelligcare_get_services(3);
            $delay = 300;
            foreach ($services as $index => $service) :
              $icon_class = get_post_meta($service->ID, 'service_icon_class', true);
              if (empty($icon_class)) {
                $icon_classes = array('fa-solid fa-leaf', 'fa-solid fa-seedling', 'fa-solid fa-tree');
                $icon_class = isset($icon_classes[$index]) ? $icon_classes[$index] : 'fa-solid fa-circle';
              }
              $link_url = get_post_meta($service->ID, 'service_link_url', true);
              if (empty($link_url)) {
                $link_url = get_permalink($service->ID);
              }
            ?>
            <div class="col-xs-12 col-lg-3 each each-2" data-aos-duration="1500" data-aos-delay="<?php echo esc_attr($delay); ?>" data-aos="fade-up">
              <div class="col-xs-12 icon">
                <i class="<?php echo esc_attr($icon_class); ?>"></i>
              </div>
              <div class="col-xs-12 wrapper">
                <div class="title">
                  <h4><?php echo esc_html(strtoupper($service->post_title)); ?></h4>
                </div>
                <div class="ry-text">
                  <p>
                    <?php echo esc_html($service->post_excerpt ? $service->post_excerpt : wp_trim_words($service->post_content, 20)); ?>
                  </p>
                </div>
                <div class="card-link">
                  <a href="<?php echo esc_url($link_url); ?>">LEARN MORE</a>
                </div>
              </div>
            </div>
            <?php 
            $delay += 200;
            endforeach; 
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div id="section-services" class="col-xs-12" style="background-color: #d1e2e2;">
  <div class="col-xs-12 sections">
    <div class="col-xs-12 module-services custom" data-style="Featured Photo">
      <div class="col-xs-12 section-background">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/homepage/os_bg.png" loading="lazy" alt="" class="img-responsive">
      </div>
      <div class="col-xs-12 ry-container">
        <div class="col-xs-12 ry-content">
          <div class="col-xs-12 content">
            <div data-aos-duration="1500" data-aos="fade-up" class="ry-headline">
              <h2 style="text-align: center; color: white">
                <span class="span-1"><?php echo esc_html(zelligcare_get_theme_option('specialties_subtitle', 'EXPERTISE THAT MATTERS')); ?></span> <?php echo esc_html(zelligcare_get_theme_option('specialties_title', 'OUR SPECIALTIES')); ?>
              </h2>
            </div>
            <div class="col-xs-12 ry-flex" data-aos-duration="1500" data-aos="fade-up" style="justify-content: center">
              <?php 
              $specialties = zelligcare_get_specialties(8);
              foreach ($specialties as $specialty) :
                $icon_url = get_post_meta($specialty->ID, 'specialty_icon_url', true);
                if (empty($icon_url)) {
                  $icon_url = get_the_post_thumbnail_url($specialty->ID, 'full');
                }
                if (empty($icon_url)) {
                  $icon_url = get_template_directory_uri() . '/images/homepage/os_icon1.png';
                }
                // Link to the WP page (e.g. /anxiety/) not the CPT post (/specialties/anxiety/)
                $page = get_page_by_path($specialty->post_name);
                $specialty_url = $page ? get_permalink($page->ID) : home_url('/' . $specialty->post_name . '/');
              ?>
              <div class="col-xs-12 col-lg-3 each">
                <div class="col-xs-12 wrapper">
                  <div class="col-xs-12 photo">
                    <img src="<?php echo esc_url($icon_url); ?>" loading="lazy" alt="<?php echo esc_attr($specialty->post_title); ?>" class="img-responsive">
                  </div>
                  <div class="service-title">
                    <div style="text-align: center">
                      <?php echo esc_html(strtoupper(html_entity_decode($specialty->post_title, ENT_QUOTES, 'UTF-8'))); ?>
                    </div>
                  </div>
                  <div class="link">
                    <a href="<?php echo esc_url($specialty_url); ?>" target="_self"><?php echo esc_html(strtoupper(html_entity_decode($specialty->post_title, ENT_QUOTES, 'UTF-8'))); ?></a>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
            <!-- Mobile carousel nav: arrows + dots -->
            <div class="services-carousel-nav" aria-label="Specialty carousel navigation">
              <button class="carousel-arrow carousel-prev" aria-label="Previous">&#10094;</button>
              <div class="services-carousel-dots">
                <?php for ($d = 0; $d < count($specialties); $d++) : ?>
                  <button class="dot<?php echo $d === 0 ? ' active' : ''; ?>" data-index="<?php echo $d; ?>" aria-label="Go to specialty <?php echo $d + 1; ?>"></button>
                <?php endfor; ?>
              </div>
              <button class="carousel-arrow carousel-next" aria-label="Next">&#10095;</button>
            </div>
            <script>
            (function(){
              var track = document.querySelector('.module-services.custom .ry-flex');
              if (!track) return;
              var items = track.querySelectorAll('.each');
              var dots = document.querySelectorAll('.services-carousel-dots .dot');
              var prevBtn = document.querySelector('.carousel-prev');
              var nextBtn = document.querySelector('.carousel-next');
              if (!items.length) return;

              function getCardWidth() {
                return items[0].offsetWidth + 15; /* card width + gap */
              }

              prevBtn.addEventListener('click', function() {
                track.scrollBy({ left: -getCardWidth(), behavior: 'smooth' });
              });
              nextBtn.addEventListener('click', function() {
                track.scrollBy({ left: getCardWidth(), behavior: 'smooth' });
              });

              dots.forEach(function(dot) {
                dot.addEventListener('click', function() {
                  var idx = parseInt(this.getAttribute('data-index'));
                  items[idx].scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
                });
              });

              function updateDots() {
                var scrollLeft = track.scrollLeft;
                var cardW = getCardWidth();
                var active = Math.round(scrollLeft / cardW);
                active = Math.max(0, Math.min(active, items.length - 1));
                dots.forEach(function(d, i) {
                  d.classList.toggle('active', i === active);
                });
              }

              var scrollTimer;
              track.addEventListener('scroll', function() {
                clearTimeout(scrollTimer);
                scrollTimer = setTimeout(updateDots, 80);
              });
            })();
            </script>
            <div class="row">
              <div class="col-xs-12 text-center" style="margin-top: 100px; margin-bottom: 20px;">
                <a href="<?php echo esc_url(zelligcare_get_theme_option('appointment_url', 'https://intakeq.com/new/x25dh0')); ?>" class="hero-cta-badge" target="_blank" title="Intake Form">REQUEST AN APPOINTMENT</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="section-locations" class="col-xs-12" data-aos="fade-up" data-aos-duration="1000">
  <div class="col-xs-12 sections" style="background-color: #d1e2e2;">
    <div class="col-xs-12 module-locations custom">
      <div class="col-xs-12 ry-container">
        <div class="col-xs-12 ry-content">
          <div class="ry-headline" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="200">
            <h2 style="text-align: center"><?php echo esc_html(zelligcare_get_theme_option('locations_title', 'States We Serve')); ?></h2>
          </div>
          <div class="row locations-grid" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
            <?php 
            $states = zelligcare_get_states_served();
            $delay = 200; // Initial delay
            foreach ($states as $state) :
            ?>
            <div class="col-xs-12 col-sm-4 col-sm-offset-4 location-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="<?php echo $delay; ?>">
              <div class="icon" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="<?php echo $delay + 100; ?>">
                <i class="fa-solid fa-location-dot"></i>
              </div>
              <h3><?php echo esc_html($state); ?></h3>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="section-team" class="col-xs-12">
  <div class="col-xs-12">
    <div></div>
    <div class="col-xs-12 module-team custom">
      <div class="col-xs-12 section-background">
        <img
          src="<?php echo esc_url(get_template_directory_uri()); ?>/images/homepage/team_bg.jpg"
          loading="lazy"
          alt
          class="img-responsive"
        />
      </div>
      <div class="col-xs-12 ry-container">
        <div class="col-xs-12 ry-content">
          <div class="col-xs-12 content">
            <div
              data-aos-duration="1500"
              data-aos="fade-down"
              class="ry-headline"
            >
              <h2 style="text-align: center"><?php echo esc_html(zelligcare_get_theme_option('team_title', 'Meet the Team')); ?></h2>
            </div>
            <div class="col-xs-12 ry-flex">
              <?php 
              $team_members = zelligcare_get_team_members(true, 2); // Get 2 team members for homepage
              $animations = array('fade-right', 'fade-left');
              foreach ($team_members as $index => $member) :
                $position = get_post_meta($member->ID, 'team_position', true);
                $photo_url = get_post_meta($member->ID, 'team_headshot', true);
                if (empty($photo_url)) {
                  $photo_url = get_the_post_thumbnail_url($member->ID, 'full');
                }
                if (empty($photo_url)) {
                  $photo_url = get_template_directory_uri() . '/images/team/kaye_headshot.png';
                }
                $member_url = get_permalink($member->ID);
                if (empty($member_url)) {
                  $member_url = home_url('/' . $member->post_name . '/');
                }
                $animation = isset($animations[$index]) ? $animations[$index] : 'fade-up';
              ?>
              <div
                class="col-xs-12 col-lg-6 each"
                data-aos-duration="1500"
                data-aos="<?php echo esc_attr($animation); ?>"
              >
                <div class="col-xs-12 wrapper">
                  <div class="col-xs-12 photo">
                    <img
                      src="<?php echo esc_url($photo_url); ?>"
                      loading="lazy"
                      alt="<?php echo esc_attr($member->post_title); ?>"
                      class="img-responsive"
                    />
                  </div>
                  <div class="title">
                    <p class="team-name"><strong><?php echo esc_html($member->post_title); ?></strong></p>
                    <?php if ($position) : ?>
                    <p class="team-position">
                      <span class="span-1"><?php echo esc_html($position); ?></span>
                    </p>
                    <?php endif; ?>
                    <p class="team-bio">
                      <?php echo esc_html(wp_trim_words($member->post_excerpt ? $member->post_excerpt : $member->post_content, 30)); ?>
                    </p>
                    <a
                      href="<?php echo esc_url($member_url); ?>"
                      class="ry-btn ry-btn-primary"
                      >Read Full Bio</a
                    >
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
           <div class="row">
              <div class="col-xs-12 text-center" style="margin-top: 50px; margin-bottom: 20px;">
                <a href="<?php echo esc_url(zelligcare_get_theme_option('appointment_url', 'https://intakeq.com/new/x25dh0')); ?>" class="hero-cta-badge team-cta-button" target="_blank" title="Intake Form">REQUEST AN APPOINTMENT</a>
              </div>
            </div>

        </div>
      </div>
    </div>

  </div>
</div>

<!-- Insurance Section -->
<div id="section-insurances" class="col-xs-12">
  <div class="col-xs-12">
    <div></div>
    <div class="col-xs-12 module-insurance custom">
      <div class="col-xs-12 ry-container">
        <div class="col-xs-12 ry-content">
          <div class="col-xs-12 content">
            <div
              data-aos-duration="1000"
              data-aos="fade-up"
              class="ry-headline"
            >
              <h2 style="text-align: center">
                <span class="span-1"><?php echo esc_html(zelligcare_get_theme_option('insurance_title', 'Accepted Insurance')); ?></span>
              </h2>
            </div>
            <div class="col-xs-12 wrapper">
              <div class="col-xs-12 ry-flex">
                <?php 
                $insurance_logos = zelligcare_get_insurance_logos();
                $animations = array('fade-right', 'fade-up', 'fade-up', 'fade-left');
                $delays = array(0, 500, 500, 0);
                foreach ($insurance_logos as $index => $logo_url) :
                  if (empty($logo_url)) continue;
                  $animation = isset($animations[$index]) ? $animations[$index] : 'fade-up';
                  $delay = isset($delays[$index]) ? $delays[$index] : 0;
                ?>
                <div
                  class="col-xs-12 each"
                  data-aos-duration="1500"
                  data-aos-delay="<?php echo esc_attr($delay); ?>"
                  data-aos="<?php echo esc_attr($animation); ?>"
                >
                  <img
                    src="<?php echo esc_url($logo_url); ?>"
                    loading="lazy"
                    alt="Insurance"
                    class="img-responsive"
                  />
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="section-appointment" class="col-xs-12" data-aos="fade-up" data-aos-duration="1000">
  <div id="request-appointment" class="col-xs-12 sections">
    <div></div>
    <div class="col-xs-12 module-appointment custom">
      <div class="col-xs-12 section-background">
        <img
          src="<?php echo esc_url(get_template_directory_uri()); ?>/images/homepage/getintouch_bg.png"
          loading="lazy"
          alt
          class="img-responsive"
        />
      </div>
      <div class="col-xs-12 ry-container">
        <div class="col-xs-12 ry-content">
          <div class="ry-headline" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
            <h2>
              <span>interested in our services?</span> get in touch
            </h2>
          </div>
          <div class="col-xs-12 col-lg-12 form-block" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
            <form
              id="request-appointment-form"
              class="cmsForm"
              method="post"
              action="<?php echo admin_url('admin-post.php'); ?>"
            >
              <input type="hidden" name="action" value="submit_form">
              <div class="fieldset">
                <div class="col-xs-12 wrapper">
                  <div class="col-xs-12 each-field">
                    <div
                      class="form-group required"
                      data-validation="^[a-zA-Z0-9 ]+$"
                      data-errormsg="Invalid Input"
                      data-type="text"
                      data-required="true"
                    >
                      <input
                        name="Name"
                        value
                        id="Name"
                        type="text"
                        placeholder="Name*"
                        class="form-control"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-xs-12 each-field">
                    <div
                      class="form-group required"
                      data-validation="^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$"
                      data-errormsg="Invalid Email Format"
                      data-type="text"
                      data-required="true"
                    >
                      <input
                        name="Email"
                        value
                        id="Email"
                        type="text"
                        placeholder="Email*"
                        class="form-control"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-xs-12 each-field">
                    <div
                      class="form-group required"
                      data-validation="^(([0-9]{1})*[- .(]*([0-9]{3})[- .)]*[0-9]{3}[- .]*[0-9]{4})+$"
                      data-errormsg="Invalid Phone Format"
                      data-type="text"
                      data-required="true"
                    >
                      <input
                        name="Phone"
                        value
                        id="Phone"
                        type="text"
                        placeholder="Phone*"
                        class="form-control"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-xs-12 each-field">
                    <div
                      class="form-group"
                      data-type="text"
                      data-required="true"
                    >
                      <textarea
                        name="Message"
                        id="Message"
                        placeholder="Message"
                        class="form-control"
                      ></textarea>
                    </div>
                  </div>
                  <div id="submit" class="col-xs-12 input-wrap">
                    <div class="form-group" data-type="submit">
                      <input
                        id="recaptcha_hp_appt"
                        type="submit"
                        class="recaptcha ry-btn ry-btn-primary"
                        value="Submit"
                      />
                    </div>
                  </div>
                </div>
              </div>
              <div class="container-fluid" style="padding: 0">
                <div class="alert alert-success hidden">
                  Thank you. We'll connect with you shortly.
                </div>
                <div
                  class="alert alert-danger alert-missing-fields hidden"
                >
                  You are missing required fields.
                </div>
                <div
                  class="alert alert-danger alert-custom-errors hidden"
                >
                  Dynamic Error Description
                </div>
                <div
                  class="alert alert-danger alert-processing-error hidden"
                >
                  There was an error processing this form.
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
