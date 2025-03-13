<?php while (have_rows('page_hero')):
  the_row();
  $image = get_sub_field('image');
  $bg = get_sub_field('background_image'); ?>
  <section class="hero" id="page-hero" style="background-image: url(<?php echo esc_url($bg['url']) ?>);">
    <h1>
      <?php the_sub_field('title'); ?>
    </h1>
    <div class="hero-content">
      <?php if ($image): ?>
        <img
          src='<?php echo esc_url($image['url']) ?>'
          alt='<?php if (isset($image['alt'])) echo esc_attr($image['alt']) ?>'>
      <?php endif; ?>
      <div class="content">
        <?php the_sub_field('content'); ?>
      </div>
    </div>
  </section>
<?php endwhile; ?>