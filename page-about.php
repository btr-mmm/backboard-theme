<?php get_header(); ?>

<?php get_template_part('template-parts/hero', 'page') ?>

<?php while (have_rows('leadership')):
  the_row();
  $img = get_sub_field('photo') ?>
  <section class="leadership">
    <div class="wrapper">
      <img
        src='<?php echo esc_url($img['url']) ?>'
        alt='<?php if (isset($img['alt']))
                echo esc_attr($img['alt']) ?>'>
      <h2><?php the_sub_field('name') ?></h2>
      <div class="job-title"><?php the_sub_field('job_title') ?></div>
      <?php the_sub_field('bio') ?>
    </div>
  </section>
<?php endwhile; ?>

<?php while (have_rows('about_programs')):
  the_row(); ?>
  <section class="about-program">
    <div class="wrapper">
      <h2><?php the_sub_field('name') ?></h2>
      <?php the_sub_field('details') ?>
    </div>
  </section>
<?php endwhile; ?>

<?php get_footer(); ?>