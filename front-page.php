<?php get_header(); ?>

<?php
  // Public Velovita assets (linked as references)
  $hero_bg  = 'https://velovita-website.s3.us-west-1.amazonaws.com/vv-new-home/assets/hero_poster.jpg';
  $hero_video = get_template_directory_uri() . '/assets/video/hero.mp4';
  $hero_poster = $hero_bg;
  $kosta    = 'https://velovita-website.s3.us-west-1.amazonaws.com/vv-new-home/assets/kosta-image.png';
  $left_img = 'https://velovita-website.s3.us-west-1.amazonaws.com/vv-new-home/assets/left_image.png';
  $right_img= 'https://velovita-website.s3.us-west-1.amazonaws.com/vv-new-home/assets/right_image.png';

  $vv_logo  = 'https://velovita-website.s3.us-west-1.amazonaws.com/vv-new-home/assets/VelovitaVacations_logo.png';
  $vac1     = 'https://velovita-website.s3.us-west-1.amazonaws.com/vv-new-home/assets/vacations_pick01.png';
  $vac2     = 'https://velovita-website.s3.us-west-1.amazonaws.com/vv-new-home/assets/vacations_pick02.png';
  $vac3     = 'https://velovita-website.s3.us-west-1.amazonaws.com/vv-new-home/assets/vacations_pick03.png';
  $vac4     = 'https://velovita-website.s3.us-west-1.amazonaws.com/vv-new-home/assets/vacations_pick04.png';

  
  // Simple "featured products" (static cards)
  $img_local = get_template_directory_uri() . '/assets/img/';
  $featured = [
    [
      'name' => 'Reserve®',
      'desc' => 'Advanced antioxidant support with heart‑friendly resveratrol.‡',
      'img'  => $img_local . 'product-reserve.png',
    ],
    [
      'name' => 'AM | PM Essentials®',
      'desc' => 'Your body’s ultimate Day & Night Wellness System.‡',
      'img'  => $img_local . 'product-ampm.png',
    ],
    [
      'name' => 'M1ND™',
      'desc' => 'Featuring Memo‑Q™ clinically shown to support memory function.‡',
      'img'  => $img_local . 'product-mind.png',
    ],
  ];


?>

<header class="vl-hero" style="background-image:url('<?php echo esc_url($hero_poster); ?>');">
  <video class="vl-hero__video" autoplay muted loop playsinline poster="<?php echo esc_url($hero_poster); ?>">
    <source src="<?php echo esc_url($hero_video); ?>" type="video/mp4">
  </video>
  <div class="vl-hero__overlay" aria-hidden="true"></div>
  <div class="vl-hero__inner">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-10 text-center">

        <div class="vl-hero-badge mx-auto mb-3" data-aos="fade-down">
          <span class="fw-semibold">Join Us Now</span>
          <span class="opacity-75">•</span>
          <span>Together We GROW</span>
        </div>

        <div class="d-flex justify-content-center mb-3" data-aos="zoom-in">
          <div class="vl-hero-logo">
            <img alt="Velovita mark" width="34" height="34"
              src="https://velovita-website.s3.us-west-1.amazonaws.com/vv-new-home/assets/VelovitaLogo_alone.png">
          </div>
        </div>

        <h1 class="display-2 fw-bold mb-3" data-aos="fade-up">Love Your Life</h1>

        <p class="lead mx-auto opacity-90" style="max-width: 52rem;" data-aos="fade-up" data-aos-delay="50">
          A wellness-driven community built on love, opportunity, and lifestyle — designed to help you elevate your day-to-day.
        </p>

        <div class="d-flex flex-wrap justify-content-center gap-2 mt-4" data-aos="fade-up" data-aos-delay="100">
          <a class="btn btn-primary btn-lg px-4" href="#experience">Explore the Experience</a>
          <a class="btn btn-outline-light btn-lg px-4" href="<?php echo esc_url(home_url('/events')); ?>">View Events</a>
        </div>

        <!-- Sponsor username UI (demo behavior) -->
        <div class="row justify-content-center mt-5" data-aos="fade-up" data-aos-delay="150">
          <div class="col-lg-8">
            <div class="vl-form-card text-start">
              <div class="row g-3 align-items-end">
                <div class="col-md-7">
                  <label class="form-label font-nunito mb-1">Know a Member? Sponsor username</label>
                  <input id="vlSponsor" type="text" class="form-control form-control-lg" placeholder="e.g. username">
                </div>
                <div class="col-md-5 d-grid">
                  <button class="btn btn-primary btn-lg" type="button" onclick="vlSponsorGo()">Submit</button>
                </div>
              </div>
              <div class="small font-nunito mt-2 opacity-75">
                Demo behavior: redirects to <code>?sponsor=USERNAME</code>.
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  </div>
</header>

