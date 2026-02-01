<footer class="border-top mt-5">
  <div class="container py-5">
    <div class="row g-4">
      <div class="col-lg-4">
        <div class="d-flex align-items-center gap-2 mb-3">
          <img alt="Velovita" width="28" height="28"
            src="https://velovita-website.s3.us-west-1.amazonaws.com/vv-new-home/assets/VelovitaLogo_alone.png">
          <div class="fw-bold">Velovita</div>
        </div>
        <div class="text-muted font-nunito">
          A wellness-driven community experience — built to help you elevate your lifestyle.
        </div>

        <div class="mt-3 p-3 bg-light border rounded-4">
          <div class="fw-semibold">Support</div>
          <div class="text-muted font-nunito small">24/7 assistance via WhatsApp (demo)</div>
          <div class="mt-2">
            <a class="btn btn-primary btn-sm" href="#" onclick="alert('Demo link'); return false;">WhatsApp Support</a>
          </div>
        </div>
      </div>

      <div class="col-6 col-lg-2">
        <div class="fw-semibold mb-2">Company</div>
        <ul class="list-unstyled font-nunito mb-0">
          <li class="mb-2"><a class="text-decoration-none" href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
          <li class="mb-2"><a class="text-decoration-none" href="<?php echo esc_url(home_url('/events')); ?>">Community</a></li>
          <li class="mb-2"><a class="text-decoration-none" href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></li>
        </ul>
      </div>

      <div class="col-6 col-lg-2">
        <div class="fw-semibold mb-2">Explore</div>
        <ul class="list-unstyled font-nunito mb-0">
          <li class="mb-2"><a class="text-decoration-none" href="#featured-products">Products</a></li>
          <li class="mb-2"><a class="text-decoration-none" href="<?php echo esc_url(home_url('/events')); ?>">Events</a></li>
          <li class="mb-2"><a class="text-decoration-none" href="#experience">Experience</a></li>
        </ul>
      </div>

      <div class="col-lg-4">
        <div class="fw-semibold mb-2">Disclaimer</div>
        <div class="text-muted font-nunito small">
          This site is a demo for a WordPress technical test. Content, images, and URLs are used as visual references
          and should be replaced for production use.
        </div>
      </div>
    </div>

    <div class="d-flex flex-column flex-md-row justify-content-between gap-2 border-top pt-3 mt-4 small text-muted font-nunito">
      <div>© <?php echo date('Y'); ?> Velovita Clone — Custom WP Theme.</div>
      <div class="d-flex gap-3">
        <a class="text-decoration-none" href="#" onclick="alert('Demo link'); return false;">Privacy</a>
        <a class="text-decoration-none" href="#" onclick="alert('Demo link'); return false;">Terms</a>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
