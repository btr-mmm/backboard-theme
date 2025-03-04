<?php while (have_rows('page_hero')):
  the_row();
  $image = get_sub_field('image') ?>
  <section class="hero <?php if ($image) echo 'has-image' ?>">
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
      <?php if ($image): ?>
        <img
          src='<?php echo esc_url($image['url']) ?>'
          alt='<?php if (isset($image['alt'])) echo esc_attr($image['alt']) ?>'>
      <?php endif; ?>
    </div>
  </section>
<?php endwhile; ?>