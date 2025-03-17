<?php $image = get_field('image'); ?>

<section class="program-hero">
  <div class="wrapper">
    <div class="content">
      <h1>
        <?php the_title(); ?>
      </h1>
      <?php if (get_field('sold_out')): ?>
        <p class="sold-out">(Sold out)</p>
      <?php endif; ?>
      <?php get_template_part('template-parts/program-vitals') ?>
    </div>
    <img
      src='<?php echo esc_url($image['url']) ?>'
      alt='<?php if (isset($image['alt'])) echo esc_attr($image['alt']) ?>'>
  </div>
</section>