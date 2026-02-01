<?php
/**
 * Theme version constant (prevents undefined constant fatals).
 */
if (!defined('VL_THEME_VERSION')) {
  $t = wp_get_theme();
  define('VL_THEME_VERSION', $t && $t->get('Version') ? $t->get('Version') : '1.0.0');
}

if (!defined('ABSPATH')) exit;

require_once get_template_directory() . '/inc/class-vl-bootstrap-5-navwalker.php';

/**
 * Assets: Bootstrap + Fonts + Swiper + AOS + Theme JS
 */
add_action('wp_enqueue_scripts', function () {
  // Google Fonts (Montserrat + Nunito)
  wp_enqueue_style(
    'vl-fonts',
    'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Nunito:wght@300;400;600;700&display=swap',
    [],
    null
  );

  // Bootstrap CSS
  wp_enqueue_style(
    'bootstrap',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
    [],
    '5.3.3'
  );

  
  wp_enqueue_style('vl-custom', get_template_directory_uri().'/assets/css/custom.css', [], VL_THEME_VERSION);
// Swiper CSS
  wp_enqueue_style(
    'swiper',
    'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
    [],
    '11'
  );

  // AOS CSS
  wp_enqueue_style(
    'aos',
    'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css',
    [],
    '2.3.4'
  );

  // Theme CSS
  wp_enqueue_style(
    'vl-style',
    get_stylesheet_uri(),
    ['bootstrap', 'vl-fonts', 'swiper', 'aos'],
    '1.1'
  );

  // Bootstrap JS bundle
  wp_enqueue_script(
    'bootstrap',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
    [],
    '5.3.3',
    true
  );

  // Swiper JS
  wp_enqueue_script(
    'swiper',
    'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
    [],
    '11',
    true
  );

  // AOS JS
  wp_enqueue_script(
    'aos',
    'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js',
    [],
    '2.3.4',
    true
  );

  // Theme JS (inits Swiper + AOS)
  wp_enqueue_script(
    'vl-theme',
    get_template_directory_uri() . '/assets/js/theme.js',
    ['swiper', 'aos'],
    '1.1',
    true
  );
});

/**
 * Theme basics
 */
add_action('after_setup_theme', function () {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');

  register_nav_menus([
    'primary' => 'Primary Menu',
  ]);
});

/**
 * CPT: Event
 */
add_action('init', function () {
  register_post_type('event', [
    'labels' => [
      'name' => 'Events',
      'singular_name' => 'Event',
      'add_new_item' => 'Add New Event',
      'edit_item' => 'Edit Event',
    ],
    'public' => true,
    'has_archive' => true,
    'rewrite' => ['slug' => 'events'],
    'menu_icon' => 'dashicons-calendar-alt',
    'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
    'show_in_rest' => true,
  ]);
});

/**
 * Meta box fields for Events
 * - Date (YYYY-MM-DD)
 * - City
 * - Video URL (optional)
 * - CTA URL (optional)
 */
add_action('add_meta_boxes', function () {
  add_meta_box(
    'vl_event_details',
    'Event Details',
    'vl_event_details_metabox_cb',
    'event',
    'normal',
    'high'
  );
});

