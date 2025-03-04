</main>
<footer>

  <div class="logo">
    Higher Learning Basketball
  </div>

  <nav>
    <ul>
      <li>
        <a href="<?php echo site_url('/training') ?>">
          Training
        </a>
      </li>
      <li>
        <a href="<?php echo site_url('/college-consulting') ?>">
          College Consulting
        </a>
      </li>
      <li>
        <a href="<?php echo site_url('/camps-and-clinics') ?>">
          Camps & Clinics
        </a>
      </li>
      <li>
        <a href="<?php echo site_url('/leagues') ?>">
          Leagues
        </a>
      </li>
      <li>
        <a href="<?php echo site_url('/about') ?>">
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
        <a href="<?php the_sub_field('link') ?>" title="Follow us on <?php the_sub_field('network_name') ?>">
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

<?php wp_footer(); ?>

</body>

</html>