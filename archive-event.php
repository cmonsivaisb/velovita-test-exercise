<?php get_header(); ?>

<div class="container py-5">
  <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-2 mb-4">
    <div data-aos="fade-up">
      <h1 class="display-6 fw-bold mb-1">Events</h1>
      <p class="text-muted font-nunito mb-0">Listado dinámico desde WordPress.</p>
    </div>
    <div data-aos="fade-up">
      <a class="btn btn-primary" href="<?php echo esc_url(admin_url('post-new.php?post_type=event')); ?>">Add event</a>
    </div>
  </div>

  <div class="row g-4">
    <?php if (have_posts()): $i=0; while (have_posts()): the_post(); $m = vl_event_meta(get_the_ID()); $i++; ?>
      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo esc_attr(min(150, ($i-1)*30)); ?>">
        <article class="card h-100 border">
          <?php if (has_post_thumbnail()): ?>
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail('large', ['class' => 'card-img-top']); ?>
            </a>
          <?php else: ?>
            <div class="ratio ratio-16x9 bg-light border-bottom"></div>
          <?php endif; ?>

          <div class="card-body">
            <div class="text-muted small font-nunito mb-2">
              <?php echo esc_html($m['date'] ?: 'Date TBD'); ?> • <?php echo esc_html($m['city'] ?: 'Location TBD'); ?>
            </div>
            <h2 class="h5 fw-semibold">
              <a class="text-decoration-none" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
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
    <?php endwhile; else: ?>
      <div class="col-12">
        <div class="p-4 bg-light rounded-4 border" data-aos="fade-up">
          <strong>No events found.</strong>
        </div>
      </div>
    <?php endif; ?>
  </div>

  <div class="mt-4">
    <?php the_posts_pagination(); ?>
  </div>
</div>

<?php get_footer(); ?>
