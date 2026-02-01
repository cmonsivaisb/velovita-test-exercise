<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top vl-navbar">
  <div class="container py-2">
    <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="<?php echo esc_url(home_url('/')); ?>">
      <img alt="Velovita" width="28" height="28"
        src="https://velovita-website.s3.us-west-1.amazonaws.com/vv-new-home/assets/VelovitaLogo_alone.png"></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNav">
      <?php
        wp_nav_menu([
          'theme_location' => 'primary',
          'container' => false,
          'menu_class' => 'navbar-nav ms-auto gap-2 align-items-lg-center',
          'fallback_cb' => function () {
            echo '<ul class="navbar-nav ms-auto gap-2 align-items-lg-center">';
            echo '<li class="nav-item"><a class="nav-link" href="' . esc_url(home_url('/events')) . '">Community</a></li>';
            echo '<li class="nav-item"><a class="nav-link" href="' . esc_url(home_url('/products')) . '">Products</a></li>';
            echo '<li class="nav-item"><a class="btn btn-primary" href="' . esc_url(home_url('/contact')) . '">Join Now</a></li>';
            echo '</ul>';
          },
          'walker' => class_exists('VL_Bootstrap_5_Navwalker') ? new VL_Bootstrap_5_Navwalker() : null,
        ]);
      ?>
    </div>
  </div>
</nav>

<script>
(function(){
  function apply(){
    var nav = document.querySelector('.vl-navbar');
    if(!nav) return;
    var isHome = document.body.classList.contains('home') || document.body.classList.contains('front-page');
    if(!isHome){ nav.classList.add('vl-nav-solid'); return; }
    if(window.scrollY > 40) nav.classList.add('vl-nav-solid');
    else nav.classList.remove('vl-nav-solid');
  }
  window.addEventListener('scroll', apply, {passive:true});
  if(document.readyState==='loading'){ document.addEventListener('DOMContentLoaded', apply, {once:true}); }
  else apply();
})();
</script>

