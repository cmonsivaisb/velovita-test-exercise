<?php
/**
 * Fallback template required by WordPress.
 * If no more specific template matches, WP uses index.php.
 */
get_header(); ?>

<div class="container py-5">
  <?php if (have_posts()): ?>
    <div class="row g-4">
      <?php while (have_posts()): the_post(); ?>
        <div class="col-md-6 col-lg-4">
          <article class="card h-100 border">
            <?php if (has_post_thumbnail()): ?>
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('large', ['class' => 'card-img-top']); ?>
              </a>
            <?php else: ?>
              <div class="ratio ratio-16x9 bg-light border-bottom"></div>
            <?php endif; ?>

            <div class="card-body">
              <h2 class="h5 fw-semibold">
                <a class="text-decoration-none" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>
              <p class="text-muted font-nunito mb-0"><?php echo esc_html(get_the_excerpt()); ?></p>
            </div>

            <div class="card-footer bg-white border-0 pt-0 pb-4 px-3">
              <a class="btn btn-primary" href="<?php the_permalink(); ?>">Read more</a>
            </div>
          </article>
        </div>
      <?php endwhile; ?>
    </div>

    <div class="mt-4">
      <?php the_posts_pagination(); ?>
    </div>
  <?php else: ?>
    <div class="p-4 bg-light border rounded-4">
      <strong>No content found.</strong>
    </div>
  <?php endif; ?>
</div>

<?php get_footer();
