</main>
<?php if (!is_front_page()): ?>
  <footer>

    <div class="logo">
      <img src="<?php echo get_template_directory_uri() . '/dist/assets/images/logo-stack-white.png' ?>" alt="Higher Learning Basketball">
    </div>

    <nav>
      <ul>
        <li>
          <a
            href="<?php echo site_url('/camps-and-clinics') ?>">
            Camps & Clinics
          </a>
        </li>
        <li>
          <a
            href="<?php echo site_url('/leagues') ?>">
            Leagues
          </a>
        </li>
        <li>
          <a
            href="<?php echo site_url('/training') ?>">
            Training
          </a>
        </li>

        <?php if (get_field('consulting_enabled', 'option')): ?>
          <li>
            <a
              href="<?php echo site_url('/consulting') ?>">
              Consulting
            </a>
          </li>
        <?php endif;

        if (get_field('premier_enabled', 'option')): ?>
          <li>
            <a
              href="<?php echo site_url('/premier-teams') ?>">
              Premier Teams
            </a>
          </li>
        <?php endif; ?>
        <li>
          <a
            href="<?php echo site_url('/about') ?>">
            About Us
          </a>
        </li>
      </ul>
    </nav>

    <div class="socials">
      <h2>Follow us</h2>
      <div class="icon-wrapper">
        <?php while (have_rows('socials', 'option')):
          the_row(); ?>
          <a href="<?php the_sub_field('link') ?>" title="Follow us on <?php the_sub_field('network_name') ?>" target="_blank">
            <i class="<?php the_sub_field('icon') ?>"></i>
          </a>
        <?php endwhile; ?>
      </div>
    </div>

  </footer>

  <div class="subfooter">
    <div class="wrapper">
      &copy; <?php echo date('Y') ?> Higher Learning Basketball. All rights reserved. |
      Powered by <a href="https://mcguinnessmedia.com" target="_blank">McGuinness Media & Marketing</a>.
    </div>
  </div>
<?php endif; ?>

<?php wp_footer(); ?>

</body>

</html>