<?php while (have_rows('cta', 'option')):
  the_row();
  $link = get_sub_field('link'); ?>
  <section class="call-to-action">
    <div class="wrapper">
      <h2>
        <?php the_sub_field('title') ?>
      </h2>
      <?php the_sub_field('content') ?>
      <a href="<?php echo esc_url($link['url']) ?>" class="btn btn-primary" target="<?php echo $link['target'] ?>">
        <?php echo esc_attr($link['title']) ?>
      </a>
    </div>
  </section>
<?php endwhile; ?>