<section id="experience" class="vl-pad-y">
  <div class="container">
    <div class="row g-4 align-items-center">
      <div class="col-lg-6" data-aos="fade-up">
        <div class="vl-kicker mb-2">Together We GROW</div>
        <h2 class="vl-section-title display-6 fw-bold mb-3">A Community of Rewards and Lifestyle</h2>
        <p class="font-nunito vl-muted mb-4">
          A global community of people who love what they do — helping others amplify their lives through wellness, opportunity, and fun.
        </p>
        <div class="d-flex gap-2 flex-wrap">
          <a class="btn btn-primary" href="<?php echo esc_url(home_url('/events')); ?>">Discover the Velovita Way</a>
          <a class="btn btn-outline-secondary" href="#featured-products">Featured Products</a>
        </div>
      </div>
      <div class="col-lg-6" data-aos="fade-left">
        <div class="vl-image-frame">
          <img class="img-fluid" alt="Community"
            src="https://velovita-website.s3.us-west-1.amazonaws.com/vv-new-home/assets/community-image-3.png">
        </div>
      </div>
    </div>
  </div>
</section>

<section id="featured-products" class="vl-pad-y bg-light">
  <div class="container">
    <div class="text-center mb-4" data-aos="fade-up">
      <div class="vl-kicker mb-2">Featured Products</div>
      <h2 class="vl-section-title display-6 fw-bold mb-2">Experience the heart of Velovita® wellness</h2>
      <p class="text-muted font-nunito mx-auto" style="max-width: 48rem;">
        Science‑backed solutions designed to support your daily wellness routine.
      </p>
    </div>

    <div class="row g-4 justify-content-center">
      <?php foreach ($featured as $i => $p): ?>
        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo esc_attr(min(150, $i*40)); ?>">
          <div class="card h-100 border">
            <div class="p-4 text-center">
              <div class="ratio ratio-1x1 mb-3 bg-white rounded-4 border" style="overflow:hidden;">
                <img alt="<?php echo esc_attr($p['name']); ?>" src="<?php echo esc_url($p['img']); ?>" style="width:100%;height:100%;object-fit:contain;">
              </div>
              <h3 class="h5 fw-semibold mb-2"><?php echo esc_html($p['name']); ?></h3>
              <p class="text-muted font-nunito mb-3"><?php echo esc_html($p['desc']); ?></p>
              <a class="btn btn-primary" href="<?php echo esc_url(home_url('/contact')); ?>">Learn more</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="vl-pad-y">
  <div class="container">
    <div class="row g-4 align-items-center">
      <div class="col-lg-6 order-lg-2" data-aos="fade-up">
        <div class="vl-kicker mb-2">The Heart of Velovita</div>
        <h2 class="vl-section-title display-6 fw-bold mb-3">Built out of love. Built to last.</h2>
        <p class="font-nunito vl-muted mb-4">
          A founder-led mission grounded in integrity, innovation, and a deep sense of community.
        </p>
        <div class="vl-soft-card p-4">
          <div class="font-nunito">
            <strong>Values:</strong> excellence guided by integrity, service led by heart, and love above all.
          </div>
        </div>
      </div>
      <div class="col-lg-6 order-lg-1" data-aos="fade-right">
        <div class="vl-image-frame">
          <img class="img-fluid" alt="Founder image" src="<?php echo esc_url($kosta); ?>">
        </div>
      </div>
    </div>
  </div>
</section>

