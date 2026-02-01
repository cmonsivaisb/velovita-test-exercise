<?php
/*
Template Name: Contact
*/
get_header();
?>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-9">
      <div class="mb-4" data-aos="fade-up">
        <h1 class="display-6 fw-bold mb-2"><?php the_title(); ?></h1>
        <p class="text-muted font-nunito mb-0">We typically respond within 24 hours. For urgent issues, use WhatsApp Support.</p>
      </div>

      <div data-aos="fade-up" data-aos-delay="50">
        <?php echo do_shortcode('[vl_contact_form title="Get in touch"]'); ?>
      </div>

      <div class="mt-4 text-muted font-nunito small" data-aos="fade-up" data-aos-delay="100">
        Admin tip: submissions are stored in WP Admin → <strong>Inquiries</strong>. Recipient can be set in Settings → <strong>Velovita Contact</strong>.
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
