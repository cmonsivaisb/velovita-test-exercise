<?php get_header(); ?>
<?php while (have_posts()): the_post(); $m = vl_event_meta(get_the_ID()); ?>

<div class="container py-5">
  <div class="mb-4" data-aos="fade-up">
    <a class="text-decoration-none font-nunito" href="<?php echo esc_url(home_url('/events')); ?>">← Back to Events</a>
  </div>

  <div class="row g-4">
    <div class="col-lg-7" data-aos="fade-up">
      <h1 class="display-6 fw-bold mb-2"><?php the_title(); ?></h1>
      <div class="text-muted font-nunito mb-4">
        <?php echo esc_html($m['date'] ?: 'Date TBD'); ?> • <?php echo esc_html($m['city'] ?: 'Location TBD'); ?>
      </div>

      <?php if (has_post_thumbnail()): ?>
        <div class="mb-4">
          <?php the_post_thumbnail('large', ['class' => 'img-fluid rounded-4 border']); ?>
        </div>
      <?php endif; ?>

      <div class="font-nunito">
        <?php the_content(); ?>
      </div>

      <?php if (!empty($m['cta'])): ?>
        <div class="mt-4">
          <a class="btn btn-primary btn-lg" href="<?php echo esc_url($m['cta']); ?>" target="_blank" rel="noopener">Event CTA</a>
        </div>
      <?php endif; ?>
    </div>

    <div class="col-lg-5" data-aos="fade-left">
      <div class="p-4 bg-light rounded-4 border">
        <h2 class="h5 fw-semibold mb-3">Media</h2>

        <?php if (!empty($m['video'])): ?>
          <div class="ratio ratio-16x9 mb-3">
            <iframe
              src="<?php echo esc_url($m['video']); ?>"
              title="Event video"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen></iframe>
          </div>
          <div class="small text-muted font-nunito">Tip: use an embeddable URL (e.g., YouTube /embed/).</div>
        <?php else: ?>
          <div class="text-muted font-nunito">No video URL set for this event.</div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<?php endwhile; ?>
<?php get_footer(); ?>
