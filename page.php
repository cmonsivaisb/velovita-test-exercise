<?php get_header(); ?>
<div class="container py-5">
  <?php while (have_posts()): the_post(); ?>
    <h1 class="display-6 fw-bold mb-3" data-aos="fade-up"><?php the_title(); ?></h1>
    <div class="font-nunito" data-aos="fade-up">
      <?php the_content(); ?>
    </div>
  <?php endwhile; ?>
</div>
<?php get_footer(); ?>