function vl_event_details_metabox_cb($post) {
  wp_nonce_field('vl_event_details_save', 'vl_event_details_nonce');

  $date = get_post_meta($post->ID, '_vl_event_date', true);
  $city = get_post_meta($post->ID, '_vl_event_city', true);
  $video = get_post_meta($post->ID, '_vl_event_video', true);
  $cta = get_post_meta($post->ID, '_vl_event_cta', true);
  ?>
  <p>
    <label><strong>Date</strong> (YYYY-MM-DD)</label><br>
    <input type="date" name="vl_event_date" value="<?php echo esc_attr($date); ?>" style="width: 100%; max-width: 360px;">
  </p>

  <p>
    <label><strong>City</strong></label><br>
    <input type="text" name="vl_event_city" value="<?php echo esc_attr($city); ?>" style="width: 100%; max-width: 520px;" placeholder="Cancún, MX">
  </p>

  <p>
    <label><strong>Video URL</strong> (optional)</label><br>
    <input type="url" name="vl_event_video" value="<?php echo esc_attr($video); ?>" style="width: 100%;" placeholder="https://www.youtube.com/embed/...">
    <span class="description">Tip: use an embeddable URL (e.g., YouTube /embed/)</span>
  </p>

  <p>
    <label><strong>CTA URL</strong> (optional)</label><br>
    <input type="url" name="vl_event_cta" value="<?php echo esc_attr($cta); ?>" style="width: 100%;" placeholder="https://...">
  </p>
  <?php
}

add_action('save_post_event', function ($post_id) {
  if (!isset($_POST['vl_event_details_nonce']) || !wp_verify_nonce($_POST['vl_event_details_nonce'], 'vl_event_details_save')) return;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (!current_user_can('edit_post', $post_id)) return;

  $date = isset($_POST['vl_event_date']) ? sanitize_text_field($_POST['vl_event_date']) : '';
  $city = isset($_POST['vl_event_city']) ? sanitize_text_field($_POST['vl_event_city']) : '';
  $video = isset($_POST['vl_event_video']) ? esc_url_raw($_POST['vl_event_video']) : '';
  $cta = isset($_POST['vl_event_cta']) ? esc_url_raw($_POST['vl_event_cta']) : '';

  update_post_meta($post_id, '_vl_event_date', $date);
  update_post_meta($post_id, '_vl_event_city', $city);
  update_post_meta($post_id, '_vl_event_video', $video);
  update_post_meta($post_id, '_vl_event_cta', $cta);
});

/**
 * Helpers
 */
function vl_event_meta($post_id) {
  return [
    'date' => get_post_meta($post_id, '_vl_event_date', true),
    'city' => get_post_meta($post_id, '_vl_event_city', true),
    'video' => get_post_meta($post_id, '_vl_event_video', true),
    'cta' => get_post_meta($post_id, '_vl_event_cta', true),
  ];
}

/**
 * Optional: After switching theme, flush rewrite rules (for /events)
 */
add_action('after_switch_theme', function () {
  flush_rewrite_rules();
});


/**
 * Contact recipient setting (configurable email)
 * Settings → Velovita Contact
 */
add_action('admin_menu', function () {
  add_options_page(
    'Velovita Contact',
    'Velovita Contact',
    'manage_options',
    'vl-contact-settings',
    'vl_contact_settings_page'
  );
});

add_action('admin_init', function () {
  register_setting('vl_contact_settings', 'vl_contact_recipient', [
    'type' => 'string',
    'sanitize_callback' => 'sanitize_email',
    'default' => get_option('admin_email'),
  ]);

  add_settings_section('vl_contact_main', 'Email Recipient', function () {
    echo '<p>Set the email recipient for contact form submissions (future use). Submissions are currently stored in WP Admin → Inquiries.</p>';
  }, 'vl-contact-settings');

  add_settings_field('vl_contact_recipient_field', 'Recipient Email', function () {
    $val = esc_attr(get_option('vl_contact_recipient', get_option('admin_email')));
    echo '<input type="email" name="vl_contact_recipient" value="' . $val . '" class="regular-text" placeholder="name@domain.com">';
  }, 'vl-contact-settings', 'vl_contact_main');
});

function vl_contact_settings_page() {
  if (!current_user_can('manage_options')) return;
  echo '<div class="wrap"><h1>Velovita Contact</h1>';
  echo '<form method="post" action="options.php">';
  settings_fields('vl_contact_settings');
  do_settings_sections('vl-contact-settings');
  submit_button('Save Settings');
  echo '</form></div>';
}

/**
 * CPT: Inquiry (private) — stores contact submissions
 */
