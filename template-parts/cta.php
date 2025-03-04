<?php while (have_rows('cta', 'option')):
  the_row();
  $link = get_sub_field('link');
  $bg = get_sub_field('background'); ?>
  <section class="cta" style="background-image: url(<?php echo $bg['url'] ?>);">
    <div class="wrapper">
      <h2>
        <?php the_sub_field('title') ?>
      </h2>
      <?php the_sub_field('content') ?>
      <a href="<?php echo esc_url($link['url']) ?>" class="button" target="<?php echo $link['target'] ?>">
        <?php echo esc_attr($link['title']) ?>
      </a>
    </div>
  </section>
<?php endwhile; ?>