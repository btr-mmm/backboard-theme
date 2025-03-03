<?php while (have_rows('hero')):
  the_row(); ?>
  <section class="hero">
    <div class="wrapper">
      <div class="content">
        <h1>
          <?php if (get_sub_field('title')) {
            the_sub_field('title');
          } else {
            the_title();
          } ?>
        </h1>
        <?php the_sub_field('content'); ?>
      </div>
      <?php if ($image = get_sub_field('image')): ?>
        <img
          src='<?php echo esc_url($image['sizes']['hero']) ?>'
          alt='<?php if (isset($image['alt'])) echo esc_attr($image['alt']) ?>'>
      <?php endif; ?>
    </div>
  </section>
<?php endwhile; ?>