<section class="vl-pad-y bg-light">
  <div class="container">
    <div class="row g-4 align-items-center">
      <div class="col-lg-6" data-aos="fade-up">
        <div class="vl-kicker mb-2">Health and Wellness, Elevated</div>
        <h2 class="vl-section-title display-6 fw-bold mb-3">Biohacking meets conscious living</h2>
        <p class="font-nunito vl-muted mb-4">
          Thoughtfully designed solutions to support balance, vitality, and clarity — helping you perform at your best, inside and out.
        </p>

        <div class="row g-3">
          <div class="col-sm-6">
            <div class="vl-soft-card p-4 h-100" data-aos="fade-up" data-aos-delay="50">
              <div class="fw-semibold mb-1">Daily vitality</div>
              <div class="font-nunito vl-muted">Support your routines with science-backed tools.</div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="vl-soft-card p-4 h-100" data-aos="fade-up" data-aos-delay="100">
              <div class="fw-semibold mb-1">Designed with intention</div>
              <div class="font-nunito vl-muted">Formulas crafted for real life, not hype.</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6" data-aos="fade-left">
        <div class="row g-3">
          <div class="col-6">
            <div class="vl-image-frame">
              <img class="img-fluid" alt="Wellness image left" src="<?php echo esc_url($left_img); ?>">
            </div>
          </div>
          <div class="col-6">
            <div class="vl-image-frame">
              <img class="img-fluid" alt="Wellness image right" src="<?php echo esc_url($right_img); ?>">
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<section class="vl-pad-y bg-light">
  <div class="container">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-2 mb-3">
      <div data-aos="fade-up">
        <div class="vl-kicker mb-2">Events</div>
        <h2 class="vl-section-title display-6 fw-bold mb-1">Upcoming Events</h2>
        <p class="text-muted font-nunito mb-0">Dynamic slider from WordPress Admin → Events.</p>
      </div>
      <div data-aos="fade-up">
        <a class="btn btn-primary" href="<?php echo esc_url(home_url('/events')); ?>">All events</a>
      </div>
    </div>

    <?php
      $q = new WP_Query([
        'post_type' => 'event',
        'posts_per_page' => 10,
        'meta_key' => '_vl_event_date',
        'orderby' => 'meta_value',
        'order' => 'ASC',
      ]);
    ?>

    <?php if ($q->have_posts()): ?>
      <div class="swiper vl-events-swiper" data-aos="fade-up">
        <div class="swiper-wrapper">
          <?php while ($q->have_posts()): $q->the_post(); $m = vl_event_meta(get_the_ID()); ?>
            <div class="swiper-slide">
              <article class="card h-100 border">
                <?php if (has_post_thumbnail()): ?>
                  <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('large', ['class' => 'card-img-top']); ?>
                  </a>
                <?php else: ?>
                  <div class="ratio ratio-16x9 bg-white border-bottom"></div>
                <?php endif; ?>

                <div class="card-body">
                  <div class="text-muted small font-nunito mb-2">
                    <?php echo esc_html($m['date'] ?: 'Date TBD'); ?> • <?php echo esc_html($m['city'] ?: 'Location TBD'); ?>
                  </div>
                  <h3 class="h5 fw-semibold">
                    <a class="text-decoration-none" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </h3>
                  <p class="text-muted font-nunito mb-0"><?php echo esc_html(get_the_excerpt()); ?></p>
                </div>

                <div class="card-footer bg-white border-0 pt-0 pb-4 px-3 d-flex gap-2">
                  <a class="btn btn-primary" href="<?php the_permalink(); ?>">Details</a>
                  <?php if (!empty($m['cta'])): ?>
                    <a class="btn btn-outline-secondary" href="<?php echo esc_url($m['cta']); ?>" target="_blank" rel="noopener">CTA</a>
                  <?php endif; ?>
                </div>
              </article>
            </div>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    <?php else: ?>
      <div class="p-4 bg-white border rounded-4" data-aos="fade-up">
        <strong>No events yet.</strong>
        <div class="text-muted font-nunito">Create one in WP Admin → Events → Add New.</div>
      </div>
    <?php endif; ?>
  </div>
</section>

<section class="vl-pad-y vl-darkband">
  <div class="container">
    <div class="row g-4 align-items-center">
      <div class="col-lg-5" data-aos="fade-up">
        <img alt="Velovita Vacations" class="img-fluid mb-3" src="<?php echo esc_url($vv_logo); ?>">
        <h2 class="display-6 fw-bold mb-3">Not a club. Not a membership. A lifestyle.</h2>
        <p class="font-nunito vl-muted mb-4">
          A rewards-style experience where achievement turns into curated trips and unforgettable moments.
        </p>
        <a class="btn btn-primary" href="<?php echo esc_url(home_url('/contact')); ?>">Join Now</a>
      </div>

      <div class="col-lg-7" data-aos="fade-left">
        <div class="row g-3">
          <div class="col-6">
            <div class="vl-image-frame"><img class="img-fluid" alt="Vacation 1" src="<?php echo esc_url($vac1); ?>"></div>
          </div>
          <div class="col-6">
            <div class="vl-image-frame"><img class="img-fluid" alt="Vacation 2" src="<?php echo esc_url($vac2); ?>"></div>
          </div>
          <div class="col-6">
            <div class="vl-image-frame"><img class="img-fluid" alt="Vacation 3" src="<?php echo esc_url($vac3); ?>"></div>
          </div>
          <div class="col-6">
            <div class="vl-image-frame"><img class="img-fluid" alt="Vacation 4" src="<?php echo esc_url($vac4); ?>"></div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<section class="vl-pad-y">
  <div class="container">
    <div class="vl-soft-card p-4 p-md-5 text-center" data-aos="fade-up">
      <div class="vl-kicker mb-2">Join</div>
      <h2 class="display-6 fw-bold mb-3">Join the most loved community in wellness</h2>
      <p class="font-nunito vl-muted mx-auto" style="max-width: 52rem;">
        Become part of something bigger — a global family built to inspire you, empower you, and remind you how beautiful life can be.
      </p>
      <div class="d-flex justify-content-center flex-wrap gap-2 mt-4">
        <a class="btn btn-primary btn-lg" href="<?php echo esc_url(home_url('/contact')); ?>">Join Now</a>
        <a class="btn btn-outline-secondary btn-lg" href="<?php echo esc_url(home_url('/events')); ?>">View Events</a>
      </div>
    </div>
  </div>
</section>

<script>
function vlSponsorGo(){
  const v = document.getElementById('vlSponsor')?.value?.trim();
  if(!v){ alert('Please enter a sponsor username.'); return; }
  const url = new URL(window.location.href);
  url.searchParams.set('sponsor', v);
  window.location.href = url.toString();
}
</script>

<?php get_footer(); ?>