<?php get_header(); ?>

<?php get_template_part('template-parts/hero', 'page') ?>

<section class="main-content">
  <div class="wrapper">
    <?php the_content() ?>
  </div>
</section>

<?php get_template_part('template-parts/cta') ?>

<?php get_footer(); ?>