add_action('init', function () {
  register_post_type('inquiry', [
    'labels' => [
      'name' => 'Inquiries',
      'singular_name' => 'Inquiry',
    ],
    'public' => false,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-email-alt',
    'supports' => ['title'],
    'capability_type' => 'post',
    'show_in_rest' => false,
  ]);
});

/**
 * Contact form shortcode + handler
 * Usage: [vl_contact_form]
 */
add_shortcode('vl_contact_form', function ($atts = []) {
  $atts = shortcode_atts(['title' => 'Contact Us'], $atts);

  $status = isset($_GET['vl_contact']) ? sanitize_text_field($_GET['vl_contact']) : '';
  $msg = '';
  $alert_class = '';

  if ($status === 'success') {
    $msg = 'Thanks! Your message has been received.';
    $alert_class = 'alert-success';
  } elseif ($status === 'error') {
    $msg = 'Sorry — please check the form and try again.';
    $alert_class = 'alert-danger';
  }

  ob_start(); ?>
  <div class="vl-soft-card p-4 p-md-5">
    <div class="vl-kicker mb-2">Contact</div>
    <h2 class="h3 fw-bold mb-3"><?php echo esc_html($atts['title']); ?></h2>
    <p class="text-muted font-nunito mb-4">Send us a message and our support team will get back to you.</p>

    <?php if ($msg): ?>
      <div class="alert <?php echo esc_attr($alert_class); ?> font-nunito" role="alert">
        <?php echo esc_html($msg); ?>
      </div>
    <?php endif; ?>

    <form method="post" class="row g-3">
      <?php wp_nonce_field('vl_contact_submit', 'vl_contact_nonce'); ?>
      <input type="hidden" name="vl_contact_action" value="submit">

      <div class="col-md-6">
        <label class="form-label font-nunito">Full name</label>
        <input name="vl_name" type="text" class="form-control form-control-lg" required>
      </div>

      <div class="col-md-6">
        <label class="form-label font-nunito">Email</label>
        <input name="vl_email" type="email" class="form-control form-control-lg" required>
      </div>

      <div class="col-12">
        <label class="form-label font-nunito">Message</label>
        <textarea name="vl_message" class="form-control form-control-lg" rows="5" required></textarea>
      </div>

      <div class="col-12 d-grid d-md-inline-block">
        <button type="submit" class="btn btn-primary btn-lg">Send message</button>
      </div>

      <div class="small text-muted font-nunito">
        Recipient configured in <strong>Settings → Velovita Contact</strong>. (Email sending not enabled yet; submissions are stored.)
      </div>
    </form>
  </div>
  <?php
  return ob_get_clean();
});

add_action('init', function () {
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') return;
  if (empty($_POST['vl_contact_action']) || $_POST['vl_contact_action'] !== 'submit') return;

  // Validate nonce
  if (empty($_POST['vl_contact_nonce']) || !wp_verify_nonce($_POST['vl_contact_nonce'], 'vl_contact_submit')) {
    wp_safe_redirect(add_query_arg('vl_contact', 'error', wp_get_referer() ?: home_url('/contact')));
    exit;
  }

  $name = isset($_POST['vl_name']) ? sanitize_text_field($_POST['vl_name']) : '';
  $email = isset($_POST['vl_email']) ? sanitize_email($_POST['vl_email']) : '';
  $message = isset($_POST['vl_message']) ? wp_kses_post($_POST['vl_message']) : '';

  if (!$name || !$email || !$message) {
    wp_safe_redirect(add_query_arg('vl_contact', 'error', wp_get_referer() ?: home_url('/contact')));
    exit;
  }

  // Store as private Inquiry
  $title = wp_trim_words($name . ' — ' . $email, 8, '…');
  $post_id = wp_insert_post([
    'post_type' => 'inquiry',
    'post_status' => 'private',
    'post_title' => $title,
  ]);

  if ($post_id && !is_wp_error($post_id)) {
    update_post_meta($post_id, '_vl_inquiry_name', $name);
    update_post_meta($post_id, '_vl_inquiry_email', $email);
    update_post_meta($post_id, '_vl_inquiry_message', $message);
    update_post_meta($post_id, '_vl_inquiry_recipient', get_option('vl_contact_recipient', get_option('admin_email')));

    // Future: enable email sending (currently disabled intentionally)
    // $to = get_option('vl_contact_recipient', get_option('admin_email'));
    // wp_mail($to, 'New Contact Inquiry', "Name: $name\nEmail: $email\n\n$message");
  }

  wp_safe_redirect(add_query_arg('vl_contact', 'success', wp_get_referer() ?: home_url('/contact')));
  exit;
});


