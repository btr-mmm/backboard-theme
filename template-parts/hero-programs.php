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
      <?php while (have_rows('vitals')):
        the_row(); ?>
        <p><strong>Who:</strong> <?php the_sub_field('who') ?></p>
        <p><strong>When:</strong> <?php the_sub_field('when') ?></p>
        <p><strong>Where:</strong> <?php the_sub_field('where') ?></p>
        <p><em>*<?php the_sub_field('disclaimer') ?></em></p>
      <?php endwhile; ?>
    </div>
    <img
      src='<?php echo esc_url($image['url']) ?>'
      alt='<?php if (isset($image['alt'])) echo esc_attr($image['alt']) ?>'>
  </div>
</section>