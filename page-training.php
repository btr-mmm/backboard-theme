<?php get_header(); ?>

<?php get_template_part('template-parts/hero', 'page') ?>

<?php while (have_rows('courses')):
  the_row(); ?>
  <section class="training-course">
    <div class="wrapper">

      <section class="intro">
        <h2><?php the_sub_field('title') ?></h2>
        <?php the_sub_field('intro') ?>
      </section>

      <?php while (have_rows('selling_points')):
        the_row();
        $img = get_sub_field('image') ?>
        <section class="course-details">
          <h3><?php the_sub_field('title') ?></h3>
          <img
            src='<?php echo esc_url($img['url']) ?>'
            alt='<?php if (isset($img['alt'])) echo esc_attr($img['alt']) ?>'>
          <div class="content">
            <?php the_sub_field('content'); ?>
          </div>
        </section>
      <?php endwhile; ?>
      <section class="course-options">
        <?php the_sub_field('details'); ?>
      </section>
    </div>
  </section>
<?php endwhile; ?>

<?php get_template_part('template-parts/cta') ?>

<?php get_footer(); ?>