<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head() ?>
</head>

<body>
  <header <?php if (is_front_page()) echo "id='homepage-nav'" ?>>
    <a href="<?php echo site_url(); ?>" class="logo">
      <img src="<?php echo get_template_directory_uri() . '/dist/assets/images/logo-stack-orange.png' ?>" alt="Higher Learning Basketball">
    </a>
    <button class="nav-toggle" title="Toggle navigation">
      <i class="fa-solid fa-bars"></i>
    </button>
    <nav>
      <ul>
        <li>
          <a
            href="<?php echo site_url('/camps-and-clinics') ?>"
            <?php if (is_page('camps-and-clinics') || is_singular('program')) echo 'class="active"' ?>>
            Camps & Clinics
          </a>
        </li>
        <li>
          <a
            href="<?php echo site_url('/leagues') ?>"
            <?php if (is_page('leagues') || is_singular('league')) echo 'class="active"' ?>>
            Leagues
          </a>
        </li>
        <li>
          <a
            href="<?php echo site_url('/training') ?>"
            <?php if (is_page('training')) echo 'class="active"' ?>>
            Training
          </a>
        </li>

        <?php if (get_field('consulting_enabled', 'option')): ?>
          <li>
            <a
              href="<?php echo site_url('/consulting') ?>"
              <?php if (is_page('consulting')) echo 'class="active"'; ?>>
              Consulting
            </a>
          </li>
        <?php endif;

        if (get_field('premier_enabled', 'option')): ?>
          <li>
            <a
              href="<?php echo site_url('/premier-teams') ?>"
              <?php if (is_page('premier-teams')) echo 'class="active"' ?>>
              Premier Teams
            </a>
          </li>
        <?php endif; ?>
        <li>
          <a
            href="<?php echo site_url('/about') ?>"
            <?php if (is_page('about')) echo 'class="active"' ?>>
            About Us
          </a>
        </li>
      </ul>
    </nav>
  </header>
  <?php if (is_front_page()): ?>
    <div class="dot-nav"></div>
  <?php endif; ?>
  <main <?php if (is_front_page()) echo "id='scroll-container'" ?>>