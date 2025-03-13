<?php get_header(); ?>

<?php get_template_part('template-parts/hero', 'league') ?>

<div class="program-listings"></div>
<div class="wrapper">
  <h2></h2>
  <?php if (have_posts()): ?>
    <article></article>
  <?php else: ?>
    <p>We're working on </p>
  <?php endif; ?>
</div>
</div>

<?php get_template_part('template-parts/cta') ?>

<?php get_footer(); ?>