/**
 * Seed: create Contact page (slug contact) + Primary menu with links on theme activation
 */
function vl_seed_site_on_activation() {
  // 1) Ensure Contact page exists (slug: contact)
  $contact = get_page_by_path('contact');
  if (!$contact) {
    $contact_id = wp_insert_post([
      'post_type' => 'page',
      'post_status' => 'publish',
      'post_title' => 'Contact',
      'post_name' => 'contact',
      'post_content' => 'This page is rendered by the theme (page-contact.php).',
    ]);
  } else {
    $contact_id = $contact->ID;
  }

  // 2) Create Primary menu if none assigned
  $locations = get_theme_mod('nav_menu_locations', []);
  $primary_location = 'primary';
  $assigned = isset($locations[$primary_location]) && $locations[$primary_location];

  // Create/find menu named "Primary"
  $menu_name = 'Primary';
  $menu = wp_get_nav_menu_object($menu_name);
  if (!$menu) {
    $menu_id = wp_create_nav_menu($menu_name);
  } else {
    $menu_id = $menu->term_id;
  }

  // Add items only if menu is empty (avoid duplicates)
  $existing_items = wp_get_nav_menu_items($menu_id);
  if (empty($existing_items)) {

    // Home
    wp_update_nav_menu_item($menu_id, 0, [
      'menu-item-title' => 'Home',
      'menu-item-url' => home_url('/'),
      'menu-item-status' => 'publish',
      'menu-item-type' => 'custom',
    ]);

    // Community -> Events archive
    wp_update_nav_menu_item($menu_id, 0, [
      'menu-item-title' => 'Community',
      'menu-item-url' => home_url('/events'),
      'menu-item-status' => 'publish',
      'menu-item-type' => 'custom',
    ]);

    // Products (anchor on landing)
    wp_update_nav_menu_item($menu_id, 0, [
      'menu-item-title' => 'Products',
      'menu-item-url' => home_url('/#featured-products'),
      'menu-item-status' => 'publish',
      'menu-item-type' => 'custom',
    ]);

    // Contact page
    wp_update_nav_menu_item($menu_id, 0, [
      'menu-item-title' => 'Contact',
      'menu-item-object' => 'page',
      'menu-item-object-id' => $contact_id,
      'menu-item-status' => 'publish',
      'menu-item-type' => 'post_type',
    ]);

    // Join Now (points to contact)
    wp_update_nav_menu_item($menu_id, 0, [
      'menu-item-title' => 'Join Now',
      'menu-item-url' => home_url('/contact'),
      'menu-item-status' => 'publish',
      'menu-item-type' => 'custom',
      'menu-item-classes' => 'btn btn-primary', // note: WP doesn't always apply to <a>; kept for reference
    ]);
  }

  // Assign menu to Primary location if not assigned
  if (!$assigned) {
    $locations[$primary_location] = $menu_id;
    set_theme_mod('nav_menu_locations', $locations);
  }

  // Flush rewrite rules for CPT /events
  flush_rewrite_rules();
}

add_action('after_switch_theme', 'vl_seed_site_on_activation');

