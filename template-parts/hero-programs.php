<?php $image = get_field('image'); ?>

<section class="program-hero">
  <div class="wrapper">
    <div class="content">
      <h1>
        <?php the_title(); ?>
      </h1>
      <?php if (get_field('sold_out')): ?>
        <p class="sold-out">(Sold out)</p>
      <?php endif;

      get_template_part('template-parts/program-vitals');

      if (get_field('registration')): ?>
        <a href="<?php the_field('registration') ?>" class="button base" target="_blank">
          Register Now
        </a>
      <?php endif; ?>

    </div>
    <img
      src='<?php echo esc_url($image['url']) ?>'
      alt='<?php if (isset($image['alt'])) echo esc_attr($image['alt']) ?>'>
  </div>
</section>