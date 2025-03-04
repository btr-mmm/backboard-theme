<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head() ?>
</head>

<body>
  <header>
    <a href="<?php echo site_url(); ?>" class="logo">
      Higher Learning Basketball
    </a>
    <nav>
      <ul>
        <li>
          <a
            href="<?php echo site_url('/training') ?>"
            <?php if (is_page('training')) echo 'class="active"' ?>>
            Training
          </a>
        </li>
        <li>
          <a
            href="<?php echo site_url('/college-consulting') ?>"
            <?php if (is_page('college-consulting')) echo 'class="active"' ?>>
            College Consulting
          </a>
        </li>
        <li>
          <a
            href="<?php echo site_url('/camps-and-clinics') ?>"
            <?php if (is_page('camps-and-clinics')) echo 'class="active"' ?>>
            Camps & Clinics
          </a>
        </li>
        <li>
          <a
            href="<?php echo site_url('/leagues') ?>"
            <?php if (is_page('leagues')) echo 'class="active"' ?>>
            Leagues
          </a>
        </li>
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
  <main <?php if (is_front_page()) echo "id='scroll-container'" ?>>